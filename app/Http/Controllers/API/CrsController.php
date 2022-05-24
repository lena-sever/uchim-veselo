<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use App\Models\Author;
use App\Models\Painter;


class CrsController extends Controller
{

    public function index()
    {
        // $courses = Course::with('author', 'painter')->get();

        $courses = DB::table('courses')
            ->join('authors', 'authors.id', '=', 'courses.author_id')
            ->join('painters', 'painters.id', '=', 'courses.painter_id')
            ->select(
                'courses.*',
                'authors.name as name_author',
                'painters.name as name_painter',
            )
            ->get();

        return json_encode($courses, JSON_UNESCAPED_UNICODE);
    }

    public function store(Request $request)
    {
        $course = Course::create($request->all());
        return response()->json($course, 201);
    }


    public function show(Course $course)
    {
        $lessons = $course->lessons()->get();

        //условие на 3 слайдера в главе
        foreach($lessons as $key => $lesson){
            $sliders = DB::table('sliders')->where('lesson_id',$lesson->id)->count();

            if($sliders < 3){
               unset($lessons[$key]);
            }
        }

        $reviews =  $course->courseReviews()
            ->with('user')
            ->get();
        $course->lessons =  $lessons;
        $course->reviews =  $reviews;
        $author = $course->author()->value('name');
        $painter = $course->painter()->value('name');
        $course->name_author = $author;
        $course->name_painter = $painter;

        $course = json_encode($course, JSON_UNESCAPED_UNICODE);

        return $course;
    }


    public function show_first_slider(Course $course)
    {
        $id = $course->id;
        //получим номер первого урока этого курса
        $les_id = DB::table('lessons')->where('course_id', $id)->orderBy('id')->first();
        $les_id = $les_id->id;

        $first_slider = DB::table('sliders')
            ->where('lesson_id', $les_id)
            ->get();

        return json_encode($first_slider, JSON_UNESCAPED_UNICODE);
    }

    public function show_second_slider(Course $course)
    {
        $id = $course->id;
        //получим номер первого урока этого курса
        $les_id = DB::table('lessons')->where('course_id', $id)->orderBy('id')->find(2);
        $les_id = $les_id->id;

        $first_slider = DB::table('sliders')
            ->where('lesson_id', $les_id)
            ->get();

        return json_encode($first_slider, JSON_UNESCAPED_UNICODE);
    }

    public function show_last_slider(Course $course)
    {
        $id = $course->id;
        //получим номер первого урока этого курса
        $les_id = DB::table('lessons')->where('course_id', $id)->orderBy('id', 'desc')->first();
        $les_id = $les_id->id;

        $first_slider = DB::table('sliders')
            ->where('lesson_id', $les_id)
            ->get();

        return json_encode($first_slider, JSON_UNESCAPED_UNICODE);
    }

    public function first_test(Course $course)
    {
        $id = $course->id;

        $first_test = DB::table('first_tests')
            ->where('course_id', $id)
            ->get();

        return json_encode($first_test, JSON_UNESCAPED_UNICODE);
    }


    public function second_test(Course $course)
    {
        $id = $course->id;

        $result = DB::table('second_tests')
            ->where('course_id', $id)
            ->get();

        $res = [];
        $res['chooseWords'] = [];
        $i = 0;
        foreach ($result[0] as $key => $item) {
            if ($key == 'course_id' || $key == 'img' || $key == 'etymology') $res[$key] = $item;;
            if (preg_match('#part_sentence#', $key)) {
                $res['chooseWords'][$i]['type'] = "text";
                $res['chooseWords'][$i]['content'] = $item;
                $i++;
            }
            if (preg_match('#right_word#', $key)) {
                $res['chooseWords'][$i]['type'] = "button";
                $res['chooseWords'][$i]['correctText'] = $item;
            }
            if (preg_match('#wrong_word#', $key)) {
                $res['chooseWords'][$i]['incorrectText'] = $item;
                $i++;
            }
        }

        $res['sentences'] = [];
        $i = 0;
        $third_tests = DB::table('third_tests')
            ->where('course_id', $id)
            ->select(['right_sentence_1','right_sentence_2','right_sentence_3','words'])
            ->get();

        foreach ($third_tests as $key => $item) {
            $res['sentences'][$i]['right_sentence_1'] = $item->right_sentence_1;
            $res['sentences'][$i]['right_sentence_2'] = $item->right_sentence_2;
            $res['sentences'][$i]['right_sentence_3'] = $item->right_sentence_3;
            $res['sentences'][$i]['words'] = explode("|", $item->words);
            $i++;
        }

        return json_encode($res, JSON_UNESCAPED_UNICODE);
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'search_phrase' => 'required|string|min:3',
        ]);

        $searchTerms = explode(' ', $validated['search_phrase']);
        $searchTerms = array_slice($searchTerms, 0, 5); //будем искать только по 5 первым словам
        $searchTerms[] = $validated['search_phrase'];
        $searchTerms = array_reverse($searchTerms);
        foreach ($searchTerms as $key=>$item) {
            if (mb_strlen($item) < 3)
            unset($searchTerms[$key]);
        }
        $author_ids = [];
        $painter_ids = [];

        // сделать сначала поиск id по таблицам авторов
        $queryAuthor = Author::query();
        if ($searchTerms) {
            foreach ($searchTerms as $search) {
                $queryAuthor->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            }
            $resAuthor = $queryAuthor->select('id')->get();
            foreach ($resAuthor as $author) {
                $author_ids[] = $author->id;
            }
        }

        // поиск id по таблицам художников
        $queryPainter = Painter::query();
        if ($searchTerms) {
            foreach ($searchTerms as $search) {
                $queryPainter->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            }
            $resPainter = $queryPainter->select('id')->get();
            foreach ($resPainter as $painter) {
                $painter_ids[] = $painter->id;
            }
        }


        // поиск id по таблице комиксов
        $query = Course::query();

        if ($searchTerms) {
            $query->whereIn('author_id', $author_ids);
            $query->orWhere(function ($pq) use ($painter_ids) {
                $pq->whereIn('painter_id', $painter_ids);
            });

            foreach ($searchTerms as $search) {
                $query->orWhere(function ($q) use ($search) {
                    $q->where('title', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ;
                });
            }
            $results = $query->get();

            foreach ($results as $key=>$item) {
                $name_author = DB::table('authors')->where('id', $item->author_id)->first();
                $name_author = $name_author->name;
                $results[$key]->name_author = $name_author;
                $name_painter = DB::table('painters')->where('id', $item->painter_id)->first();
                $name_painter = $name_painter->name;
                $results[$key]->name_painter = $name_painter;
            }

            return json_encode($results, JSON_UNESCAPED_UNICODE);
        }
        else return "нет результатов поиска!";
    }

    public function author($id)
    {
        $courses = DB::table('courses')
            ->join('authors', 'authors.id', '=', 'courses.author_id')
            ->join('painters', 'painters.id', '=', 'courses.painter_id')
            ->where ('courses.author_id', $id)
            ->select(
                'courses.*',
                'authors.name as name_author',
                'painters.name as name_painter',
            )
            ->get();

        return json_encode($courses, JSON_UNESCAPED_UNICODE);

    }

    public function painter($id)
    {
        $courses = DB::table('courses')
        ->join('authors', 'authors.id', '=', 'courses.author_id')
        ->join('painters', 'painters.id', '=', 'courses.painter_id')
        ->where ('courses.painter_id', $id)
            ->select(
                'courses.*',
                'authors.name as name_author',
                'painters.name as name_painter',
            )
            // ->toSql();
            ->get();

        return json_encode($courses, JSON_UNESCAPED_UNICODE);

    }

}
