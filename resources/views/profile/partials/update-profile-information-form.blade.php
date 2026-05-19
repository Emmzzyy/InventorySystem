<form method="post" action="{{ route('profile.update') }}" class="space-y-4">
    @csrf
    @method('patch')

    <p class="text-sm text-gray-600 mb-4">
        Update your account's profile information and email address.
    </p>

    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
        <input
            id="name"
            name="name"
            type="text"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
            value="{{ old('name', $user->name) }}"
            required
            autofocus
            autocomplete="name"
        >
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input
            id="email"
            name="email"
            type="email"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
            value="{{ old('email', $user->email) }}"
            required
            autocomplete="username"
        >
        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-2">
                <p class="text-sm text-gray-800">
                    Your email address is unverified.
                    <form method="post" action="{{ route('verification.send') }}" class="inline">
                        @csrf
                        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                            Click here to re-send the verification email.
                        </button>
                    </form>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 text-sm text-green-600">
                        A new verification link has been sent to your email address.
                    </p>
                @endif
            </div>
        @endif
    </div>

    <button
        type="submit"
        class="bg-accent text-primary font-semibold py-2 px-6 rounded-lg hover:bg-accent/80 transition"
    >
        Save
    </button>

    @if (session('status') === 'profile-updated')
        <p class="text-green-600 text-sm mt-2">Profile updated successfully.</p>
    @endif
</form>
