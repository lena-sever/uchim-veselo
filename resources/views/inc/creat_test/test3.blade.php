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
                <input for="right_sentence_1" type="text" hidden id="right_sentence_1" name="right_sentence_1" value="f">
                <label for="sentence_1">Предложение №1</label>
                <input type="text" class="form-control" id="sentence_1" name="sentence_1" value="{{ old('sentence_1') }}">
                @error('sentence_1') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>

            <div class="form-group">
                <label >Доп. варианты правильного Приложения №1:</label><br>
                1.<input type="text" for="var_1" class="form-control w-50" id="var_1" name="var_1" value="{{ old('var_1') }}">
                @error('var_1') <strong style="color:red;">{{ $message }}</strong> @enderror
                2. <input type="text" for="var_2" class="form-control w-50" id="var_2" name="var_2" value="{{ old('var_2') }}">
                @error('var_2') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <hr>

            <div class="form-group">
                <label for="sentence_2">Предложение №2</label>
                <input type="text" class="form-control" id="sentence_2" name="sentence_2" value="{{ old('sentence_2') }}">
                @error('sentence_2') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label >Доп. варианты правильного Приложения №2:</label><br>
                1.<input type="text" for="var_3" class="form-control w-50" id="var_3" name="var_3" value="{{ old('var_3') }}">
                @error('var_') <strong style="color:red;">{{ $message }}</strong> @enderror
                2. <input type="text" for="var_4" class="form-control w-50" id="var_4" name="var_4" value="{{ old('var_4') }}">
                @error('var_') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="sentence_3">Предложение №3</label>
                <input type="text" class="form-control" id="sentence_3" name="sentence_3" value="{{ old('sentence_3') }}">
                @error('sentence_3') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label >Доп. варианты правильного Приложения №3:</label><br>
                1.<input type="text" for="var_5" class="form-control w-50" id="var_5" name="var_5" value="{{ old('var_5') }}">
                @error('var_5') <strong style="color:red;">{{ $message }}</strong> @enderror
                2. <input type="text" for="var_6" class="form-control w-50" id="var_6" name="var_6" value="{{ old('var_6') }}">
                @error('var_6') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="sentence_4">Предложение №4</label>
                <input type="text" class="form-control" id="sentence_4" name="sentence_4" value="{{ old('sentence_4') }}">
                @error('sentence_4') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label >Доп. варианты правильного Приложения №4:</label><br>
                1.<input type="text" for="var_7" class="form-control w-50" id="var_7" name="var_7" value="{{ old('var_7') }}">
                @error('var_7') <strong style="color:red;">{{ $message }}</strong> @enderror
                2. <input type="text" for="var_8" class="form-control w-50" id="var_8" name="var_8" value="{{ old('var_8') }}">
                @error('var_8') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="sentence_5">Предложение №5</label>
                <input type="text" class="form-control" id="sentence_5" name="sentence_5" value="{{ old('sentence_5') }}">
                @error('sentence_5') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label >Доп. варианты правильного Приложения №5:</label><br>
                1.<input type="text" for="var_9" class="form-control w-50" id="var_9" name="var_9" value="{{ old('var_9') }}">
                @error('var_9') <strong style="color:red;">{{ $message }}</strong> @enderror
                2. <input type="text" for="var_10" class="form-control w-50" id="var_10" name="var_10" value="{{ old('var_10') }}">
                @error('var_10') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="sentence_6">Предложение №6</label>
                <input type="text" class="form-control" id="sentence_6" name="sentence_6" value="{{ old('sentence_6') }}">
                @error('sentence_6') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label >Доп. варианты правильного Приложения №6:</label><br>
                1.<input type="text" for="var_11" class="form-control w-50" id="var_11" name="var_11" value="{{ old('var_11') }}">
                @error('var_11') <strong style="color:red;">{{ $message }}</strong> @enderror
                2. <input type="text" for="var_12" class="form-control w-50" id="var_12" name="var_12" value="{{ old('var_12') }}">
                @error('var_12') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="sentence_7">Предложение №7</label>
                <input type="text" class="form-control" id="sentence_7" name="sentence_7" value="{{ old('sentence_7') }}">
                @error('sentence_7') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label >Доп. варианты правильного Приложения №7:</label><br>
                1.<input type="text" for="var_13" class="form-control w-50" id="var_13" name="var_13" value="{{ old('var_13') }}">
                @error('var_13') <strong style="color:red;">{{ $message }}</strong> @enderror
                2. <input type="text" for="var_14" class="form-control w-50" id="var_14" name="var_14" value="{{ old('var_14') }}">
                @error('var_14') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="sentence_8">Предложение №8</label>
                <input type="text" class="form-control" id="sentence_8" name="sentence_8" value="{{ old('sentence_8') }}">
                @error('sentence_8') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label >Доп. варианты правильного Приложения №8:</label><br>
                1.<input type="text" for="var_15" class="form-control w-50" id="var_15" name="var_15" value="{{ old('var_15') }}">
                @error('var_15') <strong style="color:red;">{{ $message }}</strong> @enderror
                2. <input type="text" for="var_16" class="form-control w-50" id="var_16" name="var_16" value="{{ old('var_16') }}">
                @error('var_16') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="sentence_9">Предложение №9</label>
                <input type="text" class="form-control" id="sentence_9" name="sentence_9" value="{{ old('sentence_9') }}">
                @error('sentence_9') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label >Доп. варианты правильного Приложения №9:</label><br>
                1.<input type="text" for="var_17" class="form-control w-50" id="var_17" name="var_17" value="{{ old('var_17') }}">
                @error('var_17') <strong style="color:red;">{{ $message }}</strong> @enderror
                2. <input type="text" for="var_18" class="form-control w-50" id="var_18" name="var_18" value="{{ old('var_18') }}">
                @error('var_18') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <hr>
            <div class="form-group">
                <label for="sentence_10">Предложение №10</label>
                <input type="text" class="form-control" id="sentence_10" name="sentence_10" value="{{ old('sentence_10') }}">
                @error('sentence_10') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label >Доп. варианты правильного Приложения №10:</label><br>
                1.<input type="text" for="var_19" class="form-control w-50" id="var_19" name="var_19" value="{{ old('var_19') }}">
                @error('var_19') <strong style="color:red;">{{ $message }}</strong> @enderror
                2. <input type="text" for="var_20" class="form-control w-50" id="var_20" name="var_20" value="{{ old('var_20') }}">
                @error('var_20') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>

            <br>
    <button type="submit"  value="Добавить" class="btn btn-success" style="float: right;">Добавить</button>
</form>
<a href="{{route('admin.test',['course'=>$course_id])}}" style="margin-top:15px;" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
