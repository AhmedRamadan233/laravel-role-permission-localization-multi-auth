@extends('dashboard.layouts.dashboard')

@section('title', __('Create Role To User Page'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> {{__('Create Role To User Page')}}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header text-center">
                    <h2 class="m-0"> {{__('Create Role To User Page')}}</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('role_user.store') }}" method="post">
                        @csrf
                    
                        <div class="form-group">
                            <label for="user">{{__('Select User:')}}</label>
                            <select name="user" id="user" class="form-control">
                                <option value="">{{__('Select User')}}</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="role">{{__('Select Role:')}}</label>
                            <select name="role" id="role" class="form-control">
                                <option value="">{{__('Select Role:')}}</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary">{{__('Add')}}</button>
                    </form>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>

@endsection
