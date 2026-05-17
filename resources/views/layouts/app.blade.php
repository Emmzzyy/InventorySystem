<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#093C5D',
                        secondary: '#3B7597',
                        accent: '#6FD1D7',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-primary text-white flex flex-col fixed h-full">
            <div class="p-6 border-b border-secondary">
                <h1 class="text-2xl font-bold">Inventory Pro</h1>
                <p class="text-accent text-sm">Management System</p>
            </div>
            
            <nav class="flex-1 p-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-secondary transition mb-2 {{ request()->routeIs('dashboard') ? 'bg-secondary' : '' }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>

                    @if(auth()->user()->role == 'admin')
                        <a href="{{ route('products.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-secondary transition mb-2 {{ request()->routeIs('products.*') ? 'bg-secondary' : '' }}">
                            <i class="fas fa-boxes"></i>
                            <span>Inventory</span>
                        </a>

                        <a href="{{ route('categories.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-secondary transition mb-2 {{ request()->routeIs('categories.*') ? 'bg-secondary' : '' }}">
                            <i class="fas fa-tags"></i>
                            <span>Categories</span>
                        </a>

                        <a href="{{ route('suppliers.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-secondary transition mb-2 {{ request()->routeIs('suppliers.*') ? 'bg-secondary' : '' }}">
                            <i class="fas fa-truck"></i>
                            <span>Suppliers</span>
                        </a>

                        <a href="{{ route('reports.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-secondary transition mb-2 {{ request()->routeIs('reports.*') ? 'bg-secondary' : '' }}">
                            <i class="fas fa-chart-bar"></i>
                            <span>Reports</span>
                        </a>
                    @endif

                    <a href="{{ route('movements.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-secondary transition mb-2 {{ request()->routeIs('movements.*') ? 'bg-secondary' : '' }}">
                        <i class="fas fa-exchange-alt"></i>
                        <span>Stock Movements</span>
                    </a>

                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-secondary transition mb-2 {{ request()->routeIs('profile.*') ? 'bg-secondary' : '' }}">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                @endauth
            </nav>

            <div class="p-4 border-t border-secondary">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-secondary transition w-full text-left">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64">
            <div class="p-8">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>