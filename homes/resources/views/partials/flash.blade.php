<div class="container">
    @if ($flash = session('message'))
    <div id="flash" class="alert alert-success mt-2 alert-dismissable fade show" role="alert">
      {{ $flash }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
</div>