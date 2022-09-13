@extends('admin.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <div class="breadcrumb">
        <div>
            <span style="color: gray">صفحه مدیریت</span>
            &nbsp; / &nbsp;
            <a href="{{ url('register') }}">کاربر جدید</a>
            &nbsp; / &nbsp;
            <a href="{{ route('admin.term.index') }}">ترم‌ها</a>
        </div>
    </div>
@endsection
