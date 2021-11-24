<?php

namespace App\Http\Livewire\ManualBonu;

use App\Models\ManualBonu;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public ManualBonu $manualBonu;

    public array $listsForFields = [];

    public function mount(ManualBonu $manualBonu)
    {
        $this->manualBonu = $manualBonu;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.manual-bonu.create');
    }

    public function submit()
    {
        $this->validate();

        $this->manualBonu->save();

        return redirect()->route('admin.manual-bonus.index');
    }

    protected function rules(): array
    {
        return [
            'manualBonu.value' => [
                'numeric',
                'nullable',
            ],
            'manualBonu.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('email', 'id')->toArray();
    }
}
