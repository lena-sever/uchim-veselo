<form method="post" action="{{ route('admin.test_3.update',['test_3'=>$third_test]) }}">
        @csrf
        @method('put')
            <div class="form-group">
                <label for="course_id">Комикс</label>
                @foreach($courses as $course)
                    @if($course->id === $third_test->course_id)
                    <input hidden type="text" class="form-control" id="course_id" name="course_id" value="{{ $third_test->course_id }}">
                    <input disabled type="text" class="form-control" value="{{ $course->title }}">
                    @endif
                @endforeach
                @error('course_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="test_title">Наименование теста</label>
                <input type="text" class="form-control" id="test_title" name="test_title" value="{{ $third_test->test_title }}">
                @error('test_title') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="right_sentence">Предложения</label>
                <input type="text" class="form-control" id="right_sentence" name="right_sentence" value="{{ $third_test->right_sentence }}">
                @error('right_sentence') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <br>
    <button type="submit"  value="Изменить" class="btn btn-success" style="float: right;">Изменить</button>
</form>
<a href="{{ route('admin.test', ['course' => $third_test->course_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
