@extends('dashboard.layouts.dashboard')

@section('title', 'Roles Pages')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Roles Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <form action="{{ route('role_user.index') }}" method="get" class="form-inline">
                            <div class="form-group mx-2">
                                <label for="name" class="sr-only">Search by Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" placeholder="Search by name..." name="name" value="">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                
                            
                
                            <button type="submit" class="btn btn-primary mx-2">Search</button>
                        </form>
                        <div>
                            <div>
                                <a href="{{route('role_user.create')}}" class="btn btn-primary">Add Roles To Users</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <table id="product-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($RolesOfUsers as $roleUser)
                          
                                <tr>
                                    <td>{{ $roleUser->role_id }}</td>
                                    <td>{{ $roleUser->user->name}}</td>
                                    <td>{{ $roleUser->role->name }}</td>
                                    <td>
                                        <a href="{{ route('role_user.edit', ['role_user' => $roleUser->id]) }}" class="btn btn-primary">Edit</a> |
                                        <form action="{{ route('role_user.destroy', ['role_user' => $roleUser->id]) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                        @endforeach
                        
                        

                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-center">
                    <h5 class="m-0">Featured</h5>
                </div>
            </div>
        </div>
    </div>
@endsection