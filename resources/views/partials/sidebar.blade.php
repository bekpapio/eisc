<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark mt-3" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- Dashboard -->
                <a class="nav-link {{ request()->is('students*') ? 'active' : '' }}" href="/students">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Students
                </a>
                <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="/users">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    User
                </a>
            </div>
        </div>
    </nav>
</div>
