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

                    {{ __('Admin!') }}

                    <button type="button" class="btn btn-outline-dark"><a href="/admin/users">Users</a></button>
                    <button type="button" class="btn btn-outline-dark"><a href="/admin/subjects">Subjects</a></button>
                    <button type="button" class="btn btn-outline-dark"><a href="/admin/groups">Groups</a></button>
                    <button type="button" class="btn btn-outline-dark"><a href="/admin/news">News</a></button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
