<form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
    @csrf
    @method('delete')

    <p class="text-sm text-gray-600 mb-4">
        Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
    </p>

    <div>
        <label for="delete_password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input
            id="delete_password"
            name="password"
            type="password"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
            autocomplete="current-password"
            required
        >
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button
        type="submit"
        class="bg-red-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-red-700 transition"
    >
        Delete Account
    </button>
</form>
