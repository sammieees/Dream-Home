@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold mb-8">
    Branches
</h1>

<div class="bg-white rounded-2xl shadow p-8">

    <a href="{{ route('branches.create') }}"
       class="bg-cyan-500 text-white px-5 py-3 rounded-xl">

        + Add Branch

    </a>

</div>

@endsection