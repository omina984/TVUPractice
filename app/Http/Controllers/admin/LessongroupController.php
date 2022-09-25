<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\admin\lessongroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LessongroupController extends Controller
{
    public function index()
    {
        $pagetitle = 'گروه‌های درسی';
        $lessongroups = Lessongroup::where('state', '>=', 0)->orderBy('id', 'desc')->paginate(10);

        return view('admin.lessongroup.index', compact('pagetitle', 'lessongroups'));
    }

    public function create()
    {
        $pagetitle = 'ایجاد گروه درسی جدید';

        return view('admin.lessongroup.create', compact('pagetitle'));
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'فیلد نام گروه درسی را وارد کنید',
            'name.unique' => 'فیلد نام گروه درسی غیر تکراری وارد کنید',
        ];

        $request->validate([
            'name' => 'required|unique:lessongroups',
        ], $messages);

        $lessongroup = new lessongroup([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'state' => $request->get('state')
        ]);

        try {
            $lessongroup->save();

            $msg = 'ذخیره گروه درسی جدید با موفقیت انجام شد';

            return redirect(Route('admin.lessongroups.index'))->with('success', $msg);
        } catch (Exception $exception) {
            return redirect(Route('admin.lessongroups.index'))->with('warning', $exception->getCode());
        }
    }

    public function show(lessongroup $lessongroup)
    {
        //
    }

    public function edit(lessongroup $lessongroup)
    {
        $pagetitle = 'ویرایش گروه درسی جاری';

        return view('admin.lessongroup.edit', compact('pagetitle', 'lessongroup'));
    }

    public function update(Request $request, lessongroup $lessongroup)
    {
        $messages = [
            'name.required' => 'فیلد نام گروه درسی را وارد کنید',
        ];

        $request->validate([
            'name' => 'required',
        ], $messages);

        //اگر نام تکراری برای گروه درسی انتخاب شود
        $id = DB::table('lessongroups')->where('name', '=', $request->name)->get();
        if (!$id->isEmpty())
            if ($id[0]->id != $lessongroup->id) {
                $msg = 'نام گروه درسی نمی‌تواند تکراری باشد';

                return redirect(Route('admin.lessongroup.edit', $lessongroup->id))->with('warning', $msg);
            }

        try {
            $lessongroup->update($request->all());

            $msg = 'ذخیره گروه درسی موجود با موفقیت انجام شد';
            return redirect(Route('admin.lessongroups.index'))->with('success', $msg);
        } catch (Exception $exception) {
            return redirect(Route('admin.lessongroups.index'))->with('warning', $exception->getCode());
        }
    }

    public function destroy(lessongroup $lessongroup)
    {
        //
    }
}
