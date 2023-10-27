@extends('layouts.app-layout')
@section('resource-title', '')
@section('dashboard-content')

<div class="container-fluid">
    <div class="row justify-content-center align-items-center align-greetings">
        @if (session('error'))
            <div class="alert alert-danger mt-2">
                {{ session('error') }}
            </div>

            {{ session()->forget('error') }}
        @else
            <h1 class="text-center ml-5">Olá, {{ session('name') }}!</h1>
        @endif
    </div>
</div>

<style>
    .align-greetings {
        height: 100vh;
        margin-top: -50px;
        margin-left: 270px;
    }
</style>

@endsection