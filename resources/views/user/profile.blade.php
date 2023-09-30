@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ __('My Profile') }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        @include('message')
        <div class="row">
            <div class="col-12 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0">
                    Profile
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead"><b>{{ $user->name }}</b> 
                        <p class="text-muted text-sm"></p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-envelope"></i></span> {{ $user->email }}</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-user-tag"></i></span> {{ $user->role }}</li>
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                  </div>
                </div>
              </div>
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection
