@extends('dashboard.layouts.dashboard')

@section('title', __('Roles Page'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> {{__('Roles Page')}}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <form action="{{ route('role.index') }}" method="get" class="form-inline">
                            <div class="form-group mx-2">
                                <label for="name" class="sr-only">{{__('Search by Name')}}</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" placeholder="Search by name..." name="name" value="">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                
                            
                
                            <button type="submit" class="btn btn-primary mx-2">{{__('Search')}}</button>
                        </form>
                        <div>
                            @can('role.create')
                            <a href="{{route('role.create')}}" class="btn btn-primary">{{__('Add New Role')}}</a>
                            @endcan
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <table id="product-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    
                                    <td>
                                        @can('roles.edit')
                                        <a href="{{ route('role.edit', ['role' => $role->id]) }}" class="btn btn-primary">{{__('Edit')}}</a> |
                                        @endcan
                                        @can('roles.delete')
                                        <form action="{{ route('role.destroy', ['role' => $role->id]) }}" method="post" style="display: inline;">
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