@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-4xl font-bold text-gray-800">
            Staff Management
        </h1>

        <p class="text-gray-500 mt-2">
            Manage staff salaries and assignments
        </p>

    </div>

    <!-- ADD STAFF BUTTON -->
    <a href="{{ route('staff.create') }}"
       class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">

        + Add Staff

    </a>

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
    <th class="text-left p-5">Branch</th>
    <th class="text-left p-5">Responsibility</th>
    <th class="text-left p-5">Action</th>

</tr>

</thead>

        </thead>

        <tbody>

           <tbody>

         @forelse($staffs as $user)

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
    <td class="p-5 text-green-600 font-semibold">

        @if($user->salary)

            ₱{{ number_format($user->salary, 2) }}

        @else

            Not Assigned

        @endif

    </td>

    <!-- BRANCH -->
<td class="p-5">

    {{ $user->branch->name ?? 'No Branch' }}

</td>

<!-- RESPONSIBILITY -->
<td class="p-5">

    {{ $user->responsibility ?? 'N/A' }}

</td>

        <!-- ACTION -->
    <td class="p-5">

    <div class="flex gap-2">

        <!-- SAVE SALARY -->
        <form action="{{ route('staff.salary.update', $user->id) }}"
      method="POST"
      class="flex gap-2">

    @csrf
    @method('PUT')

    <input type="number"
           step="0.01"
           name="salary"
           value="{{ $user->salary }}"
           placeholder="Enter salary"
           class="border rounded-xl px-3 py-2 w-36">

    <button type="submit"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl">

        Save

    </button>

    </form>

        <div class="flex gap-2">

    <!-- EDIT -->
    <a href="{{ route('staff.edit', $user->id) }}"
       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-xl">

        Edit

    </a>

        <!-- DELETE -->
        <form action="{{ route('staff.destroy', $user->id) }}"
              method="POST">

            @csrf
            @method('DELETE')

            <button type="submit"
                    onclick="return confirm('Delete this staff?')"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl">

                Delete

            </button>

        </form>

    </div>

</td>

</tr>

@empty

<tr>

    <td colspan="7"
        class="text-center p-10 text-gray-500">

        No staff found.

    </td>

        </tr>

        @endforelse

    </tbody>

    </table>

</div>

@endsection