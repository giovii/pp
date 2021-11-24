<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Product $product;

    public array $category = [];

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function mount(Product $product)
    {
        $this->product  = $product;
        $this->category = $this->product->category()->pluck('id')->toArray();
        $this->initListsForFields();
        $this->mediaCollections = [
            'product_photo' => $product->photo,

            'product_documents' => $product->documents,
        ];
    }

    public function render()
    {
        return view('livewire.product.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->product->save();
        $this->product->category()->sync($this->category);
        $this->syncMedia();

        return redirect()->route('admin.products.index');
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
            'product.name' => [
                'string',
                'required',
            ],
            'product.description' => [
                'string',
                'nullable',
            ],
            'category' => [
                'array',
            ],
            'category.*.id' => [
                'integer',
                'exists:product_categories,id',
            ],
            'mediaCollections.product_photo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.product_photo.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'product.location' => [
                'string',
                'nullable',
            ],
            'product.short_description' => [
                'string',
                'nullable',
            ],
            'product.opportunity_code' => [
                'string',
                'nullable',
            ],
            'product.maximum_target' => [
                'numeric',
                'nullable',
            ],
            'product.minimum_target' => [
                'numeric',
                'nullable',
            ],
            'product.roi' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'product.start_founding' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'product.end_founding' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'product.risk' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['risk'])),
            ],
            'product.repayment' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'product.manager_prepay_invest' => [
                'boolean',
            ],
            'product.prepay_invest' => [
                'boolean',
            ],
            'product.email_owner' => [
                'string',
                'nullable',
            ],
            'product.section' => [
                'string',
                'nullable',
            ],
            'product.financial_details' => [
                'string',
                'nullable',
            ],
            'mediaCollections.product_documents' => [
                'array',
                'nullable',
            ],
            'mediaCollections.product_documents.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'product.state' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['state'])),
            ],
            'product.bonus_multiplier' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['category'] = ProductCategory::pluck('name', 'id')->toArray();
        $this->listsForFields['risk']     = $this->product::RISK_SELECT;
        $this->listsForFields['state']    = $this->product::STATE_SELECT;
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->product->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
