<x-app-layout>
    <div class="min-h-screen bg-[#0A1832]">
        <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-white">Welcome back, {{ Auth::user()->name }}! 👋</h2>
                <p class="mt-2 text-gray-400">Here's what's happening with your courses today.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white/5 border border-white/10 rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-medium text-white">Current Course</h3>
                        <span class="px-3 py-1 text-xs font-medium bg-indigo-500/20 text-indigo-300 rounded-full">In Progress</span>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-4">Web Development</h4>
                    <div class="w-full bg-white/5 rounded-full h-1.5 mb-3">
                        <div class="bg-indigo-500 h-1.5 rounded-full" style="width: 75%"></div>
                    </div>
                    <p class="text-gray-400 text-sm">75% Completed</p>
                </div>

                <div class="bg-white/5 border border-white/10 rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-medium text-white">Next Class</h3>
                        <span class="px-3 py-1 text-xs font-medium bg-emerald-500/20 text-emerald-300 rounded-full">Today</span>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-4">JavaScript Basics</h4>
                    <p class="text-gray-400 mb-6">Starting in 2 hours</p>
                    <button class="w-full px-4 py-2.5 bg-indigo-500 hover:bg-indigo-600 text-white rounded-xl transition">
                        Join Class
                    </button>
                </div>

                <div class="bg-white/5 border border-white/10 rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-medium text-white">Your Stats</h3>
                        <span class="px-3 py-1 text-xs font-medium bg-purple-500/20 text-purple-300 rounded-full">This Week</span>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-400">Completed Lessons</span>
                                <span class="text-white">12</span>
                            </div>
                            <div class="w-full bg-white/5 rounded-full h-1.5">
                                <div class="bg-purple-500 h-1.5 rounded-full" style="width: 80%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-400">Quiz Score</span>
                                <span class="text-white">95%</span>
                            </div>
                            <div class="w-full bg-white/5 rounded-full h-1.5">
                                <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 95%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 bg-white/5 border border-white/10 rounded-2xl p-6">
                <h3 class="text-xl font-semibold text-white mb-6">Recent Activity</h3>
                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="h-2 w-2 bg-emerald-400 rounded-full"></div>
                        <div>
                            <p class="text-sm font-medium text-white">Completed Python Basics Quiz</p>
                            <p class="text-sm text-gray-400">Score: 95/100 • 2 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="h-2 w-2 bg-blue-400 rounded-full"></div>
                        <div>
                            <p class="text-sm font-medium text-white">Started New Course: Web Development</p>
                            <p class="text-sm text-gray-400">4 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="h-2 w-2 bg-purple-400 rounded-full"></div>
                        <div>
                            <p class="text-sm font-medium text-white">Earned Achievement: Quick Learner</p>
                            <p class="text-sm text-gray-400">6 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
