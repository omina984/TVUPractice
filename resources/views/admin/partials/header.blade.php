<div class="container">
    <br>

    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <div class="form-group">
            <button type="submit" class="btn btn-success" style="width: 200px; font-family: B Nazanin; font-size: 20px;">خروج</button>
        </div>
    </form>
</div>
