<?php

namespace App\Http\Livewire\Wallet;

use App\Models\User;
use App\Models\Wallet;
use Livewire\Component;

class Create extends Component
{
    public Wallet $wallet;

    public array $listsForFields = [];

    public function mount(Wallet $wallet)
    {
        $this->wallet = $wallet;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.wallet.create');
    }

    public function submit()
    {
        $this->validate();

        $this->wallet->save();

        return redirect()->route('admin.wallets.index');
    }

    protected function rules(): array
    {
        return [
            'wallet.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'wallet.real_money' => [
                'numeric',
                'nullable',
            ],
            'wallet.virtual_money' => [
                'numeric',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('email', 'id')->toArray();
    }
}
