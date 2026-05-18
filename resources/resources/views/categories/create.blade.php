@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-primary">Add Category</h1>
        <p class="text-gray-600">Create a new product category</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-xl shadow-sm p-8">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                <input type="text" 
                       id="name"
                       name="name" 
                       value="{{ old('name') }}"
                       required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
                       placeholder="Enter category name">
                @error('name')
                    <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-6 flex gap-4">
                <button type="submit" 
                        class="bg-accent text-primary font-semibold px-6 py-2 rounded-lg hover:bg-white transition duration-200 shadow-lg">
                    <i class="fas fa-save mr-2"></i>Save Category
                </button>
                <a href="{{ route('categories.index') }}" 
                   class="bg-gray-200 text-gray-700 font-semibold px-6 py-2 rounded-lg hover:bg-gray-300 transition duration-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection