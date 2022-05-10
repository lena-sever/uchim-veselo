<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirstTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('first_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
            $table->string('img')->nullable();
            $table->string('author')->comment('author');
            $table->string('word')->comment('слово');
            $table->text('answer_1')->comment('ответ_1');
            $table->text('answer_2')->comment('ответ_2');
            $table->text('answer_3')->comment('ответ_3');
            $table->text('answer_4')->comment('ответ_4');
            $table->text('answer_5')->comment('ответ_5');
            $table->text('right_answer')->comment('правильный ответ');
            $table->text('description')->comment('описание для следующей страницы');
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
        Schema::dropIfExists('first_tests');
    }
}
