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
        sleep(1);
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
            'skills' => $this->profile
                ->skills()
                ->get(),
        ];
    }
}; ?>

<div>
    <x-skills.list-content>
        @forelse ($skills as $skill)
            <x-skills.card
                    :skill="$skill"
            />
        @empty
            <x-empty-content
                    title="{{ __('You have not added any skills yet.') }}"
            />
        @endforelse
    </x-skills.list-content>
</div>
