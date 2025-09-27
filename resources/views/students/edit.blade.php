@extends('layouts.app')

@section('content')
<div class="">
    <h2 class="text-white text-xl text-center mt-4 font-bold">Edit Student</h2>

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

        
            <label class="text-white" for="name">Name:</label><br>
            <input type="text" name="name" value="{{ old('name', $student->name) }}" required>
            <br><br>

        
            <label class="text-white" for="email">Email:</label><br>
            <input type="email" name="email" value="{{ old('email', $student->email) }}" required>
            <br><br>

        
            <label class="text-white" for="dob">Date of Birth:</label><br>
            <input type="date" name="dob" value="{{ old('dob', $student->dob->format('Y-m-d')) }}" required>
            <br><br>

        <button type="submit" class="mb-4 bg-white p-1 rounded hover:bg-gray-400 focus:bg-white p-2">Update</button>
    </form>
</div>
@endsection
