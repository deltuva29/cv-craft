<?php

use App\Models\Profile;
use App\Models\Resume;
use Livewire\Attributes\On;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;

new class extends Component {
    use WithPagination;

    public Resume $resume;

    public function mount(Resume $resume): void
    {
        $this->resume = $resume;
    }

    #[On('profile-updated')]
    public function updateSkills(): void
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
            'skills' => $this->resume
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
