@extends('theme::layouts.app')

@section('header_title')
    <h1>@lang('dashboard::main.welcome')</h1>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-10">
                <h1>@lang('products::main.title')</h1>
            </div>
            <div class="col-md-2">
                <a href="{{ route('products.create') }}" class="btn btn-lg btn-block btn-success">@lang('products::main.add.title')</a>
            </div>
        <div class="col-md-12">
            <hr class="my-4">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('products::partial.table')
        </div>
    </div>
@endsection
