<form method="post" action="{{ route('admin.test_2.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="course_id">Комикс</label>
                <select class="form-control" id="course_id" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}"  @if($course->id == $course_id) selected @endif> {{ $course->title }}</option>
                    @endforeach
                </select>
                @error('course_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>

            <div class="form-group">
                <label for="img">Изображение</label>
                <img width="100" height="auto" src="{{old('img') }}"> &nbsp;
                <input type="file" class="form-control" id="img" name="img" >
            </div>
      <div class="form-group">
            <label>Разбейте предложение на 4 части и впишите его с правильными и не правильными словами:</label>
           <p><span class="h-25">Часть первая:</span><input type="text" for="part_sentence_1" class="form-control" id="part_sentence_1" name="part_sentence_1" value="{{old('part_sentence_1')}}">
           </p>
           <p class="btn-group w-100">
            <span class="h-25 w-15">Правльное слово:</span><input type="text" for="right_word_1" class="form-control h-25 w-25" id="right_word_1" name="right_word_1" value="{{old('right_word_1')}}">
            <span class="h-25 w-15">Не правльное слово:</span><input type="text" for="wrong_word_1" class="form-control h-25 w-25" id="wrong_word_1" name="wrong_word_1" value="{{old('wrong_word_1')}}">
            </p>
            <p><span class="h-25">
            Часть вторая:</span><input type="text" for="part_sentence_2" class="form-control" id="part_sentence_2" name="part_sentence_2" value="{{old('part_sentence_2')}}">
            </p>
           <p class="btn-group w-100">
           <span class=" h-25 w-15">Правльное слово:</span><input type="text" for="right_word_2" class="form-control h-25 w-25" id="right_word_2" name="right_word_2" value="{{old('right_word_2')}}">
           <span class=" h-25 w-15">Не правльное слово:</span><input type="text" for="wrong_word_2" class="form-control h-25 w-25" id="wrong_word_2" name="wrong_word_2" value="{{old('wrong_word_2')}}">
            </p>
            <p><span class="h-25">
            Часть третья:</span><input type="text" for="part_sentence_3" class="form-control" id="part_sentence_3" name="part_sentence_3" value="{{old('part_sentence_3')}}">
            </p>
           <p class="btn-group w-100">
           <span class=" h-25 w-15"> Правльное слово:</span><input type="text" for="right_word_3" class="form-control h-25 w-25" id="right_word_3" name="right_word_3" value="{{old('right_word_3')}}">
           <span class=" h-25 w-15"> Не правльное слово:</span><input type="text" for="wrong_word_3" class="form-control h-25 w-25" id="wrong_word_3" name="wrong_word_3" value="{{old('wrong_word_3')}}">
            </p>
            <p><span class="h-25">
            Часть четвертая:</span><input type="text" for="part_sentence_4" class="form-control" id="part_sentence_4" name="part_sentence_4" value="{{old('part_sentence_4')}}">
            </p>
           <p class="btn-group w-100">
           <span class=" h-25 w-15">  Правльное слово:</span><input type="text" for="right_word_4" class="form-control h-25 w-25" id="right_word_4" name="right_word_4" value="{{old('right_word_4')}}">
           <span class=" h-25 w-15">  Не правльное слово:</span><input type="text" for="wrong_word_4" class="form-control h-25 w-25" id="wrong_word_4" name="wrong_word_4" value="{{old('wrong_word_4')}}">
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
    <button type="submit"  value="Добавить" class="btn btn-success" style="float: right;">Добавить</button>
</form>
<a href="{{route('admin.test',['course'=>$course_id])}}" style="margin-top:15px;" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
