@extends('admin.layouts.master')
@section('title')
    Send Mail to users
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Mail
                <small>Send New Mail</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Send New Mail</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Send New Mail</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(Session::get('message'))
                            <div class="alert alert-danger">
                                <p>{{ Session::get('message') }}</p>
                            </div>
                        @endif
                        <form class="form-horizontal" action="{{ route('send-mail-post') }}" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Subject</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="subject" value="{{ old('subject') }}" required class="form-control" id="inputEmail3" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Emails</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="emails" value="{{ old('emails') }}" required class="form-control" id="inputEmail3" placeholder="Enter Emails">
                                        <small>Enter email seperated by comma (,) if you want to send multiple user at a time</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Mail Template</label>

                                    <div class="col-sm-10">
                                        <textarea name="template" required id="editor1" cols="30" rows="20">{!! old('template') !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-send"></i> Send</button>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>

                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('script')
    <script src="{{ asset('admin') }}/bower_components/ckeditor/ckeditor.js"></script>
    <script>
        $(function () {
            CKEDITOR.replace('editor1')
        })
    </script>
    @endpush
