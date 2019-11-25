@extends('layouts.app')

@section('content')
    
</section>
<div class="blog-post">
    <h2 class="blog-post-title">{{$post->title}}</h2>
    <p class="blog-post-meta">{{date_format($post->created_at, 'l jS F Y')}} by <a href="#">{{$post->user->name}}</a></p>
    <img src="{{$post->image_url}}" width="100%"/>
    <br/><br/>
    <p>{{$post->description}}</p>
    @guest
    <br/>
    @else
    <br/>
    <a href="{{route('postedit',$post->id)}}" class="btn btn-sm btn-outline-secondary">Edit</a>
    @endguest
</div>
@endsection