<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('brand');
            $table->string('processor')->nullable();
            $table->string('ram')->nullable();
            $table->bigInteger('price');
            $table->text('description')->nullable();
            $table->string('image')->nullable();

            // TAMBAHKAN BARIS INI:
            $table->integer('views')->default(0);

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
