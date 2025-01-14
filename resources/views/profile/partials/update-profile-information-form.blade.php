<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profiel Informatie Bijwerken') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Zorg ervoor dat je account up-to-date is met de juiste informatie.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Naam -->
        <div>
            <x-input-label for="name" :value="__('Naam')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', Auth::user()->name)" />
            <x-input-error :messages="$errors->updateProfileInformation->get('name')" class="mt-2" />
        </div>

        <!-- E-mail -->
        <div>
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', Auth::user()->email)" />
            <x-input-error :messages="$errors->updateProfileInformation->get('email')" class="mt-2" />
        </div>

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', Auth::user()->username)" required />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Over Mij -->
        <div class="mt-4">
            <x-input-label for="about_me" :value="__('Over mij')" />
            <textarea id="about_me" name="about_me" class="mt-1 block w-full" rows="4">{{ old('about_me', Auth::user()->about_me) }}</textarea>
            <x-input-error :messages="$errors->get('about_me')" class="mt-2" />
        </div>

        <!-- Verjaardag -->
        <div class="mt-4">
            <x-input-label for="birthday" :value="__('Verjaardag')" />
            <x-text-input id="birthday" name="birthday" type="date" class="mt-1 block w-full" :value="old('birthday', Auth::user()->birthday)" />
            <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
        </div>

        <!-- Profielfoto -->
        <div class="mt-4">
        <x-input-label for="profile_photo" :value="__('Profielfoto')" />
        <x-text-input id="profile_photo" name="profile_photo" type="file" class="mt-1 block w-full" />
        <x-input-error :messages="$errors->get('profile_photo')" class="mt-2" />
    </div>

        <div class="flex items-center gap-4 mt-6">
            <x-primary-button>{{ __('Opslaan') }}</x-primary-button>
        </div>
    </form>
</section>
