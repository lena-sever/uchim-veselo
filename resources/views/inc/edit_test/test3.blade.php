<form method="post" action="{{ route('admin.test_3.update',['test_3'=>$third_test]) }}">
        @csrf
        @method('put')
            <div class="form-group">
            <input type="text" hidden for="test_title" class="form-control" id="test_title" name="test_title" value="Составьте правильно предложения из имеющегося набора слов">
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
                <label for="right_sentence">Предложения</label>
                <input type="text" class="form-control" id="right_sentence" name="right_sentence" value="{{ $third_test->right_sentence }}">
                @error('right_sentence') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="variant_1">Доп. варианты приложения:</label><br>
                1.<input type="text"  class="form-control w-50" id="variant_1" name="variant_1" value="{{  $third_test->variant_1 }}">
                @error('variant_1') <strong style="color:red;">{{ $message }}</strong> @enderror
                <label hidden for="variant_2"></label>
                2. <input type="text" for="variant_2" class="form-control w-50" id="variant_2" name="variant_2" value="{{  $third_test->variant_2 }}">
                @error('variant_2') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <br>
    <button type="submit" value="Изменить" class="btn btn-success" style="float: right;">Изменить</button>
</form>
<a href="{{ route('admin.test', ['course' => $third_test->course_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
