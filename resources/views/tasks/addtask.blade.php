@if($errors->has('name'))
    <div>
        <ul class="alert alert-danger">
            @foreach($errors->get('name') as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::open(['route'=>'tasks.store','class'=>'form-inline']) !!}
{!! Form::hidden('project_id',$project->id) !!}
{!! Form::text('title',null,['placeholder'=>'请输入任务名称','class'=>'form-control']) !!}
<button type="submit" class="btn btn-success">
    <i class="fa fa-plus"></i>
</button>
{!! Form::close() !!}