<!--  nav  -->
<nav id="mainNav" class="navbar navbar-inverse navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/cutemoew/LOGO.png') }}" alt="logo"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" data-hover="dropdown" data-animations="fadeIn fadeInLeft fadeInUp fadeInRight">
            <ul class="nav navbar-nav">
                <li> <a href="{{ url('/') }}" class="dropdown-toggle"><span>Home</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ url('/') }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <span>Category</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach ($categoriesTree as $item)
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{ url('category/view/'.$item->uri) }}">{{$item ->name}}</a>
                                <?php $sub= $item->loadForNav();
                                    $subchild = $sub['subs'];
                                ?>
                                @if(count($sub['subs'])>0 || count($sub['products']) > 0)
                                <ul class="dropdown-menu">
                                    @foreach($subchild as $subnav)
                                        <li><a class="dropdown-item" href="{{ url('category/view/'.$subnav['uri'] )}}">{{$subnav['name']}}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li> <a href="{{ url('/about') }}" class="dropdown-toggle"><span>About</span></a> </li>
                <li> <a href="{{ url('page/blog') }}"><span>Blog</span></a> </li>
                <li> <a href="{{ url('/contact-us') }}"><span>Contact</span></a> </li>
            </ul>
            <!-- /.navbar-collapse -->
            <ul class="nav navbar-nav navbar-right">
                @if(!session('user_data.id'))
                    <li> <a href="{{ url('frontend/customers/login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i><span> Login</span></a></li>
                    <li> <a href="{{ url('frontend/customers/register') }}"><i class="fa fa-user" aria-hidden="true"></i></i><span> Register</span></a></li>
                @else
                    <li> <a href="{{ url('frontend/my_orders/'.session('user_data.uuid')) }}"><i class="fa fa-wpforms" aria-hidden="true"></i><span> My Orders</span></a></li>
                    <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out" aria-hidden="true"></i></i>
                            <span> Logout</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </a>
                    </li>
                @endif
               <li> <a href="{{ url('/view_cart') }}"> <img src="{{asset('images/top-icon3.png')}}" alt="top-ico3"> <span> View Cart</span> </a></li>

            </ul>

        </div>
    </div>
</nav>
<!--  /nav  -->