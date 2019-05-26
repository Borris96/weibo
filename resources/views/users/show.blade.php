@extends('layouts.default')
@section('title',$user->name)

@section('content')
@include('shared/_user_info',['user'=>$user])
{{ $user->name }} - {{ $user->email }}
@stop
