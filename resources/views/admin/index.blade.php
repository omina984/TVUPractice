@extends('admin.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bgcolor" style="font-family: 'B Nazanin'; font-size: 18px;">
            <li class="breadcrumb-item active" aria-current="page">&nbsp; صفحه مدیریت</li>
            <li class="breadcrumb-item" style="margin-left: 0px;"><a href="{{ url('register') }}">&nbsp;
                    کاربر جدید</a>
            </li>
            <li class="breadcrumb-item" style="margin-left: 0px;"><a href="{{ route('admin.term.index') }}">&nbsp;
                    ترم‌ها</a>
            </li>
        </ol>
    </nav>
@endsection
