@extends('admin.layouts.master')

@section('title')
    Posts
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        🚀 Show Comments
                    </div>

                </div>
                <div class="card-body">

                    @if(session()->has('delete'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{\session()->get('delete')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <a href="{{route('comments.create')}}" class="btn btn-success" role="button" aria-disabled="true">Add
                        Comment</a><br><br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Post</th>
                            <th>Comment</th>
                            <th>Created_at</th>
                            <th>Processes</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$comment->Post->text}}</td>
                                <td>{{$comment->text}}</td>
                                <td>{{$comment->created_at}}</td>
                                <td>
                                    <a href="{{route('comments.edit',$comment->id)}}" class="btn btn-primary btn-sm"
                                       role="button" aria-disabled="true">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete_post{{$comment->id}}">Delete
                                    </button>
                                </td>
                            </tr>
                        @include('admin.comments.destroy')
                        @endforeach
                    </table>
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
