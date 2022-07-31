@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Commenti</h1>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{route('admin.categories.create')}}" class="btn btn-success">Crea una categoria</a>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID post</th>
                            <th scope="col">Autore</th>
                            <th scope="col">Commento</th>
                            <th scope="col">Stato</th>
                            <th scope="col">Azione</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($comments as $comment)
                          <tr>
                            <td>{{$comment->post_id}}</td>
                            <td>{{$comment->author}}</td>
                            <td>{{$comment->content}}</td>
                            <td>{{$comment->is_approved}}</td>
                            <td>
                              {{-- <a href="{{route('admin.categories.show', $category->id)}}" class="btn">Visualizza</a> --}}
                              {{-- <a href="{{route('admin.categories.edit', $category->id)}}" class="btn">Modifica</a> --}}
                              <form action="{{route('admin.comments.destroy', $comment->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn">Elimina</button>
                              </form>
                            </td>
                          </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection