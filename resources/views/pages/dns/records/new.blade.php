@extends('templates.main')
@section('title','New Record')
@section('content')
    <h1>New Record</h1>
    @breadcrumbs
    {!! Form::open(array('route' => ['dns.domain.record.new.post',$domain],'role' => 'form', 'method' => 'post')) !!}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <p>Here you can add additional DNS records for the domain: {{$domain->name}}</p>
    <div class="form-group">
        {!! Form::label('type', 'Record Type') !!}
        {!! Form::select('type',['a' => 'A','cname' => 'CNAME','mx' => 'MX','txt' => 'TXT'],null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('field1', 'Name') !!}
        {!! Form::text('field1',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('field2', 'IP Address') !!}
        {!! Form::text('field2',null,['class' => 'form-control']) !!}
    </div>

    <a href="{{route('dns.domain',$domain)}}"><p class="btn btn-danger">Back to Domain</p></a>
    {!! Form::submit('Create Record',['class' => 'btn btn-success']) !!}


    {!! Form::close() !!}
@endsection
@section('js')
    <script>

        firstField = {A:"Name", CNAME:"Name", MX:"Hostname", TXT:"Name"};
        secondField = {A:"IPv4 Address", CNAME:"Hostname", MX:"Priority", TXT:"Text"};

        $("#type").on('change', function () {
            var text = $("#type option:selected").text();
            var label = $("label[for='"+$('#field1').attr('id')+"']");
            label.text(firstField[text]);
            var label = $("label[for='"+$('#field2').attr('id')+"']");
            label.text(secondField[text]);
        });
    </script>
@endsection