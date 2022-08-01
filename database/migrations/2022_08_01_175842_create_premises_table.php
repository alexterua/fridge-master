<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('premises', function (Blueprint $table) {
            $table->id();
            $table->integer('temperature');
            $table->unsignedBigInteger('location_id');
            $table->timestamps();

            $table->index('location_id', 'location_premis_idx');
            $table->foreign('location_id', 'location_premis_fk')->on('locations')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('premises');
    }
};
