<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin | @yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ URL::to('css/bootstrap.min.css') }}">
  <link href="{{ URL::to('css/font-awesome.min.css')}}" rel="stylesheet" />
 <!--  <script src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
 <script type="text/javascript" src="{{ URL::to('js/jquery.min.js')}}"></script>
   <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js')}}"></script>
  <style>
    .row.content {height: 800px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }

    nav{
      height:100px;
      align-items: center;
      padding-top: 25px;
      padding-bottom: 30px;      
      font-weight: bold;

    }
    nav a{
      font-size: 18px;
      font-weight: 2em;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }

    .modal-body textarea{
        width: 300px;
        height: 120px;
        padding: 5px;
        font-family: Tahoma, sans-serif;
        background-position: bottom right;
        background-repeat: no-repeat;
    }
    textarea{
        width: 300px;
        height: 120px;
        padding: 5px;
        font-family: Tahoma, sans-serif;
        background-position: bottom right;
        background-repeat: no-repeat;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Sacred Goat</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ URL::to('admin/home')}}">Admin Panel</a></li>
        <li><a href="{{ URL::to('admin/categories')}}">Categories</a></li>
        <li><a href="{{ URL::to('admin/newblog')}}">New Blog</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
                            @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   <span class="glyphicon glyphicon-user"></span>  {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ URL::to('user')}}">Dashboard</a></li>
                                <li><a href="#"></a></li>
                                <li role="presentation" class="divider"></li>

                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif



      </ul>
    </div>
  </div>
</nav>


<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4></h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="{{ URL::to('home')}}">Home</a></li>
        <li><a href="{{ URL::to('admin/newblog')}}">New Blog</a></li>
        <li><a href="{{ URL::to('admin/blogs')}}">Blogs</a></li>
        <li><a href="{{ URL::to('admin/gallery')}}">Gallery</a></li>
        <li><a href="{{ URL::to('admin/comments')}}">Comments</a></li>
      </ul><br>
    </div>

    <div class="col-sm-9">

                    @section('body')
                    @show
    </div>


  </div>
</div>

<footer class="container-fluid">
  <p align="center">© 2018 Sacred Goat [Created by: Ngugi Waithima]</p>
</footer>

</body>

<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_temp_blog&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jan 2017 18:07:25 GMT -->
</html>