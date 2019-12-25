<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\OtherContact;
use Illuminate\Support\Facades\Storage;



class ApiController extends Controller
{
    // User's scheduled inspection using user_id
    public function registerUser(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'max:20'],
            'last_name' => ['required', 'max:20'],
            'email' => 'required|max:50|unique:users',
            'password' => ['required', 'max:50'],
            'phone' => 'required|digits_between:10,11',
            'device_id' => ['required', 'max:500'],
            'father_name' => ['required', 'max:20'],
            'dob' => ['required', 'max:20','date_format:d/m/Y'],
            'gender' => 'required|in:0,1',
            'martial_status' => 'required|in:0,1',
            'aadhar_no' => ['required', 'max:13'],
            'aadhar_front' => ['required', 'max:255','mimes:pdf,jpeg,jpg|max:5120'],
            'aadhar_back' => ['required', 'max:255','mimes:pdf,jpeg,jpg|max:5120'],
            'pan_no' => ['required', 'max:20'],
            'pan_front' => ['required', 'max:255','mimes:pdf,jpeg,jpg|max:5120'],
            'video' => 'required|mimes:mp4|max:20000',
            'bank_name' => ['required', 'max:20'],
            'bank_account_no' => ['required', 'integer','digits_between:6,20'],
            'bank_ifsc' => ['required', 'max:15'],
            'loan_purpose' => 'required|in:0,1,2,3',
            'residential_status' => 'required|in:0,1,2',
            'permanent_address' => ['required', 'max:255'],
            'company_name' => ['required', 'max:20'],
            'salary' => ['required', 'integer','digits_between:1,9'],
            'loan_amount' => ['required', 'integer', 'digits_between:1,9'],
            'other_contact' => ['required']
        ]);
        if ($validator->fails()) {
            $response = array('status' => '400','error' => "true",'message' => 'Parameter validation error - '.$validator->errors()->first());
            return $response;
        }else{
            $user = new User();
            //transaction begin
            \DB::beginTransaction();
            try {
                #save user
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->password = $request->password;
                $user->phone = $request->phone;
                $user->device_id = $request->device_id;
                $user->father_name = $request->father_name;
                $user->dob = $request->dob;
                $user->gender = $request->gender;
                $user->martial_status = $request->martial_status;
                $user->aadhar_no = $request->aadhar_no;
                $file_aadhar_front_original_name = $request->aadhar_front->getClientOriginalName();
                $user->aadhar_front = Storage::disk('local')->putFileAs('Aadhar', $request->aadhar_front, $file_aadhar_front_original_name);
                //$user->aadhar_front = $request->aadhar_front;
               // $user->aadhar_back = $request->aadhar_back;
                $file_aadhar_back_original_name = $request->aadhar_back->getClientOriginalName();
                $user->aadhar_back = Storage::disk('local')->putFileAs('Aadhar', $request->aadhar_back, $file_aadhar_back_original_name);
                $user->pan_no = $request->pan_no;
                // $user->pan_front = $request->pan_front;
                $file_pan_front_original_name = $request->pan_front->getClientOriginalName();
                $user->pan_front = Storage::disk('local')->putFileAs('Pan', $request->pan_front, $file_pan_front_original_name);
                $file_video_original_name = $request->video->getClientOriginalName();
                $user->video = Storage::disk('local')->putFileAs('Video', $request->video, $file_video_original_name);
                $user->bank_name = $request->bank_name;
                $user->bank_account_no = $request->bank_account_no;
                $user->bank_ifsc = $request->bank_ifsc;
                $user->loan_purpose = $request->loan_purpose;
                $user->permanent_address = $request->permanent_address;
                $user->company_name = $request->company_name;
                $user->salary = $request->salary;
                $user->loan_amount = $request->loan_amount;
                $interest = $this->findInterest($user->loan_amount);
                $user->payable_amount = (string)$interest['payable_amount'];
                $user->interest_rate = (string)$interest['interest_rate'];
                $user->processing_fee = (string)$interest['processing_fee'];
                $user->gst = (string)$interest['gst'];
                $user->loan_duration = (string)18;//in days
                $user->profile_status = 1;
                $user->loan_status = 0;
                $user->save();

                #get userId
                $user_id = $user->id;
                if($request->other_contact!=''){
                    $other_contact_field = json_decode($request->other_contact); 
                    foreach($other_contact_field as $other_contacts){
                        $other_contact = new OtherContact();
                        $other_contact->user_id = $user_id;
                        $other_contact->family_type = $other_contacts->family_type;
                        $other_contact->name = $other_contacts->name;
                        $other_contact->phone_number = $other_contacts->phone_number;
                        $other_contact->type = $other_contacts->type;
                        $other_contact->save();
                    }
                }
                
                \DB::commit();
                return $user;
                
            } catch (Exception $e) {
                \DB::rollback();
                // something went wrong
                throw $e;
            }

            $response = array('status' => '200','error' => "false",'message' => 'Success','payload' => $validResponse);
            
            return $response;
        }
    }

    //find interest amount
    public function findInterest($loan_amount){
        $gst = (18/100);
        $interest =(1.35/100);
        $processing_fee = 0.158; //for one rupee
        $amount['gst'] = round($gst*$loan_amount,2);
        $amount['interest_rate'] = round($interest*$loan_amount,2);
        $amount['processing_fee'] = round((($processing_fee*$loan_amount)+$processing_fee*$gst*$loan_amount),2)+round($interest*$loan_amount,2);
        $amount['payable_amount'] = round($loan_amount,2)+$amount['processing_fee'];
        return $amount;
    }

    //find interest amount
    public function getUser(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id'
        ]);
        if ($validator->fails()) {
            $response = array('status' => '400','error' => "true",'message' => 'Parameter validation error - '.$validator->errors()->first());
            return $response;
        }else{
            return User::findorfail($request->user_id);
        }   
    }    

}