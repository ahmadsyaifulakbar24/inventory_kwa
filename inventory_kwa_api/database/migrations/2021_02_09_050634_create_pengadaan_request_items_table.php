<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Constraint\Constraint;

class CreatePengadaanRequestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengadaan_request_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengadaan_request_id')->constrained('pengadaan_requests')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('main_alker_id')->nullable()->constrained('main_alker')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('item_id')->nullable()->constrained('items')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('total');
            $table->enum('status', ['approve', 'decline', 'pending'])->default('pending');
            $table->timestamp('approved_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengadaan_request_items');
    }
}
