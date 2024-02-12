<x-template-layout>
    <div class="bg-tertiary font-sans">
        <div class="container mx-auto py-8 px-4">
            <div class="flex flex-col md:flex-row bg-white shadow-lg">

                <div class="md:flex-none w-full md:w-1/3 justify-center p-6 rounded-lg mb-4 md:mb-0 md:mr-4">
                    <div class="mb-6">
                        <img
                                class="w-32 h-32 object-cover rounded-xl my-2 md:my-0 mx-auto shadow-2xl"
                                src="{{ $share->profile->getAvatar() }}"
                                alt="{{ $share->profile->owner->full_name }}"
                        >
                    </div>

                    <div class="flex justify-center">
                        <div>
                            <h1 class="text-xl font-semibold text-center">{{ $share->profile->owner->full_name }}</h1>
                            <p class="text-gray-500 text-center">{{ $share->profile->position }}</p>
                        </div>
                    </div>
                    <hr class="my-4">
                    <ul class="flex flex-col space-y-2 list-disc list-inside text-gray-700">
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2">
                                <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z"/>
                                <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z"/>
                            </svg>

                            {{ $share->profile->owner->email }}
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2">
                                <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd"/>
                            </svg>
                            {{ $share->profile->location }}
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 128 128">
                                <path fill="currentColor" d="M116 3H12a8.91 8.91 0 0 0-9 8.8v104.42a8.91 8.91 0 0 0 9 8.78h104a8.93 8.93 0 0 0 9-8.81V11.77A8.93 8.93 0 0 0 116 3M39.17 107H21.06V48.73h18.11zm-9-66.21a10.5 10.5 0 1 1 10.49-10.5a10.5 10.5 0 0 1-10.54 10.48zM107 107H88.89V78.65c0-6.75-.12-15.44-9.41-15.44s-10.87 7.36-10.87 15V107H50.53V48.73h17.36v8h.24c2.42-4.58 8.32-9.41 17.13-9.41C103.6 47.28 107 59.35 107 75z"/>
                            </svg>
                            {{ $share->profile->linkedin }}
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418"/>
                            </svg>
                            <a href="{{ $share->profile->website }}" class="text-blue-500 hover:underline">{{ $share->profile->website }}</a>
                        </li>
                    </ul>

                    @if ($share->profile->phone)
                        <x-link
                                class="w-full my-6 justify-center text-center" :href="'tel:' . $share->profile->phone"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2">
                                <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd"/>
                            </svg>
                            {{ __('Offer a job') }}
                        </x-link>
                    @else
                        <x-link
                                class="w-full my-6 justify-center text-center" :href="'mailto:' . $share->profile->owner->email"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2">
                                <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z"/>
                                <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z"/>
                            </svg>

                            {{ __('Offer a job') }}
                        </x-link>
                    @endif
                </div>

                <div class="w-full p-6 rounded-lg bg-white shadow-lg">

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
                            <x-skills.card :skill="$skill"/>
                        @empty
                            <p>-</p>
                        @endforelse
                    </x-skills.list-content>

                    <h2 class="text-xl font-semibold mt-4 mb-2">{{ __('Experiences') }}</h2>
                    <hr class="my-4">
                    <x-experiences.content>
                        @forelse ($share->profile->experiences as $experience)
                            <x-experiences.card :experience="$experience"/>
                        @empty
                            <p>-</p>
                        @endforelse
                    </x-experiences.content>

                    <h2 class="text-xl font-semibold mt-4 mb-2">{{ __('Educations') }}</h2>
                    <hr class="my-4">
                    <x-educations.content>
                        @forelse ($share->profile->educations as $education)
                            <x-educations.card :education="$education"/>
                        @empty
                            <p>-</p>
                        @endforelse
                    </x-educations.content>

                    <h2 class="text-xl font-semibold mt-4 mb-2">{{ __('Languages') }}</h2>
                    <hr class="my-4">
                    <x-languages.content>
                        @forelse ($share->profile->languages as $language)
                            <x-languages.card :language="$language"/>
                        @empty
                            <p>-</p>
                        @endforelse
                    </x-languages.content>

                    <h2 class="text-xl font-semibold mt-4 mb-2">{{ __('Certificates') }}</h2>
                    <hr class="my-4">
                    <x-certificates.content>
                        @forelse ($share->profile->certificates as $certificate)
                            <x-certificates.card :certificate="$certificate"/>
                        @empty
                            <p>-</p>
                        @endforelse
                    </x-certificates.content>
                </div>

            </div>
        </div>
    </div>
</x-template-layout>