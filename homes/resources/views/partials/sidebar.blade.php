<div class="sidebar d-flex flex-column justify-content-between align-content-center bg-light text-center">
    <h4 class="font-weight-italic m-5 border-bottom pb-2">Latest properties</h4>
    @foreach ($homes as $home)
    <div class="card m-1 d-flex flex-column">
            <div class="card-body">
                <img src="{{ $home->images->first()->path }}" alt="home image" class="card-img-top img-responsive mb-1"> 
            
                <a href="/homes/{{ $home->id }}"> 
                    <p class="lead">
                        {{ $home->title }}  
                    </p>
                </a>
                <p class="font-weight-bold">
                    {{ money_format('%.0n', $home->price) }}$
                </p>
            </div>
        </div>
    @endforeach
</div>