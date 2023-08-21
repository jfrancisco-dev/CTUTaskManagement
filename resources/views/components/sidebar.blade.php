<div class="container border" style="background-color: #d9d9d9;">
    <div class="user-info text-center py-4">
        <div class="rounded-circle profile-image mx-auto mb-2"
             style="background-color: #007bff; width: 50px; height: 50px; display: flex; justify-content: center; align-items: center; font-size: 24px; color: #ffffff; border-radius: 50%;">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        <span style="font-weight: bold;">{{ Auth::user()->name }}</span>
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

    <div class="sidebar nav flex-column mt-2">
        <ul class="list-unstyled">
            <li class="nav-item border-0">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>

            <li class="nav-item border-0">
                <a class="nav-link" data-bs-toggle="collapse" href="#tasklistsDrawer">
                    <i class="fa fa-list"></i> Tasklists
                </a>
                <div class="collapse" id="tasklistsDrawer">
                    <ul class="sub-nav list-unstyled" style="background-color: #ffffff; padding-left: 20px;">
                        <li class="sub-nav-item"><a href="{{ route('tasklist.index') }}" style="text-decoration: none;">All Tasklists</a></li>
                        <li class="sub-nav-item"><a href="{{ route('tasklist.create') }}" style="text-decoration: none;">Create Tasklist</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item border-0">
                <a class="nav-link" data-bs-toggle="collapse" href="#tasksDrawer">
                    <i class="fa fa-tasks"></i> Tasks
                </a>
                <div class="collapse" id="tasksDrawer">
                    <ul class="sub-nav list-unstyled" style="background-color: #ffffff; padding-left: 20px;">
                        <li class="sub-nav-item"><a href="{{ route('task.index') }}" style="text-decoration: none;">All Tasks</a></li>
                        <li class="sub-nav-item"><a href="{{ route('task.create') }}" style="text-decoration: none;">Create Task</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item border-0">
                <a class="nav-link" data-bs-toggle="collapse" href="#usersDrawer">
                    <i class="fa fa-users"></i> Users
                </a>
                <div class="collapse" id="usersDrawer">
                    <ul class="sub-nav list-unstyled" style="background-color: #ffffff; padding-left: 20px;">
                        <li class="sub-nav-item"><a href="{{ route('user.index') }}" style="text-decoration: none;">All Users</a></li>
                        <li class="sub-nav-item"><a href="{{ route('user.create') }}" style="text-decoration: none;">Create User</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item border-0">
                <a class="nav-link" data-bs-toggle="collapse" href="#languageDrawer">
                    <i class="fa fa-globe"></i> Language
                </a>
                <div class="collapse" id="languageDrawer">
                    <ul class="sub-nav list-unstyled" style="background-color: #ffffff; padding-left: 20px;">
                        <li class="sub-nav-item"><a href="#" style="text-decoration: none;">English</a></li>
                        <li class="sub-nav-item"><a href="#" style="text-decoration: none;">Japanese</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item border-0">
                <a class="nav-link" data-bs-toggle="collapse" href="#profileDrawer">
                    <i class="fa fa-user"></i> Profile
                </a>
                <div class="collapse" id="profileDrawer">
                    <ul class="sub-nav list-unstyled" style="background-color: #ffffff; padding-left: 20px;">
                        <li class="sub-nav-item"><a href="{{route('profile.show')}}" style="text-decoration: none;">View Profile</a></li>
                        <li class="sub-nav-item"><a href="{{route('profile.edit')}}" style="text-decoration: none;">Update Profile</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item border-0 mb-4">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out-alt"></i> {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>