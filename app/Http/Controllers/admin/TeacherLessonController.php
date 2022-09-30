<?php

namespace App\Http\Controllers\admin;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Lesson;
use App\Models\admin\TeacherLesson;
use Illuminate\Support\Facades\DB;

class TeacherLessonController extends Controller
{
    public function index()
    {
        $pagetitle = 'تخصیص دروس';
        $teacherlessons = DB::table('teacherlessons')
            ->join('users', 'users.id', '=', 'teacherlessons.teacher_id')
            ->join('lessons', 'lessons.id', '=', 'teacherlessons.lesson_id')
            ->join('terms', 'terms.id', '=', 'lessons.term_id')
            ->orderBy('terms.id', 'desc')->orderBy('teacherlessons.id', 'desc')
            ->where('teacherlessons.state', '>=', 0)
            ->select(
                'teacherlessons.id as teacherlesson_id',
                'teacherlessons.description as teacherlesson_description',
                'teacherlessons.state as teacherlesson_state',
                'users.name as teacher_name',
                'lessons.name as lesson_name',
                'lessoncode',
                'terms.name as term_name',
            )->paginate(10);

        return view('admin.teacherlesson.index', compact('pagetitle', 'teacherlessons'));
    }

    public function create()
    {
        $pagetitle = 'تخصیص دروس جدید';

        $teachers = DB::table('users')->orderBy('id', 'asc')->get()
            ->where('type', '=', 1)
            ->where('state', '=', 1);

        $lastterm = DB::table('terms')
            ->where('state', '=', 1)
            ->orderBy('id', 'desc')
            ->limit(1)
            ->select('id')
            ->get();
        $lessons = DB::table('lessons')->orderBy('id', 'asc')->get()
            ->where('state', '=', 1)->where('term_id', '=', $lastterm[0]->id);

        return view('admin.teacherlesson.create', compact('pagetitle', 'teachers', 'lessons'));
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'فیلد نام ترم را وارد کنید',
            'name.unique' => 'فیلد نام ترم غیر تکراری وارد کنید',
        ];

        $request->validate([
            'name' => 'required|unique:teacherlessons',
        ], $messages);

        $teacherlesson = new TeacherLesson([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'state' => $request->get('state')
        ]);

        try {
            $teacherlesson->save();

            $msg = 'ذخیره ترم جدید با موفقیت انجام شد';

            return redirect(Route('admin.teacherlessons.index'))->with('success', $msg);
        } catch (Exception $exception) {
            return redirect(Route('admin.teacherlessons.index'))->with('warning', $exception->getCode());
        }
    }

    public function show(TeacherLesson $teacherlesson)
    {
        //
    }

    public function edit(TeacherLesson $teacherlesson)
    {
        $pagetitle = 'ویرایش ترم جاری';

        return view('admin.teacherlesson.edit', compact('pagetitle', 'teacherlesson'));
    }

    public function update(Request $request, TeacherLesson $teacherlesson)
    {
        $messages = [
            'name.required' => 'فیلد نام ترم را وارد کنید',
        ];

        $request->validate([
            'name' => 'required',
        ], $messages);

        //اگر نام تکراری برای ترم انتخاب شود
        $id = DB::table('teacherlessons')->where('name', '=', $request->name)->get();
        if (!$id->isEmpty())
            if ($id[0]->id != $teacherlesson->id) {
                $msg = 'نام ترم نمی‌تواند تکراری باشد';

                return redirect(Route('admin.teacherlesson.edit', $teacherlesson->id))->with('warning', $msg);
            }

        try {
            $teacherlesson->update($request->all());

            //reset in Lesson
            if ($request->state == 0) {
                Lesson::where('teacherlesson_id', '=', $teacherlesson->id)
                    ->update(['teacherlesson_id' => 1]);
            };

            $msg = 'ذخیره ترم موجود با موفقیت انجام شد';
            return redirect(Route('admin.teacherlessons.index'))->with('success', $msg);
        } catch (Exception $exception) {
            return redirect(Route('admin.teacherlessons.index'))->with('warning', $exception->getCode());
        }
    }

    public function destroy(TeacherLesson $teacherlesson)
    {
        //
    }
}
