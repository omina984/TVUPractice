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
                'users.family as teacher_family',
                'lessons.name as lesson_name',
                'lessoncode',
                'terms.name as term_name',
            )->paginate(10);

        return view('admin.teacherlesson.index', compact('pagetitle', 'teacherlessons'));
    }

    public function create()
    {
        $pagetitle = 'تخصیص دروس جدید';

        $lessongroups = DB::table(('lessongroups'))->where('id', '>', 0)->orderBy('name', 'asc')->get();

        $majors = DB::table(('majors'))->where('id', '>', 1)->orderBy('name', 'asc')->get();

        $teachers = DB::table('users')->orderBy('id', 'asc')
            ->where('type', '=', 1)
            ->where('state', '=', 1)
            ->select(
                'users.id as teacher_id',
                'users.name as teacher_name',
                'users.family as teacher_family',
            )
            ->get();

        return view('admin.teacherlesson.create', compact('pagetitle', 'lessongroups', 'majors', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|not_in:0',
            'lesson_id' => 'required|not_in:0',
        ]);

        $teacherlesson = new TeacherLesson([
            'teacher_id' => $request->get('teacher_id'),
            'lesson_id' => $request->get('lesson_id'),
            'description' => $request->get('description'),
            'state' => $request->get('state')
        ]);

        try {
            //اگر تخصیص درس تکراری انتخاب شود
            $id = DB::table('teacherlessons')
                ->where('teacher_id', '=', $request->teacher_id)
                ->where('lesson_id', '=', $request->lesson_id)
                ->get();
            if (!$id->isEmpty())
                if ($id[0]->id != $teacherlesson->id) {
                    $msg = 'تخصیص درس نمی‌تواند تکراری باشد';

                    return redirect(Route('admin.teacherlesson.create'))->with('warning', $msg);
                }

            $teacherlesson->save();

            $msg = 'تخصیص درس جدید با موفقیت انجام شد';

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
        $pagetitle = 'ویرایش تخصیص درس جاری';

        $lessongroups = DB::table(('lessongroups'))->where('id', '>', 0)->orderBy('name', 'asc')->get();

        $majors = DB::table(('majors'))->where('id', '>', 1)->orderBy('name', 'asc')->get();

        $teachers = DB::table('users')->orderBy('id', 'asc')
            ->where('type', '=', 1)
            ->where('state', '=', 1)
            ->select(
                'users.id as teacher_id',
                'users.name as teacher_name',
                'users.family as teacher_family',
            )
            ->get();

        return view('admin.teacherlesson.edit', compact('pagetitle', 'teacherlesson', 'lessongroups', 'majors', 'teachers'));
    }

    public function update(Request $request, TeacherLesson $teacherlesson)
    {
        $request->validate([
            'teacher_id' => 'required|not_in:0',
            'lesson_id' => 'required|not_in:0',
        ]);

        //اگر تخصیص درس تکراری انتخاب شود
        $id = DB::table('teacherlessons')
            ->where('teacher_id', '=', $request->teacher_id)
            ->where('lesson_id', '=', $request->lesson_id)
            ->get();
        if (!$id->isEmpty())
            if ($id[0]->id != $teacherlesson->id) {
                $msg = 'تخصیص درس نمی‌تواند تکراری باشد';

                return redirect(Route('admin.teacherlesson.edit', $teacherlesson->id))->with('warning', $msg);
            }

        try {
            $teacherlesson->update($request->all());

            $msg = 'ذخیره تخصیص درس موجود با موفقیت انجام شد';
            return redirect(Route('admin.teacherlessons.index'))->with('success', $msg);
        } catch (Exception $exception) {
            return redirect(Route('admin.teacherlessons.index'))->with('warning', $exception->getCode());
        }
    }

    public function destroy(TeacherLesson $teacherlesson)
    {
        //
    }

    // extra
    public function search(Request $request)
    {
        $pagetitle = 'تخصیص دروس';

        $teacherlessons = DB::table('teacherlessons')
            ->join('users', 'users.id', '=', 'teacherlessons.teacher_id')
            ->join('lessons', 'lessons.id', '=', 'teacherlessons.lesson_id')
            ->join('terms', 'terms.id', '=', 'lessons.term_id')
            ->orderBy('terms.id', 'desc')->orderBy('teacherlessons.id', 'desc')
            ->where('teacherlessons.state', '>=', 0)
            ->where('nationalcode', 'like', '%' . $request->nationalcode . '%')
            ->select(
                'teacherlessons.id as teacherlesson_id',
                'teacherlessons.description as teacherlesson_description',
                'teacherlessons.state as teacherlesson_state',
                'users.name as teacher_name',
                'users.family as teacher_family',
                'lessons.name as lesson_name',
                'lessoncode',
                'terms.name as term_name',
            )->paginate(10);

        return view('admin.teacherlesson.index', compact('pagetitle', 'teacherlessons'));
    }

    public function getMajors($lessongroup_id = 0)
    {
        $majors['data'] = DB::table('majors')
            ->where('lessongroup_id', '=', $lessongroup_id)
            ->select('id', 'name')
            ->get();

        return response()->json($majors);
    }

    public function getTeachers_Lessongroup($lessongroup_id_search = 0)
    {
        $teachers['data'] = DB::table('users')
            ->join('majors', 'majors.id', '=', 'users.major_id')
            ->join('lessongroups', 'lessongroups.id', '=', 'majors.lessongroup_id')
            ->orderBy('users.id', 'asc')
            ->where('users.type', '=', 1)
            ->where('users.state', '=', 1)
            // ->where('lessongroups.id', '=', $lessongroup_id_search)
            ->select(
                'users.id as teacher_id',
                'users.name as teacher_name',
                'users.family as teacher_family',
            );
        // ->get();

        if ($lessongroup_id_search == 0) {
            $teachers['data'] = $teachers['data']->where('lessongroups.id', '>=', 1)->get();
        } else {
            $teachers['data'] = $teachers['data']->where('lessongroups.id', '=', $lessongroup_id_search)->get();
        };

        return response()->json($teachers);
    }

    public function getTeachers_Major($major_id_search = 0)
    {
        $teachers['data'] = DB::table('users')
            ->join('majors', 'majors.id', '=', 'users.major_id')
            ->join('lessongroups', 'lessongroups.id', '=', 'majors.lessongroup_id')
            ->orderBy('users.id', 'asc')
            ->where('users.type', '=', 1)
            ->where('users.state', '=', 1)
            // ->where('lessongroups.id', '=', $lessongroup_id_search)
            ->select(
                'users.id as teacher_id',
                'users.name as teacher_name',
                'users.family as teacher_family',
            );
        // ->get();

        if ($major_id_search == 0) {
            $teachers['data'] = $teachers['data']->where('majors.id', '>=', 1)->get();
        } else {
            $teachers['data'] = $teachers['data']->where('majors.id', '=', $major_id_search)->get();
        };

        return response()->json($teachers);
    }

    public function getLessons($teacher_id = 0)
    {
        $major_id = DB::table('users')->where('id', '=', $teacher_id)->get();

        $lastterm = DB::table('terms')
            ->where('state', '=', 1)
            ->orderBy('id', 'desc')
            ->limit(1)
            ->select('id')
            ->get();

        $lessons['data'] = Lesson::orderby("name", "asc")
            ->where('major_id', '=', $major_id[0]->major_id)
            ->where('term_id', '=', $lastterm[0]->id)
            ->where('state', '=', 1)
            ->select('id', 'name')
            ->distinct()
            ->get();

        return response()->json($lessons);
    }
}
