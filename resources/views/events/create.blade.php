@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl">
            <!-- Header with gradient -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-6">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-white">Create New Event</h1>
                    <a href="{{ route('events.index') }}" class="inline-flex items-center px-3 py-1.5 text-sm border border-white/30 rounded-lg text-white hover:bg-white/10 transition-colors">
                        <svg class="h-4 w-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Events
                    </a>
                </div>
                <p class="mt-1 text-white/80 text-sm">Share your event with the community</p>
            </div>
            
            <!-- Form content -->
            <div class="p-8">
                <form action="{{ route('events.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Event title field -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Event Title <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                            </div>
                            <input type="text" name="title" id="title" 
                                  class="pl-10 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('title') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                  placeholder="Enter a memorable event title"
                                  value="{{ old('title') }}" required>
                        </div>
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-sm text-gray-500">Choose a clear, descriptive title for your event</p>
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
                                     required>{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-sm text-gray-500">Include all the details participants need to know</p>
                    </div>
                    
                    <!-- Event date and location section -->
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <!-- Event date field -->
                        <div class="sm:col-span-3">
                            <label for="date" class="block text-sm font-medium text-gray-700">
                                Date <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input type="date" name="date" id="date" 
                                      class="pl-10 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('date') border-red-300 @enderror"
                                      value="{{ old('date') ?: date('Y-m-d') }}" required>
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
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <input type="text" name="location" id="location" 
                                      class="pl-10 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('location') border-red-300 @enderror"
                                      placeholder="Where will the event take place?"
                                      value="{{ old('location') }}" required>
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
                                <svg class="h-5 w-5 mr-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Create Event
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Tips card -->
        <div class="mt-6 bg-white rounded-xl shadow-sm p-6 border-l-4 border-indigo-500">
            <h3 class="text-sm font-medium text-gray-900">Tips for Creating a Great Event</h3>
            <div class="mt-2 text-sm text-gray-500">
                <ul class="list-disc pl-5 space-y-1">
                    <li>Be specific with your event title so people know what to expect</li>
                    <li>Include all important details in the description (what to bring, dress code, etc.)</li>
                    <li>Double-check your location and provide clear directions if needed</li>
                    <li>Set the correct date and time to avoid confusion</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection