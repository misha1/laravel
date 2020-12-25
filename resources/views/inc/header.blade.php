<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <p class="h5 my-0 mr-md-auto fw-normal">EXAMPLE</p>
    <nav class="my-2 my-md-0 me-md-3">
        @guest
        @if (Route::has('register'))
            <a class="p-2 text-dark" href="{{ route('login') }}">Логин</a>
        @endif
        @if (Route::has('register'))
            <a class="p-2 text-dark" href="{{route('register')}}">Регистрация</a>
        @endif
        @else
        <a class="p-2 text-dark" href="{{ route('auth.signout') }}">Выход ({{\Illuminate\Support\Facades\Auth::user()->name}})</a>
        <a class="p-2 text-dark" href="{{route('vinylrecords')}}">Добавить</a>
        <a class="p-2 text-dark" href="{{route('vinylrecords-data')}}">Пластинки</a>
        @endguest
    </nav>
</header>
