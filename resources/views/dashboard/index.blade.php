@extends('dashboard.layouts.dashboard')

@section('title', '')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{__('Starter Page')}}</li>
@endsection

@section('content')
<div class="row">
    
    {{__('Home')}}
        
  </div>
  <!-- /.row -->
@endsection



