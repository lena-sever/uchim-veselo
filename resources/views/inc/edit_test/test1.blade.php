<form method="post" action="{{ route('admin.test_1.update',['test_1' => $first_test]) }}"enctype="multipart/form-data" >
        @csrf
        @method('put')
            <div class="form-group">
                <label for="course_id">Комикс</label>
                @foreach($courses as $course)
                    @if($course->id === $first_test->course_id)
                    <input hidden type="text" class="form-control" id="course_id" name="course_id" value="{{ $first_test->course_id }}">
                    <input disabled type="text" class="form-control" value="{{ $course->title }}">
                    @endif
                @endforeach
                @error('course_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>

            <div class="form-group">
                <label for="word">Слово</label>
                <input type="text" class="form-control" id="word" name="word" value="{{ $first_test->word}}">
                @error('word') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="description">Описание Слова</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $first_test->description}}">
                @error('description') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $first_test->author}}">
                @error('author') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <img width="100" height="auto" src="{{ $first_test->img }}"> &nbsp;
                <button name="_method" value="delete" class="delete btn btn-sm btn-outline-danger">X</button>
                <input type="file" class="form-control" id="image" name="image" >
            </div>
            <div class="form-group">
                <label for="answer_1">Вопрос №1</label>
                <textarea class="form-control" name="answer_1" id="answer_1">{!! $first_test->answer_1 !!}</textarea>
                @error('answer_1') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_2">Вопрос №2</label>
                <textarea class="form-control" name="answer_2" id="answer_2">{!! $first_test->answer_2 !!}</textarea>
                @error('answer_2') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_3">Вопрос №3</label>
                <textarea class="form-control" name="answer_3" id="answer_3">{!! $first_test->answer_3 !!}</textarea>
                @error('answer_3') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_4">Вопрос №4</label>
                <textarea class="form-control" name="answer_4" id="answer_4">{!! $first_test->answer_4 !!}</textarea>
                @error('answer_4') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_5">Вопрос №5</label>
                <textarea class="form-control" name="answer_5" id="answer_5">{!! $first_test->answer_5 !!}</textarea>
                @error('answer_5') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
            <label style="margin-right: 15px;">Правильный ответ</label>
                <div class="btn-group" role="group">
                    <input type="radio" class="btn-check" value="answer_1" id="1" name="right_answer" @if($first_test->right_answer === 'answer_1') checked @endif>
                    <label class="btn btn-outline-primary" for="1">1</label>
                    <input type="radio" class="btn-check" value="answer_2" id="2" name="right_answer" @if($first_test->right_answer === 'answer_2') checked @endif>
                    <label class="btn btn-outline-primary" for="2">2</label>
                    <input type="radio" class="btn-check" value="answer_3" id="3" name="right_answer" @if($first_test->right_answer === 'answer_3') checked @endif>
                    <label class="btn btn-outline-primary" for="3">3</label>
                    <input type="radio" class="btn-check" value="answer_4" id="4" name="right_answer" @if($first_test->right_answer === 'answer_4') checked @endif>
                    <label class="btn btn-outline-primary" for="4">4</label>
                    <input type="radio" class="btn-check" value="answer_5" id="5" name="right_answer" @if($first_test->right_answer === 'answer_5') checked @endif>
                    <label class="btn btn-outline-primary" for="5">5</label>
                    @error('right_answer') <strong style="color:red;">{{ $message }}</strong> @enderror
                </div>
            </div>

    <br>
    <button type="submit"  value="Изменить" class="btn btn-success" style="float: right;">Изменить</button>
</form>
<a href="{{ route('admin.test', ['course' => $first_test->course_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>

