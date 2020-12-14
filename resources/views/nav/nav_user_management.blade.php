<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: linear-gradient(rgba(255,196,45,0.62) 97%, rgba(255,255,255,0) 100%), url(&quot;assets/img/SLBaru.jpeg&quot;) top / auto no-repeat, #ffc42d;">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center mt-3 m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"></div>
            <div class="sidebar-brand-text mx-3"><span style="color: #000000;"><b>ManSUn&nbsp;</b></span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link" href="{{route('periode.index')}}"><i class="fas fa-home"></i><span>Beranda</span></a></li>
            <li class="nav-item"><a class="nav-link" href="jadwwal.html"><i class="far fa-calendar-alt"></i><span>Jadwal</span></a></li>
            <li class="nav-item"><a class="nav-link active" href="{{route('user.index')}}"><i class="fas fa-user"></i><span>User Management</span></a></li>
            <li class="nav-item"><a class="nav-link" href="table.html"><i class="fas fa-table"></i><span>Table</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('login')}}"><i class="far fa-user-circle"></i><span>Login</span></a></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>
