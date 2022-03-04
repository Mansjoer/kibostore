@extends('admin.layouts.master')

@section('title')
Logs
@endsection

@section('content')
<div class="empty">
    <div class="empty-icon">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-3 icon-tabler icon-tabler-hammer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M13 10l7.383 7.418c.823 .82 .823 2.148 0 2.967a2.11 2.11 0 0 1 -2.976 0l-7.407 -7.385"></path>
            <path d="M6.293 15.293l-2.586 -2.586a1 1 0 0 1 0 -1.414l7.586 -7.586a1 1 0 0 1 1.414 0l2.586 2.586a1 1 0 0 1 0 1.414l-7.586 7.586a1 1 0 0 1 -1.414 0z"></path>
        </svg>
    </div>
    <p class="empty-title">Under maintenance</p>
    <p class="empty-subtitle text-muted">
        Sorry you cannot find what you're looking for.
    </p>
    <div class="empty-action">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-3 icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <line x1="5" y1="12" x2="11" y2="18"></line>
                <line x1="5" y1="12" x2="11" y2="6"></line>
            </svg>
            Return
        </a>
    </div>
</div>
@endsection
