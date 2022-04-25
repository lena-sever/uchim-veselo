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
                <label for="description">Описание</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $second_test->description }}">
                @error('description') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="questions">Вопросы</label>
                <textarea class="form-control" name="questions" id="questions">{!! $second_test->questions !!}</textarea>
                @error('questions') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <br>
    <button type="submit"  value="Изменить" class="btn btn-success" style="float: right;">Изменить</button>
</form>
<a href="{{ route('admin.test', ['course' => $second_test->course_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
