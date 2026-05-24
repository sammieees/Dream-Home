<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dream Home System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-100 text-slate-900 antialiased">

<div class="flex min-h-screen flex-col md:flex-row">

    <!-- SIDEBAR -->
    <aside class="w-full md:w-72 bg-slate-950 text-white flex flex-col justify-between shadow-2xl shadow-slate-950/20 border-b border-slate-900 md:border-b-0 md:border-r">

        <div>

            <!-- LOGO -->
            <div class="px-8 py-7 border-b border-white/10">

                <h1 class="text-3xl font-bold tracking-tight text-cyan-400">
                    Dream Home
                </h1>

                <p class="text-sm mt-2 text-slate-400">
                    Property Management
                </p>

            </div>

            <!-- NAVIGATION -->
            <nav class="mt-6 px-4">

                <!-- OVERVIEW -->
                <p class="text-slate-400 uppercase text-xs tracking-[0.35em] mb-4">
                    Overview
                </p>

                <div class="space-y-2">

                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-3 px-5 py-3 rounded-3xl transition duration-200 text-base font-medium {{ request()->routeIs('dashboard') ? 'bg-slate-800 text-cyan-200 shadow-inner border-l-4 border-cyan-400' : 'text-slate-300 hover:bg-white/10' }}">

                        <span>Dashboard</span>

                    </a>

                    @if(strtolower(Auth::user()->role ?? '') === 'admin')
                        <a href="{{ route('reports.index') }}"
                           class="flex items-center gap-3 px-5 py-3 rounded-3xl transition duration-200 text-base font-medium {{ request()->routeIs('reports.*') ? 'bg-slate-800 text-cyan-200 shadow-inner border-l-4 border-cyan-400' : 'text-slate-300 hover:bg-white/10' }}">

                            <span>Reports</span>

                        </a>
                    @endif

                </div>

                <!-- PORTFOLIO -->
                <p class="text-slate-400 uppercase text-xs tracking-[0.35em] mt-8 mb-4">
                    Portfolio
                </p>

                <div class="space-y-2">

                    @if(strtolower(Auth::user()->role ?? '') === 'admin')
                        <a href="{{ route('branches.index') }}"
                           class="flex items-center gap-3 px-5 py-3 rounded-3xl transition duration-200 text-base font-medium {{ request()->routeIs('branches.*') ? 'bg-slate-800 text-cyan-200 shadow-inner border-l-4 border-cyan-400' : 'text-slate-300 hover:bg-white/10' }}">

                            <span>Branches</span>

                        </a>

                        <a href="{{ route('owners.index') }}"
                           class="flex items-center gap-3 px-5 py-3 rounded-3xl transition duration-200 text-base font-medium {{ request()->routeIs('owners.*') ? 'bg-slate-800 text-cyan-200 shadow-inner border-l-4 border-cyan-400' : 'text-slate-300 hover:bg-white/10' }}">

                            <span>Owners</span>

                        </a>
                    @endif

                    <a href="{{ route('properties.index') }}"
                       class="flex items-center gap-3 px-5 py-3 rounded-3xl transition duration-200 text-base font-medium {{ request()->routeIs('properties.*') ? 'bg-slate-800 text-cyan-200 shadow-inner border-l-4 border-cyan-400' : 'text-slate-300 hover:bg-white/10' }}">

                        <span>Properties</span>

                    </a>

                    <a href="{{ route('property-viewings.index') }}"
                       class="flex items-center gap-3 px-5 py-3 rounded-3xl transition duration-200 text-base font-medium {{ request()->routeIs('property-viewings.*') ? 'bg-slate-800 text-cyan-200 shadow-inner border-l-4 border-cyan-400' : 'text-slate-300 hover:bg-white/10' }}">

                        <span>Property Viewings</span>

                    </a>

                    <a href="{{ route('feedback.index') }}"
                       class="flex items-center gap-3 px-5 py-3 rounded-3xl transition duration-200 text-base font-medium {{ request()->routeIs('feedback.*') ? 'bg-slate-800 text-cyan-200 shadow-inner border-l-4 border-cyan-400' : 'text-slate-300 hover:bg-white/10' }}">

                        <span>Feedback</span>

                    </a>

                    <a href="{{ route('lease-agreements.index') }}"
                       class="flex items-center gap-3 px-5 py-3 rounded-3xl transition duration-200 text-base font-medium {{ request()->routeIs('lease-agreements.*') ? 'bg-slate-800 text-cyan-200 shadow-inner border-l-4 border-cyan-400' : 'text-slate-300 hover:bg-white/10' }}">

                        <span>Lease Agreements</span>

                    </a>

                </div>

                <!-- PEOPLE -->
                <p class="text-slate-400 uppercase text-xs tracking-[0.35em] mt-8 mb-4">
                    People
                </p>

                <div class="space-y-2">

                    @if(strtolower(Auth::user()->role ?? '') === 'admin')
                        <a href="{{ route('staff.index') }}"
                           class="flex items-center gap-3 px-5 py-3 rounded-3xl transition duration-200 text-base font-medium {{ request()->routeIs('staff.*') ? 'bg-slate-800 text-cyan-200 shadow-inner border-l-4 border-cyan-400' : 'text-slate-300 hover:bg-white/10' }}">

                            <span>Staff</span>

                        </a>
                    @endif

                    <a href="{{ route('tenants.index') }}"
                       class="flex items-center gap-3 px-5 py-3 rounded-3xl transition duration-200 text-base font-medium {{ request()->routeIs('tenants.*') ? 'bg-slate-800 text-cyan-200 shadow-inner border-l-4 border-cyan-400' : 'text-slate-300 hover:bg-white/10' }}">

                        <span>Tenants</span>

                    </a>

                </div>

                <!-- OPERATIONS -->
                <p class="text-slate-400 uppercase text-xs tracking-[0.35em] mt-8 mb-4">
                    Operations
                </p>

                <div class="space-y-2">

                    <a href="{{ route('payments.index') }}"
                       class="flex items-center gap-3 px-5 py-3 rounded-3xl transition duration-200 text-base font-medium {{ request()->routeIs('payments.*') ? 'bg-slate-800 text-cyan-200 shadow-inner border-l-4 border-cyan-400' : 'text-slate-300 hover:bg-white/10' }}">

                        <span>Payments</span>

                    </a>

                </div>

            </nav>

        </div>

        <!-- USER SECTION -->
        <div class="px-8 py-8 mt-8 border-t border-white/10 bg-slate-900/80">

            <p class="text-slate-400 text-sm">
                Logged in as
            </p>

            <h2 class="text-xl font-semibold text-white mt-1">
                {{ ucfirst(Auth::user()->role ?? 'admin') }}
            </h2>

            <form action="{{ route('logout') }}"
                  method="POST"
                  class="mt-5">

                @csrf

                <button type="submit"
                        class="w-full bg-red-500 hover:bg-red-600 transition text-white py-3 rounded-2xl font-semibold text-base shadow-sm">
                    Logout
                </button>

            </form>

        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 bg-slate-100">

        <div class="max-w-7xl mx-auto px-6 py-6">

            @if(request()->routeIs('dashboard') || View::hasSection('page_title'))
                <header class="bg-white border border-slate-200 shadow-sm rounded-3xl px-8 py-7 mb-8">

                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

                        <div>

                            <h1 class="text-4xl font-bold text-slate-900 tracking-tight">
                                @yield('page_title', 'Dashboard')
                            </h1>

                            <p class="text-sm text-slate-500 mt-2">
                                @yield('page_subtitle', 'Dream Home Property Management System')
                            </p>

                        </div>

                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:gap-4">
                            @if(request()->routeIs('dashboard'))
                                <div class="text-base text-slate-700">
                                    <span class="text-slate-500">Welcome,</span>
                                    <span class="font-semibold text-slate-900">
                                        {{ Auth::user()->name ?? 'Admin' }}
                                    </span>
                                </div>
                            @endif

                            @hasSection('header_actions')
                                <div>
                                    @yield('header_actions')
                                </div>
                            @endif
                        </div>

                    </div>

                    @hasSection('breadcrumbs')
                        <nav class="mt-6 text-sm text-slate-500">
                            @yield('breadcrumbs')
                        </nav>
                    @endif

                </header>
            @endif

            <!-- PAGE CONTENT -->
            <section class="mt-8 space-y-10">
                @yield('content')
            </section>

        </div>

    </main>

</div>

</body>
</html>
```

Save this as:

`resources/views/layouts/app.blade.php`

