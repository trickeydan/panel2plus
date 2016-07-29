@extends('templates.main')
@section('title','View Domain')
@section('content')
    <h1>View Domain - {{$domain->name}}</h1>
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
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Records for {{$domain->name}}</div>

        <!-- Table -->
        <table class="table">
            <tbody>
            @foreach($domain->records() as $record)
                <tr>
                    <td>{{$record->type}}</td>
                    <td>{{$record->name}}</td>
                    <td>{{$record->data}}</td>
                    <td>Edit Delete</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection