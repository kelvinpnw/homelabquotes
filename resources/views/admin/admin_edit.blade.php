@extends('main_template')
@section('title','admin')

@section('body')

    <h1>The Top Secret Admin Panel</h1>
    <h2>Editing Quote #{{$Quote->id}}</h2>
    <div class="imgcont">
        <p>
            <img class="quoteimage" src="{{env('QUOTE_PATH').$Quote->filename}}" alt="{{$Quote->transcript}}">
        </p>
    </div>

    {!! Form::open(array( 'novalidate' => 'novalidate', 'files' => true)) !!}

    <div class="form-group">
        {!! Form::label('Quote Transcript') !!}
        {!! Form::textarea('transcript', $Quote->transcript, array('placeholder'=>'logkiller: I don\'t steal')) !!}
    </div>
    <div class="form-group">
        <input type="submit" value="Edit quote">
    </div>
    {!! Form::close() !!}
@endsection
