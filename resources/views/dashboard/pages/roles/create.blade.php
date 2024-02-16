@extends('dashboard.layouts.dashboard')

@section('title', 'Create Role Page')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{__('Create Role Page')}}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header text-center">
                    <h2 class="m-0"> {{__('Create New Role')}}</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('role.store') }}" method="post">
                        @csrf
                    
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="abilities">{{__('Abilities')}}</label><br>
                            @foreach (config('abilities') as $ability_code => $ability_description)

                                <div class="row mb-3">
                                    <div class="col">{{ $ability_code }}</div>
                                    <div class="col-auto">
                                        <div class="form-check">
                                            <label class="form-check-label">{{__('allow')}}</label>
                                            <input class="form-check-input" type="radio" name="abilities[{{ $ability_code }}]" value="allow">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-check">
                                            <label class="form-check-label">{{__('deny')}}</label>
                                            <input class="form-check-input" type="radio" name="abilities[{{ $ability_code }}]" value="deny">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-check">
                                            <label class="form-check-label">{{__('inherit')}}</label>
                                            <input class="form-check-input" type="radio" name="abilities[{{ $ability_code }}]" value="inherit">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        
                        
                        <button type="submit" class="btn btn-primary">{{__('Add')}}</button>
                    </form>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>

@endsection
