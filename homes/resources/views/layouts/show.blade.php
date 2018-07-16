@extends ('layouts.app') 
@section('content')

<div class="row mb-5 d-flex justify-content-around">
    <div class="card col-8">
        <!-- start of card header -->
        <div class="card-header d-flex justify-content-between pb-1">
            <h2 style="max-width: 60%;">
                {{ $home->title }}
            </h2>
            <h2 style="color: indianred;">
                {{ number_format($home->price) }} €
            </h2>
            <!-- check if home is in watchlist and render accordingly -->
            @include('partials.watchlist')
            <!-- end watchlist check -->
        </div>
        <!-- end card header -->

        <div class="card-body p-0">
            <div class="owl-carousel card-body justify-content-center text-center d-flex flex-nowrap bg-dark">
                @foreach ($home->images as $image)
                <a href="#" data-featherlight="#{{ $image->id }}">
                    <img src="{{ asset('storage/photos/home-' . $image->home_id . '/' . $image->path) }}" alt="Responsive Image" class="img-responsive" id="{{ $image->id }}"/>
                </a> @endforeach
            </div>
        </div>

        <div class="card-body" id="home-info">
            <p class="lead">
                {{ $home->description }} 
            </p>
            <hr>
            <div class="row mt-5 card-group">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Extra Information</h5>
                            <li class="list-group-item">
                                <i class="fas fa-euro-sign"></i>
                                <strong>
                                    {{  $home->getPricePerSquareMeter() }} 
                                </strong> per square meter
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-map-marked-alt"></i> 
                                {{ $home->getLocation() }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-building"></i> {{ $home->size }} m<sup>2</sup>
                            </li>

                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-body">
                            <h5 class="card-title">Broker Information</h5>
                            <li class="list-group-item">
                                <i class="fas fa-user"></i> {{ $home->user->name }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-envelope"></i> {{ $home->user->email }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-phone-square"></i> {{ $home->user->phone ?? '0896 65 66 96'}}
                            </li>
                            <a href="/homes/user/{{ $home->user->id }}" class="btn btn-info mt-3">View all ads by this broker</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Enquire about this property</h5>
                            <form>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" required>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="textarea">Your message</label>
                                    <textarea cols="20" rows="10" class="form-control" id="textarea" required></textarea>
                                </div>
                            <a href="#" class="btn btn-primary">Send enquiry</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    @include('partials.sidebar')
</div>
@endsection