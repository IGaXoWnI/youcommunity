<!-- filepath: resources/views/events/show.blade.php -->
<x-app-layout>
@section('content')
    <div class="bg-gray-50 py-10 min-h-screen">
        <!-- Header section with gradient background -->
        <div class="bg-gradient-to-r from-[#1B2432] to-purple-600 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <!-- Category and date -->
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <span class="px-3 py-1 text-xs font-semibold bg-white/20 backdrop-blur-sm rounded-full">
                                {{ $event->category }}
                            </span>
                            <time class="text-sm text-white/80">
                                {{ \Carbon\Carbon::parse($event->date)->format('l, F j, Y') }}
                            </time>
                        </div>
                        
                        <!-- Event title -->
                        <h1 class="text-3xl font-bold sm:text-4xl text-white">{{ $event->title }}</h1>
                        
                        <!-- Organizer info -->
                        <div class="mt-4 flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full bg-white/10 p-0.5" 
                                     src="https://ui-avatars.com/api/?name={{ urlencode(\App\Models\User::find($event->user_id)->name ?? 'Event Organizer') }}" 
                                     alt="Organizer">
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-[#1B2433]">Organized by {{ \App\Models\User::find($event->user_id)->name ?? 'Event Organizer' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- CTA Buttons -->
                    <div class="flex-shrink-0 flex flex-col sm:flex-row gap-3">
                        @auth
                            @if($event->user_id === auth()->id())
                                <a href="{{ route('events.edit', $event) }}" class="inline-flex justify-center items-center px-6 py-3 bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white text-sm font-medium rounded-lg transition">
                                    <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit Event
                                </a>
                            @else
                                <form action="{{ route('events.rsvp', $event) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                    @if($event->rsvps->contains('user_id', auth()->id()))
                                        <button type="submit" class="w-full inline-flex justify-center items-center px-6 py-3 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition" formaction="{{ route('events.rsvp', ['event' => $event, 'action' => 'cancel']) }}">
                                            Cancel RSVP
                                        </button>
                                    @else
                                        <button type="submit" class="w-full inline-flex justify-center items-center px-6 py-3 bg-white text-indigo-600 text-sm font-medium rounded-lg hover:bg-white/90 transition">
                                            RSVP Now
                                        </button>
                                    @endif
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="w-full inline-flex justify-center items-center px-6 py-3 bg-white text-indigo-600 text-sm font-medium rounded-lg hover:bg-white/90 transition">
                                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                Sign in to RSVP
                            </a>
                        @endauth
                    </div>
                </div>
                
                <!-- Event quick stats -->
                <div class="mt-8 flex flex-wrap gap-6 border-t border-white/20 pt-6 text-white/80">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>{{ \Carbon\Carbon::parse($event->date)->format('F j, Y g:i A') }}</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>{{ $event->location }}</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span>
                            {{ $event->rsvps->count() ?? 0 }} / {{ $event->max_participants ?? '∞' }} Attendees
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content area -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left column: Event details -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Event description -->
                    <div class="bg-white rounded-xl shadow-sm p-8">
                        <h2 class="text-xl font-bold text-[#1B2433] mb-4">About this event</h2>
                        <div class="prose prose-indigo max-w-none">
                            {!! nl2br(e($event->description)) !!}
                        </div>
                    </div>

                    <!-- Location section -->
                    <div class="bg-white rounded-xl shadow-sm p-8">
                        <h2 class="text-xl font-bold text-[#1B2433] mb-4">Location</h2>
                        <div class="flex items-start mb-6">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-medium text-gray-900">{{ $event->location }}</p>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    <!-- Comments section -->
                    <div class="bg-white rounded-xl shadow-sm p-8">
                        <h2 class="text-xl font-bold text-[#1B2433] mb-6">Discussion</h2>
                        
                        @auth
                            <div class="mb-8">
                                <form action="{{ route('comments.store', $event) }}" method="POST">
                                    @csrf
                                    <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Leave a comment</label>
                                    <div class="mt-1 relative">
                                        <textarea id="comment" name="content" rows="3" class="block w-full shadow-sm sm:text-sm rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Share your thoughts..."></textarea>
                                    </div>
                                    <div class="mt-3 flex justify-end">
                                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                            Post Comment
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="bg-gray-50 rounded-lg p-6 text-center mb-8">
                                <p class="text-gray-600">Please <a href="{{ route('login') }}" class="text-indigo-600 font-medium">sign in</a> to join the discussion</p>
                            </div>
                        @endauth
                        
                        <div class="space-y-6">
                            @if(isset($event->comments) && $event->comments->count() > 0)
                                @foreach($event->comments as $comment)
                                    <div class="flex space-x-4">
                                        <div class="flex-shrink-0">
                                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name) }}" alt="{{ $comment->user->name }}">
                                        </div>
                                        <div class="flex-grow">
                                            <div class="bg-gray-50 rounded-lg p-4">
                                                <div class="flex items-center justify-between">
                                                    <h3 class="text-sm font-medium text-gray-900">{{ $comment->user->name }}</h3>
                                                    <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                                </div>
                                                <div class="mt-1 text-sm text-gray-700">
                                                    <p>{{ $comment->content }}</p>
                                                </div>
                                                
                                                @if(auth()->id() === $comment->user_id)
                                                    <div class="mt-2 text-right">
                                                        <form action="{{ route('events.comments.destroy', $comment) }}" method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-xs text-red-500 hover:text-red-600">Delete</button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="flex flex-col items-center justify-center py-12">
                                    <svg class="h-12 w-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                    <p class="mt-2 text-sm text-gray-500">No comments yet. Be the first to start the discussion!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Right sidebar: Event details and participants -->
                <div class="space-y-6">
                    <!-- RSVP stats card -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-semibold text-gray-900">Attendees</h2>
                            <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                                {{ $event->rsvps->count() ?? 0 }} / {{ $event->max_participants ?? '∞' }}
                            </span>
                        </div>
                        
                        <!-- Progress bar -->
                        @if(isset($event->max_participants) && $event->max_participants > 0)
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-4">
                                <div class="bg-indigo-600 h-2 rounded-full" style="width: {{ min(100, ($event->rsvps->count() / max(1, $event->max_participants)) * 100) }}%"></div>
                            </div>
                        @endif
                        
                        <!-- Primary RSVP button -->
                        @auth
                            @if($event->user_id === auth()->id())
                                <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 mb-4">
                                    <p class="text-amber-800 text-sm">This is your event. You can manage it from your dashboard.</p>
                                </div>
                            @elseif($userRsvp = $event->rsvps->where('user_id', auth()->id())->first())
                                <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-4">
                                    <div class="flex items-center">
                                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <p class="text-green-800 text-sm">You're attending this event</p>
                                    </div>
                                </div>
                                <form action="{{ route('events.rsvp', $event) }}" method="POST" class="mb-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full block text-center px-4 py-3 bg-red-600 text-white rounded-lg font-medium hover:bg-red-700 transition">
                                        Cancel RSVP
                                    </button>
                                </form>
                            @elseif($event->rsvps->count() >= $event->max_participants)
                                <div class="bg-gray-100 border border-gray-200 rounded-lg p-4 mb-4">
                                    <p class="text-gray-800 text-sm">This event is fully booked.</p>
                                </div>
                                <button disabled class="w-full block text-center px-4 py-3 bg-gray-400 text-white rounded-lg font-medium cursor-not-allowed mb-4">
                                    Event Full
                                </button>
                            @else
                                <form action="{{ route('events.rsvp', $event) }}" method="POST" class="mb-4">
                                    @csrf
                                    <button type="submit" class="w-full block text-center px-4 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition">
                                        RSVP to Event
                                    </button>
                                </form>
                            @endif
                        @else
                            <div class="mb-4">
                                <a href="{{ route('login') }}" class="w-full block text-center px-4 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition">
                                    Sign in to RSVP
                                </a>
                            </div>
                        @endauth
                        
                        <!-- Attendee list -->
                        <h3 class="text-sm font-medium text-gray-700 mb-3">People attending</h3>
                        <ul class="divide-y divide-gray-200">
                            @if(isset($event->rsvps) && $event->rsvps->count() > 0)
                                @foreach($event->rsvps->take(5) as $rsvp)
                                    <li class="py-2 flex items-center">
                                        <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($rsvp->user->name) }}" alt="{{ $rsvp->user->name }}">
                                        <span class="ml-3 text-sm font-medium text-gray-700">{{ $rsvp->user->name }}</span>
                                        @if($rsvp->user_id == $event->user_id)
                                            <span class="ml-auto inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                                Organizer
                                            </span>
                                        @endif
                                    </li>
                                @endforeach
                                
                                @if($event->rsvps->count() > 5)
                                    <li class="py-2 text-center text-sm text-indigo-600 font-medium">
                                        +{{ $event->rsvps->count() - 5 }} more attendees
                                    </li>
                                @endif
                            @else
                                <li class="py-3 text-center text-gray-500 text-sm">No attendees yet</li>
                            @endif
                        </ul>
                    </div>
                    
                    <!-- Share event section -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Share this event</h2>
                        <div class="grid grid-cols-2 gap-3 mb-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                </svg>
                                Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($event->title) }}&url={{ urlencode(request()->url()) }}" target="_blank" class="flex items-center justify-center px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white text-sm font-medium rounded-lg">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                                Twitter
                            </a>
                        </div>
                        <button type="button" onclick="navigator.clipboard.writeText(window.location.href); alert('Link copied to clipboard!');" class="w-full flex items-center justify-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-medium rounded-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            Copy Link
                        </button>
                    </div>
                    
                    <!-- Return to events -->
                    <a href="{{ route('events.index') }}" class="block w-full text-center text-sm text-gray-600 hover:text-gray-900">
                        ← Back to all events
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize map using Leaflet
            if (typeof L !== 'undefined') {
                // Use geocoding to get coordinates from location string, or use default coordinates
                const map = L.map('map').setView([48.8566, 2.3522], 13); // Default to Paris
                
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
                
                // Add marker for the event location
                L.marker([48.8566, 2.3522]).addTo(map)
                    .bindPopup("{{ $event->location }}")
                    .openPopup();
                
                // You would ideally use a geocoding service to convert the location string to coordinates
                // Example: use Nominatim API or Google Maps Geocoding API
            }
        });
    </script>
    @endpush
    @endsection 
</x-app-layout>