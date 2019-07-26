@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <button type="submit" class="btn btn-primary mb-3" style="width:100%" data-toggle="modal" data-target="#myModal">Создать</button>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Время</th>
                        <th scope="col">Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td scope="row">{{ $task->id }}</td>
                                <td><a href="{{ route('task.show',$task->id) }}">{{ $task->title }}</a></td>
                                <td>{{ Str::limit($task->description, 50) }}</td>
                                <td><?php echo $task->status == 1 ? '<span class="btn-submit"  data-id="'. $task->id .'"><i class="far fa-check-circle fa-2x"></i></span>' : '<span class="btn-submit"  data-id="'. $task->id .'"><i class="far fa-times-circle fa-2x"></i></span>' ?></td>
                                <td>{{ $task->created_at }}</td>
                                <td>
                                    <form action="{{ route('task.delete', $task->id) }}" method="POST">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
    @if(!is_null($tasks->links()))
        <div class="card mt-3">
            <div class="card-body">
                {{ $tasks->links() }}
            </div>
        </div>
    @endif 
        
</div>
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
    
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Новая задача</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
    
        <!-- Modal body -->
        <div class="modal-body">
                <form action="{{ route('task.store') }}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Описание</label>
                        <textarea type="text" class="form-control" id="exampleInputPassword1" name="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
        </div>
        </div>
    </div>
</div> 
@endsection



<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".btn-submit").click(function(e){
            e.preventDefault();
            // var token = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).attr('data-id');
            var element = $(this);
            // console.log([id, token]);
            $.ajax({
                type:'PUT',
                url:'task/' + id,
                data:{
                    'id': id,
                    '_token': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(function(data) {
                console.log(data.status);
                if(data.status === 0) {
                    element.children('i').removeClass('far fa-check-circle fa-2x');
                    element.children('i').addClass('far fa-times-circle fa-2x');
                } else {
                    element.children('i').removeClass('far fa-times-circle fa-2x');
                    element.children('i').addClass('far fa-check-circle fa-2x');
                }
            });
        });
    });
</script>