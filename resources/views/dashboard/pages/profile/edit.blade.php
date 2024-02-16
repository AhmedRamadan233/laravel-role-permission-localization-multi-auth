@extends('dashboard.layouts.dashboard')

@section('title', __('Edit Profile Page'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"> {{__('Edit Profile Page')}}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header text-center">
                    <h2 class="m-0">{{__('Edit Profile')}}</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                    
                        <div class="form-group">
                            <label for="first_name">{{__('First Name')}}</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name', $user->profile->first_name) }}">
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="last_name">{{__('Last Name')}}</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', $user->profile->last_name) }}">
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="birthday">{{__('Birthday')}}</label>
                            <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ old('birthday', $user->profile->birthday) }}">
                            @error('birthday')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="gender">{{__('Gender')}}</label>
                            <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                <option value="male" {{ old('gender', $user->profile->gender) == 'male' ? 'selected' : '' }}>{{__('Male')}}</option>
                                <option value="female" {{ old('gender', $user->profile->gender) == 'female' ? 'selected' : '' }}>{{__('Female')}}</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="image">{{__('Image')}}</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        @if(isset($profile) && $profile->image)
                            <div class="form-group">
                                <label>{{__('Current Image:')}}</label><br>
                                <img src="{{ asset( $profile->image) }}" alt="Current Image" style="max-width: 200px;">
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection
