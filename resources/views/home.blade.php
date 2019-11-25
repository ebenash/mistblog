@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="float-right"> 
                            <a href="{{route('postcreate')}}" class="btn btn-secondary"><span class="fa fa-plus"></span> Add New Post</a>
                    </div>

                    <div class="my-3 p-3 bg-white rounded shadow-sm">
                            <h6 class="border-bottom border-gray pb-2 mb-0">Recent posts</h6>
                            @foreach ($posts as $post)
                            <div class="media text-muted pt-3">
                              <img class="bd-placeholder-img mr-2 rounded" src="/storage/uploads/{{$post->image_url}}" width="32" height="32"/>
                              <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <strong class="d-block text-gray-dark">{{$post->title}}</strong>
                                {{explode("\n", wordwrap($post->description,50))[0]}}
                              </p>
                              <div class="btn-group">
                                    <a href="{{route('postshow',$post->id)}}" class="btn btn-sm btn-outline-secondary">View</a>
                                    <a href="{{route('postedit',$post->id)}}" class="btn btn-sm btn-outline-success">Edit</a>
                                    <a href="{{route('postdelete',$post->id)}}" class="btn btn-sm btn-outline-danger">Delete</a>
                                </div>
                            </div>
                            @endforeach
                          </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
