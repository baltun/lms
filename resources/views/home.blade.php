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


                    <div class="form-group row">
                        <div class="col-md-4">
                            <tree-component/>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group row">
                                <lesson-component/>
                            </div>
                            <div class="form-group row">
                                <change-button/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
