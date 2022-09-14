<b> {{ Auth::user()->username; }}</b>

<form action="{{ route('logout') }}" method="POST">
    @csrf

    <div class="form-group">
        <button type="submit" class="btn btn-success" style="width: 100px;">خروج</button>
    </div>
</form>
