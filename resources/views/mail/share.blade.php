<x-mail::layout>

<x-slot:header>
<x-mail::header url="{{config('app.url')}}" class="text-3xl font-semibold font-wide">
    {{ config('app.name') }}
</x-mail::header>
</x-slot:header>

<h1 class="text-2xl font-thin font-wide text-center">
{!! __('Share Resume(CV) from <strong class="text-secondary">:full_name</strong>.', ['full_name' => $share->resume->owner->full_name]) !!}
</h1>

<x-mail::button :url="$url">
{{ __('View') }}
</x-mail::button>

<x-slot:footer>
<x-mail::footer>
{{ __('This email was sent by :app_name.', ['app_name' => config('app.name')]) }}
</x-mail::footer>
</x-slot:footer>

</x-mail::layout>