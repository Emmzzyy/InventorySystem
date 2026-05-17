@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-primary">Add Supplier</h1>
        <p class="text-gray-600">Add a new supplier to your network</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-xl shadow-sm p-8">
        <form action="{{ route('suppliers.store') }}"
              method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Company Name -->
                <div class="md:col-span-2">
                    <label for="company_name" class="block text-sm font-medium text-gray-700 mb-2">Company Name</label>
                    <input type="text" 
                           id="company_name"
                           name="company_name" 
                           value="{{ old('company_name') }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
                           placeholder="Enter company name">
                    @error('company_name')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Contact Person -->
                <div>
                    <label for="contact_person" class="block text-sm font-medium text-gray-700 mb-2">Contact Person</label>
                    <input type="text" 
                           id="contact_person"
                           name="contact_person" 
                           value="{{ old('contact_person') }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
                           placeholder="Enter contact person">
                    @error('contact_person')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                    <input type="text" 
                           id="phone"
                           name="phone" 
                           value="{{ old('phone') }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
                           placeholder="Enter phone number">
                    @error('phone')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" 
                           id="email"
                           name="email" 
                           value="{{ old('email') }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
                           placeholder="Enter email address">
                    @error('email')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div class="md:col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                    <textarea id="address"
                              name="address" 
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
                              placeholder="Enter address">{{ old('address') }}</textarea>
                    @error('address')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-8 flex gap-4">
                <button type="submit" 
                        class="bg-accent text-primary font-semibold px-6 py-2 rounded-lg hover:bg-white transition duration-200 shadow-lg">
                    <i class="fas fa-save mr-2"></i>Save Supplier
                </button>
                <a href="{{ route('suppliers.index') }}" 
                   class="bg-gray-200 text-gray-700 font-semibold px-6 py-2 rounded-lg hover:bg-gray-300 transition duration-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection