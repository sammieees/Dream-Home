@extends('layouts.app')

@section('content')

<div class="p-8">

    <div class="bg-white rounded-3xl shadow-xl p-8">

        <h1 class="text-3xl font-bold mb-6">
            Staff Performance Reports
        </h1>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b">

                        <th class="text-left py-3">
                            Staff Name
                        </th>

                        <th class="text-left py-3">
                            Assigned Tenants
                        </th>

                        <th class="text-left py-3">
                            Property Viewings
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($staff as $member)

                        <tr class="border-b">

                            <td class="py-4">

                                {{ $member->name }}

                            </td>

                            <td class="py-4">

                                {{ $member->tenants_count }}

                            </td>

                            <td class="py-4">

                                {{ $member->property_viewings_count }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3"
                                class="py-6 text-center text-gray-500">

                                No staff records found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection