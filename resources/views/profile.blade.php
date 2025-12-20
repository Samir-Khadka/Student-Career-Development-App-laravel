@extends('layouts.app')

@section('title', 'My Profile - CareerOne')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">My Profile</h5>
                <span class="badge bg-primary">{{ auth()->user()->role }}</span>
            </div>
            <div class="card-body p-4">
                <form>
                    <div class="mb-4 text-center">
                        @if(auth()->user()->profile_photo_path)
                            <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}" 
                                 alt="{{ auth()->user()->name }}" 
                                 class="rounded-circle mb-3"
                                 style="width: 100px; height: 100px; object-fit: cover;">
                        @else
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px; font-size: 2.5rem;">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                        @endif
                        <h4 class="fw-bold">{{ auth()->user()->name }}</h4>
                        <p class="text-muted">{{ auth()->user()->email }}</p>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Full Name</label>
                            <p class="form-control-plaintext border-bottom pb-2">{{ auth()->user()->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Email Address</label>
                            <p class="form-control-plaintext border-bottom pb-2">{{ auth()->user()->email }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Role</label>
                            <p class="form-control-plaintext border-bottom pb-2">{{ auth()->user()->role }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Joined On</label>
                            <p class="form-control-plaintext border-bottom pb-2">{{ auth()->user()->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-outline-secondary">Change Password</button>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
