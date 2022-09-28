<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\admin\Major;
use App\Models\admin\Lessongroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MajorController extends Controller
{
    public function index()
    {
        $pagetitle = 'رشته‌های تحصیلی';
        $majors = DB::table('majors')
            ->join('lessongroups', 'lessongroups.id', '=', 'majors.lessongroup_id')
            ->orderBy('majors.id', 'desc')
            ->where('majors.state', '>=', 0)
            ->select(
                'majors.id as major_id',
                'lessongroup_id',
                'majors.name as major_name',
                'majors.description as major_description',
                'majors.state as major_state',
                'lessongroups.name as lessongroup_name',
            )->paginate(10);

        return view('admin.major.index', compact('pagetitle', 'majors'));
    }

    public function create()
    {
        $pagetitle = 'ایجاد رشته تحصیلی جدید';
        $lessongroups = Lessongroup::all()->where('state', '<>', 0);

        return view('admin.major.create', compact('pagetitle', 'lessongroups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:majors',
        ]);

        $major = new Major([
            'lessongroup_id' => $request->get('lessongroup_id'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'state' => $request->get('state')
        ]);

        try {
            $major->save();

            $msg = 'ذخیره رشته تحصیلی جدید با موفقیت انجام شد';

            return redirect(Route('admin.majors.index'))->with('success', $msg);
        } catch (Exception $exception) {
            return redirect(Route('admin.majors.index'))->with('warning', $exception->getCode());
        }
    }

    public function show(Major $major)
    {
        //
    }

    public function edit(Major $major)
    {
        $pagetitle = 'ویرایش رشته تحصیلی جاری';
        $lessongroups = Lessongroup::all()->where('state', '<>', 0);

        return view('admin.major.edit', compact('pagetitle', 'major', 'lessongroups'));
    }

    public function update(Request $request, Major $major)
    {
        $request->validate([
            'name' => 'required',
        ]);

        //اگر نام تکراری برای رشته تحصیلی انتخاب شود
        $id = DB::table('majors')->where('name', '=', $request->name)->get();
        if (!$id->isEmpty())
            if ($id[0]->id != $major->id) {
                $msg = 'نام رشته تحصیلی نمی‌تواند تکراری باشد';

                return redirect(Route('admin.major.edit', $major->id))->with('warning', $msg);
            }

        try {
            $major->update($request->all());

            $msg = 'ذخیره رشته تحصیلی موجود با موفقیت انجام شد';
            return redirect(Route('admin.majors.index'))->with('success', $msg);
        } catch (Exception $exception) {
            return redirect(Route('admin.majors.index'))->with('warning', $exception->getCode());
        }
    }

    public function destroy(Major $major)
    {
        //
    }
}
