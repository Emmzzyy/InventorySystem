@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-primary">Categories</h1>
            <p class="text-gray-600">Manage product categories</p>
        </div>
        <a href="{{ route('categories.create') }}" 
           class="bg-accent text-primary font-semibold px-6 py-2 rounded-lg hover:bg-white transition duration-200 shadow-lg">
            <i class="fas fa-plus mr-2"></i>Add Category
        </a>
    </div>

    <!-- Categories Table -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">ID</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Name</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr class="border-b border-gray-100">
                        <td class="py-3 px-4 text-gray-600">{{ $category->id }}</td>
                        <td class="py-3 px-4">
                            <p class="font-semibold text-gray-800">{{ $category->name }}</p>
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex gap-2">
                                <a href="{{ route('categories.edit', $category->id) }}" 
                                   class="text-secondary hover:text-primary transition">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($categories->hasPages())
            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
</div>
@endsection