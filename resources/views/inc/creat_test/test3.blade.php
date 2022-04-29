<form method="post" action="{{ route('admin.test_3.store') }}">
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
                <label for="test_title">Наименование теста</label>
                <input type="text" class="form-control" id="test_title" name="test_title" value="Составьте правильно предложения из имеющегося набора слов">
                @error('test_title') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <input for="right_sentence" type="text" hidden id="right_sentence" name="right_sentence" value="f">
                <label for="sentence_1">Предложение №1</label>
                <input type="text" class="form-control" id="sentence_1" name="sentence_1" value="{{ old('sentence_1') }}">
                @error('sentence_1') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="sentence_2">Предложение №2</label>
                <input type="text" class="form-control" id="sentence_2" name="sentence_2" value="{{ old('sentence_2') }}">
                @error('sentence_2') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="sentence_3">Предложение №3</label>
                <input type="text" class="form-control" id="sentence_3" name="sentence_3" value="{{ old('sentence_3') }}">
                @error('sentence_3') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>            <div class="form-group">
                <label for="sentence_4">Предложение №4</label>
                <input type="text" class="form-control" id="sentence_4" name="sentence_4" value="{{ old('sentence_4') }}">
                @error('sentence_4') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="sentence_5">Предложение №5</label>
                <input type="text" class="form-control" id="sentence_5" name="sentence_5" value="{{ old('sentence_5') }}">
                @error('sentence_5') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="sentence_6">Предложение №6</label>
                <input type="text" class="form-control" id="sentence_6" name="sentence_6" value="{{ old('sentence_6') }}">
                @error('sentence_6') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="sentence_7">Предложение №7</label>
                <input type="text" class="form-control" id="sentence_7" name="sentence_7" value="{{ old('sentence_7') }}">
                @error('sentence_7') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="sentence_8">Предложение №8</label>
                <input type="text" class="form-control" id="sentence_8" name="sentence_8" value="{{ old('sentence_8') }}">
                @error('sentence_8') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="sentence_9">Предложение №9</label>
                <input type="text" class="form-control" id="sentence_9" name="sentence_9" value="{{ old('sentence_9') }}">
                @error('sentence_9') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="sentence_10">Предложение №10</label>
                <input type="text" class="form-control" id="sentence_10" name="sentence_10" value="{{ old('sentence_10') }}">
                @error('sentence_10') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <br>
    <button type="submit" disabled value="Добавить" class="btn btn-success" style="float: right;">Добавить</button>
</form>
<a href="{{route('admin.test',['course'=>$course_id])}}" style="margin-top:15px;" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
