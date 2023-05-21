<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->foreignId('discount_id')->nullable();
            $table->unsignedInteger('discount_percentage')->nullable();
            $table->unsignedInteger('total')->default(0);

            $table->foreign('discount_id')->references('id')->on('discounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checkouts', function (Blueprint $table) {
                
                $table->dropForeign(['discount_id']);
                $table->dropColumn('discount_id');
                $table->dropColumn('discount_percentage');
                $table->dropColumn('total');
        });
    }
};
