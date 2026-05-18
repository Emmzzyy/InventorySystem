<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Inventory Management System</title>
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
<body class="min-h-screen flex">
    <!-- Left Side - Branding -->
    <div class="w-1/2 bg-white flex flex-col justify-center items-center p-12">
        <div class="text-center">
            <div class="mb-8">
                <i class="fas fa-boxes text-7xl text-primary"></i>
            </div>
            <h1 class="text-5xl font-bold text-primary mb-4">Inventory Pro</h1>
            <p class="text-xl text-secondary">Smart Inventory Management System</p>
        </div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="w-1/2 bg-primary flex flex-col justify-center items-center p-12">
        <div class="w-full max-w-md">
            <h2 class="text-4xl font-bold text-white mb-2">Sign In</h2>
            <p class="text-accent mb-8">Access your inventory dashboard</p>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 bg-secondary text-white px-4 py-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6">
                    <label for="email" class="block text-white text-sm font-medium mb-2">Email Address</label>
                    <input id="email" 
                           type="email" 
                           name="email" 
                           :value="old('email')" 
                           required 
                           autofocus 
                           autocomplete="username"
                           class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
                           placeholder="Enter your email">
                    @error('email')
                        <p class="mt-2 text-accent text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-white text-sm font-medium mb-2">Password</label>
                    <input id="password" 
                           type="password" 
                           name="password" 
                           required 
                           autocomplete="current-password"
                           class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/30 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
                           placeholder="Enter your password">
                    @error('password')
                        <p class="mt-2 text-accent text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" 
                               name="remember" 
                               class="rounded border-white/30 text-accent shadow-sm focus:ring-accent bg-white/10">
                        <span class="ml-2 text-white text-sm">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-accent text-sm hover:underline">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Sign In Button -->
                <button type="submit" 
                        class="w-full bg-accent text-primary font-bold py-3 px-4 rounded-lg hover:bg-white transition duration-200 shadow-lg">
                    Sign In
                </button>
            </form>

            <!-- Register Link -->
            <div class="mt-6 text-center">
                <p class="text-white/80 text-sm">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-accent font-bold hover:underline">
                        Register here
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>