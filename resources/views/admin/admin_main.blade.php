@extends('main_template')
@section('title','admin')

@section('body')
    <h1>The Top Secret Admin Panel</h1>
    <ul>
        <li><a href="/admin/upload">Upload a Quote</a></li>
        <li>To edit or delete an existing quote, find it in search and click the edit or delete button.</li>
    </ul>
@endsection
