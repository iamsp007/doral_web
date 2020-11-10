<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('address1', 100);
            $table->string('address2', 100);
            $table->string('zip', 8);
            $table->bigInteger('phone');
            $table->string('email', 70)->unique();
            $table->date('dob');
            $table->string('ssn', 12);
            $table->string('npi', 12)->comment('This is optional field');
            $table->foreignId('role_id')->index('role_id');
            $table->foreignId('designation_id')->index('designation_id');
            $table->string('emg_first_name', 50);
            $table->string('emg_last_name', 50);
            $table->string('emg_address1', 100);
            $table->string('emg_address2', 100);
            $table->string('emg_zip', 8);
            $table->bigInteger('emg_phone');
            $table->string('emg_email', 70);
            $table->date('join_date');
            $table->enum('Employeement _type', ['Applicant', 'Employee', 'Rejected']);
            $table->enum('status', ['active', 'inactive', 'applicant', 'employee']);
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
        Schema::dropIfExists('employees');
    }
}
