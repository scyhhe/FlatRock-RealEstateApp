@extends('layouts.app') 
@section('content')

<div class="container">
        <div class="d-flex p-3 my-3 rounded box-shadow align-items-center">
            <i class="fas fa-asterisk fa-5x"></i>
            <h1 class="ml-3">
                Our Brokers ({{ count($brokers) }})
            </h1>
        </div>
        <ul class="list-group d-flex flex-column flex-wrap mt-3">
            @foreach ($brokers as $broker)
                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <a href="/homes/user/{{ $broker->id }}" data-toggle="tooltip" data-placement="right" title="Visit broker's profile">
                    {{ $broker->name }}
                </a>
                {{-- <span class="d-inline-block text-truncate" style="max-width: 100px">
                    <i class="fas fa-envelope"></i>
                    {{ $broker->email }}
                </span>
                <span class="text-truncate">
                    <i class="fas fa-phone"></i>
                    {{ $broker->phone ?? '+359 896 65 66 96' }}
                </span> --}}
            <span class="badge badge-primary badge-pill" data-toggle="tooltip" data-placement="right" title="This broker has {{ count($broker->homes) }} listed properties">
                    {{ count($broker->homes) }}
                </span>
                </li>
            @endforeach
        </ul>
</div>
@endsection