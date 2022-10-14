<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\admin\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Lessongroup;
use App\Models\admin\Major;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    public function index()
    {
        $pagetitle = 'دروس';
        $lessons = DB::table('lessons')
            ->join('lessongroups', 'lessongroups.id', '=', 'lessons.lessongroup_id')
            ->join('majors', 'majors.id', '=', 'lessons.major_id')
            ->join('terms', 'terms.id', '=', 'lessons.term_id')
            ->orderBy('lessons.id', 'desc')
            ->select(
                'lessons.id as lesson_id',
                'lessons.name as lesson_name',
                'lessongroup_code',
                'lessoncode',
                'vahed',
                'vahed_teory',
                'vahed_amali',
                'lessons.description as lesson_description',
                'lessons.state as lesson_state',
                'lessongroups.name as lessongroup_name',
                'majors.name as major_name',
                'terms.name as term_name'
            )->paginate(10);

        return view('admin.lesson.index', compact('pagetitle', 'lessons'));
    }

    public function create()
    {
        $pagetitle = 'ایجاد درس جدید';
        // $terms = Term::all()->where('state', '<>', 0);
        $terms = DB::table('terms')->where('state', '<>', 0)->orderBy('id', 'desc')->get();
        $lessongroups = Lessongroup::all()->where('state', '<>', 0);
        $majors = Major::all()->where('state', '<>', 0);

        return view('admin.lesson.create', compact('pagetitle', 'terms', 'lessongroups', 'majors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lessongroup_id' => 'required|not_in:0',
            'major_id' => 'required|not_in:0',
            'lessongroup_code' => 'required|unique:lessons',
            'lessoncode' => 'required|unique:lessons',
            'vahed' => 'required',
            'vahed_teory' => 'required',
            'vahed_amali' => 'required',
        ]);

        //اگر جمع تعداد واحدها همخوانی نداشته باشد
        if ($request->get('vahed') != $request->get('vahed_teory') + $request->get('vahed_amali')) {
            $msg = 'جمع تعداد واحدهای تئوری و عملی با تعداد واحد درس همخوانی ندارد';

            return redirect(Route('admin.lesson.create'))->with('warning', $msg)->withInput();
        }

        $lesson = new lesson([
            'name' => $request->get('name'),
            'lessongroup_id' => $request->get('lessongroup_id'),
            'major_id' => $request->get('major_id'),
            'lessongroup_code' => $request->get('lessongroup_code'),
            'lessoncode' => $request->get('lessoncode'),
            'vahed' => $request->get('vahed'),
            'vahed_teory' => $request->get('vahed_teory'),
            'vahed_amali' => $request->get('vahed_amali'),
            'term_id' => $request->get('term_id'),
            'description' => $request->get('description'),
            'state' => $request->get('state')
        ]);

        try {
            $lesson->save();

            $msg = 'ذخیره درس جدید با موفقیت انجام شد';

            return redirect(Route('admin.lessons.index'))->with('success', $msg);
        } catch (Exception $exception) {
            return redirect(Route('admin.lessons.index'))->with('warning', $exception->getCode());
        }
    }

    public function show(Lesson $lesson)
    {
        //
    }

    public function edit(Lesson $lesson)
    {
        $pagetitle = 'ویرایش درس جاری';
        // $terms = Term::all()->where('state', '<>', 0);
        $terms = DB::table('terms')->where('state', '<>', 0)->orderBy('id', 'desc')->get();
        $lessongroups = Lessongroup::all()->where('state', '<>', 0);
        $majors = Major::all()->where('state', '<>', 0);

        return view('admin.lesson.edit', compact('pagetitle', 'lesson', 'terms', 'lessongroups', 'majors'));
    }

    public function update(Request $request, lesson $lesson)
    {
        $request->validate([
            'name' => 'required',
            'lessongroup_id' => 'required|not_in:0',
            'major_id' => 'required|not_in:0',
            'lessongroup_code' => 'required',
            'lessoncode' => 'required',
            'vahed' => 'required',
            'vahed_teory' => 'required',
            'vahed_amali' => 'required',
        ]);

        //اگر کد گروه درسی تکراری برای درس انتخاب شود
        $id = DB::table('lessons')->where('lessongroup_code', '=', $request->lessongroup_code)->get();
        if (!$id->isEmpty())
            if ($id[0]->id != $lesson->id) {
                $msg = 'کد گروه درس نمی‌تواند تکراری باشد';

                return redirect(Route('admin.lesson.edit', $lesson->id))->with('warning', $msg);
            }

        //اگر کد درس تکراری برای درس انتخاب شود
        $id = DB::table('lessons')->where('lessoncode', '=', $request->lessoncode)->get();
        if (!$id->isEmpty())
            if ($id[0]->id != $lesson->id) {
                $msg = 'کد درس نمی‌تواند تکراری باشد';

                return redirect(Route('admin.lesson.edit', $lesson->id))->with('warning', $msg);
            }

        //اگر جمع تعداد واحدها همخوانی نداشته باشد
        if ($request->get('vahed') != $request->get('vahed_teory') + $request->get('vahed_amali')) {
            $msg = 'جمع تعداد واحدهای تئوری و عملی با تعداد واحد درس همخوانی ندارد';

            return redirect(Route('admin.lesson.edit', $lesson->id))->with('warning', $msg);
        }

        try {
            $lesson->update($request->all());

            $msg = 'ذخیره درس موجود با موفقیت انجام شد';
            return redirect(Route('admin.lessons.index'))->with('success', $msg);
        } catch (Exception $exception) {
            return redirect(Route('admin.lessons.index'))->with('warning', $exception->getCode());
        }
    }

    public function destroy(Lesson $lesson)
    {
        //
    }

    // extra
    public function getMajors($lessongroup_id = 0)
    {
        $majors['data'] = DB::table('majors')
            ->where('lessongroup_id', '=', $lessongroup_id)
            ->select('id', 'name')
            ->get();

        return response()->json($majors);
    }
}
