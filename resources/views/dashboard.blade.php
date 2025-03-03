<!-- resources/views/events/browse.blade.php -->
@extends('layouts.app')

@section('styles')
<style>
    /* Custom cursor styles */
    body.premium-cursor {
        cursor: none;
    }
    .custom-cursor {
        position: fixed;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.5);
        border: 1px solid #b48c42;
        transform: translate(-50%, -50%);
        pointer-events: none;
        z-index: 9999;
        transition: width 0.3s, height 0.3s, background-color 0.3s;
    }
    .custom-cursor.hover {
        width: 40px;
        height: 40px;
        background-color: rgba(180, 140, 66, 0.1);
        border: 1px solid #b48c42;
    }
    .cursor-dot {
        position: fixed;
        width: 4px;
        height: 4px;
        background-color: #b48c42;
        border-radius: 50%;
        transform: translate(-50%, -50%);
        pointer-events: none;
        z-index: 10000;
    }
</style>
@endsection

@section('content')
<!-- Custom cursor elements -->
<div class="custom-cursor" id="custom-cursor"></div>
<div class="cursor-dot" id="cursor-dot"></div>

<!-- Header Section -->
<div class="relative bg-gradient-to-r from-gray-900 to-gray-800 text-white">
    <div class="mx-auto max-w-7xl px-6 py-24">
        <h1 class="font-serif text-5xl font-light tracking-tight mb-6">Discover Exceptional <span class="text-amber-300 font-normal">Events</span></h1>
        <p class="text-gray-300 max-w-2xl text-lg">Explore curated experiences tailored to your refined tastes and preferences.</p>
    </div>
    
    <!-- Overlay decorative element -->
    <div class="absolute right-0 top-0 w-1/3 h-full opacity-10">
        <svg viewBox="0 0 200 800" xmlns="http://www.w3.org/2000/svg">
            <path d="M30,200 Q80,100 150,250 T300,300 Q400,500 100,700" stroke="#b48c42" stroke-width="2" fill="none"/>
            <circle cx="30" cy="200" r="4" fill="#b48c42"/>
            <circle cx="150" cy="250" r="4" fill="#b48c42"/>
            <circle cx="300" cy="300" r="4" fill="#b48c42"/>
            <circle cx="100" cy="700" r="4" fill="#b48c42"/>
        </svg>
    </div>
</div>

<!-- Search and Filters Section -->
<div class="sticky top-0 z-40 bg-white/80 backdrop-blur-md border-b border-gray-200 shadow-sm">
    <div class="mx-auto max-w-7xl px-6 py-4">
        <div class="flex flex-col md:flex-row items-center gap-4">
            <!-- Search Bar -->
            <div class="relative flex-1 w-full">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                </div>
                <input type="text" class="block w-full pl-10 pr-3 py-3 border-0 ring-1 ring-gray-300 bg-white/50 text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-amber-300 rounded-xl" placeholder="Search events, locations, or categories...">
            </div>
            
            <!-- Filters -->
            <div class="flex space-x-2">
                <button class="filter-button flex items-center space-x-2 px-4 py-3 text-gray-700 bg-white ring-1 ring-gray-300 rounded-xl hover:bg-gray-50 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Date</span>
                </button>
                
                <button class="filter-button flex items-center space-x-2 px-4 py-3 text-gray-700 bg-white ring-1 ring-gray-300 rounded-xl hover:bg-gray-50 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Location</span>
                </button>
                
                <button class="filter-button flex items-center space-x-2 px-4 py-3 text-gray-700 bg-white ring-1 ring-gray-300 rounded-xl hover:bg-gray-50 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    <span>Filters</span>
                </button>
                
                <button class="filter-button flex items-center space-x-2 px-4 py-3 text-white bg-gray-900 rounded-xl hover:bg-gray-800 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                    </svg>
                    <span>Map View</span>
                </button>
            </div>
        </div>
        
        <!-- Active filters -->
        <div class="flex flex-wrap gap-2 mt-3">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs bg-amber-100 text-amber-800">
                This Weekend
                <button class="ml-1 text-amber-600 hover:text-amber-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </span>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs bg-amber-100 text-amber-800">
                Within 5km
                <button class="ml-1 text-amber-600 hover:text-amber-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </span>
        </div>
    </div>
</div>

<!-- Main content -->
<div class="bg-gray-50 min-h-screen">
    <div class="mx-auto max-w-7xl px-6 py-12">
        <!-- Section heading -->
        <div class="flex justify-between items-center mb-10">
            <div>
                <h2 class="font-serif text-3xl font-light text-gray-900">Featured Events</h2>
                <p class="text-gray-500 mt-1">Discover extraordinary experiences near you</p>
            </div>
            <div class="flex items-center space-x-2">
                <span class="text-sm text-gray-500">View:</span>
                <button class="p-2 bg-white rounded-md shadow-sm active">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                </button>
                <button class="p-2 bg-white rounded-md shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Events Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($events as $event)
            <a href="{{ route('events.show', $event) }}" class="event-card group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                <div class="relative">
                    <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="w-full h-56 object-cover">
                    <div class="absolute top-4 right-4">
                        <button class="p-2 bg-white rounded-full shadow-md hover:bg-gray-100 transition-colors bookmark-button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                        </button>
                    </div>
                    <div class="absolute bottom-4 left-4">
                        <span class="px-3 py-1 bg-amber-500 text-white text-xs uppercase tracking-wider rounded-full">{{ $event->category }}</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-serif text-xl font-medium text-gray-900 group-hover:text-amber-600 transition-colors">{{ $event->title }}</h3>
                    </div>
                    <div class="flex items-center text-gray-500 text-sm mb-4">
                        <span>{{ $event->date }} · {{ $event->time }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-gray-500 text-sm">
                            <span>{{ $event->location }}</span>
                        </div>
                        <span class="text-xs text-gray-400">{{ $event->distance }} away</span>
                    </div>
                    <div class="mt-6 pt-6 border-t border-gray-100 flex justify-between items-center">
                        <div>
                            <span class="text-xs text-gray-500">{{ $event->spots_left }} spots left</span>
                            <div class="w-24 h-1 bg-gray-100 rounded-full mt-1">
                                <div class="w-{{ $event->spots_left_percentage }} h-1 bg-amber-500 rounded-full"></div>
                            </div>
                        </div>
                        <button class="px-4 py-2 bg-gray-900 text-white text-sm rounded-lg hover:bg-gray-800 transition-colors">RSVP</button>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            <nav class="flex items-center space-x-2">
                <button class="p-2 rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button class="px-4 py-2 rounded-lg bg-amber-500 text-white">1</button>
                <button class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-50">2</button>
                <button class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-50">3</button>
                <span class="px-4 py-2 text-gray-500">...</span>
                <button class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-50">12</button>
                <button class="p-2 rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </nav>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Enable custom cursor
        document.body.classList.add('premium-cursor');
        
        const cursor = document.getElementById('custom-cursor');
        const cursorDot = document.getElementById('cursor-dot');
        
        document.addEventListener('mousemove', function(e) {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
            
            cursorDot.style.left = e.clientX + 'px';
            cursorDot.style.top = e.clientY + 'px';
        });
        
        // Add hover effect to interactive elements
        const interactiveElements = document.querySelectorAll('button, .event-card, a, input, .filter-button, .bookmark-button');
        
        interactiveElements.forEach(element => {
            element.addEventListener('mouseenter', function() {
                cursor.classList.add('hover');
            });
            
            element.addEventListener('mouseleave', function() {
                cursor.classList.remove('hover');
            });
        });
        
        // Filter button animations
        const filterButtons = document.querySelectorAll('.filter-button');
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                this.classList.toggle('bg-amber-50');
                this.classList.toggle('ring-amber-300');
            });
        });
        
        // Bookmark button interaction
        const bookmarkButtons = document.querySelectorAll('.bookmark-button');
        bookmarkButtons.forEach(button => {
            button.addEventListener('click', function() {
                const svg = this.querySelector('svg');
                if (svg.classList.contains('text-gray-400')) {
                    svg.classList.remove('text-gray-400');
                    svg.classList.add('text-amber-600');
                    svg.setAttribute('fill', 'currentColor');
                } else {
                    svg.classList.remove('text-amber-600');
                    svg.classList.add('text-gray-400');
                    svg.setAttribute('fill', 'none');
                }
            });
        });
    });
</script>
@endsection