@extends('layouts.app')

@section('content')
<div class="content">
    <div class="col-md-8 order-md-1">
    @if(isset($create))
    <h4 class="mb-3">Add new post...</h4>
    <form class="needs-validation" action="{{route('poststore')}}" method="POST" enctype="multipart/form-data">
    @else
    <h4 class="mb-3">Update post...</h4>
    <form class="needs-validation" action="{{route('postupdate')}}" method="POST">
    @endif
        @csrf
            <div class="mb-3">
            <label for="title">Title</label>
            @if(isset($create))
            <input type="text" class="form-control" name="title" required="">
            @else
            <input type="text" class="form-control" name="title" required="" value="{{$post->title}}">
            @endif
            </div>

            <div class="mb-3">
            <label for="description">Description</label>
            @if(isset($create))
            <textarea class="form-control" name="description"></textarea>
            @else
            <textarea class="form-control" name="description">{{$post->description}}</textarea>
            @endif
            </div>

            <div class="mb-3">
            <label for="title">Featured Image</label>
            <input type="file" class="form-control" name="image">
            </div>
            @if(isset($post->id))
            <input type="hidden" name="id" value="{{$post->id}}"/>
            @endif
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Save Post</button>
        </form>
    </div>
</div>
@endsection