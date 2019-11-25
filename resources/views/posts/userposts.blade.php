@extends('layouts.app')

@section('content')
<main role="main">

<h1 class="jumbotron-heading">Posts by: {{$items['user']->name}}</h1>
    

<div class="album py-5 bg-light">
    <div class="container">

    <div class="row">
        @foreach ($items['posts'] as $post)
        <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="/storage/uploads/{{$post->image_url}}" />
            <div class="card-body">
            <h3 class="card-text">{{$post->title}}</h3><small> by <a href="#">{{$post->user->name}}</a></small>
            <p class="card-text">{{explode("\n", wordwrap($post->description,150))[0]}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                @guest
                    <a href="{{$post->id}}" class="btn btn-sm btn-outline-secondary">View</a>      
                @else
                    <a href="{{route('postshow',$post->id)}}" class="btn btn-sm btn-outline-secondary">View</a>
                    <a href="{{route('postedit',$post->id)}}" class="btn btn-sm btn-outline-secondary">Edit</a>
                @endguest
                
                </div>
                <small class="text-muted">{{date_format($post->created_at, 'l jS F Y')}}</small>
            </div>
            </div>
        </div>
        </div>
        @endforeach
    </div>
    </div>
</div>

</main>
@endsection