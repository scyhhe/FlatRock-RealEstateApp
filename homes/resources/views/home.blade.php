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
            <div class="d-flex align-items-center p-3 my-3 bg-purple rounded box-shadow">
                <i class="fas fa-asterisk fa-5x"></i>
                <div class="lh-100">
                    <h1 class="ml-3">
                        Dashboard
                    </h1>
                </div>
            </div>
            <!-- CAROUSEL -->
            <div class="container-fluid owl-carousel owl-theme mb-5">
                @foreach ($homes as $h)
                <div class="item mh-100 mw-33">
                <a href="/homes/{{ $h->id }}">
                    <img src="{{ $h->images->first()->path }}" alt="img" class="img-thumbnail img-responsive">
                </a>
                </div>
                @endforeach
            </div>
            <hr class="mb-5 h-2 bg-dark" />
            <!-- HOME CARDS -->
            @foreach ($homes as $home)
            <div class="card mb-5">
                <div class="card-header d-flex justify-content-between">
                    <h2>
                    <a href="/homes/{{ $home->id }}" class="nav-link text-dark">
                        {{ $home->title }}
                    </a>
                    </h2>
                    <form method="POST" action="/watchlist/add/{{ $home->id }}">
                        {{ csrf_field() }}
                        <button type="submit" style="background: transparent;border: none; cursor: pointer;">
                            <i class="far fa-star fa-2x"></i>
                        </button>
                        </form>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ $home->images->first()->path }}" alt="" class="img-thumbnail rounded float-left">
                        </div>
                        <div class="col-8">
                            <h3 class="text-monospace text-right">
                                {{ $home->price }}$ | {{ $home->created_at->diffForHumans() }} by 
                                <a href="#" class="nav-link text-dark">
                                    <u>{{ \App\User::find($home->id)->name }}</u>
                                </a>
                            </h3>
                            <hr/>
                            <p class="text-right">
                                {{ $home->description }}

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection