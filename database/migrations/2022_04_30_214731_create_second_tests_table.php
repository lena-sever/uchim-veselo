<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecondTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('second_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
            $table->string('img')->nullable();
            $table->string('part_sentence_1');
            $table->string('right_word_1');
            $table->string('wrong_word_1');
            $table->string('part_sentence_2');
            $table->string('right_word_2');
            $table->string('wrong_word_2');
            $table->string('part_sentence_3');
            $table->string('right_word_3');
            $table->string('wrong_word_3');
            $table->string('part_sentence_4');
            $table->string('right_word_4');
            $table->string('wrong_word_4');
            $table->string('etymology');
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
        Schema::dropIfExists('second_tests');
    }
}
