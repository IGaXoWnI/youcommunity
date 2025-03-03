@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl">
            <!-- Header with gradient -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-6">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-white">Edit Event</h1>
                    <a href="{{ route('events.index') }}" class="inline-flex items-center px-3 py-1.5 text-sm border border-white/30 rounded-lg text-white hover:bg-white/10 transition-colors">
                        <svg class="h-4 w-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Events
                    </a>
                </div>
                <p class="mt-1 text-white/80 text-sm">Update your event details</p>
            </div>
            
            <!-- Form content -->
            <div class="p-8">
                <form action="{{ route('events.update', $event->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT') <!-- Specify the method as PUT for updating -->

                    <!-- Event title field -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Event Title <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="title" id="title" 
                                  class="pl-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('title') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                  placeholder="Enter a memorable event title"
                                  value="{{ old('title', $event->title) }}" required>
                        </div>
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Event description field -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-1">
                            <textarea id="description" name="description" rows="4"
                                     class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('description') border-red-300 @enderror"
                                     placeholder="Describe your event, what attendees can expect, and any other important details"
                                     required>{{ old('description', $event->description) }}</textarea>
                        </div>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Event date and location section -->
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <!-- Event date field -->
                        <div class="sm:col-span-3">
                            <label for="date" class="block text-sm font-medium text-gray-700">
                                Date <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-1">
                                <input type="date" name="date" id="date" 
                                      class="focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('date') border-red-300 @enderror"
                                      value="{{ old('date', $event->date) }}" required>
                            </div>
                            @error('date')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Event location field -->
                        <div class="sm:col-span-3">
                            <label for="location" class="block text-sm font-medium text-gray-700">
                                Location <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-1">
                                <input type="text" name="location" id="location" 
                                      class="focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('location') border-red-300 @enderror"
                                      placeholder="Where will the event take place?"
                                      value="{{ old('location', $event->location) }}" required>
                            </div>
                            @error('location')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Form actions -->
                    <div class="pt-5 border-t border-gray-200">
                        <div class="flex justify-end">
                            <a href="{{ route('events.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 mr-3 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Update Event
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 