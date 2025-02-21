<x-guest-layout>
    <div class="min-h-screen bg-[#0f172a] flex items-center justify-center p-4">
        <div class="w-full max-w-lg">
            <div class="bg-[#1e293b] rounded-3xl p-8 backdrop-blur-xl border border-gray-800">
                <div class="mb-10">
                    <img src="https://youcode.ma/images/logo.svg" alt="YouCode" class="h-12 mx-auto mb-3">
                    <h1 class="text-3xl font-bold text-center text-white">Create your account</h1>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf
                    
                    <div class="space-y-4">
                        <div>
                            <input type="text" name="name" id="name" :value="old('name')" class="w-full px-4 py-3 bg-[#0f172a] rounded-xl border border-gray-800 text-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" placeholder="Full name" required>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <input type="email" name="email" id="email" :value="old('email')" class="w-full px-4 py-3 bg-[#0f172a] rounded-xl border border-gray-800 text-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" placeholder="Email address" required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div>
                            <input type="password" name="password" id="password" class="w-full px-4 py-3 bg-[#0f172a] rounded-xl border border-gray-800 text-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" placeholder="Password" required>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-3 bg-[#0f172a] rounded-xl border border-gray-800 text-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" placeholder="Confirm password" required>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-indigo-500 text-white py-3 px-4 rounded-xl hover:bg-indigo-600 transition duration-200">
                        Create account
                    </button>

                    <div class="relative my-8">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-800"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-[#1e293b] text-gray-400">or</span>
                        </div>
                    </div>

                    <p class="text-center text-gray-400">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-indigo-500 hover:text-indigo-400">
                            Sign in
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
