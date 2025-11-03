@extends('admin.layouts.app')

@section('panel')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-primary">Reset Password</h3>
                    <p class="text-muted">Enter your new password below</p>
                </div>

                <form action="{{ route('admin.password.update') }}" method="POST" class="border p-4 bg-white rounded-3 shadow-sm">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-3">
                         <input type="hidden" name="email" value="{{ request()->email }}">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">New Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary fw-semibold">
                            Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection