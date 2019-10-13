@extends('main_template')
@section('title','admin')

@section('body')

    <h1>The Top Secret Admin Panel</h1>
    <h2>Confirm Deletion of #{{$Quote->id}}</h2>
    <div class="imgcont">
        <p>
            <img class="quoteimage" src="{{env('QUOTE_PATH').$Quote->filename}}" alt="{{$Quote->transcript}}">
        </p>
    </div>

    {!! Form::open() !!}
    <input type="hidden" name="id" value="{{$Quote->id}}">
    <input class="btn btn-danger" name="delete" type="submit" value="Delete This Quote">
    <a class="btn btn-secondary" href="{{ URL::previous() }}">Cancel</a>
    @csrf
    {!! Form::close() !!}
@endsection
