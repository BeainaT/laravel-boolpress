@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>modifica tag</h1>
    <form action="{{route('admin.tags.update', $tag->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Nome Tag</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name', $tag->name)}}">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">modifica</button>
    </form>
  </div>
@endsection