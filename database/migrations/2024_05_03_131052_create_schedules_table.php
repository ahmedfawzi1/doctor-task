<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id')->default(1);
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
			$table->string('day', 255);
			$table->time('start_time');
			$table->time('end_time');
            $table->timestamps();
        });
    }

    public function down()
    {
    //    Schema::table('schedules', function(Blueprint $table) {
	// 		$table->dropForeign('schedules_doctor_id_foreign');
	// 	});
    }
}
