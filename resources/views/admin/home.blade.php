@extends('admin.layouts.master')
@section('title')
    Dashboard
    @endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            @if(Session::get('message'))
                <div class="alert alert-success">
                    <p>{{ Session::get('message') }}</p>
                </div>
        @endif
{{--            <div class="col-lg-3 col-xs-6">--}}
{{--                <!-- small box -->--}}
{{--                <div class="small-box bg-aqua">--}}
{{--                    <div class="inner">--}}
{{--                        <h3>{{ $total_user }}</h3>--}}

{{--                        <p>Users</p>--}}
{{--                    </div>--}}
{{--                    <div class="icon">--}}
{{--                        <i class="ion ion-bag"></i>--}}
{{--                    </div>--}}
{{--                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $total_mail }}</h3>

                        <p>Total Mail Send</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
    @endsection
