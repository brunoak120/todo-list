@extends('layouts.app')

@section('content')
    <div role="main" class="col-md-9 col-md-push-3">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        Meio
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
