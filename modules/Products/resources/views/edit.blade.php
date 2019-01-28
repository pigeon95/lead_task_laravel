@extends('theme::layouts.app')

@section('header_title')
    <h1>@lang('products::main.welcome')</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            @lang('products::main.edit.title')
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 offset-4">
                    @include('products::partial.edit_form')
                </div>
            </div>
        </div>
    </div>
@endsection