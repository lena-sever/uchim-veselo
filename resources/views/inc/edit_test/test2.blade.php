<form method="post" action="{{ route('admin.test_2.update',['test_2' => $second_test]) }}">
        @csrf
        @method('put')
            <div class="form-group">
                <label for="course_id">История</label>
                @foreach($courses as $course)
                    @if($course->id === $second_test->course_id)
                    <input hidden type="text" class="form-control" id="course_id" name="course_id" value="{{ $second_test->course_id }}">
                    <input disabled type="text" class="form-control" value="{{ $course->title }}">
                    @endif
                @endforeach
                @error('course_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="test_title">Наименование теста</label>
                <input type="text" class="form-control" id="test_title" name="test_title" value="{{ $second_test->test_title }}">
                @error('test_title') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="sentence">Предложение</label>
                <input type="text" class="form-control" id="sentence" name="sentence" value="{{ $second_test->sentence }}">
                @error('sentence') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="right_answer">Правильные слова</label>
                <input type="text"class="form-control" name="right_answer" id="right_answer" value="@foreach($second_test->right_answer as $key => $word){{ $word }},@endforeach">
                @error('right_answer') <strong style="color:red;">{{ $message }}</strong> @enderror

            </div>
            <div class="form-group">
                <label for="wrong_answer">Не правильные слова</label>
                <input type="text"class="form-control" name="wrong_answer" id="wrong_answer" value="@foreach($second_test->wrong_answer as  $key => $word){!! $word !!},@endforeach">
                @error('wrong_answer') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <br>
    <button type="submit"  value="Изменить" class="btn btn-success" style="float: right;">Изменить</button>
</form>
<a href="{{ route('admin.test', ['course' => $second_test->course_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
