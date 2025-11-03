@extends('admin.layouts.master')

@section('panel')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="card-title text-center mb-4">Forgot Password</h3>

                        <!-- Display success message -->
                        <div id="success-message" class="alert alert-success d-none"></div>

                        <!-- Display error message -->
                        <div id="error-message" class="alert alert-danger d-none"></div>
                        <form action="{{ route('admin.password.email') }}" method="POST">
                            @csrf
                     
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('admin.login') }}">Back to login</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
