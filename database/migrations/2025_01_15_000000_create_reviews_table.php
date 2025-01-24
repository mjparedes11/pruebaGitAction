<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->unsignedBigInteger('author_id'); // Campo de clave foránea
            $table->text('review_text');
            $table->integer('rating');
            $table->timestamps();
        
            // Clave foránea que referencia a la tabla 'authors'
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
