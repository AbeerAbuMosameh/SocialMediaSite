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
                        🚀 Show Posts
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

                    <a href="{{route('posts.create')}}" class="btn btn-success" role="button" aria-disabled="true">Add
                        Post</a><br><br>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Created_at</th>
                            <th>Processes</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$post->text}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>
                                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-sm"
                                       role="button" aria-disabled="true">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete_post{{$post->id}}">Delete
                                    </button>
                                </td>
                            </tr>
                        @include('admin.posts.destroy')
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
