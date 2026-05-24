@extends('layouts.app')

@section('page_title', 'Owners')
@section('page_subtitle', 'Manage property owners')

@section('header_actions')
    <a href="{{ route('owners.create') }}"
       class="inline-flex items-center justify-center rounded-2xl bg-cyan-600 px-5 py-3 text-white font-semibold shadow-lg shadow-cyan-500/20 transition hover:bg-cyan-700">
        + Add Owner
    </a>
@endsection

@section('content')

<div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="text-left p-5">Name</th>
                <th class="text-left p-5">Email</th>
                <th class="text-left p-5">Contact</th>
                <th class="text-left p-5">Address</th>
                <th class="text-left p-5">Actions</th>

            </tr>

        </thead>

        <tbody>

            @forelse($owners as $owner)

                <tr class="border-t hover:bg-gray-50 transition">

                    <td class="p-5 font-semibold">
                        {{ $owner->name }}
                    </td>

                    <td class="p-5">
                        {{ $owner->email }}
                    </td>

                    <td class="p-5">
                        {{ $owner->contact }}
                    </td>

                    <td class="p-5">
                        {{ $owner->address }}
                    </td>

                    <td class="p-5">

                        <div class="flex gap-3">

                            <a href="{{ route('owners.edit', $owner) }}"
                               class="inline-flex items-center justify-center rounded-2xl bg-amber-400 px-4 py-2 text-white font-semibold shadow-sm transition hover:bg-amber-500">

                                Edit

                            </a>

                            <form action="{{ route('owners.destroy', $owner) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Delete owner?')"
                                        class="inline-flex items-center justify-center rounded-2xl bg-rose-500 px-4 py-2 text-white font-semibold shadow-sm transition hover:bg-rose-600">

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

                        No owners found.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection