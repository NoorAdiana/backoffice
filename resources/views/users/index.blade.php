@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="title">List Users</h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-xs">
                        <i class="fa fa-user-plus"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="content table-responsive table-full-width">
            
            @if(session('status'))
                <div class="col-md-offset-2 col-md-8 alert alert-info" role="alert">
                    {{ session('status') }}
                </div>                
            @endif

            <table class="table table-hover table-striped">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->toDateString() }}</td>
                            <td class="text-center">
                                <a href="{{ url('users', ['id' => $user->id]) }}" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="{{ url('users', ['id' => $user->id]) }}" class="btn btn-danger btn-xs" onclick="event.preventDefault(); document.getElementById('logout-form-{{ $user->id }}').submit();">
                                    <i class="fa fa-close"></i>
                                </a>
                                <form id="logout-form-{{$user->id}}" action="{{ url('users', ['id' => $user->id]) }}" method="POST" style="display: none;">
                                    <input type="hidden" value="DELETE" name="_method">
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="pagination">
                        <ul class="pager">
                            <li class="{{ $users->previousPageUrl() ? '' : ' disabled' }}">
                                <a href="{{ $users->previousPageUrl() ?: '#'}}">
                                    <span aria-hidden="true">&larr;</span> Previous
                                </a>
                            </li>
                            <li class="{{ $users->nextPageUrl() ? '' : ' disabled' }}">
                                <a href="{{ $users->nextPageUrl() ?: '#' }}">
                                    Next <span aria-hidden="true">&rarr;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>activated('users-management');</script>
@endpush
