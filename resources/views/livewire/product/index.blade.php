<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('product_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Product" format="csv" />
                <livewire:excel-export model="Product" format="xlsx" />
                <livewire:excel-export model="Product" format="pdf" />
            @endif


            @can('product_create')
                <x-csv-import route="{{ route('admin.products.csv.store') }}" />
            @endcan

        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.product.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.location') }}
                            @include('components.table.sort', ['field' => 'location'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.short_description') }}
                            @include('components.table.sort', ['field' => 'short_description'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.opportunity_code') }}
                            @include('components.table.sort', ['field' => 'opportunity_code'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.maximum_target') }}
                            @include('components.table.sort', ['field' => 'maximum_target'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.minimum_target') }}
                            @include('components.table.sort', ['field' => 'minimum_target'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.roi') }}
                            @include('components.table.sort', ['field' => 'roi'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.start_founding') }}
                            @include('components.table.sort', ['field' => 'start_founding'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.end_founding') }}
                            @include('components.table.sort', ['field' => 'end_founding'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.risk') }}
                            @include('components.table.sort', ['field' => 'risk'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.repayment') }}
                            @include('components.table.sort', ['field' => 'repayment'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.manager_prepay_invest') }}
                            @include('components.table.sort', ['field' => 'manager_prepay_invest'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.prepay_invest') }}
                            @include('components.table.sort', ['field' => 'prepay_invest'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.email_owner') }}
                            @include('components.table.sort', ['field' => 'email_owner'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.section') }}
                            @include('components.table.sort', ['field' => 'section'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.financial_details') }}
                            @include('components.table.sort', ['field' => 'financial_details'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.documents') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.state') }}
                            @include('components.table.sort', ['field' => 'state'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.bonus_multiplier') }}
                            @include('components.table.sort', ['field' => 'bonus_multiplier'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $product->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $product->id }}
                            </td>
                            <td>
                                {{ $product->name }}
                            </td>
                            <td>
                                {{ $product->description }}
                            </td>
                            <td>
                                @foreach($product->category as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($product->photo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $product->location }}
                            </td>
                            <td>
                                {{ $product->short_description }}
                            </td>
                            <td>
                                {{ $product->opportunity_code }}
                            </td>
                            <td>
                                {{ $product->maximum_target }}
                            </td>
                            <td>
                                {{ $product->minimum_target }}
                            </td>
                            <td>
                                {{ $product->roi }}
                            </td>
                            <td>
                                {{ $product->start_founding }}
                            </td>
                            <td>
                                {{ $product->end_founding }}
                            </td>
                            <td>
                                {{ $product->risk_label }}
                            </td>
                            <td>
                                {{ $product->repayment }}
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $product->manager_prepay_invest ? 'checked' : '' }}>
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $product->prepay_invest ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $product->email_owner }}
                            </td>
                            <td>
                                {{ $product->section }}
                            </td>
                            <td>
                                {{ $product->financial_details }}
                            </td>
                            <td>
                                @foreach($product->documents as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $product->state_label }}
                            </td>
                            <td>
                                {{ $product->bonus_multiplier }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('product_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.products.show', $product) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('product_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.products.edit', $product) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('product_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $product->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $products->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush