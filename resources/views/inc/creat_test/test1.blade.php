<form method="post" action="{{ route('admin.test_1.store') }}" enctype="multipart/form-data">
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
                <label for="image">Изображение</label>
                <img width="100" height="auto" src="{{old('img') }}"> &nbsp;
                <input type="file" class="form-control" id="image" name="image" >
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ old('author')}}">
                @error('author') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="word">Слово</label>
                <input type="text" class="form-control" id="word" name="word" value="{{ old('word') }}">
                @error('word') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="description">Описание Слова</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                @error('description') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_1">Вопрос №1</label>
                <textarea class="form-control" name="answer_1" id="answer_1">{!! old('answer_1') !!}</textarea>
                @error('answer_1') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_2">Вопрос №2</label>
                <textarea class="form-control" name="answer_2" id="answer_2">{!! old('answer_2') !!}</textarea>
                @error('answer_2') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_3">Вопрос №3</label>
                <textarea class="form-control" name="answer_3" id="answer_3">{!! old('answer_3') !!}</textarea>
                @error('answer_3') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_4">Вопрос №4</label>
                <textarea class="form-control" name="answer_4" id="answer_4">{!! old('answer_4') !!}</textarea>
                @error('answer_4') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_5">Вопрос №5</label>
                <textarea class="form-control" name="answer_5" id="answer_5">{!! old('answer_5') !!}</textarea>
                @error('answer_5') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
            <label style="margin-right: 15px;">Правильный ответ</label>
                <div class="btn-group" role="group">
                    <input type="radio" class="btn-check" value="answer_1" id="1" name="right_answer" checked>
                    <label class="btn btn-outline-primary" for="1">1</label>
                    <input type="radio" class="btn-check" value="answer_2" id="2" name="right_answer" >
                    <label class="btn btn-outline-primary" for="2">2</label>
                    <input type="radio" class="btn-check" value="answer_3" id="3" name="right_answer" >
                    <label class="btn btn-outline-primary" for="3">3</label>
                    <input type="radio" class="btn-check" value="answer_4" id="4" name="right_answer">
                    <label class="btn btn-outline-primary" for="4">4</label>
                    <input type="radio" class="btn-check" value="answer_5" id="5" name="right_answer">
                    <label class="btn btn-outline-primary" for="5">5</label>
                    @error('right_answer') <strong style="color:red;">{{ $message }}</strong> @enderror
                </div>
            </div>

    <br>
    <button type="submit"  value="Добавить" class="btn btn-success" style="float: right;">Добавить</button>
</form>
<a href="{{route('admin.test',['course'=>$course_id])}}" style="margin-top:15px;" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
