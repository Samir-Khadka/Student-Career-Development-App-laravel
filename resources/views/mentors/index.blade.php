@extends('layouts.app')

@section('title', 'Find Mentors - CareerOne')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2 class="fw-bold">Find a Mentor</h2>
        <p class="text-muted">Connect with experienced professionals to guide your career journey.</p>
    </div>
</div>

<div class="row">
    @forelse($mentors as $mentor)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        @if($mentor->user->profile_photo_path)
                            <img src="{{ asset('storage/' . $mentor->user->profile_photo_path) }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                        @else
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2rem;">
                                {{ substr($mentor->user->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <h5 class="fw-bold mb-1">{{ $mentor->user->name }}</h5>
                    <p class="text-primary mb-2">{{ $mentor->position }} at {{ $mentor->company }}</p>
                    <p class="text-muted small">{{ Str::limit($mentor->biography, 100) }}</p>
                    <div class="mt-3">
                        <span class="badge bg-light text-dark">{{ $mentor->industry }}</span>
                        <span class="badge bg-light text-dark">{{ $mentor->years_of_experience }} Years Exp.</span>
                    </div>
                    <button class="btn btn-outline-primary w-100 mt-4">Request Mentorship</button>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <h3 class="text-muted">No mentors found yet.</h3>
            <p>Check back later!</p>
        </div>
    @endforelse
</div>
@endsection
