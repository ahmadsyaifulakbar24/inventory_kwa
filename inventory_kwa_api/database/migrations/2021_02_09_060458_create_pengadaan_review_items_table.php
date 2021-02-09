<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengadaanReviewItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengadaan_review_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengadaan_review_id')->constrained('pengadaan_reviews')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pengadaan_request_item_id')->constrained('pengadaan_request_items')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengadaan_review_items');
    }
}
