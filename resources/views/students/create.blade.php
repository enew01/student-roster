@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    <h2 class="text-white text-lg font-bold text-center">Add New Student</h2>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <label class="text-white">Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <div style="color:red;">{{ $message }}</div> @enderror
        <br><br>

        <label class="text-white">Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <div style="color:red;">{{ $message }}</div> @enderror
        <br><br>

        <label class="text-white">Date of Birth:</label><br>
        <input type="date" name="dob" value="{{ old('dob') }}">
        @error('dob') <div style="color:red;">{{ $message }}</div> @enderror
        <br><br>

        <button class="mb-4 bg-white p-2 rounded hover:bg-gray-400 focus:bg-white" type="submit">Add Student</button>
    </form>

    <a class="mb-4 bg-white p-1 rounded hover:bg-gray-400 focus:bg-white" href="{{ route('students.index') }}">Back to list</a>
@endsection
