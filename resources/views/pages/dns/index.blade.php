@extends('templates.main')
@section('title','DNS')
@section('content')
    <h1>DNS</h1>
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
            Your Domains &nbsp;&nbsp;&nbsp;<a href="{{route('dns.create')}}"><button class="btn btn-info btn-sm" type="button">Create Domain</button></a>
        </div>

        @if($user->domains()->count() != 0)
            <!-- Table -->
            <table class="table">
                <tbody>
                @foreach($user->domains as $domain)
                    <tr>
                        <td>{{$domain->name}}</td>
                        <td><a href="{{route('dns.domain',$domain->name)}}">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>You don't have any domains</p>
        @endif
    </div>
@endsection