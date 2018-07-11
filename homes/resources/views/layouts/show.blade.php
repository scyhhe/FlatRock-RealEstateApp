@extends ('layouts.app') 
@section('content')

<div class="row mb-5 d-flex justify-content-around">
    <div class="card col-8">
        <div class="card-header d-flex justify-content-between">
            <h2>
                {{ $home->title }}
            </h2>
            <form method="POST" action="/watchlist/add/{{ $home->id }}">
            {{ csrf_field() }}
            <button type="submit" style="background: transparent;border: none; cursor: pointer;">
                <i class="far fa-star fa-2x"></i>
            </button>
            </form>
        </div>
                
        <div class="owl-carousel card-body justify-content-center text-center d-flex flex-nowrap bg-dark h-auto">
            @foreach ($home->images as $image)
            <a href="#" data-featherlight="#{{ $image->id }}">
                <img src=" {{ $image->path }}" alt="Responsive Image" class="img-responsive" id="{{ $image->id }}">
            </a> @endforeach

        </div>

        <div class="card-body" id="home-info">
            <p class="lead">
                {{-- {{ $home->description }} --}} Fusce eget blandit orci, ac pretium justo. Fusce tincidunt elit a velit ultricies, facilisis
                sodales mi mattis. Vestibulum metus felis, cursus eu consectetur vitae, tristique vel sem. Aenean scelerisque
                pulvinar dolor, in venenatis dolor feugiat ac. Nullam a metus dapibus, pharetra est sodales, dapibus ligula.
                In eleifend lectus lorem, a pulvinar risus pellentesque id. Mauris non urna turpis. Duis dictum lectus sed
                augue porttitor rhoncus. Donec porta malesuada mollis. Fusce ornare consectetur lacus. Cras rhoncus mi dictum
                velit dictum tristique. Ut eleifend urna ipsum, a facilisis est fermentum bibendum. Class aptent taciti sociosqu
                ad litora torquent per conubia nostra, per inceptos himenaeos.
            </p>
            <hr>
            <div class="row mt-5 card-group">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Broker Information</h5>
                            {{--
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                            <li class="list-group-item"> 
                                <i class="fas fa-user"></i>
                                {{ \App\User::find($home->id)->name }}
                            </li>
                            <li class="list-group-item"> 
                                    <i class="fas fa-envelope"></i>
                                {{ \App\User::find($home->id)->email }}
                            </li>
                            <li class="list-group-item"> 
                                <i class="fas fa-phone-square"></i>
                                +359 896 65 66 96
                            </li>
                            <a href="#" class="btn btn-info mt-3">View all ads by this broker</a>
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
                                    <input type="textarea" cols="20" rows="10" class="form-control" id="textarea" required>
                                </div>
                                <a href="#" class="btn btn-primary">Send enquiry</a>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    @include('partials.sidebar') {{--
    <div class="clearfix"></div> --}}

</div>
@endsection