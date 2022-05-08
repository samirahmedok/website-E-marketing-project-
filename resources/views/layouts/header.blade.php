<header class="header bg-white">
    <div class="container px-0 px-lg-3">
      <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="boutique"><span class="font-weight-bold text-uppercase text-dark">Boutique</span></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <!-- Link--><a class="nav-link active" href="boutique">Home</a>
            </li>
            <li class="nav-item">
              <!-- Link--><a class="nav-link" href="{{route('shop')}}">Shop</a>
            </li>
            @can('switch')
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #630eff">Switch</a>
              <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="admin">Admin Control Panel</a></div>
            </li>
            @endcan
          </ul>
          <ul class="navbar-nav ml-auto">               
            <li class="nav-item"><a class="nav-link" href="{{route('add.show')}}"> <i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart &nbsp;<small class="text-gray">({{session()->has('cart') ? session()->get('cart')->totalqty : '0'}})</small></a></li>
            {{-- <li class="nav-item"><a class="nav-link" href="#"> <i class="far fa-heart mr-1"></i><small class="text-gray"> (0)</small></a></li> --}}
            <li class="dropdown" style="margin-top:5px;margin-left:100px">
              <a style="text-decoration: none;color:black;text-transform:capitalize" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> 
                  @if (Auth::check())
                    {{auth::user()->name}}
                  @else
                    User Account
                    @endif
               <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  
                  <li role="separator" class="divider"></li>
                  @if(Auth::check())
          <li class="nav-item">
              
                              <a class="nav-link" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                      
                            </li>
          @else
          <li class="nav-item"><a class="nav-link" href="register">Register</a></li>
          <li class="nav-item"><a class="nav-link" href="login">Login</a></li>
          @endif
              </ul>
          </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>