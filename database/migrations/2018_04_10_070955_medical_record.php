<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MedicalRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalFile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idUser');
            $table->string('idPatient');
            $table->string('type');
            $table->string('notice');
            $table->string('recommendations');
            $table->string('medicalOpinion');
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
        //
    }
}
