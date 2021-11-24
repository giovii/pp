<?php

namespace App\Http\Livewire\ExtraBonu;

use App\Models\ExtraBonu;
use Livewire\Component;

class Create extends Component
{
    public ExtraBonu $extraBonu;

    public function mount(ExtraBonu $extraBonu)
    {
        $this->extraBonu = $extraBonu;
    }

    public function render()
    {
        return view('livewire.extra-bonu.create');
    }

    public function submit()
    {
        $this->validate();

        $this->extraBonu->save();

        return redirect()->route('admin.extra-bonus.index');
    }

    protected function rules(): array
    {
        return [
            'extraBonu.value' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'extraBonu.every_when' => [
                'string',
                'nullable',
            ],
        ];
    }
}
