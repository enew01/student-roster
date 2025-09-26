@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    <h1>Add New Student</h1>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <label>Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <div style="color:red;">{{ $message }}</div> @enderror
        <br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <div style="color:red;">{{ $message }}</div> @enderror
        <br><br>

        <label>Date of Birth:</label><br>
        <input type="date" name="dob" value="{{ old('dob') }}">
        @error('dob') <div style="color:red;">{{ $message }}</div> @enderror
        <br><br>

        <button type="submit">Add Student</button>
    </form>

    <a href="{{ route('students.index') }}">Back to list</a>
@endsection
