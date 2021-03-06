<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->integer('otp')->nullable();
            $table->string('device_id')->nullable();
            $table->string('father_name',20)->nullable();
            $table->string('dob',20)->nullable();
            $table->string('gender',20)->nullable()->comment = '0=male,1=female'; //0=male,1=female
            $table->string('martial_status',20)->nullable()->comment = '0=single,1=married,2=divorced'; //0=single,1=married,2=divorced
            $table->string('aadhar_no',20)->nullable();
            $table->text('aadhar_front')->nullable();
            $table->text('aadhar_back')->nullable();
            $table->string('pan_no',20)->nullable();
            $table->text('pan_front')->nullable();
            $table->text('live_image')->nullable();
            $table->string('bank_name',20)->nullable();
            $table->string('bank_account_no',20)->nullable();
            $table->string('bank_ifsc',20)->nullable();
            $table->string('residential_status',20)->nullable()->comment = '0=self/owner,1=parental,2=rented';
            $table->string('permanent_address',255)->nullable();
            $table->string('company_name')->nullable();
            $table->string('salary')->nullable();
            
            $table->integer('profile_status')->nullable()->comment = '0=incomplete,1=complete'; //0=incomplete,1=complete
            $table->integer('is_admin')->nullable()->comment = 'NULL=user,1=admin';
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
