@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Profel</div>
                <div class="card-body">
                    <div class="mb-0">
                        <label for="current_password" class="form-label">FIO</label>
                        <input type="text" value="{{ auth()->user()->name }}" disabled class="form-control" required>
                    </div>
                    <div class="mb-0">
                        <label for="current_password" class="form-label">Lavozim</label>
                        <input type="text" value="{{ auth()->user()->type }}" disabled class="form-control" required>
                    </div>
                    <div class="mb-0">
                        <label for="current_password" class="form-label">Bo'lim</label>
                        <input type="text" value="{{ auth()->user()->bolim }}" disabled class="form-control" required>
                    </div>
                    <div class="mb-0">
                        <label for="current_password" class="form-label">Email</label>
                        <input type="text" value="{{ auth()->user()->email }}" disabled class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Parolni yangilash</div>
                <div class="card-body">
                    <form action="{{ route('updatePassword') }}" method="POST">
                        @csrf
                        <div class="mb-1">
                            <label for="current_password" class="form-label">Joriy parol</label>
                            <input type="password" name="current_password" id="current_password" class="form-control" required>
                        </div>
                        <div class="mb-1">
                            <label for="new_password" class="form-label">Yangi parol</label>
                            <input type="password" name="new_password" id="new_password" class="form-control" required>
                        </div>
                        <div class="mb-1">
                            <label for="new_password_confirmation" class="form-label">Parolni takrorlang</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-2">Parolni yangilash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
