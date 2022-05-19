<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('img')->nullable();
            $table->foreignId('author_id')->constrained('authors')->cascadeOnDelete();
            $table->foreignId('painter_id')->constrained('painters')->cascadeOnDelete();
            $table->float('price')->default(0);
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign('courses_author_id_foreign');
        Schema::dropForeign('courses_painter_id_foreign');
        Schema::dropIfExists('courses');
    }
}
