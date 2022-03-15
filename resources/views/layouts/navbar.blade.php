<div class="container">
  
  <header class="p-3 ">
        
        <nav class="navbar navbar-light ">

          <a class="navbar-brand">Employee Management System</a>
          <form class="form-inline">

            @auth
              {{auth()->user()->name}}
              <div class="text-end">
                <a href="{{ route('logout.perform') }}" class="btn btn-outline-secondary">Logout</a>
              </div>
            @endauth

            @guest
              <div class="text-end">
                <a href="{{ route('login.perform') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('register.perform') }}" class="btn btn-success">Sign-up</a>
              </div>
            @endguest

          </form>
        </nav>
 
    </header>
</div>