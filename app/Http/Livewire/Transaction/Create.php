<?php

namespace App\Http\Livewire\Transaction;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public Transaction $transaction;

    public array $listsForFields = [];

    public function mount(Transaction $transaction)
    {
        $this->transaction = $transaction;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.transaction.create');
    }

    public function submit()
    {
        $this->validate();

        $this->transaction->save();

        return redirect()->route('admin.transactions.index');
    }

    protected function rules(): array
    {
        return [
            'transaction.opportunity_code_id' => [
                'integer',
                'exists:products,id',
                'nullable',
            ],
            'transaction.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'transaction.invested' => [
                'numeric',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['opportunity_code'] = Product::pluck('opportunity_code', 'id')->toArray();
        $this->listsForFields['user']             = User::pluck('email', 'id')->toArray();
    }
}
