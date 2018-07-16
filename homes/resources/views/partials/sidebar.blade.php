<div class="sidebar d-flex flex-column-reverse justify-content-between align-content-center bg-light text-center">
    
    @foreach ($homes as $home)
    <div class="card m-1 d-flex flex-column">
            <div class="card-body">
                <img src="{{ asset('storage/photos/home-' . $home->id . '/' . $home->images->random()->path) }}" alt="home image" class="card-img-top img-responsive mb-1"> 
            
                <a href="/homes/{{ $home->id }}"> 
                    <p class="lead text-dark">
                        {{ $home->title }}  
                    </p>
                </a>
                <p class="font-weight-bold">
                    {{ number_format($home->price) }}€
                </p>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <i class="fas fa-map-marked-alt"></i> 
                        {{ $home->getLocation()}}
                    </li>
                    <li class="list-inline-item">
                        <i class="fas fa-building"></i> 
                        {{ $home->size }} m<sup>2</sup>
                    </li>
                </ul>
            </div>
        </div>
    @endforeach
    <h4 class="font-weight-italic m-5 border-bottom pb-2">Latest properties</h4>
</div>