<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\admin\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TermController extends Controller
{
    public function index()
    {
        $pagetitle = 'ترم‌ها';
        $terms = DB::table('terms')->orderBy('id', 'desc')->get()->where('state', '=', 1);

        return view('admin.term.index', compact('pagetitle', 'terms'));
    }

    public function create()
    {
        $pagetitle = 'ایجاد ترم جدید';

        return view('admin.term.create', compact('pagetitle'));
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'فیلد نام ترم را وارد کنید',
            'name.unique' => 'فیلد نام ترم غیر تکراری وارد کنید',
        ];

        $request->validate([
            'name' => 'required|unique:terms',
        ], $messages);

        $term = new Term([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'state' => $request->get('state')
        ]);

        try {
            $term->save();

            $msg = 'ذخیره ترم جدید با موفقیت انجام شد';

            return redirect(Route('admin.term.index'))->with('success', $msg);
        } catch (Exception $exception) {
            return redirect(Route('admin.term.index'))->with('warning', $exception->getCode());
        }
    }

    public function show(Term $term)
    {
        //
    }

    public function edit(Term $term)
    {
        $pagetitle = 'ویرایش ترم جاری';

        return view('admin.term.edit', compact('pagetitle', 'term'));
    }

    public function update(Request $request, Term $term)
    {
        $messages = [
            'name.required' => 'فیلد نام ترم را وارد کنید',
        ];

        $request->validate([
            'name' => 'required',
        ], $messages);

        //اگر نام تکراری برای ترم انتخاب شود
        $id = DB::table('terms')->where('name', '=', $request->name)->get();
        if (!$id->isEmpty())
            if ($id[0]->id != $term->id) {
                $msg = 'نام ترم نمی‌تواند تکراری باشد';

                return redirect(Route('admin.term.edit', $term->id))->with('warning', $msg);
            }

        try {
            $term->update($request->all());

            $msg = 'ذخیره ترم موجود با موفقیت انجام شد';
            return redirect(Route('admin.term.index'))->with('success', $msg);
        } catch (Exception $exception) {
            return redirect(Route('admin.term.index'))->with('warning', $exception->getCode());
        }
    }

    public function destroy(Term $term)
    {
        //
    }
}
