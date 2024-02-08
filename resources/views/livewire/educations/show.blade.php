<?php

use App\Models\Profile;
use Livewire\Attributes\On;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;

new class extends Component {
    public Profile $profile;

    public function mount(Profile $profile): void
    {
        sleep(1);
        $this->profile = $profile;
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
    @if (!$this->profile->educations->isEmpty())
        <livewire:profile.update-profile-educations-form
                :profile="$this->profile"
        />
    @else
        <x-empty-content
                title="{{ __('You have not added any educations yet.') }}"
        />
    @endif
</div>