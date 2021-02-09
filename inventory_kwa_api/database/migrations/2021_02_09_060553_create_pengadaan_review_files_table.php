<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengadaanReviewFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengadaan_review_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengadaan_review_id')->constrained('pengadaan_review_items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('type_file_id')->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->string('file');
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
        Schema::dropIfExists('pengadaan_review_files');
    }
}
