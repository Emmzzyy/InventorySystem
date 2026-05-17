<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Inventory Management System</title>
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
            <p class="text-gray-600 mt-4">Streamline your inventory tracking with our professional solution</p>
        </div>
    </div>

    <!-- Right Side - Welcome Actions -->
    <div class="w-1/2 bg-primary flex flex-col justify-center items-center p-12">
        <div class="w-full max-w-md text-center">
            <h2 class="text-4xl font-bold text-white mb-4">Welcome</h2>
            <p class="text-accent text-lg mb-8">Please log in or register to access your inventory dashboard</p>

            <div class="space-y-4">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" 
                       class="block w-full bg-accent text-primary font-bold py-4 px-6 rounded-lg hover:bg-white transition duration-200 shadow-lg text-center">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Log In
                    </a>
                @endif
                
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" 
                       class="block w-full bg-transparent border-2 border-accent text-accent font-bold py-4 px-6 rounded-lg hover:bg-accent hover:text-primary transition duration-200 text-center">
                        <i class="fas fa-user-plus mr-2"></i>
                        Register
                    </a>
                @endif
            </div>

            <div class="mt-12 grid grid-cols-3 gap-4 text-white/90">
                <div class="text-center">
                    <i class="fas fa-chart-line text-2xl mb-2"></i>
                    <p class="text-sm">Real-time Analytics</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-shield-alt text-2xl mb-2"></i>
                    <p class="text-sm">Secure Data</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-users text-2xl mb-2"></i>
                    <p class="text-sm">Role-based Access</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>