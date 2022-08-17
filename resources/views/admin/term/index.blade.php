@extends('admin.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bgcolor" style="font-family: 'B Nazanin'; font-size: 18px;">
            <li class="breadcrumb-item" style="margin-left: 0px;"><a href="{{ route('admin.index') }}">برگشت</a></li>
            <li class="breadcrumb-item active" aria-current="page">&nbsp; ترم‌های موجود</li>
        </ol>
    </nav>

    <div class="container">
        @include('layouts.messages')

        <a href="{{ route('admin.term.create') }}" class="btn btn-info" style="float: right; margin-bottom: 30px">ایجاد
            ترم جدید</a>
        <br>

        <h2 style="text-align: center"> ترم‌های موجود</h2>

        <table class="table table-bordered table-hover" style="text-align: center">
            <thead>
                <tr>
                    <td>شناسه</td>
                    <td>نام</td>
                    <td>توضیحات</td>
                    <td>وضعیت</td>
                    <td>ویرایش</td>
                </tr>
            </thead>

            <body>
                @foreach ($terms as $term)
                    <tr>
                        <td style="width: 10%;"><a href="#">{{ $term->id }}</a></td>
                        <td style="width: 10%;">{{ $term->name }}</td>
                        <td style="width: 50%;">{{ $term->description }}</td>
                        <td style="width: 10%;">
                            @if ($term->state == 0)
                                غیر فعال
                            @elseif ($term->state == 1)
                                فعال
                            @else
                                نا معلوم
                            @endif
                        </td>
                        <td style="width: 20%;"><a href="{{ route('admin.term.edit', $term->id) }}" class="btn btn-warning"
                                style="width: 100%;">ویرایش</a>
                        </td>
                    </tr>
                @endforeach
            </body>
        </table>
    </div>
@endsection
