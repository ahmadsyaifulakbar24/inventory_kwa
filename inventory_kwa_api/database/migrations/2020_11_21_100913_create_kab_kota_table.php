<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKabKotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kab_kota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provinsi_id')->constrained('provinsi')->onDelete('cascade')->onUpdate('cascade');
            $table->string('kab_kota');
            $table->integer('type');
            $table->string('ibu_kota');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('kab_kota_id')->references('id')->on('kab_kota')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kab_kota');
    }
}
