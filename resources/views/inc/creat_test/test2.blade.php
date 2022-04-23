<form method="post" action="{{ route('admin.test_2.store') }}">
        @csrf
            <div class="form-group">
                <label for="course_id">История</label>
                <select class="form-control" id="course_id" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}"  @if($course->id == $course_id) selected @endif> {{ $course->title }}</option>
                    @endforeach
                </select>
                @error('course_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="test_title">Наименование теста</label>
                <input type="text" class="form-control" id="test_title" name="test_title" value="{{ old('test_title') }}">
                @error('test_title') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                @error('description') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="questions">Вопросы</label>
                <textarea class="form-control" name="questions" id="questions">{!! old('questions') !!}</textarea>
                @error('questions') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <br>
    <button type="submit"  value="Добавить" class="btn btn-success" style="float: right;">Добавить</button>
</form>
<a href="{{route('admin.test',['course'=>$course_id])}}" style="margin-top:15px;" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
