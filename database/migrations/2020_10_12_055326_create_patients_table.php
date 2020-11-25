<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('address1', 100)->nullable();
            $table->string('address2', 100)->nullable();
            $table->string('zip', 8)->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('email', 70)->unique();
            $table->date('dob')->nullable();
            $table->string('ssn', 12)->nullable();
            $table->string('place_of_examination', 50)->nullable();
            $table->date('date_of_examination')->nullable();
            $table->string('condition_state', 30)->nullable();
            $table->string('cin_no', 12)->nullable();
            $table->string('medi_care_no', 12)->nullable();
            $table->foreignId('role_id')->index('role_id')->nullable();
            $table->foreignId('designation_id')->index('designation_id')->nullable();
            $table->string('emg_first_name', 50)->nullable();
            $table->string('emg_last_name', 50)->nullable();
            $table->string('emg_address1', 100)->nullable();
            $table->string('emg_address2', 100)->nullable();
            $table->string('emg_zip', 8)->nullable();
            $table->bigInteger('emg_phone')->nullable();
            $table->string('emg_email', 70)->nullable();
            $table->enum('status', ['active', 'inactive', 'discontinued', 'hold'])->default('inactive');
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
        Schema::dropIfExists('patients');
    }
}
