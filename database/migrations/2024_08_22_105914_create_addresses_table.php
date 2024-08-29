<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Bu sütunun veritabanında mevcut olması gerekir
            $table->string('lastname');
            $table->unsignedBigInteger('user_id');
            $table->string('address');
            $table->string('phone', 25); // Telefon numarası için varchar(25)
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};
