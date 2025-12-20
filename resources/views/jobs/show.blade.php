@extends('layouts.app')

@section('title', $job->title . ' - CareerOne')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-light rounded p-3 me-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="bi bi-building text-primary fs-2"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-1">{{ $job->title }}</h2>
                        <h5 class="text-muted mb-2">{{ $job->employer->name ?? 'Company Name' }}</h5>
                        <div class="d-flex gap-2">
                            <span class="badge bg-light text-dark border"><i class="bi bi-geo-alt me-1"></i> {{ $job->location ?? 'Remote' }}</span>
                            <span class="badge bg-light text-dark border"><i class="bi bi-clock me-1"></i> {{ $job->type }}</span>
                            <span class="badge bg-light text-dark border"><i class="bi bi-cash me-1"></i> {{ $job->salary_range ?? 'Negotiable' }}</span>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <h5 class="fw-bold mb-3">Job Description</h5>
                <div class="text-muted mb-4">
                    <p>{{ $job->description }}</p>
                </div>

                <h5 class="fw-bold mb-3">Requirements</h5>
                <div class="text-muted mb-4">
                    <p>{{ $job->requirements ?? 'No specific requirements listed.' }}</p>
                </div>

                <hr class="my-4">

                <div class="d-flex gap-2">
                    <form action="{{ route('jobs.apply', $job->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg">Apply Now</button>
                    </form>
                    <form action="{{ route('jobs.save', $job->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary btn-lg">
                            <i class="bi bi-bookmark"></i> Save Job
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0">About the Company</h5>
            </div>
            <div class="card-body p-4">
                <h5 class="fw-bold">{{ $job->employer->name ?? 'Company' }}</h5>
                <p class="text-muted mb-4">{{ $job->employer->description ?? 'No company description available.' }}</p>
                
                <h6 class="fw-bold mb-2">Website</h6>
                <a href="#" class="text-decoration-none mb-3 d-block">{{ $job->employer->website ?? 'Not available' }}</a>
                
                <h6 class="fw-bold mb-2">Industry</h6>
                <p class="text-muted mb-0">{{ $job->employer->industry ?? 'Technology' }}</p>
            </div>
        </div>

        <div class="d-grid">
            <a href="{{ route('jobs.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i> Back to Jobs
            </a>
        </div>
    </div>
</div>
@endsection
