<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('length')->default(2);
            $table->unsignedInteger('width')->default(1);
            $table->unsignedInteger('height')->default(1);
            $table->unsignedSmallInteger('is_free')->default(1);
            $table->unsignedBigInteger('premis_id')->nullable();
            $table->timestamps();

            $table->index('premis_id', 'block_premis_idx');
            $table->foreign('premis_id', 'block_premis_fk')->on('premises')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('blocks');
    }
};
