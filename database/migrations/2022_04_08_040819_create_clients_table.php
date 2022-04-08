<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('sexe');
            $table->string('phone');
            $table->string('email')-> nullable();
            $table->string('cni')->nullable();
            $table->date('date_of_issue')->nullable();
            $table->string('delivered_in')->nullable();
            $table->unsignedBigInteger('sector_id');
            $table->foreign('sector_id')->on('sectors')->references('id');
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')->on('accounts')->references('id')->cascadeOnDelete();
            $table->unsignedBigInteger('collector_id');
            $table->foreign('collector_id')->on('collectors')->references('id');
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
        Schema::dropIfExists('clients');
    }
}
