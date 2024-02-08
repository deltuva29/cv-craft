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
    @if (!$this->profile->certificates->isEmpty())
        <livewire:profile.update-profile-certificates-form
                :profile="$this->profile"
        />
    @else
        <div x-data="{ empty: false }">
            <div
                    @profile-updated.window="empty = true"
                    x-show="!empty"
                    x-cloak
            >
                <x-empty-content
                        title="{{ __('You have not added any certificates yet.') }}"
                />
            </div>
        </div>
    @endif
</div>