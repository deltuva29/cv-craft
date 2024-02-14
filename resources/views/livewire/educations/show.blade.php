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
    <x-educations.content>
        @forelse ($resume->educations as $education)
            <x-educations.card :education="$education"/>
        @empty
            <x-empty-content
                    title="{{ __('You have not added any educations yet.') }}"
            />
        @endforelse
    </x-educations.content>
</div>