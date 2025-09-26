@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Student</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name', $student->name) }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email', $student->email) }}" required>
        </div>

        <div>
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" value="{{ old('dob', $student->dob->format('Y-m-d')) }}" required>
        </div>

        <button type="submit">Update</button>
    </form>
</div>
@endsection
