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
        <div class="panel-heading">
            Records for {{$domain->name}}&nbsp;&nbsp;&nbsp;
            <a href="{{route('dns.domain.delete',[$domain->name])}}"><button class="btn btn-info btn-sm" type="button">Delete Domain</button></a>&nbsp;&nbsp;&nbsp;
            <a href="{{route('dns.domain.record.new',[$domain->name])}}"><button class="btn btn-success btn-sm" type="button">New Record</button></a>
        </div>

        <!-- Table -->
        <table class="table">
            <tbody>
            @foreach($domain->records() as $record)
                @if(!in_array($record->type,['NS']))
                    <tr>
                        <td>{{$record->type}}</td>
                        <td>{{$record->name}}</td>
                        <td>{{ \Panel\Server::getStringFromIP($record->data)}}</td>
                        <td><a href="{{route('dns.domain.record.delete',[$domain,$record->id])}}">Delete</a></td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        <hr>

    </div>
@endsection