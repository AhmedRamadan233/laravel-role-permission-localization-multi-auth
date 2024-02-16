@extends('dashboard.layouts.dashboard')

@section('title', __('User Page'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> {{__('User Page')}}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">                        
                    </div>
                </div>
                
                <div class="card-body">
                    <table id="product-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Full Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->profile->first_name . " " . $user->profile->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                       @can('user.destroy')
                                        <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                                        </form> 
                                       @endcan
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-center">
                    <h5 class="m-0">{{__('Featured')}}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection