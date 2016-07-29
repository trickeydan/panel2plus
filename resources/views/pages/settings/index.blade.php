@extends('templates.main')
@section('title','Settings')
@section('content')
    <h1>Settings</h1>
    @breadcrumbs
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-warning">
            {{ session('error') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Your Details</div>

                <!-- Table -->
                <table class="table">
                    <tbody>
                        @foreach($user->fields as $field => $name)
                            <tr>
                                <td>{{$name}}</td>
                                <td>{{$user->$field}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Options</div>

                <div class="list-group">
                    <a href="{{route('settings.changepassword')}}"><button type="button" class="list-group-item">Change My Password</button></a>
                    <a href="{{route('settings.update')}}"><button type="button" class="list-group-item">Update My Details</button></a>
                    <button type="button" class="list-group-item disabled">Report an issue</button>
                    <button type="button" class="list-group-item disabled">Close Account</button>
                </div>
            </div>

        </div>
    </div>
@endsection