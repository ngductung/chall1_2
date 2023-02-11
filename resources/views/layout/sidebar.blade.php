<div class="page-sidebar">
    <a class="logo-box" href="{{ route('index') }}">
        <span>Chall 1_2</span>
        <i class="icon-radio_button_checked" id="fixed-sidebar-toggle-button"></i>
        <i class="icon-close" id="sidebar-toggle-button-close"></i>
    </a>
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
        <div class="page-sidebar-inner" style="overflow: hidden; width: auto; height: 100%;">
            <div class="page-sidebar-menu">
                <ul class="accordion-menu">
                    <li class="active-page" style="margin: 20px 0;">
                        <a href="{{ route('index') }}">
                            <i class="menu-icon fa fa-user-o"></i><span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('message') }}" style="margin: 20px 0;">
                            <i class="menu-icon fa fa-envelope"></i><span>Message</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('assignment') }}" style="margin: 20px 0;">
                            <i class="menu-icon fa fa-book"></i><span>Assignments</span>
                        </a>
                    </li>
                    <li> 
                        <a href="{{ route('challenge') }}" style="margin: 20px 0;">
                            <i class="menu-icon fa fa-flag"></i><span>Challenges</span>
                        </a>
                    </li>
                    <li> 
                        <a href="{{ route('editMyI4') }}" style="margin: 20px 0;">
                            <i class="menu-icon fa fa-user-o"></i><span>My Information</span>
                        </a>
                    </li>
                    <li> 
                        <a href="{{ route('logout') }}" style="margin: 20px 0;">
                            <i class="menu-icon fa fa-bomb"></i><span>Log out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 6px; position: absolute; top: 0px; opacity: 0.2; display: none; border-radius: 0px; z-index: 99; right: 0px; height: 874px;">
        </div>
        <div class="slimScrollRail" style="width: 6px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 0px;">
        </div>
    </div>
</div>