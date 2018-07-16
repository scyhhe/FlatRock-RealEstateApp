@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.errors')
    <div class="d-flex p-3 my-3 align-items-center">
        <i class="fas fa-asterisk fa-5x"></i>
        <h1 class="ml-2">Update information for property 
            <a href="/homes/{{ $home->id }}">
                #{{ $home->id }}
            </a>
        </h1>
    </div>
    
    <div class="container row bg-light pt-3">
    
        {{-- OLD VALUES --}}
        <div class="col-6">
            <h3>Current</h3>
            <hr/>
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control m-1" value="{{ $home->title}}" disabled>
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control m-1" value="{{ $home->price }}" disabled>
            <label for="size">Size in sq. m</label>
            <input type="text" name="size" class="form-control m-1" value="{{ $home->size }}" disabled>
            <label for="description">Description</label>
            <textarea cols="20" rows="10" name="description" class="form-control m-1" disabled> {{$home->description}}</textarea>
        </div>
        {{-- NEW VALUES --}}
        <div class="col-6">
            <h3>New</h3>
            <hr/>
            <form method="POST" id="update" class="form-control" action="/homes/{{ $home->id }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                {{-- @method('PATCH') --}}
                {{-- @csrf --}}
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" required>
                <div class="d-flex justify-content-center mt-2 mb-2">
                       <li class="list-group-item disabled w-25 text-center p-2" id="display-price"></li>
                </div>
                <label for="price">Price</label>
                <input type="range" name="price" class="custom-range" onchange="updatePrice(this.value);" min="20000" max="250000" step="500"
                    id="price" required>
                <label for="size" class="pt-1">Size in sq. m</label>
                <input type="text" name="size" class="form-control mb-1" required>
                <label for="description" class="pt-1">Description</label>
                <textarea cols="20" rows="10" name="description" class="form-control" required></textarea>
            </form>
        </div>
        <button type="submit" form="update" class="btn btn-block btn-outline-success m-3">
            Submit changes
        </button>
    </div>
</div>

<script>
    //update price field with range input's value
    function updatePrice(value) {
        document.getElementById('display-price').innerHTML = value + '€';
    }
</script>
@endsection