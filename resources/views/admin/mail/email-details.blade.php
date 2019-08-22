@extends('admin.layouts.master')
@section('title')
    Send Mail Details
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Mail
                <small>Show Mail</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Mail</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box table-responsive no-padding">
                        <div class="box-body">
                            <table class="table table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th>Key</th>
                                    <th>Value</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Id</td>
                                    <td>{{ $email->id }}</td>
                                </tr>
                                <tr>
                                    <td>Subject</td>
                                    <td>{{ $email->subject }}</td>
                                </tr>
                                <tr>
                                    <td>Emails</td>
                                    <td>
                                        <ul class="list-item-group">
                                            @foreach($email->emails as $em)
                                            <li class="list-item">{{ $em->email }}</li>
                                                @endforeach

                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Templates</td>
                                    <td>
                                        {!! $email->template !!}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">
                            <a href="{{ route('all-mail') }}" class="btn btn-warning"> <i class="fa fa-backward"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

