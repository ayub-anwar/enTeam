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
        Schema::create('healthappointments', function (Blueprint $table) {
            $table->id();
            $table->string('appointed_employee');
            $table->string('user_id');
            $table->string('appointed_doctor');
            $table->string('appointed_date');
            $table->string('appointed_time');
            $table->string('appointed_reason');
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
        Schema::dropIfExists('healthappointments');
    }
};
