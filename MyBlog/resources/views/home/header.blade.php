<div class="header_main">
    <div class="mobile_menu">
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="logo_mobile"><a href="index.html"><img src="images/logo.png"></a></div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav">
                <li class="nav-item">
                   <a href="{{route('home.homepage')}}">Home</a>
                </li>
             </ul>
          </div>
       </nav>
    </div>
    <div class="container-fluid">
       <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
       <div class="menu_main">
          <ul>
             <li class="active"><a href="{{route('home.homepage')}}">Home</a></li>
             @if (Route::has('login'))
                 @auth
                     <li><a href="{{url('my_post')}}">My Post</a></li>
                     <li><a href="{{url('create_post')}}">Create Post</a></li>
                     <!-- <li><a href="{{url('ProfileUpdateRequest')}}">Profile</a></li> -->
                     <!-- <li><a href="{{route('approved_comments')}}">Approved Comments</a></li> -->
                     <li>
                        <form method="POST" action="{{ route('logout') }}">
                           @csrf
                           <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                           this.closest('form').submit();">
                               {{ __('Logout') }}
                           </a>
                        </form>
                     </li>
                 @else
                     <li><a href="{{route('login')}}">Login</a></li>
                     <li><a href="{{route('register')}}">Register</a></li>
                     
                 @endauth
             @endif
          </ul>
       </div>
    </div>
 </div>
