@extends('layouts.app1')

@section('content')
    {{$dataTable->table()}}
@endsection

@push('scripts')
    {{$dataTable->scripts()}}
@endpush
