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

                    <form method="POST" action="/admin/add_quarter">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="number" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="date_to">date_to</label>
                            <input type="date" name="date_to" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="date_from">date_from</label>
                            <input type="date" name="date_from" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
