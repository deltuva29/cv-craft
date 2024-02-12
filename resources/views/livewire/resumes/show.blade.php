<?php

use App\Models\Profile;
use Livewire\Attributes\On;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;

new class extends Component {
    use WithPagination;

    public Profile $profile;

    public function mount(Profile $profile): void
    {
        $this->profile = $profile;
    }

    #[On('profile-updated')]
    public function updateShares(): void
    {
        $this->dispatch('$refresh');
    }

    public function placeholder(): View
    {
        return view('placeholders.bubble');
    }

    public function with(): array
    {
        return [
            'resumes' => $this->profile
                ->resumes()
                ->latest()
                ->get(),
        ];
    }
}; ?>

<div>
    <x-resumes.content>
        @forelse ($resumes as $resume)
            <x-resumes.card
                    :resume="$resume"
            />
        @empty
            <x-empty-content
                    title="{{ __('You have not added any resumes yet.') }}"
            />
        @endforelse
    </x-resumes.content>
</div>