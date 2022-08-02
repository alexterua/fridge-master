<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->float('storage_cost', 8, 2)->nullable()->after('expiration_date');
            $table->string('access_code', 12)->nullable()->after('storage_cost');
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('storage_cost');
            $table->dropColumn('access_code');
        });
    }
};
