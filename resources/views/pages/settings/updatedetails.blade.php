@extends('templates.main')
@section('title','Update Details')
@section('content')
    <h1>Update Details</h1>
    @breadcrumbs
    {!! Form::model($user,array('route' => 'settings.update.post','role' => 'form','method' => 'put')) !!}
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @foreach($user->fields as $field => $name)
        <div class="form-group">
            {!! Form::label($field, $name) !!}
            {!! Form::text($field,null,['class' => 'form-control']) !!}
        </div>
    @endforeach
    <a href="{{route('settings.index')}}"><p class="btn btn-lg btn-danger">Back to Settings</p></a>
    {!! Form::submit('Update Details',['class' => 'btn btn-lg btn-success']) !!}

    {!! Form::close() !!}
@endsection