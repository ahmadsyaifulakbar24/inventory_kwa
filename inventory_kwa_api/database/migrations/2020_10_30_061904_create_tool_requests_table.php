<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tool_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('nik_teknisi')->constrained('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->string('jenis');
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
        Schema::dropIfExists('tool_requests');
    }
}
