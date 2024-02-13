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

    #[On('profile-updated')]
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
    @if (!$this->resume->certificates->isEmpty())
        <livewire:profile.update-profile-certificates-form
                :resume="$this->resume"
        />
    @else
        <x-empty-content
                title="{{ __('You have not added any certificates yet.') }}"
        />

    @endif
</div>