@if (Auth::check())
    @if (auth()->user()->hasRole('broker') && auth()->id() === $home->user_id)
        <div class=" d-flex border-left">
            <form method="GET" class="ml-2" action="/homes/{{ $home->id }}/edit">
    
                {{ csrf_field() }}
                <button type="submit" data-toggle="tooltip" data-placement="top" title="Edit" style="background: transparent;border: none; cursor: pointer;">
                    <i class="fas fa-pen fa-2x" style="color: #fff"></i>
                </button>
    
            </form>
            <delete-property :home={{ $home->id }}></delete-property>
        </div>       
    @endif
@endif


