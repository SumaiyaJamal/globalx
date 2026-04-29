@extends('admin.layouts.app')

@section('title', 'Add Job')
@section('heading', 'Add Job')

@section('content')
    <form method="POST" action="{{ route('admin.jobs.store') }}" class="d-grid gap-3">
        @csrf
        @include('admin.jobs._form', ['job' => null])

        <div class="d-flex flex-wrap gap-2">
            <button class="btn btn-admin" type="submit">
                <i class="bi bi-check2-circle me-1"></i> Create
            </button>
            <a class="btn btn-admin-outline" href="{{ route('admin.jobs.index') }}">Cancel</a>
        </div>
    </form>
@endsection

