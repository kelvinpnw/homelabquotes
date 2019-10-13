@extends('main_template')

@section('title','home')

@section('body')

    <p>Username: {{Auth::user()->name}}</p>
    <p>Discord ID: {{Auth::user()->discordid}}</p>
    <p>Homelabquotes ID: {{Auth::user()->id}}</p>
    <p>Admin status:
        @if(Auth::user()->admin==1)
            Admin
        @else
            No
        @endif
    </p>

    To request a complete account deletion, contact <a href="mailto:gdpr@homelabquotes.com">gdpr@homelabquotes.com</a>
@endsection
@section('page_specific_js')
@endsection
