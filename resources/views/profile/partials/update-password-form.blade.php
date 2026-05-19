<form method="post" action="{{ route('password.update') }}" class="space-y-4">
    @csrf
    @method('put')

    <p class="text-sm text-gray-600 mb-4">
        Ensure your account is using a long, random password to stay secure.
    </p>

    <div>
        <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
        <input
            id="current_password"
            name="current_password"
            type="password"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
            autocomplete="current-password"
            required
        >
        @error('current_password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
        <input
            id="password"
            name="password"
            type="password"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
            autocomplete="new-password"
            required
        >
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
        <input
            id="password_confirmation"
            name="password_confirmation"
            type="password"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
            autocomplete="new-password"
            required
        >
        @error('password_confirmation')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button
        type="submit"
        class="bg-accent text-primary font-semibold py-2 px-6 rounded-lg hover:bg-accent/80 transition"
    >
        Save
    </button>

    @if (session('status') === 'password-updated')
        <p class="text-green-600 text-sm mt-2">Password updated successfully.</p>
    @endif
</form>
