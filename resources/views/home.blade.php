@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @if($projects)
            @foreach($projects as $project)
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <ul class="icon-bar">
                                <li>
                                @include('projects/delproject')
                                </li>
                                <li>
                                    <!-- Button trigger modal -->
                                    <button type="button" data-toggle="modal" data-target="#myModal-{{$project->id}}">
                                        <i class="fa fa-btn fa-cog"></i>
                                    </button>
                                </li>
                            </ul>
                            @if($project->thumb_img)
                            <a href="{{route('projects.show',$project->id)}}">
                            <img src="{{asset('thumb_img/'.$project->thumb_img)}}" alt="{{$project->name}}">
                            </a>
                                @else
                                <a href="{{route('projects.show',$project->id)}}">
                                    <img src="{{asset('thumb_img/default.jpg')}}" alt="{{$project->name}}">
                                </a>
                            @endif
                            <div class="caption">
                                <a href="{{route('projects.show',$project->id)}}">
                                <h4 class="text-center">{{$project->name}}</h4>
                                    </a>
                            </div>
                        </div>
                        @include('projects/editproject')
                    </div>
                @endforeach
            @endif
        <div class="col-sm-6 col-md-3">
            <!-- Button trigger modal -->
        @include('projects/addproject')
        </div>
    </div>
</div>

@endsection
@section('customJS')
    <script>
        $(document).ready(function(){
            $('.icon-bar').hide();
            $('.thumbnail').hover(function(){
                $(this).find('.icon-bar').toggle();
            });
        });
    </script>
    @endsection
