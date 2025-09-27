@extends('layouts.app')

@section('title', 'Students List')

@section('content')

    @if(session('success'))
        <div style="color: green; border: solid 1px green; margin-bottom: 25px; margin-top: 25px; padding: 5px; background-color: lightGreen;">{{ session('success') }}</div>
    @endif


    <div class="flex flex-row justify-between items-center my-4">
        <a href="{{ route('students.create') }}">
            <button type="submit" class="mb-4 bg-white p-1 rounded hover:bg-gray-400 focus:bg-white">Add New Student</button>
        </a>
        <a href="{{ route('students.trash') }}" class="bg-white text-black hover:bg-gray-400 text-white px-3 py-1 rounded">
            View Trash Bin
        </a>
    </div>
    <div class="overflow-x-auto">
    <table border="1" cellpadding="5" cellspacing="0" class="border border-black w-full table-auto border-collapse">
        <form method="GET" action="{{ route('students.index') }}" class="mb-3 hidden">
            <div class="flex flex-row gap-0 mb-4">
                <input type="text" name="search" class="form-control" placeholder="Search by name or email"
                    value="{{ request('search') }}">
                <button type="submit" class="bg-white p-1 rounded hover:bg-gray-400 focus:bg-white rounded-none">Search</button>
                @if(request('search'))
                    <a href="{{ route('students.index') }}" class="ml-4 self-center text-white underline hover:text-gray-300">Clear</a>
                @endif
            </div>
        </form>
        <thead>
            <tr class="bg-black text-white">
                <th class="border border-white">ID</th>
                <th class="border border-white">Name</th>
                <th class="border border-white">Email</th>
                <th class="border border-white">Date of Birth</th>
                <th class="border border-white">Created</th>
                <th class="border border-white">Last Edit</th>
                <th class="border border-white">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr class="bg-white">
                    <td class="border border-black">{{ $student->id }}</td>
                    <td class="border border-black">{{ $student->name }}</td>
                    <td class="border border-black">{{ $student->email }}</td>
                    <td class="border border-black">{{ $student->dob->format('Y-m-d') }}</td>
                    <td class="border border-black">{{ $student->created_at->format('M d, Y H:i') }}</td>
                    <td class="border border-black">{{ $student->updated_at->format('M d, Y H:i') }}</td>
                    <td class="border border-black flex flex-col md:flex-row items-center justify-between">
                        <a class="underline hover:text-gray-600" href="{{ route('students.edit', $student->id) }}">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gray-100 p-1 rounded border border-black hover:bg-black hover:text-white" onclick="return confirm('Delete this student?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    {{ $students->appends(request()->query())->links() }}
@endsection
