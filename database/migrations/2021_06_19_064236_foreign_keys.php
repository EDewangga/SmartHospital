<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeys  extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('rooms', function (Blueprint $table) {
        //     $table->foreign('user_id')->references('id')->on('users');
        // });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('doctor_id')->references('id')->on('doctors');
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('doctor_id')->references('id')->on('doctors');
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('room_id')->references('id')->on('rooms');
        });

        Schema::table('prescriptions', function (Blueprint $table) {
            $table->foreign('appointment_id')->references('id')->on('appointments');
        });

        Schema::table('prescriptions_details', function (Blueprint $table) {
            $table->foreign('prescription_id')->references('id')->on('prescriptions');
            $table->foreign('medical_id')->references('id')->on('medicals');
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('medical_id')->references('id')->on('medicals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('foreign');
    }
}
