@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{$tag->name}}</h1>
                </div>
                <div class="card-body">
                    <div>
                        <a href="{{route('admin.tags.index')}}" class="btn btn-success">Tutti i tag</a>
                    </div>
                    @if (count($tag->posts) > 0)
                        <div>
                            <h5>post associati</h5>
                            <ul>
                                @foreach ($tag->posts as $post)
                                    <li><a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>                        
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection