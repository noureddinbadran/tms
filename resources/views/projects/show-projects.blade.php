@extends('layouts.app')

@section('content')
<div class="form-group">
    <select class="btn btn-primary" onchange="var form = document.getElementById('get-task-form'); form.setAttribute('action', '/projects/' + this.value + '/tasks'); form.submit();">
        <option disabled selected>Select the project</option>
        @foreach($projects as $project)
            <option value="{{$project->id}}" {{(isset($selectedProjectId) && $selectedProjectId == $project->id) ? 'selected' : ''}}>{{$project->name}}</option>
        @endforeach
    </select>
</div>

@include('tasks.show-all-tasks')

<form id="get-task-form" action=#" method="get"></form>
@endsection