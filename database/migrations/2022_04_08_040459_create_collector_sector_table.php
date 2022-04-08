<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectorSectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collector_sector', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collector_id');
            $table->foreign('collector_id')->on('collectors')->references('id')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            
            $table->unsignedBigInteger('sector_id');
            $table->foreign('sector_id')->on('sectors')->references('id')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collector_sector');
    }
}
