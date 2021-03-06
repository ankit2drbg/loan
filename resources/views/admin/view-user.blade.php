@extends('layouts.admin-layout')
<style>
.row{
    padding: 1%;
}
</style>
@section('content')
<section class="content-header">
    <a href="../edit/{{$user->id}}/{{$loan->id}}" class="btn btn-primary">Edit</a>
   <ol class="breadcrumb">
      <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{url('admin/users')}}"> Users</a></li>
      <li class="active">Edit User</li>
   </ol>
</section>

<section class="content"  style="min-height: 0;">
   <!-- Default box -->
   <div class="box">
      <div class="box-header with-border">
         <h3 class="box-title">Loan Summary</h3>
         <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
         </div>
      </div>
      <div class="box-body">
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
               <!-- /.box-header -->
                  <div class="box-body">


                      <div class="row">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Name :</strong>
                                  </div>
                                  <div class="col-md-6">
                                      {{$user->first_name}}
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Email :</strong>
                                  </div>
                                  <div class="col-md-6">
                                  {{$user->email}}
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Phone :</strong>
                                  </div>
                                  <div class="col-md-6">
                                      {{$user->phone}}
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Father Name :</strong>
                                  </div>
                                  <div class="col-md-6">
                                  {{$user->father_name}}
                                  </div>
                              </div>
                          </div>
                      </div>  
                      <div class="row">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Date Of Birth :</strong>
                                  </div>
                                  <div class="col-md-6">
                                      {{$user->dob}}
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Gender :</strong>
                                  </div>
                                  <div class="col-md-6">
                                   @if($user->gender==0)   
                                    Male
                                   @elseif($user->gender==1)   
                                    Female
                                   @else
                                   N/A
                                   @endif 
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Martial Status :</strong>
                                  </div>
                                  <div class="col-md-6">
                                    @if($user->martial_status==0)   
                                        Single
                                    @elseif($user->martial_status==1)   
                                        Married
                                    @elseif($user->martial_status==2)   
                                        Divorced
                                    @else
                                    N/A
                                    @endif 
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Aadhar Number :</strong>
                                  </div>
                                  <div class="col-md-6">
                                  {{$user->aadhar_no}}
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Aadhar Image :</strong>
                                  </div>
                                  <div class="col-md-6">
                                      <a href="{{$user->aadhar_front}}" target="_blank"><img style="width: 25%" src="{{$user->aadhar_front}}" alt=""></a>
                                      <a href="{{$user->aadhar_back}}" target="_blank"><img style="width: 25%" src="{{$user->aadhar_back}}" alt=""></a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>PAN  :</strong>
                                  </div>
                                  <div class="col-md-6">
                                  {{$user->pan_no}}
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>PAN Image :</strong>
                                  </div>
                                  <div class="col-md-6">
                                  <a href="{{$user->pan_front}}" target="_blank"><img style="width: 25%" src="{{$user->pan_front}}" alt=""></a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <!-- <div class="row">
                                  <div class="col-md-6">
                                      <strong>Image Captured :</strong>
                                  </div>
                                  <div class="col-md-6">
                                    <a href="{{$user->live_image}}" target="_blank"><img style="width: 25%" src="{{$user->live_image}}" alt=""></a>
                                  </div>
                              </div> -->
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Bank Name :</strong>
                                  </div>
                                  <div class="col-md-6">
                                      {{$user->bank_name}}
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Bank Account Number :</strong>
                                  </div>
                                  <div class="col-md-6">
                                  {{$user->bank_account_no}}
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Bank IFSC :</strong>
                                  </div>
                                  <div class="col-md-6">
                                      {{$user->bank_ifsc}}
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Load Purpose :</strong>
                                  </div>
                                  <div class="col-md-6">
                                    @if($loan->loan_purpose==0)   
                                        Renovation
                                    @elseif($loan->loan_purpose==1)   
                                        Education
                                    @elseif($loan->loan_purpose==2)   
                                        Marry
                                    @elseif($loan->loan_purpose==3)   
                                        Personal    
                                    @else
                                    N/A
                                    @endif 
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Resident Type :</strong>
                                  </div>
                                  <div class="col-md-6">
                                    @if($user->residential_status==0)   
                                        Self/Owner
                                    @elseif($user->residential_status==1)   
                                        Parental
                                    @elseif($user->residential_status==2)   
                                        Rented
                                    @else
                                    N/A
                                    @endif 
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Permanent Address :</strong>
                                  </div>
                                  <div class="col-md-6">
                                  {{$user->permanent_address}}
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Company Name :</strong>
                                  </div>
                                  <div class="col-md-6">
                                      {{$user->company_name}}
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Salary :</strong>
                                  </div>
                                  <div class="col-md-6">
                                  Rs {{$user->salary}}
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Loan Amount :</strong>
                                  </div>
                                  <div class="col-md-6">
                                  @if($loan->payable_amount!=null)
                                      Rs {{$loan->loan_amount}}
                                   @else
                                        N/A
                                    @endif       
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Loan Duration :</strong>
                                  </div>
                                  <div class="col-md-6">
                                   {{$loan->loan_duration}} Days
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Loan Status :</strong>
                                  </div>
                                  <div class="col-md-6">
                                    @if($loan->loan_status==-1)   
                                        Requested
                                    @elseif($loan->loan_status==0)   
                                        Pending  
                                    @elseif($loan->loan_status==1)   
                                        Approved
                                    @elseif($loan->loan_status==2)   
                                        Rejected
                                    @else
                                    N/A
                                    @endif
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Payable Amount :</strong>
                                  </div>
                                  <div class="col-md-6">
                                      @if($loan->payable_amount!=null)
                                        Rs {{$loan->payable_amount}}
                                      @else
                                        N/A  
                                      @endif
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>GST(18%) :</strong>
                                  </div>
                                  <div class="col-md-6">
                                  @if($loan->payable_amount!=null)  
                                    Rs {{$loan->gst}}
                                  @else
                                  N/A  
                                  @endif
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Interest Rate(1.35%) :</strong>
                                  </div>
                                  <div class="col-md-6">
                                  @if($loan->payable_amount!=null)  
                                    Rs {{$loan->interest_rate}}
                                  @else
                                  N/A
                                  @endif  
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Processing Fee :</strong>
                                  </div>
                                  <div class="col-md-6">
                                  @if($loan->payable_amount!=null)
                                     Rs {{$loan->processing_fee}}
                                  @else
                                  N/A
                                  @endif   
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Company Name :</strong>
                                  </div>
                                  <div class="col-md-6">
                                      {{$user->company_name}}
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Application Date :</strong>
                                  </div>
                                  <div class="col-md-6">
                                      {{$user->created_at}}
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Requested Amount :</strong>
                                  </div>
                                  <div class="col-md-6">
                                  @if($loan->requested_amount==null)
                                        N/A
                                  @else
                                    Rs {{$loan->requested_amount}}
                                  @endif  
                                  </div>
                              </div>
                          </div> 
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-6">
                                      <strong>Profile Status :</strong>
                                  </div>
                                  <div class="col-md-6">
                                    @if($user->profile_status==0)   
                                        Incomplete
                                    @elseif($user->profile_status==1)   
                                        Complete
                                    @else
                                    N/A
                                    @endif
                                  </div>
                              </div>
                          </div> 
                      </div>

            <div class="row">
                <div class="col-md-12">
                    <h4>Other Contact</h4>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>S.No.</td>
                                <td>Contact Type</td>
                                <td>Name</td>
                                <td>Phone No.</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach($other_contact as $contact)
                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    @if($contact['family_type']==0)
                                    Father
                                    @elseif($contact['family_type']==1)
                                    Mother
                                    @elseif($contact['family_type']==2)
                                    Brother
                                    @elseif($contact['family_type']==3)
                                    Sister
                                    @elseif($contact['family_type']==4)
                                    Friend
                                    @elseif($contact['family_type']==5)
                                    Other
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>{{$contact['name']}}</td>
                                <td>{{$contact['phone_number']}}</td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

                  </div>
            </div>
            <!-- Form Element sizes -->
         </div>
      </div>
      <!-- /.box-body -->
   </div>
   <!-- /.box -->
</section>
@endsection
