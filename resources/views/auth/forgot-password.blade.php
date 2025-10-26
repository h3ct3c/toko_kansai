@include('layout.header')

<div class="min-h-screen flex flex-col items-center pt-10 pb-10 sm:justify-center bg-gray-50">

    <div class="w-full sm:max-w-md p-8 bg-white rounded-2xl shadow-2xl transition duration-500 hover:shadow-3xl">
        <h2 class="text-3xl font-bold text-blue-900 mb-6 text-center">
            Forgot Password
        </h2>

        <div class="mb-6 text-sm text-gray-700">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <x-auth-session-status class="mb-4 text-green-700 bg-green-100 p-3 rounded-lg" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="space-y-2">
                <label for="email" class="block text-sm font-semibold text-gray-700">Email Address</label>
                <input id="email" 
                       class="w-full p-3 border-2 border-gray-300 rounded-xl focus:border-blue-900 focus:ring-1 focus:ring-blue-900 transition duration-150" 
                       type="email" 
                       name="email" 
                       :value="old('email')" 
                       required 
                       autofocus 
                       placeholder="youremail@domain.com"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
            </div>

            <div class="mt-6">
                <button type="submit" 
                        class="w-full py-3 px-4 border border-transparent rounded-xl text-lg font-semibold text-white bg-blue-900 shadow-md hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300"
                >
                    Email Password Reset Link
                </button>
            </div>
            
            <div class="mt-4 text-center">
                <a href="{{ route('login') }}" class="text-sm text-blue-700 hover:text-blue-900 font-medium">
                    <span aria-hidden="true">&larr;</span> Back to Login Page
                </a>
            </div>
        </form>
    </div>
</div>  

@include('layout.footer')