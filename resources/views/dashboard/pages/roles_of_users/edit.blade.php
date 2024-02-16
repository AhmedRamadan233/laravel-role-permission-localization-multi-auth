@extends('dashboard.layouts.dashboard')

@section('title', 'Edit Roles Page')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> Edit Roles Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header text-center">
                    <h2 class="m-0">Edit Role</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('role_user.update', $roleUser->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                    
                        <div class="form-group">
                            <label for="user">Select User:</label>
                            <select name="user" id="user" class="form-control">
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $roleUser->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="role">Select Role:</label>
                            <select name="role" id="role" class="form-control">
                                <option value="">Select Role</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $roleUser->role_id == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                    
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection
