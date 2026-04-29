@extends('admin.layouts.app')

@section('title', 'Edit Job')
@section('heading', 'Edit Job')

@section('content')
    <form method="POST" action="{{ route('admin.jobs.update', $job) }}" class="d-grid gap-3">
        @csrf
        @method('PUT')
        @include('admin.jobs._form', ['job' => $job])

        <div class="d-flex flex-wrap gap-2">
            <button class="btn btn-admin" type="submit">
                <i class="bi bi-save2 me-1"></i> Save changes
            </button>
            <a class="btn btn-admin-outline" href="{{ route('admin.jobs.index') }}">Back</a>
        </div>
    </form>
@endsection

