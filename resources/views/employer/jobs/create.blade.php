@extends('layouts.app')

@section('title', 'Post a New Job - CareerOne')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0">Post a New Job</h5>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('employer.jobs.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Job Title</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="type" class="form-label fw-bold">Job Type</label>
                            <select id="type" class="form-select @error('type') is-invalid @enderror" name="type" required>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Contract">Contract</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="location" class="form-label fw-bold">Location</label>
                            <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required placeholder="e.g. Kathmandu, Remote">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="salary_range" class="form-label fw-bold">Salary Range</label>
                        <input id="salary_range" type="text" class="form-control @error('salary_range') is-invalid @enderror" name="salary_range" value="{{ old('salary_range') }}" required placeholder="e.g. NRs. 30,000 - 50,000">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Job Description</label>
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="5" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="requirements" class="form-label fw-bold">Requirements</label>
                        <textarea id="requirements" class="form-control @error('requirements') is-invalid @enderror" name="requirements" rows="4" required>{{ old('requirements') }}</textarea>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Post Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
