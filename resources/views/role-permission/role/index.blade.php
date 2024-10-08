<?php
use Illuminate\Support\Facades\DB;
$roleCount = DB::table('roles')->count();
$permissionCount = DB::table('permissions')->count();
?>


<x-layouts.master>

    <div class="container mt-5">
        <a href="{{ url('roles') }}" class="btn btn-primary mx-1"><span class="fw-bold">{{$roleCount}}</span> Roles</a>
        <a href="{{ url('permissions') }}" class="btn btn-info mx-1"><span class="fw-bold">{{$permissionCount}}</span> Permissions</a>
        <a href="{{ url('users') }}" class="btn btn-warning mx-1"><span class="fw-bold">{{\App\Models\User::count()}}</span> Users</a>
    </div>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>
                            Roles
                            @can('create role')
                            {{-- <a href="{{ url('roles/create') }}" class="btn btn-primary float-end">Add Role</a> --}}
                            <button type="button" class="btn bg-indigo-800" onclick="openModal('{{url('roles/create')}}', ' Add User')">
                                Add Role <i class="icon-plus3 ml-2"></i>
                            </button>
                            @endcan
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th width="40%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="btn btn-warning">
                                            Add / Edit Role Permission
                                        </a>

                                        @can('update role')
                                        <a 
                                        onclick="openModal('{{url('roles/'.$role->id.'/edit')}}', ' Edit Role')"
                                        class="btn btn-success">
                                            Edit
                                        </a>
                                        @endcan

                                        @can('delete role')
                                        <a href="{{ url('roles/'.$role->id.'/delete') }}" class="btn btn-danger mx-2">
                                            Delete
                                        </a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.master>