<form method="post" action="{{ route('admin.test_2.update',['test_2' => $second_test]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
            <div class="form-group">
                <label for="course_id">Комикс</label>
                @foreach($courses as $course)
                    @if($course->id === $second_test->course_id)
                    <input hidden type="text" class="form-control" id="course_id" name="course_id" value="{{ $second_test->course_id }}">
                    <input disabled type="text" class="form-control" value="{{ $course->title }}">
                    @endif
                @endforeach
                @error('course_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>

            <div class="form-group">
                <label for="image">Изображение</label>
                <img width="100" height="auto" src="{{ $second_test->img }}"> &nbsp;
             <button  name="_method" value="delete" class="delete btn btn-sm btn-outline-danger">X</button>
                <input type="file" class="form-control" id="image" name="image" >
            </div>
            <div class="form-group">
            <label>Разбейте предложение на 4 части и впишите его с правильными и не правильными словами:</label>
           <p><span class="h-25">Часть первая:</span><input type="text" for="part_sentence_1" class="form-control" id="part_sentence_1" name="part_sentence_1" value="{{$second_test->part_sentence_1}}">
           </p>
           <p class="btn-group w-100">
            <span class="h-25 w-15">Правльное слово:</span><input type="text" for="right_word_1" class="form-control h-25 w-25" id="right_word_1" name="right_word_1" value="{{$second_test->right_word_1}}">
            <span class="h-25 w-15">Не правльное слово:</span><input type="text" for="wrong_word_1" class="form-control h-25 w-25" id="wrong_word_1" name="wrong_word_1" value="{{$second_test->wrong_word_1}}">
            </p>
            <p><span class="h-25">
            Часть вторая:</span><input type="text" for="part_sentence_2" class="form-control" id="part_sentence_2" name="part_sentence_2" value="{{$second_test->part_sentence_2}}">
            </p>
           <p class="btn-group w-100">
           <span class=" h-25 w-15">Правльное слово:</span><input type="text" for="right_word_2" class="form-control h-25 w-25" id="right_word_2" name="right_word_2" value="{{$second_test->right_word_2}}">
           <span class=" h-25 w-15">Не правльное слово:</span><input type="text" for="wrong_word_2" class="form-control h-25 w-25" id="wrong_word_2" name="wrong_word_2" value="{{$second_test->wrong_word_2}}">
            </p>
            <p><span class="h-25">
            Часть третья:</span><input type="text" for="part_sentence_3" class="form-control" id="part_sentence_3" name="part_sentence_3" value="{{$second_test->part_sentence_3}}">
            </p>
           <p class="btn-group w-100">
           <span class=" h-25 w-15"> Правльное слово:</span><input type="text" for="right_word_3" class="form-control h-25 w-25" id="right_word_3" name="right_word_3" value="{{$second_test->right_word_3}}">
           <span class=" h-25 w-15"> Не правльное слово:</span><input type="text" for="wrong_word_3" class="form-control h-25 w-25" id="wrong_word_3" name="wrong_word_3" value="{{$second_test->wrong_word_3}}">
            </p>
            <p><span class="h-25">
            Часть четвертая:</span><input type="text" for="part_sentence_4" class="form-control" id="part_sentence_4" name="part_sentence_4" value="{{$second_test->part_sentence_4}}">
            </p>
           <p class="btn-group w-100">
           <span class=" h-25 w-15">  Правльное слово:</span><input type="text" for="right_word_4" class="form-control h-25 w-25" id="right_word_4" name="right_word_4" value="{{$second_test->right_word_4}}">
           <span class=" h-25 w-15">  Не правльное слово:</span><input type="text" for="wrong_word_4" class="form-control h-25 w-25" id="wrong_word_4" name="wrong_word_4" value="{{$second_test->wrong_word_4}}">
           </p>
                @error('part_sentence_1') <strong style="color:red;">{{ $message }}</strong> @enderror
                @error('part_sentence_2') <strong style="color:red;">{{ $message }}</strong> @enderror
                @error('part_sentence_3') <strong style="color:red;">{{ $message }}</strong> @enderror
                @error('part_sentence_4') <strong style="color:red;">{{ $message }}</strong> @enderror
                @error('right_word_1') <strong style="color:red;">{{ $message }}</strong> @enderror
                @error('right_word_2') <strong style="color:red;">{{ $message }}</strong> @enderror
                @error('right_word_3') <strong style="color:red;">{{ $message }}</strong> @enderror
                @error('right_word_4') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <br>
    <button type="submit"  value="Изменить" class="btn btn-success" style="float: right;">Изменить</button>
</form>
<a href="{{ route('admin.test', ['course' => $second_test->course_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
