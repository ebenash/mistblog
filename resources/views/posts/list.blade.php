@extends('layouts.app')

@section('content')
<main role="main">

<section class="jumbotron text-center">
    <div class="container">
    <h1 class="jumbotron-heading">Posts</h1>
    <p class="lead text-muted">All blog posts ordered from the most recent.</p>
    </div>
</section>

<div class="album py-5 bg-light">
    <div class="container">

    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="/storage/uploads/{{$post->image_url}}" />
            <div class="card-body">
            <h3 class="card-text">{{$post->title}}</h3><small> by <a href="{{route('userposts',$post->user->id)}}">{{$post->user->name}}</a></small>
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