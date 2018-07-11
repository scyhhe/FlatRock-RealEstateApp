@if (count($errors))
        <div class="alert alert-danger alert-dismissible fade show">
            @foreach ($errors->all() as $error)
             {{ $error }}
             <br/>
             @endforeach
        </div>
@endif