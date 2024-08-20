<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="/admincss/img/avatar-6.jpg" alt="..." class="/img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5">Thanaal</h1>
            <p>Web Designer</p>
        </div>
    </div>
    <!-- Sidebar Navigation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="{{route('home.homepage')}}"> <i class="icon-home"></i>Home </a></li>

        <li><a href="{{url('post_page')}}"> <i class="icon-grid"></i>Add Post </a></li>

        <li><a href="{{url('/show_post')}}"> <i class="fa fa-bar-chart"></i>Show Post </a></li>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <li><a href="{{route('approved_comments')}}"> <i class="fas fa-pencil-alt"></i>Reviews</a></li>

        <li><a href="{{route('users')}}"> <i class="fas fa-users"></i>Users </a></li>

    </ul>
</nav>
