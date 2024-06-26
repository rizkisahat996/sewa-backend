<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('description');
            $table->json('details')->nullable();
            $table->json('pictures')->nullable();
            $table->decimal('rent_price', 8, 2);
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users');
            $table->integer('view_count')->nullable()->default(0);
            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')->references('id')->on('building_categories');
            $table->string('address');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buildings');
    }
};
