@extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h3>Manage Kategori</h3>
        <a href="kategori/create" class="btn btn-primary float-right">Create Data</a>
      </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
  </div>
  </div>
@endsection

@push('scripts')
  {{ $dataTable->scripts() }}
@endpush