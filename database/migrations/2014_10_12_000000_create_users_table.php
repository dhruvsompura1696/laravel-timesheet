<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile_number',15)->nullable();
            $table->string('alternative_mobile_number',15)->nullable();
            $table->string('parent_mobile_number',15)->nullable();
            $table->string('gender',10)->nullable();
            $table->longText('address',10)->nullable();
            $table->date('dob')->nullable();
            $table->string('designation')->nullable();
            $table->string('account_no')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->longText('bank_address')->nullable();
            $table->string('bank_name')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('basic_salary')->nullable();
            $table->string('last_increment_date')->nullable();
            $table->string('next_increment_date')->nullable();
            // 0:user 1:admin
            $table->string('admin_type')->default(0);
            $table->string('user_status')->nullable();
            $table->text('profile_picture')->nullable();
            $table->longText('about_me')->nullable();
            $table->bigInteger('number_of_project')->nullable();
            $table->string('login_cookie')->nullable();
            $table->string('push_notification')->nullable();
            $table->integer('no_of_off_leave')->nullable();
            $table->string('allowance_pf')->nullable();
            $table->string('professional_tax')->nullable();
            $table->string('pf_percentage')->nullable();
            $table->string('allow_show_to_client')->nullable();
            $table->string('allow_show_to_project')->nullable();
            $table->string('allow_show_to_pf')->nullable();
            $table->float('credit_leave')->nullable();
            $table->string('password')->nullable();
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
};
