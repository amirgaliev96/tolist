@extends('layouts.app');
@section('content')
<ul>
    @foreach($models as $model)
        <li>
          {{ $model->title }}
     </li>
        @endforeach 
</ul>
@endsection