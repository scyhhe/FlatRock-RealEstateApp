@extends ('layouts.app') 
@section('content')
<div class="container">
<h1 class="h3 mb-3 font-weight-normal">Register as a new user</h1>
<div class="card">
  <div class="card-body">

    <form class="form-signin" id="form-register-broker" method="POST" action="/register">
      
    @include ('partials.errors') 
    {{ csrf_field() }}
      
      <label for="name" class="sr-only">Name</label>
      <input name="name" type="text" id="name" class="form-control mt-2" placeholder="Name" autofocus autocomplete="off">
      <label for="email" class="sr-only">Email address</label>
      <input name="email" type="email" id="email" class="form-control mt-2" placeholder="Email address" autocomplete="off">
      <label for="password" class="sr-only">Password</label>
      <input name="password" type="password" id="password" class="form-control mt-2" placeholder="Password" autocomplete="off">
      <label for="password_confirmation" class="sr-only">Password Confirmation</label>
      <input name="password_confirmation" type="password" id="password_confirmation" class="form-control mt-2" placeholder="Password"
        autocomplete="off">

      <input name="user_type" type="hidden" id="hidden" class="form-control mt-2" value="user">

      <button class="btn btn-lg btn-outline-dark btn-block mt-5" type="submit">Register</button>
    </form>
  </div>
</div>
</div>
@endsection