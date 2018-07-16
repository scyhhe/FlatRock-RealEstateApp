@extends('layouts.app')

@section('content')
    <div class="container jumbotron text-center d-flex flex-column">
        <i class="far fa-question-circle fa-5x"></i>
        <h3 class="mt-3 lh-100">
            Hmm... there doesn't seem to be anything here. Make sure you typed a correct URI and try again, or just use the navigation to find your way back :)

        </h3>
        {{-- <p class="lead" style="color:red;">
            {{ $exception->getMessage }}
        </p> --}}
    </div>
@endsection