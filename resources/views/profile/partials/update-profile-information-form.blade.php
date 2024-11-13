<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="w-24">
            <!-- Avatar Image -->
            <label for="avatar" class="relative cursor-pointer">
                @if ($user->avatar)
                    <img src="{{ asset('storage/avatar/' . $user->avatar) }}" alt="{{ $user->avatar }}"
                        class="w-20 h-20 rounded-full object-cover">

                    <!-- Button SVG Ikon Ganti Logo -->
                    <div class="w-8 absolute -top-4 right-0 text-white rounded-full">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAACXBIWXMAAAsTAAALEwEAmpwYAAADE0lEQVR4nO2bz4tOURjHzySUt5hkLGjGsJhXNiMWY2dhQzYUCxYzK7NhYoGNkvxI/AFkYYUSUupNZGNkM4rZ0JS8SKb8qEExRslHJ2f0Os593/v7PPftfuvunufpfL73Oefc2z1XqVKl2kLAOuAMMApMAOPAFWA3MF+1q4Au4Cbwi2C9BraodhPQB7wknLRB+1S7CKgCkyHhG03YHKZ4B7AROAqcAy7kcJ0GehPCTwMXgQPAqYDu0NNhXrPi/cBj/OgtUIkJr2GrVmwFuOqI3RVUfAD4il8NxIRfEZBTcXTCZVfgAuANfvUBWJgWfEPuCSvniStor6P4R+AWcC2H6zywJm14kz9i5U24gm7bQcBi5VlJ4U0NvTA2atQV9MwKOqzaA17X+G7ln3UF1q2gYVV8+B4Hl9Za0QbQHL4nIfyNoIS6BAMyhn8FLBVrANnC67p9zRLrPg0wLzaTAY+uK0PW6AZeOGq8C9piRRjgHd6nASLgfRkgBt6HAaLg8zZAHHyeBoiEz8sAsfB5GCAaPmsDxMNnaUAh4LMyoDDwWRhQKPi0DSgcfJoGtIDvFQmflgEaMAC+ntL7fDUgZz3wFPgEHIk67jQNuB4A350VvMkbs+L7czcA6ARmEsB3x4E3uVNWzo4oY0/LgEHHl9hq1vABBuyMMva0DKhZ+WN5LXjeDcDd/gfzWu0lGDDkgFiV11YnwYBalPZPe5/3agDu9j/UJH51kgVPogFDrdrf7O/7gYcBp7kSPeH5NqDmav8Q0KnAezUAWORof/1U9ohwit32UgwYJJ5+6K+0YV+OJBtQiwD900wHPS264sKKMYA/ZwmnQ9zpmlkoO5NASjRgDvDeF7SUKbDNnCSbyRta0jbYAcxVHuX9Udi3SgMoO2CqnAL/qlwDVIyF5Lnl4ogqgMwuZB/x3x6n0AOryB1VAAGb+F8b4hQ67ih01xw1HxZ66d9svlhj/tz0l5gmBiwDvlF8nYwMPyvjapE13uqfo5YC9hS0E+4BSxLBzwpYDhwD7pvdoS700nf8ErD17+BLlVJR9BsgrqCGWtNf+gAAAABJRU5ErkJggg=="
                            alt="external-edit-mintab-for-ios-becris-lineal-becris">
                    </div>
                @else
                    <img src="{{ asset('asset/default-profile.png') }}" alt="{{ $user->avatar }}"
                        class="w-20 h-20 rounded-full object-cover">

                    <!-- Button SVG Ikon Ganti Logo -->
                    <div class="w-8 absolute -top-4 right-0 text-white rounded-full">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAACXBIWXMAAAsTAAALEwEAmpwYAAADE0lEQVR4nO2bz4tOURjHzySUt5hkLGjGsJhXNiMWY2dhQzYUCxYzK7NhYoGNkvxI/AFkYYUSUupNZGNkM4rZ0JS8SKb8qEExRslHJ2f0Os593/v7PPftfuvunufpfL73Oefc2z1XqVKl2kLAOuAMMApMAOPAFWA3MF+1q4Au4Cbwi2C9BraodhPQB7wknLRB+1S7CKgCkyHhG03YHKZ4B7AROAqcAy7kcJ0GehPCTwMXgQPAqYDu0NNhXrPi/cBj/OgtUIkJr2GrVmwFuOqI3RVUfAD4il8NxIRfEZBTcXTCZVfgAuANfvUBWJgWfEPuCSvniStor6P4R+AWcC2H6zywJm14kz9i5U24gm7bQcBi5VlJ4U0NvTA2atQV9MwKOqzaA17X+G7ln3UF1q2gYVV8+B4Hl9Za0QbQHL4nIfyNoIS6BAMyhn8FLBVrANnC67p9zRLrPg0wLzaTAY+uK0PW6AZeOGq8C9piRRjgHd6nASLgfRkgBt6HAaLg8zZAHHyeBoiEz8sAsfB5GCAaPmsDxMNnaUAh4LMyoDDwWRhQKPi0DSgcfJoGtIDvFQmflgEaMAC+ntL7fDUgZz3wFPgEHIk67jQNuB4A350VvMkbs+L7czcA6ARmEsB3x4E3uVNWzo4oY0/LgEHHl9hq1vABBuyMMva0DKhZ+WN5LXjeDcDd/gfzWu0lGDDkgFiV11YnwYBalPZPe5/3agDu9j/UJH51kgVPogFDrdrf7O/7gYcBp7kSPeH5NqDmav8Q0KnAezUAWORof/1U9ohwit32UgwYJJ5+6K+0YV+OJBtQiwD900wHPS264sKKMYA/ZwmnQ9zpmlkoO5NASjRgDvDeF7SUKbDNnCSbyRta0jbYAcxVHuX9Udi3SgMoO2CqnAL/qlwDVIyF5Lnl4ogqgMwuZB/x3x6n0AOryB1VAAGb+F8b4hQ67ih01xw1HxZ66d9svlhj/tz0l5gmBiwDvlF8nYwMPyvjapE13uqfo5YC9hS0E+4BSxLBzwpYDhwD7pvdoS700nf8ErD17+BLlVJR9BsgrqCGWtNf+gAAAABJRU5ErkJggg=="
                            alt="external-edit-mintab-for-ios-becris-lineal-becris">
                    </div>
                @endif

            </label>

            <!-- Hidden File Input -->
            <input type="file" name="avatar" id="avatar" class="hidden" />

            <!-- Error Message -->
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div>
            <x-input-label for="nama" :value="__('nama')" />
            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" :value="old('nama', $user->nama)"
                required autofocus autocomplete="nama" />
            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
<script>
    document.getElementById('avatar').addEventListener('change', function(event) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('label img').src = e.target.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>
