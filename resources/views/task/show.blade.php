@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>{{ $task->title }}</h3>
            </div>
            <div class="card-body">
                <p>{{ $task->description  }}</p>
            </div>
            <div class="card-footer">
                <p>{{ $task->created_at  }}</p>
            </div>
                <a href="{{  route('task.index')  }}" class="btn btn-primary float-right">Назад</a>
        </div>
    </div>
@endsection