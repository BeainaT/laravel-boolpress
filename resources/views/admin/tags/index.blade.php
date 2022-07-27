@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Tags</h1>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{route('admin.tags.create')}}" class="btn btn-success">Crea un Tag</a>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Azione</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($tags as $tag)
                          <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->slug}}</td>
                            <td>
                              <a href="{{route('admin.tags.show', $tag->id)}}" class="btn">Visualizza</a>
                              <a href="{{route('admin.tags.edit', $tag->id)}}" class="btn">Modifica</a>
                              <form action="{{route('admin.tags.destroy', $tag->id)}}" method="POST">
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