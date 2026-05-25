@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-4xl font-bold text-gray-800">
            Staff Management
        </h1>

        <p class="text-gray-500 mt-1">
            Manage staff salaries and assignments
        </p>

    </div>

</div>

@if(session('success'))

    <div class="bg-green-100 text-green-700 px-4 py-3 rounded-2xl mb-6">

        {{ session('success') }}

    </div>

@endif

<div class="bg-white rounded-3xl shadow-xl overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="text-left p-5">Name</th>

                <th class="text-left p-5">Email</th>

                <th class="text-left p-5">Role</th>

                <th class="text-left p-5">Salary</th>

                <th class="text-left p-5">Action</th>

            </tr>

        </thead>

        <tbody>

            @forelse($staff as $user)

                <tr class="border-t hover:bg-gray-50 transition">

                    <!-- NAME -->
                    <td class="p-5 font-semibold">

                        {{ $user->name }}

                    </td>

                    <!-- EMAIL -->
                    <td class="p-5">

                        {{ $user->email }}

                    </td>

                    <!-- ROLE -->
                    <td class="p-5">

                        {{ ucfirst($user->role) }}

                    </td>

                    <!-- SALARY -->
                    <td class="p-5">

                        @if($user->salary)

                            <span class="text-green-600 font-bold">

                                ₱{{ number_format($user->salary, 2) }}

                            </span>

                        @else

                            <span class="text-red-500 font-semibold">

                                Not Assigned

                            </span>

                        @endif

                    </td>

                    <!-- ACTION -->
                    <td class="p-5">

                        <div class="flex items-center gap-2">

                            {{-- UPDATE SALARY --}}
                            <form action="{{ route('staff.updateSalary', $user->id) }}"
                                  method="POST"
                                  class="flex items-center gap-2">

                                @csrf
                                @method('PATCH')

                                <input type="number"
                                       step="0.01"
                                       name="salary"
                                       value="{{ $user->salary }}"
                                       placeholder="Enter salary"
                                       class="border border-gray-300 rounded-xl px-3 py-2 w-40 focus:ring focus:ring-blue-200">

                                <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl shadow transition">

                                    Save

                                </button>

                            </form>

                            {{-- DELETE STAFF --}}
                            <form action="{{ route('staff.destroy', $user->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this user?')"
                                  class="inline-block">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl shadow transition">

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

                        No staff found.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection