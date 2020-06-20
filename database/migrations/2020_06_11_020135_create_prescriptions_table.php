<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // transaksi obat
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->foreignId('user_id')->nullable(); tak comment sale ndek appoint men wes ono user id karo doctor id
            // $table->foreignId('doctor_id')->nullable();
            $table->bigInteger('appointment_id')->unsigned();
            $table->integer('total');
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
        Schema::dropIfExists('prescriptions');
    }
}
