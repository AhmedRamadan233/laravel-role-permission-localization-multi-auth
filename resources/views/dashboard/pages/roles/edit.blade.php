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
                    <form action="{{ route('role.update', $role->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                    
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="abilities">Abilities</label><br>
                            @foreach (config('abilities') as $ability_code => $ability_description)
                                @if (is_array($ability_description))
                                    @foreach ($ability_description as $key => $value)
                                        <div class="row mb-3">
                                            <div class="col">{{ $value }}</div>
                                            <div class="col-auto">
                                                <div class="form-check">
                                                    <label class="form-check-label">allow</label>
                                                    <input class="form-check-input" type="radio" name="abilities[{{ $key }}]" value="allow" {{ ($role_abilities[$key] ?? null) == 'allow' ? 'checked' : '' }}>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="form-check">
                                                    <label class="form-check-label">deny</label>
                                                    <input class="form-check-input" type="radio" name="abilities[{{ $key }}]" value="deny" {{ ($role_abilities[$key] ?? null) == 'deny' ? 'checked' : '' }}>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="form-check">
                                                    <label class="form-check-label">inherit</label>
                                                    <input class="form-check-input" type="radio" name="abilities[{{ $key }}]" value="inherit" {{ ($role_abilities[$key] ?? null) == 'inherit' ? 'checked' : '' }}>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection
