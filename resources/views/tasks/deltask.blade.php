{!! Form::open(['route'=>['tasks.destroy',$task->id],'method'=>'DELETE']) !!}
<button type="submit">
    <i class="fa fa-btn fa-close"></i>
</button>
{!! Form::close() !!}