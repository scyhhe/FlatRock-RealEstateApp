@extends ('layouts.app') 
@section('content') 
    <div class="d-flex p-3 my-3 rounded box-shadow">
        <i class="fas fa-asterisk fa-5x"></i>
        <div class="lh-100">
            <h1 class="ml-3">
                {{ $user->name}}
            </h1>
            <ul class="list-inline ml-4">
                <li class="list-inline-item">
                        <i class="fas fa-envelope"></i>
                        {{ $user->email }}
                </li>
                <li class="list-inline-item">
                        <i class="fas fa-phone"></i>
                        {{ $user->phone ?? '0896 65 66 96' }}
                </li>
            </ul>
        </div>
    </div>
    @if (! count($user->homes))
        @if ($user->id === auth()->id())
            <h1>
                You do not have any listed properties.
                <a href="/homes/create">
                Add one :)
                </a>
            </h1>
        @else
        <h1>
            This broker does not have any listed properties yet.
        </h1>
        @endif
    @else
<div class="row d-flex justify-content-between">
    
    <div class="accordion col-8">
        @foreach ($homes as $home)

        <div class="card">

            <div class="card-header d-flex justify-content-between" id="heading-{{$home->id}}" data-toggle="collapse" data-target="#{{$home->id}}">
                <h5 class="mb-0">
                    {{-- <button class="btn btn-link text-dark" type="button"> --}}
                    <a href="/homes/{{ $home->id }}" class="text-dark mt-1">
                        {{ $home->title }}
                    </a>
                    {{-- </button> --}}
                </h5>
                <h3 class="mb-0" style="color: indianred;">
                    {{ number_format($home->price) }} €
                </h3>
                @include('partials.modify')
                @include('partials.watchlist')

            </div>

            <div id="{{$home->id}}" class="collapse mb-1" aria-labelledby="heading-{{$home->id}}" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 border-right d-flex justify-content-center">
                            <img src="{{  asset('storage/photos/home-' . $home->id . '/' . $home->images->first()->path) }}" alt="" class="img-thumbnail rounded ">
                        </div>
                        <div class="col-7">
                            {{$home->description}}
                        </div>
                    </div>

                </div>
            </div>

        </div>

        @endforeach
    </div>

    {{-- <div class="col">
    @include('partials.sidebar')
    </div> --}}

</div>
    @endif
<script>
    $("a[href^='/homes']").click((e) => {
        e.stopPropagation();
    });
</script>
@endsection