@extends ('layouts.app')

@section('content')
    <div class="d-flex p-3 my-3 rounded box-shadow align-items-center">
        <i class="fas fa-asterisk fa-5x"></i>
        <h1 class="ml-3">
            My Watchlist ({{ count($favorites) }})
        </h1>
    </div>
    @if (! count($favorites))
        <h1>
            Your watchlist is empty
        </h1>
    @else
    <ul class="list-group mt-5">
        @foreach ($favorites as $fav)
            <li class="list-group-item">
                <a href="/homes/{{ $fav->id }}">
                    {{ $fav->title }}
                </a>
            </li>
        @endforeach
    </ul>
    @endif
@endsection