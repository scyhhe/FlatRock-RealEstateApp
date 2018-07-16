@if (Auth::check())
    @if (auth()->user()->hasRole('broker') && auth()->id() === $home->user_id)
        <div class=" d-flex border-left">
            <form method="GET" class="ml-2" action="/homes/{{ $home->id }}/edit">
    
                {{ csrf_field() }}
                <button type="submit" data-toggle="tooltip" data-placement="top" title="Edit" style="background: transparent;border: none; cursor: pointer;">
                    <i class="fas fa-pen fa-2x"></i>
                </button>
    
            </form>
            <form method="POST" id="delete-property" class="ml-2" action="/homes/ {{ $home->id }}">
    
                {{ method_field('DELETE') }} 
                {{ csrf_field() }}
                <button type="submit" data-toggle="tooltip" data-placement="top" title="Delete" style="background: transparent;border: none; cursor: pointer;">
                        <i class="fas fa-times fa-2x"></i>
                </button>
    
            </form>
        </div>       
    @endif
@endif


