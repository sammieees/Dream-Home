@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-4xl font-bold text-gray-800">
            Branches
        </h1>

        <p class="text-gray-500 mt-1">
            Manage all branch records
        </p>

    </div>

    <a href="{{ route('branches.create') }}"
       class="bg-cyan-500 hover:bg-cyan-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">

        + Add Branch

    </a>

</div>

@if(session('success'))

    <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-2xl mb-6">

        {{ session('success') }}

    </div>

@endif

<div class="bg-white rounded-3xl shadow-xl overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="text-left p-5">Branch Name</th>
                <th class="text-left p-5">Location</th>
                <th class="text-left p-5">Address</th>
                <th class="text-left p-5">Contact</th>
                <th class="text-left p-5">Manager</th>
                <th class="text-left p-5">Actions</th>
            </tr>

        </thead>

        <tbody>

            @forelse($branches as $branch)

                <tr class="border-t hover:bg-gray-50 transition">

                    <td class="p-5 font-semibold">
                        {{ $branch->name }}
                    </td>

                    <td class="p-5">
                        {{ $branch->location }}
                    </td>

                    <td class="p-5">
                        {{ $branch->address }}
                    </td>

                    <td class="p-5">
                        {{ $branch->contact }}
                    </td>

                    <td class="p-5">
                        {{ $branch->manager }}
                    </td>

                    <td class="p-5">
                        <div class="flex gap-3">

                             <a href="{{ route('branches.edit', $branch->id) }}"
                                 class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-xl">

                                     Edit

                               </a>
                            <form action="{{ route('branches.destroy', $branch->id) }}" method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Delete this branch?')"
                                      class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl">

                                      Delete

                               </button>

                            </form>

                        </div>
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5"
                        class="text-center p-10 text-gray-500">

                        No branches found.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection