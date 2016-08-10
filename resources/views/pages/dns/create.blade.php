@extends('templates.main')
@section('title','Create Domain')
@section('content')
    <h1>Create Domain</h1>
    @breadcrumbs
    {!! Form::open(array('route' => 'dns.create','role' => 'form', 'method' => 'post')) !!}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <p>Please ensure that you have changed your nameservers to:</p>
    <ul>
        <li>ns1.metasysta.co.uk</li>
        <li>ns2.metasysta.co.uk</li>
        <li>ns3.metasysta.co.uk</li>
    </ul>
    <div class="form-group">
        {!! Form::label('name', 'Name (i.e example.com)') !!}
        {!! Form::text('name',null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('ipselect', 'IP Address') !!}
        {!! Form::select('ipselect', array_merge(['custom' => 'Custom IP'],\Panel\Server::listShared()),null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group" id="customForm">
        {!! Form::label('ip', 'Custom IPv4 Address') !!}
        {!! Form::text('ip',null,['class' => 'form-control']) !!}
    </div>

    <a href="{{route('dns.index')}}"><p class="btn btn-danger">Back to DNS</p></a>
    {!! Form::submit('Create Domain',['class' => 'btn btn-success']) !!}


    {!! Form::close() !!}
@endsection
@section('js')
    <script>
        $("#ipselect").on('change', function () {
            var text = $("#ipselect option:selected").text();
            if(text == 'Custom IP'){
                $('#ip').removeProp('disabled');
                $('#customForm').show();
            }else {
                $('#ip').prop('disabled', true);
                $('#customForm').hide();
            }
        });
    </script>
@endsection