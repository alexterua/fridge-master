<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('status')->default(0);
            $table->unsignedInteger('count_of_blocks');
            $table->unsignedInteger('product_volume');
            $table->integer('storage_temperature');
            $table->unsignedInteger('expiration_date');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->index('user_id', 'booking_user_idx');
            $table->foreign('user_id', 'booking_user_fk')->on('users')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
