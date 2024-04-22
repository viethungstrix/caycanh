@extends('layouts.app')

@section('content')
    <h1>Chi tiết cây cối</h1>

    <p>{{ $plant->name }}</p>
    <p>{{ $plant->description }}</p>

    <a href="{{ route('plants.index') }}">Quay lại danh sách</a>
@endsection
