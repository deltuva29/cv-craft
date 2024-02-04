<?php

use App\Models\Profile;
use Livewire\Attributes\On;
use Livewire\Volt\Component;
use Livewire\WithPagination;

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

    public function placeholder()
    {
        return view('placeholders.spinner');
    }

    public function with(): array
    {
        return [
            'shares' => $this->profile
                ->shares()
                ->paginate(10),
        ];
    }
}; ?>

<div>
    <x-shares.list-content>
        @forelse ($shares as $share)
            <x-shares.card
                    :share="$share"
            />
        @empty
            <x-empty-content
                    title="{{ __('You have not added any shares CV yet.') }}"
            />
        @endforelse
    </x-shares.list-content>

    {{ $shares->links() }}
</div>
