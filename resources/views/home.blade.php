@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Уроки') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="form-group row">
                        <div class="col-md-6">
                            <el-button type="success" icon="el-icon-check" circle></el-button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <tree-component></tree-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
