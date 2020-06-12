<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_consultations', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->unsignedBigInteger('pet_id')->nullable();
            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');

            $table->timestamps();
            $table->timestamp('attendance_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_consultations');
    }
}
