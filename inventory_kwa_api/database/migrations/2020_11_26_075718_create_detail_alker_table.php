<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAlkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_alker', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alker_id')->unique()->constrained('alker')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('sto_id')->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('teknisi_id')->constrained('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->string('kegunaan')->nullable();
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
        Schema::dropIfExists('detail_alker');
    }
}
