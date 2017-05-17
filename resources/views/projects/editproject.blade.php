<!-- Modal -->
<div class="modal fade" id="myModal-{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-{{$project->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel-{{$project->id}}">编辑项目</h4>
            </div>
            {!! Form::model($project,['route'=>['projects.update',$project->id],'method'=>'PATCH','files'=>'true']) !!}
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('name','项目名称',['class'=>'control-label']) !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('thumb_img','项目缩略图',['class'=>'control-label']) !!}
                    {!! Form::file('thumb_img') !!}
                </div>
                @include('errors/error')
            </div>
            <div class="modal-footer">
                {!! Form::submit('编辑项目',['class'=>'btn btn-default']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>