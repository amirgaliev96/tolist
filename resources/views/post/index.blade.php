@extends('layouts.app');
@section('content')
  <div class="container">
    <div class="card">
        <div class="card-header">
          <h3>Все посты</h3>
        </div>
        <div class="card-body">
              <a href="{{route('post.create')}}" role="submit" class="btn btn-primary float-right mb-2">Создать</a>
        <table class="table table-bordered" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Название</th>
      <th scope="col">Описание</th>
      <th scope="col">Дата создания</th>
    </tr>
  </thead>
  <tbody>
    @foreach($models as $model)
    <tr>
      <td>{{ $model->id }}</td>
      <td>{{ $model->title }}</td>
      <td>{{ $model->description }}</td>
      <td>{{ $model->created_at }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
        </div>
    </div>
  </div>
@endsection