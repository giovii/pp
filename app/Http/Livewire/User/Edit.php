<?php

namespace App\Http\Livewire\User;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public User $user;

    public array $roles = [];

    public string $password = '';

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function mount(User $user)
    {
        $this->user  = $user;
        $this->roles = $this->user->roles()->pluck('id')->toArray();
        $this->initListsForFields();
        $this->mediaCollections = [
            'user_documents' => $user->documents,
        ];
    }

    public function render()
    {
        return view('livewire.user.edit');
    }

    public function submit()
    {
        $this->validate();
        $this->user->password = $this->password;
        $this->user->save();
        $this->user->roles()->sync($this->roles);
        $this->syncMedia();

        return redirect()->route('admin.users.index');
    }

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    protected function rules(): array
    {
        return [
            'user.name' => [
                'string',
                'required',
            ],
            'user.surname' => [
                'string',
                'required',
            ],
            'user.email' => [
                'email:rfc',
                'required',
                'unique:users,email,' . $this->user->id,
            ],
            'password' => [
                'string',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'user.locale' => [
                'string',
                'nullable',
            ],
            'user.phone_number' => [
                'string',
                'min:10',
                'max:13',
                'required',
                'unique:users,phone_number,' . $this->user->id,
            ],
            'user.investor_type' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['investor_type'])),
            ],
            'user.refcode' => [
                'string',
                'nullable',
            ],
            'user.address' => [
                'string',
                'nullable',
            ],
            'user.city' => [
                'string',
                'nullable',
            ],
            'user.zip_code' => [
                'string',
                'nullable',
            ],
            'mediaCollections.user_documents' => [
                'array',
                'nullable',
            ],
            'mediaCollections.user_documents.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'user.vat' => [
                'string',
                'nullable',
            ],
            'user.referrer' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'user.referred_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['roles']         = Role::pluck('title', 'id')->toArray();
        $this->listsForFields['investor_type'] = $this->user::INVESTOR_TYPE_SELECT;
        $this->listsForFields['referred']      = User::pluck('referrer', 'id')->toArray();
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->user->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
