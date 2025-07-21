<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar"
            aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        User Management
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="/users">Users</a></li>
                        <li><a class="dropdown-item" href="/roles">Roles</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/lowongan-admin">Lowongan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/majors">Jurusan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/schedules-admin">Jadwal</a>
                </li>
                <li class="nav-item dropdown dropdown-regis">
                    <a class="nav-link dropdown-toggle" href="#" id="regisDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Registration Data
                    </a>
                    <ul class="dropdown-menu dropdown-menu-regis" aria-labelledby="regisDropdown">
                        <li><a class="dropdown-item" href="/registration/data-reg">Regular</a></li>
                        <li><a class="dropdown-item" href="/registration/data-mtu">MTU</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>