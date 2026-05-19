@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-3xl font-bold text-primary">Settings</h1>
    </div>

    <div class="max-w-2xl space-y-6">
        <!-- Profile Information Section -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-xl font-bold text-primary mb-4">Profile Information</h2>
            @include('profile.partials.update-profile-information-form')
        </div>

        <!-- Update Password Section -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-xl font-bold text-primary mb-4">Update Password</h2>
            @include('profile.partials.update-password-form')
        </div>

        <!-- Delete Account Section -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-red-200">
            <h2 class="text-xl font-bold text-red-600 mb-4">Delete Account</h2>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
