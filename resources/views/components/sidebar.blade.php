<div class="container border" style="background-color: #d9d9d9;">
    <div class="user-info text-center py-4">
        <div class="rounded-circle profile-image mx-auto mb-2"
             style="background-color: #007bff; width: 50px; height: 50px; display: flex; justify-content: center; align-items: center; font-size: 24px; color: #ffffff; border-radius: 50%;">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        {{ Auth::user()->name }}
    </div>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light mt-2">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse border" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-bars"></i>
                        <span class="text">Menu</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="sidebar nav flex-column">
        <li class="nav-item border">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fa fa-home"></i> Home
            </a>
        </li>

        <li class="nav-item border">
            <div class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#tasklistsDrawer">
                <i class="fa fa-list"></i> Tasklists
            </div>
            <ul id="tasklistsDrawer" class="sub-nav collapse">
                <li class="sub-nav-item"><a href="{{ route('tasklist.index') }}">All Tasklists</a></li>
                <li class="sub-nav-item"><a href="{{ route('tasklist.create') }}">Create Tasklist</a></li>
            </ul>
        </li>

        <li class="nav-item border">
            <div class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#tasksDrawer">
                <i class="fa fa-tasks"></i> Tasks
            </div>
            <ul id="tasksDrawer" class="sub-nav collapse">
                <li class="sub-nav-item"><a href="{{ route('task.index') }}">All Tasks</a></li>
                <li class="sub-nav-item"><a href="{{ route('task.create') }}">Create Task</a></li>
            </ul>
        </li>

        <li class="nav-item border">
            <div class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#usersDrawer">
                <i class="fa fa-users"></i> Users
            </div>
            <ul id="usersDrawer" class="sub-nav collapse">
                <li class="sub-nav-item"><a href="{{ route('user.index') }}">All Users</a></li>
                <li class="sub-nav-item"><a href="{{ route('user.create') }}">Create User</a></li>
            </ul>
        </li>

        <ul class="nav border">
            <li class="nav-item ">
                <div class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#languageDrawer">
                    <i class="fa fa-globe"></i> Language
                </div>
                <ul id="languageDrawer" class="sub-nav collapse">
                    <li class="sub-nav-item"><a href="#">English</a></li>
                    <li class="sub-nav-item"><a href="#">Japanese</a></li>
                </ul>
            </li>
        </ul>

        <li class="nav-item border">
            <div class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#profileDrawer">
                <i class="fa fa-user"></i> Profile
            </div>
            <ul id="profileDrawer" class="sub-nav collapse">
                <li class="sub-nav-item"><a href="#">View Profile</a></li>
                <li class="sub-nav-item"><a href="#">Edit Profile</a></li>
            </ul>
        </li>

        <li class="nav-item border mb-4">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out-alt"></i> {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </div>
</div>