@if (Auth::check())
    @if (auth()->user()->hasRole('user')) 
                @if (auth()->user()->checkWatchlist($home->id))
                    <form method="POST" action="/watchlist/remove/{{ $home->id }}">

                        {{ method_field('DELETE') }} 
                        {{ csrf_field() }}
                        <button type="submit" data-toggle="tooltip" data-placement="top" title="Remove from Watchlist" style="background: transparent;border: none; cursor: pointer;">
                            <i class="fas fa-star fa-2x"></i>
                        </button>

                    </form>
                @else
                    <form method="POST" action="/watchlist/add/{{ $home->id }}">

                        {{ csrf_field() }}
                        <button type="submit" data-toggle="tooltip" data-placement="top" title="Add to Watchlist" style="background: transparent;border: none; cursor: pointer;">
                            <i class="far fa-star fa-2x"></i>
                        </button>
                    
                    </form>
                @endif 
            @endif
        @endif