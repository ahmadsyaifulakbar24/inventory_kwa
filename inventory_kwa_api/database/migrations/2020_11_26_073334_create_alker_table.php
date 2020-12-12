<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alker', function (Blueprint $table) {
            $table->id();
            $table->foreignId('main_alker_id')->constrained('main_alker')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kode_alker')->unique();
            $table->enum('status', ['in', 'out', 'pending']);
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
        Schema::dropIfExists('alker');
    }
}
