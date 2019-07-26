@extends('layouts.app')
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
      <th scope="col">Действия</th>
    </tr>
  </thead>
  <tbody>
    @foreach($models as $model)
    <tr>
      <td>{{ $model->id }}</td>
      <td>{{ $model->title }}</td>
      <td>{{ $model->description }}</td>
      <td>{{ $model->created_at }}</td>
      <td>
      <a href="{{ route('post.show' , $model->id)}}"><button class="btm btn-primary btn-sm" type="submit"><i class="fas fa-eye"></i></button>
      <form action = " {{ route('post.delete'  ,$model->id)}} " method = POST>
      @csrf 
      @method('DELETE')
      <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
      </form>

      <form action = " {{ route('post.edit',$model->id)}} " method = POST>
      @csrf 
      @method("GET")
      <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></button>
      </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
        </div>
    </div>
  </div>
@endsection