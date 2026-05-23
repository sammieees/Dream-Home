<!DOCTYPE html>
<html>
<head>
    <title>Dream Home System</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-72 bg-gray-900 text-white p-6 shadow-2xl">

        <!-- LOGO -->
        <div class="mb-10">

            <h1 class="text-3xl font-bold text-blue-400">
                Dream Home
            </h1>

            <p class="text-gray-400 text-sm mt-1">
                Rental Management System
            </p>

        </div>

        <!-- NAVIGATION -->
        <nav class="space-y-3">

            <!-- DASHBOARD -->
            <a href="/dashboard"
               class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-blue-500 hover:text-white transition">

                📊 <span>Dashboard</span>

            </a>

            <!-- PROPERTIES -->
            <a href="{{ route('properties.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-blue-500 hover:text-white transition">

                🏠 <span>Properties</span>

            </a>

            <!-- TENANTS -->
            <a href="{{ route('tenants.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-blue-500 hover:text-white transition">

                👥 <span>Tenants</span>

            </a>

            <!-- PAYMENTS -->
            <a href="{{ route('payments.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-blue-500 hover:text-white transition">

                💳 <span>Payments</span>

            </a>

            <!-- REPORTS -->
            <a href="#"
               class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-blue-500 hover:text-white transition">

                📑 <span>Reports</span>

            </a>

        </nav>

        <!-- USER -->
        <div class="absolute bottom-6 left-6">

            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button type="submit"
                        class="bg-red-500 hover:bg-red-600 px-5 py-2 rounded-xl transition">

                    Logout

                </button>

            </form>

        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-8">

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))

            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-2xl mb-6">

                {{ session('success') }}

            </div>

        @endif

        <!-- VALIDATION ERRORS -->
        @if($errors->any())

            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-2xl mb-6">

                <ul class="list-disc ml-5">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        @yield('content')

    </main>

</div>

</body>
</html>