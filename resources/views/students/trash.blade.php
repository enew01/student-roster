@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Trash Bin</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Deleted At</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td class="border px-4 py-2">{{ $student->id }}</td>
                    <td class="border px-4 py-2">{{ $student->name }}</td>
                    <td class="border px-4 py-2">{{ $student->email }}</td>
                    <td class="border px-4 py-2">{{ $student->deleted_at->format('M d, Y H:i') }}</td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('students.restore', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="bg-green-500 hover:bg-green-600  px-3 py-1 rounded">
                                Restore
                            </button>
                        </form>

                        <form action="{{ route('students.forceDelete', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Permanently delete this student?')"
                                class="bg-red-500 hover:bg-red-600  px-3 py-1 rounded">
                                Delete Forever
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">No students in trash.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $students->links() }}
    </div>

    <div class="mt-6">
        <a href="{{ route('students.index') }}" class="text-blue-500 hover:underline">← Back to Students</a>
    </div>
</div>
@endsection
