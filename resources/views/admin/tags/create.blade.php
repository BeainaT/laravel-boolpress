@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Crea tag</h1>
    <form action="{{route('admin.tags.store')}}" method="POST">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Nome tag</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Crea</button>
      </form>
  </div>
@endsection