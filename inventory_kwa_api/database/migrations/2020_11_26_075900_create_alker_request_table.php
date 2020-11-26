<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlkerRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alker_request', function (Blueprint $table) {
            $table->id();
            $table->foreignId('main_alker_id')->constrained('main_alker')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('alker_id')->constrained('alker')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('sto_id')->constrained('params')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('teknisi_id')->constrained('employees')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('kegunaan')->nullable();
            $table->foreignId('keterangan_id')->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->string('front_picture')->nullable();
            $table->string('back_picture')->nullable();
            $table->enum('status', ['accepted', 'pending']);
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
        Schema::dropIfExists('alker_request');
    }
}
