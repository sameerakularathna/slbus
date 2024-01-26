@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4">
                        <center>
                            <div class="model-Date">
                                <a href="{{ route('rolestore') }}" class="btn btn-primary">
                                    <i class="bi bi-person" style="font-size: 3rem;"></i>
                                    <br>Add Role
                                </a>
                            </div>
                        </center>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4">
                        <center>
                            <div class="model-Date">
                                <a href="{{ route('perstore') }}" class="btn btn-primary">
                                    <i class="bi bi-person" style="font-size: 3rem;"></i>
                                    <br>Add Permission
                                </a>
                            </div>
                        </center>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4">
                        <center>
                            <div class="model-Date">
                                <a href="{{ route('rolechange') }}" class="btn btn-primary">
                                    <i class="bi bi-person" style="font-size: 3rem;"></i>
                                    <br>Change User Role
                                </a>
                            </div>
                        </center>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4">
                        <center>
                            <div class="model-Date">
                                <a href="{{ route('rolestore') }}" class="btn btn-primary">
                                    <i class="bi bi-person" style="font-size: 3rem;"></i>
                                    <br>Change User Permission
                                </a>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
