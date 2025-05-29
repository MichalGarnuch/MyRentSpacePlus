<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">MyRentSpace+</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ route('apartments.index') }}">Mieszkania</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('buildings.index') }}">Budynek</a></li>
            {{-- pozostałe zasoby analogicznie --}}
        </ul>
    </div>
</nav>
