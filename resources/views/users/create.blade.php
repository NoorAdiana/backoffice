@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="title">Input New User</h4>
                </div>
            </div>
        </div>

        <div class="content">
            <form action="{{ route('users.store') }}" method="post">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                            {{ csrf_field() }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                            <label>Email Addresss</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                            <label>Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Password confirmation">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <button type="submit" class="btn btn-primary btn-fill btn-block">Save</button>
                    </div>
                </div>  
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>activated('users-management');</script>
@endpush
