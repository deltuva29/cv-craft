<x-template-layout>
    <div class="bg-tertiary font-sans">

        <div class="container mx-auto py-8 px-4">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="">
                        <h1 class="text-3xl font-semibold">
                            {{ $share->profile->owner->full_name }}
                        </h1>
                        <p class="text-gray-600">{{ $share->profile->position }}, {{ $share->profile->location }}</p>
                    </div>
                </div>
                <hr class="my-4">

                <h2 class="text-xl font-semibold mb-2">{{ __('Biography') }}</h2>
                <hr class="my-4">
                @unless(empty($share->profile->bio))
                    <p class="text-gray-700">{!! str($share->profile->bio)->markdown() !!}</p>
                @else
                    <p class="text-gray-700">-</p>
                @endunless

                <h2 class="text-xl font-semibold mt-4 mb-2">{{ __('Skills') }}</h2>
                <hr class="my-4">
                <x-skills.list-content>
                    @forelse ($share->profile->skills as $skill)
                        <x-skills.card
                                :skill="$skill"
                        />
                    @empty
                        <p>-</p>
                    @endforelse
                </x-skills.list-content>

                <h2 class="text-xl font-semibold mt-4 mb-2">
                    {{ __('Experiences') }}
                </h2>
                <hr class="my-4">
                <x-experiences.content>
                    @forelse ($share->profile->experiences as $experience)
                        <x-experiences.card
                                :experience="$experience"
                        />
                    @empty
                        <p>-</p>
                    @endforelse
                </x-experiences.content>

                <h2 class="text-xl font-semibold mt-4 mb-2">
                    {{ __('Educations') }}
                </h2>
                <hr class="my-4">
                <x-educations.content>
                    @forelse ($share->profile->educations as $education)
                        <x-educations.card
                                :education="$education"
                        />
                    @empty
                        <p>-</p>
                    @endforelse
                </x-educations.content>

                <h2 class="text-xl font-semibold mt-4 mb-2">
                    {{ __('Languages') }}
                </h2>
                <hr class="my-4">
                <x-languages.content>
                    @forelse ($share->profile->languages as $language)
                        <x-languages.card
                                :language="$language"
                        />
                    @empty
                        <p>-</p>
                    @endforelse
                </x-languages.content>

                <h2 class="text-xl font-semibold mt-4 mb-2">
                    {{ __('Certificates') }}
                </h2>
                <hr class="my-4">
                <x-certificates.content>
                    @forelse ($share->profile->certificates as $certificate)
                        <x-certificates.card
                                :certificate="$certificate"
                        />
                    @empty
                        <p>-</p>
                    @endforelse
                </x-certificates.content>

                <h2 class="text-xl font-semibold mt-4 mb-2">
                    {{ __('Contacts') }}
                </h2>
                <hr class="my-4">
                <ul class="list-disc list-inside text-gray-700">
                    <li>{{ __('Email') }}: <a href="mailto:{{ $share->profile->owner->email }}" class="text-blue-500 hover:underline">{{ $share->profile->owner->email }}</a></li>
                    <li>{{ __('LinkedIn') }}: <a href="{{ $share->profile->linkedin }}" class="text-blue-500 hover:underline">{{ $share->profile->linkedin }}</a></li>
                    <li>{{ __('Website') }}: <a href="{{ $share->profile->website }}" class="text-blue-500 hover:underline">{{ $share->profile->website }}</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</x-template-layout>
