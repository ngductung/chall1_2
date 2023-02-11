<div class="page-header">
    <div class="search-form">
        {{-- <form action="#" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
                <span class="input-group-btn">
                    <button class="btn btn-default" id="close-search" type="button"><i class="icon-close"></i></button>
                </span>
            </div>
        </form> --}}
    </div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <div class="logo-sm">
                    <a href="javascript:void(0)" id="sidebar-toggle-button"><i class="fa fa-bars"></i></a>
                    <a class="logo-box" href="{{ route('index') }}"><span>Chall 1_2</span></a>
                </div>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <i class="fa fa-angle-down"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="javascript:void(0)" id="collapsed-sidebar-toggle-button"><i class="fa fa-bars"></i></a>
                    </li>
                    <li><a href="javascript:void(0)" id="toggle-fullscreen"><i class="fa fa-expand"></i></a></li>
                    </li>
                    <li>
                        <h4 style="margin-top: 15px;">Hello {{ session()->get('name') }}</h4>
                    </li>
                    {{-- <li>
                        <h4>Hello {{ session()->get('name') }}</h4>
                    </li> --}}
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('logout') }}" class="right-sidebar-toggle"
                            data-sidebar-id="main-right-sidebar">
                            Log out
                        </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>


{{-- if(session()->get('role') === 1) {
    route('teacher.index');
} else {
    route('student.index');
} --}}
