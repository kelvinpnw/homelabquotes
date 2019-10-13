@extends('main_template')

@section('title','search')

@section('body')

    <p>{{$Results->count()}} {{str_plural('result',$Results->count())}} for {{$Query}}</p>

    @foreach($Results as $Result)
        <div class="imgcont">
            <p>
                <img class="quoteimage" src="{{env('QUOTE_PATH').$Result->filename}}" alt="{{$Result->transcript}}">
            </p>
            @auth
                @if(Auth::user()->admin==1)
                    <div class="admin-buttons">
                        <a href="/admin/edit/{{$Result->id}}"><i class="fa fa-edit"></i></a>
                        <a href="/admin/delete/{{$Result->id}}"><i class="fa fa-trash"></i></a>
                    </div>
                @endif
            @endauth
        </div>

        @if(!$loop->last)
            <hr class="hrsep">
        @endif

    @endforeach
@endsection
