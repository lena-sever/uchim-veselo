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
                <input type="text" class="form-control" id="test_title" name="test_title" value="Нажимайте на слова так, чтобы получилось предложение">
                @error('test_title') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="sentence">Предложение</label>
                <input type="text" class="form-control" id="sentence" name="sentence" value="{{ old('sentence') }}">
                @error('sentence') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="right_answer">Правильные слова</label>
                Напшите через запятую
                <input type="text"class="form-control" name="right_answer" id="right_answer" value="{{old('right_answer')}}">
                @error('right_answer') <strong style="color:red;">{{ $message }}</strong> @enderror

            </div>
            <div class="form-group">
                <label for="wrong_answer">Не правильные слова</label>
                Напшите через запятую
                <input type="text"class="form-control" name="wrong_answer" id="wrong_answer" value="{{old('wrong_answer')}}">
                @error('wrong_answer') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <br>
    <button type="submit"  value="Добавить" class="btn btn-success" style="float: right;">Добавить</button>
</form>
<a href="{{route('admin.test',['course'=>$course_id])}}" style="margin-top:15px;" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
