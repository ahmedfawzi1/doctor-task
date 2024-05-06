<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
			$table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->dateTime('appointment_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('appointments', function(Blueprint $table) {
			$table->dropForeign('appointments_doctor_id_foreign');
            $table->dropForeign('appointments_patient_id_foreign');

		});
    }
}
