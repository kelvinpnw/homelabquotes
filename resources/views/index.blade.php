@extends('main_template')

@section('title','home')

@section('body')

    <div class="imgcont clickfornew">
        <h2>featured quotes:</h2>
        <h6>click for more</h6>
        <img id="quote" src="{{env('QUOTE_PATH').$StartQuote->filename}}" alt="{{$StartQuote->transcript}}">
    </div>

    <br>
@endsection
@section('page_specific_js')
    <script src="/js/quotes.js"></script>
@endsection
