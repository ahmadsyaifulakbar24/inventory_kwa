<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik');
            $table->string('name');
            $table->enum('status', ['Single', 'Married'])->nullable();
            $table->text('alamat')->nullable();
            $table->bigInteger('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('jabatan_id')->constrained('params')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('employees');
    }
}
