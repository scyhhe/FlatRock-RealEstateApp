@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <!-- DASHBOARD -->
            <div class="d-flex align-items-center p-3 my-3 mb-5">
                <i class="fas fa-asterisk fa-5x"></i>
                <div class="lh-100">
                    <h1 class="ml-3">
                        Dashboard
                    </h1>
                </div>
            </div>
            @if (!count($homes))
                <h2 class="text-center">
                    No homes currently available. Check back soon or, if you are a broker, 
                    <a href="/homes/create">
                        create one!
                    </a>
                </h2>
            @else
            <!-- CAROUSEL -->
            <div class="container-fluid owl-carousel owl-theme mb-5">
                @foreach ($homes as $h)
                <div class="item mh-100 mw-33">
                <a href="/homes/{{ $h->id }}">
                    <img src="{{ asset('storage/photos/home-' . $h->id . '/' . $h->images->random()->path) }}" alt="img" class="img-thumbnail img-responsive">
                </a>
                </div>
                @endforeach
            </div>
            <hr class="mb-5 h-2 bg-dark" />
            <!-- HOME CARDS -->
            @foreach ($homes as $home)
            <div class="card mb-5">
                <div class="card-header d-flex justify-content-between align-items-baseline">
                    <h2 style="max-width: 60%">
                    <a href="/homes/{{ $home->id }}" class="nav-link text-dark">
                        {{ $home->title }}
                    </a>
                    </h2>
                    <h2 style="color: indianred;" class="mt-1">
                        {{ number_format($home->price) }}€ 
                    </h2>
                
                   @include('partials.watchlist')
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 border-right">
                            <img src="{{ asset('storage/photos/home-' . $home->id . '/' . $home->images->first()->path) }}" alt="" class="img-thumbnail rounded float-left">
                        </div>
                        <div class="col-8">
                            <h3 class="text-monospace text-right">
                                Added {{ $home->created_at->diffForHumans() }} by 
                                <a href="/homes/user/{{ $home->user->id }}" class="nav-link text-dark">
                                    <u>{{ $home->user->name }}</u>
                                </a>
                            </h3>
                            <hr/>
                            <p class="text-right mb-3">
                                {{ $home->description }}
                            </p>
                            <ul class="list-inline text-right">
                                    <li class="list-inline-item">
                                        <i class="fas fa-map-marked-alt"></i> 
                                        {{ $home->getLocation()}}
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="fas fa-building"></i> 
                                        {{ $home->size }} m<sup>2</sup>
                                    </li>
                                    <li class="list-inline-item">
                                            <i class="fas fa-euro-sign"></i>
                                            <strong>
                                                {{  $home->getPricePerSquareMeter() }} 
                                            </strong> per square meter
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $homes->links()}}
            @endif
        </div>
    </div>
</div>
@endsection