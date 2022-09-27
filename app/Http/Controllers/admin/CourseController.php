<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\admin\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Lessongroup;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $pagetitle = 'درس‌ها';
        $courses = DB::table('courses')->join('lessongroups', 'lessongroups.id', '=', 'courses.lessongroups_id')->orderBy('courses.id', 'desc')
            ->select(
                'courses.id as course_id',
                'courses.name as course_name',
                'lessongroup_code',
                'lessoncode',
                'vahed',
                'vahed_teory',
                'vahed_amali',
                'courses.state as course_state',
                'lessongroups.name as lessongroup_name'
            )->paginate(10);

        return view('admin.course.index', compact('pagetitle', 'courses'));
    }

    public function create()
    {
        $pagetitle = 'ایجاد درس جدید';
        $lessongroups = Lessongroup::all()->where('state', '<>', 0);

        return view('admin.course.create', compact('pagetitle', 'lessongroups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lessongroup_code' => 'required|unique:courses',
            'lessoncode' => 'required|unique:courses',
            'vahed' => 'required',
            'vahed_teory' => 'required',
            'vahed_amali' => 'required',
        ]);

        $course = new Course([
            'name' => $request->get('name'),
            'lessongroups_id' => $request->get('lessongroups_id'),
            'lessongroup_code' => $request->get('lessongroup_code'),
            'lessoncode' => $request->get('lessoncode'),
            'vahed' => $request->get('vahed'),
            'vahed_teory' => $request->get('vahed_teory'),
            'vahed_amali' => $request->get('vahed_amali'),
            'state' => $request->get('state')
        ]);

        try {
            $course->save();

            $msg = 'ذخیره درس جدید با موفقیت انجام شد';

            return redirect(Route('admin.courses.index'))->with('success', $msg);
        } catch (Exception $exception) {
            return redirect(Route('admin.courses.index'))->with('warning', $exception->getCode());
        }
    }

    public function show(course $course)
    {
        //
    }

    public function edit(course $course)
    {
        $pagetitle = 'ویرایش درس جاری';

        return view('admin.course.edit', compact('pagetitle', 'course'));
    }

    public function update(Request $request, course $course)
    {
        $request->validate([
            'name' => 'required',
            'lessongroup_code' => 'required|unique:courses',
            'lessoncode' => 'required|unique:courses',
            'vahed' => 'required',
            'vahed_teory' => 'required',
            'vahed_amali' => 'required',
        ]);

        //اگر نام تکراری برای درس انتخاب شود
        $id = DB::table('courses')->where('name', '=', $request->name)->get();
        if (!$id->isEmpty())
            if ($id[0]->id != $course->id) {
                $msg = 'نام درس نمی‌تواند تکراری باشد';

                return redirect(Route('admin.course.edit', $course->id))->with('warning', $msg);
            }

        try {
            $course->update($request->all());

            $msg = 'ذخیره درس موجود با موفقیت انجام شد';
            return redirect(Route('admin.courses.index'))->with('success', $msg);
        } catch (Exception $exception) {
            return redirect(Route('admin.courses.index'))->with('warning', $exception->getCode());
        }
    }

    public function destroy(Course $course)
    {
        //
    }
}
