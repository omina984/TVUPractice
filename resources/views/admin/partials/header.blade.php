{{-- <div class="container"> --}}
<div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf

        {{-- <div class="form-group">
            <button type="submit" class="btn btn-success"
                style="width: 150px; font-family: B Nazanin; font-size: 20px;">خروج</button>
        </div> --}}

        <style>
            .btn-text-left {
                text-align: left;
                padding-top: 15px;
                padding-bottom: 15px;
                margin-left: 10px;
            }

            .btn-text-right {
                text-align: right;
            }
        </style>
        
        <div class="btn-text-left">
            <button type="submit" class="btn btn-success"
                style="width: 100px; font-family: B Nazanin; font-size: 18px;">خروج</button>
        </div>
    </form>
</div>
