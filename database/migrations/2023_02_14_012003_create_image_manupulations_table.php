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
        Schema::create('image_manupulations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('path', 2000);
            $table->string('type', 25);
            $table->text('data');
            $table->string('output_path', 2000)->nullable();

            $table->timestamp('created_at')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('album_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_manupulations');
    }
};
