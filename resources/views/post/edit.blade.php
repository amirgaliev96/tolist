@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h3>Изменение поста</h3>
                <div class="card-body">
                <div class="col-md-12">
                    <form action ="{{ route('post.update', $post->id) }}" method="post">
                    @csrf 
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Описание</label>
                        <textarea name="description" type="text" class="form-control" id="exampleInputPassword1">{{ $post->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary col-md-12">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection