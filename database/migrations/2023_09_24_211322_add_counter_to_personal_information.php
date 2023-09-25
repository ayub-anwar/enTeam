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
        Schema::table('personal_information', function (Blueprint $table) {
            $table->string('pc_name');
            $table->string('pc_relationship');
            $table->string('pc_phone_one');
            $table->string('pc_phone_second');
            $table->string('sc_name');
            $table->string('sc_relationship');
            $table->string('sc_phone_one');
            $table->string('sc_phone_second');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personal_information', function (Blueprint $table) {
            //
        });
    }
};
