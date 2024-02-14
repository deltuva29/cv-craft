<?php

use App\Models\Profile;
use App\Models\Resume;
use Livewire\Attributes\On;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;

new class extends Component {
    public Resume $resume;

    public function mount(Resume $resume): void
    {
        $this->resume = $resume;
    }

    #[On('resume-updated')]
    public function update(): void
    {
        $this->dispatch('$refresh');
    }

    public function placeholder(): View
    {
        return view('placeholders.bubble');
    }
}; ?>

<div>
    <x-languages.content>
        @forelse ($resume->languages as $language)
            <x-languages.card :language="$language"/>
        @empty
            <x-empty-content
                    title="{{ __('You have not added any languages yet.') }}"
            />
        @endforelse
    </x-languages.content>
</div>