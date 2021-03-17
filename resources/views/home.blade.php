@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('Vous êtes connecté !') }}</p>
                    <p>{{ __('Bienvenue sur votre espace personnel, il n\'y a que vous qui pouvez voir vos objets !') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
