@extends('dashboard.layouts.dashboard')

@section('title', __('User Page'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{__('User Page')}}</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
      <div class="card card-primary card-outline">
        <div class="card-body">
          <a href="#" class="btn btn-primary">{{__('User Page')}}</a>
        </div>
      </div>
  </div>
</div>
@endsection



