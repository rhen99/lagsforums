<header>
          <nav class="navbar">
              <div class="container nav-content">
                  <div class="brand">
                      <a href="#" class="menu-bars"><i class="fas fa-bars"></i></a>
                      <a href="/"><img src="{{asset('img/lagsforums.svg')}}" alt="LagsForms"></a>
                    </div>
                    <ul class="navigation">
                        <li><a href="/">Home</a></li>
                        @guest
                           @if (Route::has('register'))
                               <li><a href="{{route('register')}}">Register</a></li>
                           @endif
                            <li><a href="{{route('login')}}">Login</a></li> 
                            @else
                            <li><a href="/create">Create</a></li>
                        <li>
                            <a class="user-dropdown" href="#"><img src="{{asset('storage/profile_pictures/'.Auth::user()->profile_picture)}}" alt=""> <i class="fas fa-caret-down"></i></a>
                            <ul class="user-menu hide" id="user-menu">
                                <li><a href="{{route('home')}}">Dashboard</a></li>
                                <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                            </ul>
                            <form action="{{route('logout')}}" id="logout-form" method="POST" style="display:none;">@csrf</form>
                        </li>                                
                        @endguest
                        
                    </ul>
              </div>
          </nav>
      </header>