@extends ('layouts.app') 
@section('content')
<div class="container">
    @include ('partials.errors')
    <form method="POST" action="/homes" enctype="multipart/form-data">

        {{ csrf_field() }}
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="name">Broker:</label>
                <input type="text" name="user" class="form-control" id="name" value="{{ \Auth::user()->name }}" disabled>
            </div>


        </div>

        <div class="form-control d-flex flex-row p-5">
            <div class="col-md mb-3">
                <label for="city">City</label>
                <input type="text" name="city" class="form-control" id="city" placeholder="City" required>
            </div>
            <div class="col-md mb-3">
                <label for="country">Country / State</label>
                <input type="text" name="country" class="form-control" id="country" placeholder="Country or state" required>
            </div>
            {{-- <label for="size">Size</label> --}}
            <div class="col-md mb-3 input-group">
                <input type="text" name="size" class="form-control" id="size" placeholder="Size in square meters" required>
                <div class="input-group-append">
                    <span class="input-group-text">m<sup>2</sup></span>
                </div>
            </div>
        </div>
        <div class="form-control p-5 d-flex flex-column">

            <li class="list-group-item disabled w-25 align-self-center text-center p-3" id="display-price"></li>
            <label for="price">Price</label>
            <input type="range" name="price" class="custom-range" onchange="updatePrice(this.value);" min="20000" max="250000" step="500"
                id="price" required>

            <div class="custom-file mt-5">
                <input type="file" name="photos[]" accept="image/*" onchange="updateList(this.files);"class="custom-file-input form-control" id="file" required multiple>
                <label class="custom-file-label" for="file">Choose file...</label>
            </div>
            <ul class="list-inline mt-3" id="file-list">

            </ul>
            <div class="form-control mt-5">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control mb-2" required>
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea>
            </div>
        </div>
        <button class="btn btn-outline-dark mt-3" type="submit">Publish property</button>
    </form>
</div>

<script>
    //update price field with range input's value
    function updatePrice(value) {
        document.getElementById('display-price').innerHTML = value + '€';
    }
    //displays selected files for upload
    function updateList(files) {
        let output = document.getElementById('file-list');

        [...files].forEach((el) => {
            output.innerHTML += `<li class="list-inline-item border-info p-2">${el.name}</li>`;
            // console.log(el);
        });
    }
    // remove autocomplete for each input ... 2lazy for html
    (function () {
        let inputs = document.getElementsByTagName('input');

        [...inputs].forEach((el) => {      
            if (el.name == "_token") {
                return null; //skips laravel's hidden csrf input
            }
            el.setAttribute('autocomplete', 'off');
        })
    })();
</script>
@endsection