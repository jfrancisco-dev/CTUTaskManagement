@extends('layouts.app')

@section('sidebar')
<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-expanded="true" aria-controls="sidebarMenu">
                {{ ('Menu') }}
            </button>
        </div>

        <div class="collapse show" id="sidebarMenu">
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><a href="">Dashboard</a></li>
                    <li class="list-group-item"><a href="">Tasklists</a></li>
                    <li class="list-group-item"><a href="">Tasks</a></li>
                    <li class="list-group-item"><a href="{{route('user.index')}}">Users</a></li>
                    <li class="list-group-item"><a href="">Language</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection