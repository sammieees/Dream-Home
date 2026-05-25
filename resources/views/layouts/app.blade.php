<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dream Home System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>

        body {
            font-family: 'Poppins', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background: #374151;
            border-radius: 10px;
        }

    </style>

</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#071A2F] text-white flex flex-col shadow-2xl">

        <!-- LOGO -->
        <div class="px-6 py-6 border-b border-gray-800">

            <h1 class="text-2xl font-bold text-cyan-400">
                Dream Home
            </h1>

            <p class="text-gray-400 text-sm mt-1">
                Property Management
            </p>

        </div>

        <!-- MENU -->
        <div class="flex-1 overflow-y-auto px-5 py-6">

            <!-- OVERVIEW -->
            <p class="text-xs uppercase text-gray-500 mb-3 tracking-wider">
                Overview
            </p>

            <div class="space-y-2 mb-8">

                <!-- DASHBOARD -->
                <a href="{{ auth()->user()->role == 'admin'
                            ? route('dashboard')
                            : route('staff.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-500 transition">

                    <span>🏠</span>

                    <span>
                        Dashboard
                    </span>

                </a>

                <!-- REPORTS -->
                @if(auth()->user()->role == 'admin')

                <a href="{{ route('reports.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-500 transition">

                    <span>📊</span>

                    <span>
                        Reports
                    </span>

                </a>

                @endif

            </div>

            <!-- PORTFOLIO -->
            <p class="text-xs uppercase text-gray-500 mb-3 tracking-wider">
                Portfolio
            </p>

            <div class="space-y-2 mb-8">

                <!-- BRANCHES -->
                <a href="{{ route('branches.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-500 transition">

                    <span>🏬</span>

                    <span>
                        Branches
                    </span>

                </a>

                <!-- OWNERS -->
                <a href="{{ route('owners.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-500 transition">

                    <span>👤</span>

                    <span>
                        Owners
                    </span>

                </a>

                <!-- PROPERTIES -->
                <a href="{{ route('properties.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-500 transition">

                    <span>🏢</span>

                    <span>
                        Properties
                    </span>

                </a>

            </div>

            <!-- PEOPLE -->
            <p class="text-xs uppercase text-gray-500 mb-3 tracking-wider">
                People
            </p>

            <div class="space-y-2 mb-8">

                <!-- STAFF -->
                @if(auth()->user()->role == 'admin')

                <a href="{{ route('staff.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-500 transition">

                    <span>👨‍💼</span>

                    <span>
                        Staff
                    </span>

                </a>

                @endif

                <!-- TENANTS -->
                <a href="{{ route('tenants.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-500 transition">

                    <span>👨‍👩‍👧</span>

                    <span>
                        Tenants
                    </span>

                </a>

            </div>

            <!-- OPERATIONS -->
            <p class="text-xs uppercase text-gray-500 mb-3 tracking-wider">
                Operations
            </p>

            <div class="space-y-2">

                <!-- PAYMENTS -->
                <a href="{{ route('payments.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-500 transition">

                    <span>💳</span>

                    <span>
                        Payments
                    </span>

                </a>

                <!-- LEASE AGREEMENTS -->
                <a href="{{ route('leases.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-500 transition">

                    <span>📄</span>

                    <span>
                        Lease Agreements
                    </span>

                </a>

            </div>

        </div>

        <!-- FOOTER -->
        <div class="border-t border-gray-800 p-5">

            <div class="mb-4">

                <p class="text-xs text-gray-500">
                    Logged in as
                </p>

                <p class="font-semibold text-cyan-400 capitalize">
                    {{ auth()->user()->role }}
                </p>

            </div>

            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button type="submit"
                        class="w-full bg-red-500 hover:bg-red-600 py-3 rounded-xl font-semibold transition">

                    Logout

                </button>

            </form>

        </div>

    </aside>

    <!-- MAIN -->
    <main class="flex-1 overflow-y-auto">

        <!-- TOPBAR -->
        <div class="bg-white shadow-sm px-10 py-5 flex justify-between items-center">

            <h1 class="text-xl font-semibold text-gray-700">
                Dream Home System
            </h1>

            <div class="text-sm text-gray-500">

                Welcome,
                <span class="font-semibold text-gray-700">
                    {{ auth()->user()->name }}
                </span>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="p-10">

            <!-- SUCCESS -->
            @if(session('success'))

                <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-2xl mb-6">

                    {{ session('success') }}

                </div>

            @endif

            <!-- ERRORS -->
            @if($errors->any())

                <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-2xl mb-6">

                    <ul class="list-disc ml-5">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            @yield('content')

        </div>

    </main>

</div>

</body>
</html>