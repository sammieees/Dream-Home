@extends('layouts.app')

@section('page_title', 'Staff Management')
@section('page_subtitle', 'Manage staff salaries and assignments')

@section('header_actions')
    <a href="{{ route('staff.create') }}"
       class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white px-5 py-3 rounded-2xl shadow-lg transition">
        + Add Staff
    </a>
@endsection

@section('content')

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-2xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-200">
        <table class="w-full">
            <thead class="bg-slate-50">
                <tr>
                    <th class="text-left p-5 text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">Name</th>
                    <th class="text-left p-5 text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">Email</th>
                    <th class="text-left p-5 text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">Role</th>
                    <th class="text-left p-5 text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">Salary</th>
                    <th class="text-left p-5 text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($staff as $user)
                    <tr class="border-t border-slate-200 hover:bg-slate-50 transition-all">
                        <td class="p-5 font-semibold text-slate-900">{{ $user->name }}</td>
                        <td class="p-5 text-slate-600">{{ $user->email }}</td>
                        <td class="p-5 text-slate-600">{{ ucfirst($user->role) }}</td>
                        <td class="p-5">
                            @if($user->salary)
                                <span class="rounded-full bg-emerald-50 text-emerald-700 px-3 py-1 text-sm font-semibold">₱{{ number_format($user->salary, 2) }}</span>
                            @else
                                <span class="rounded-full bg-rose-50 text-rose-600 px-3 py-1 text-sm font-semibold">Not Assigned</span>
                            @endif
                        </td>
                        <td class="p-5">
                            <div class="flex flex-wrap gap-2 items-center">
                                <form action="{{ route('staff.updateSalary', $user->id) }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" step="0.01" name="salary" value="{{ $user->salary }}" placeholder="Salary"
                                           class="border border-gray-300 rounded-2xl px-3 py-2 w-36 focus:ring-2 focus:ring-blue-200" />
                                    <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-2xl shadow-sm transition">
                                        Save
                                    </button>
                                </form>
                                <a href="{{ route('staff.edit', $user->id) }}"
                                   class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-2xl shadow-sm transition">Edit</a>
                                <form action="{{ route('staff.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Delete this staff member?')"
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-2xl shadow-sm transition">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-10 text-slate-500">No staff found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection