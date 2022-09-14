@if ($errors->any() && session('warning'))
    <div class="alert alert-danger" style="text-align: right">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success" style="text-align: center">
        {{ session('success') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-danger" style="text-align: center">
        {{ session('warning') }}
    </div>
@endif

@if (session('login'))
    <div class="alert alert-danger" style="text-align: center">
        {{ session('login') }}
    </div>
@endif