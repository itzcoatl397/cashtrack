@extends('layout.auth')

@section("title")
   Administra tus Presupuestos
@endsection

@section('auth-contents')

    @if(session('success'))
        <p class="my-10 text-center border border-green-400 bg-green-200 py-3 text-sm uppercase">{{session('success')}}</p>
    @endif




@endsection
