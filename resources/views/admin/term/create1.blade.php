@extends('admin.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bgcolor" style="font-family: 'B Nazanin'; font-size: 18px;">
            <li class="breadcrumb-item" style="margin-left: 0px;"><a href="{{ route('admin.term.index') }}">برگشت</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">&nbsp; ایجاد ترم جدید</li>
        </ol>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-center" style="text-align:right;">
            <form action="{{ route('admin.term.store') }}" method="POST"
                style="width: 300px; border-radius: 20px; background-color: #f2f2f2; padding: 20px;">
                @csrf

                <div class="form-group">
                    <label for="name">عنوان ترم</label>
                    <input class="form-control type="text" name="name">

                    @error('name')
                        <div class="alert alert-danger"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">شرح ترم</label>
                    <textarea class="form-control" name="description"></textarea>

                    @error('description')
                        <div class="alert alert-danger"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="state">وضعیت</label>
                    <select name="state" style="width: 100%;">
                        <option value="1">فعال</option>
                        <option value="0">غیر فعال</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="title"></label>
                    <button type="submit" class="form-control btn btn-success">ایجاد</button>
                </div>
            </form>
        </div>
    </div>
@endsection
