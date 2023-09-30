@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Dashboard') }}</h1>
                </div>
                <div class="col-sm-6">

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
                <div class="col-lg-4 col-6">
                    <div class="small-box card">
                        <div class="inner">
                            <h3>{{ $totalUsers }}</h3>
                            <p>Total Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('users') }}" class="small-box-footer text-dark">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box card">
                        <div class="inner">
                            <h3>{{ $totalAdmins }}</h3>
                            <p>Administrators</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('users') }}" class="small-box-footer text-dark">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box card">
                        <div class="inner">
                            <h3>{{ $totalRegular }}</h3>
                            <p>Regular Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('users') }}" class="small-box-footer text-dark">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
