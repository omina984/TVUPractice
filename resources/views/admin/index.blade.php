@extends('admin.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <div class="breadcrumb">
        <div>
            <span style="color: gray">صفحه مدیریت</span>
            &nbsp; / &nbsp;
            <a href="{{ route('admin.users.index') }}">کاربران</a>
            &nbsp; / &nbsp;
            <a href="{{ route('admin.terms.index') }}">ترم‌ها</a>
            &nbsp; / &nbsp;
            <a href="{{ route('admin.lessongroups.index') }}">گروه‌های درسی</a>
            &nbsp; / &nbsp;
            <a href="{{ route('admin.lessons.index') }}">دروس</a>
            &nbsp; / &nbsp;
            <a href="{{ route('admin.majors.index') }}">رشته‌های تحصیلی</a>
        </div>
    </div>
@endsection
