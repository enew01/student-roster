@extends('layouts.app')

@section('title', 'Students List')

@section('content')
    <h1>Students</h1>

    <a href="{{ route('students.create') }}">Add New Student</a>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table border="1" cellpadding="5" cellspacing="0" class="border border-black">
        <thead>
            <tr>
                <th class="border border-black">ID</th>
                <th class="border border-black">Name</th>
                <th class="border border-black">Email</th>
                <th class="border border-black">Date of Birth</th>
                <th class="border border-black">Created</th>
                <th class="border border-black">Last Edit</th>
                <th class="border border-black">Actions</th>
            </tr>
        </thead>
        <form method="GET" action="{{ route('students.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by name or email"
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
                @if(request('search'))
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Clear</a>
                @endif
            </div>
        </form>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td class="border border-black">{{ $student->id }}</td>
                    <td class="border border-black">{{ $student->name }}</td>
                    <td class="border border-black">{{ $student->email }}</td>
                    <td class="border border-black">{{ $student->dob->format('Y-m-d') }}</td>
                    <td class="border border-black">{{ $student->created_at->format('M d, Y H:i') }}</td>
                    <td class="border border-black">{{ $student->updated_at->format('M d, Y H:i') }}</td>
                    <td class="border border-black">
                        <a href="{{ route('students.edit', $student->id) }}">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this student?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
            {{ $students->appends(request()->query())->links() }}
            <a href="{{ route('students.trash') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded">
    View Trash Bin
</a>
@endsection
