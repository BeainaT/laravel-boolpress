@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{$post->title}}</h1>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        {{$post->content}}
                    </div>
                    <div>
                        @if ($post->category)
                            <h5>categorie associate:</h5>
                            <span>{{$post->category->name}}</span>
                        @endif
                    </div>
                    <div>
                        @if(count($post->tags) > 0)
                            <h5>tags associati:</h5>
                            <ul>
                                @foreach ($post->tags as $tag)                    
                                    <li>{{$tag->name}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <hr>
                    <div>
                        <a href="{{route('admin.posts.index')}}" class="btn btn-success">Tutti i post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection