<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse border" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link toggle-sidebar">
                    <i class="fa fa-bars"></i>
                    <span class="text">Menu</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item border">
            <a class="nav-link" href="{{route('home')}}"><i class="fa fa-home"></i> Home</a>
        </li>
        <li class="nav-item border">
            <a class="nav-link" href="{{route('tasklist.index')}}"><i class="fa fa-list"></i> Tasklists</a>
        </li>
        <li class="nav-item border">
            <a class="nav-link" href="{{route('task.index')}}"><i class="fa fa-tasks"></i> Tasks</a>
        </li>
        <li class="nav-item border">
            <a class="nav-link" href="{{route('user.index')}}"><i class="fa fa-users"></i> Users</a>
        </li>
    </ul>
</div>