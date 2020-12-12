<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryAlkerTable extends Migration
{
    public function up()
    {
        Schema::create('history_alker', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alker_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('alker_request_id')->nullable()->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', [
                'create_goods', 
                'request_goods',
                'exit_goods',
                'not_good_goods',
                'incoming_goods',
                'update_goods'
            ]);
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
        Schema::dropIfExists('history_table');
    }
}
