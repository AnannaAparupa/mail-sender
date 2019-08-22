@extends('admin.layouts.master')
@section('title')
    All Send Mails
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Mail
                <small>All Send Mail List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Mail</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            @if(Session::get('message'))
                                <div class="alert alert-success">
                                    <p>{{ Session::get('message') }}</p>
                                </div>
                            @endif
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($emails as $email)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $email->subject }}</td>
                                    <td>{{ date('d-M- y', strtotime($email->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('show-email', ['id'=>$email->id]) }}" class="btn btn-info">Show</a>
                                        <a href="#" data-toggle="modal" data-target="#modal-warning-{{$email->id}}"
                                           class="btn btn-danger">Delete</a>

                                        <div class="modal modal-warning fade" id="modal-warning-{{$email->id}}" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">Delete Confirmation</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this mail details?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-outline" onclick="event.preventDefault();
                                                            document.getElementById('delete-user-form-{{$email->id}}').submit();">Delete</button>
                                                        <form id="delete-user-form-{{$email->id}}" action="{{ route('delete-mail', ['id'=>$email->id]) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    </td>
                                </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            {{ $emails->links() }}
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

