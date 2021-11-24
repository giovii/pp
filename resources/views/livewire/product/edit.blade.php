<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('product.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.product.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="product.name">
        <div class="validation-message">
            {{ $errors->first('product.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.product.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="product.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('product.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('category') ? 'invalid' : '' }}">
        <label class="form-label" for="category">{{ trans('cruds.product.fields.category') }}</label>
        <x-select-list class="form-control" id="category" name="category" wire:model="category" :options="$this->listsForFields['category']" multiple />
        <div class="validation-message">
            {{ $errors->first('category') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.category_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.product_photo') ? 'invalid' : '' }}">
        <label class="form-label" for="photo">{{ trans('cruds.product.fields.photo') }}</label>
        <x-dropzone id="photo" name="photo" action="{{ route('admin.products.storeMedia') }}" collection-name="product_photo" max-file-size="12" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.product_photo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.photo_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.location') ? 'invalid' : '' }}">
        <label class="form-label" for="location">{{ trans('cruds.product.fields.location') }}</label>
        <input class="form-control" type="text" name="location" id="location" wire:model.defer="product.location">
        <div class="validation-message">
            {{ $errors->first('product.location') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.location_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.short_description') ? 'invalid' : '' }}">
        <label class="form-label" for="short_description">{{ trans('cruds.product.fields.short_description') }}</label>
        <input class="form-control" type="text" name="short_description" id="short_description" wire:model.defer="product.short_description">
        <div class="validation-message">
            {{ $errors->first('product.short_description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.short_description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.opportunity_code') ? 'invalid' : '' }}">
        <label class="form-label" for="opportunity_code">{{ trans('cruds.product.fields.opportunity_code') }}</label>
        <input class="form-control" type="text" name="opportunity_code" id="opportunity_code" wire:model.defer="product.opportunity_code">
        <div class="validation-message">
            {{ $errors->first('product.opportunity_code') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.opportunity_code_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.maximum_target') ? 'invalid' : '' }}">
        <label class="form-label" for="maximum_target">{{ trans('cruds.product.fields.maximum_target') }}</label>
        <input class="form-control" type="number" name="maximum_target" id="maximum_target" wire:model.defer="product.maximum_target" step="0.01">
        <div class="validation-message">
            {{ $errors->first('product.maximum_target') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.maximum_target_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.minimum_target') ? 'invalid' : '' }}">
        <label class="form-label" for="minimum_target">{{ trans('cruds.product.fields.minimum_target') }}</label>
        <input class="form-control" type="number" name="minimum_target" id="minimum_target" wire:model.defer="product.minimum_target" step="0.01">
        <div class="validation-message">
            {{ $errors->first('product.minimum_target') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.minimum_target_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.roi') ? 'invalid' : '' }}">
        <label class="form-label required" for="roi">{{ trans('cruds.product.fields.roi') }}</label>
        <input class="form-control" type="number" name="roi" id="roi" required wire:model.defer="product.roi" step="1">
        <div class="validation-message">
            {{ $errors->first('product.roi') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.roi_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.start_founding') ? 'invalid' : '' }}">
        <label class="form-label" for="start_founding">{{ trans('cruds.product.fields.start_founding') }}</label>
        <x-date-picker class="form-control" wire:model="product.start_founding" id="start_founding" name="start_founding" />
        <div class="validation-message">
            {{ $errors->first('product.start_founding') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.start_founding_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.end_founding') ? 'invalid' : '' }}">
        <label class="form-label" for="end_founding">{{ trans('cruds.product.fields.end_founding') }}</label>
        <x-date-picker class="form-control" wire:model="product.end_founding" id="end_founding" name="end_founding" />
        <div class="validation-message">
            {{ $errors->first('product.end_founding') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.end_founding_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.risk') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.product.fields.risk') }}</label>
        <select class="form-control" wire:model="product.risk">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['risk'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('product.risk') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.risk_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.repayment') ? 'invalid' : '' }}">
        <label class="form-label" for="repayment">{{ trans('cruds.product.fields.repayment') }}</label>
        <x-date-picker class="form-control" wire:model="product.repayment" id="repayment" name="repayment" />
        <div class="validation-message">
            {{ $errors->first('product.repayment') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.repayment_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.manager_prepay_invest') ? 'invalid' : '' }}">
        <label class="form-label" for="manager_prepay_invest">{{ trans('cruds.product.fields.manager_prepay_invest') }}</label>
        <input class="form-control" type="checkbox" name="manager_prepay_invest" id="manager_prepay_invest" wire:model.defer="product.manager_prepay_invest">
        <div class="validation-message">
            {{ $errors->first('product.manager_prepay_invest') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.manager_prepay_invest_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.prepay_invest') ? 'invalid' : '' }}">
        <label class="form-label" for="prepay_invest">{{ trans('cruds.product.fields.prepay_invest') }}</label>
        <input class="form-control" type="checkbox" name="prepay_invest" id="prepay_invest" wire:model.defer="product.prepay_invest">
        <div class="validation-message">
            {{ $errors->first('product.prepay_invest') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.prepay_invest_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.email_owner') ? 'invalid' : '' }}">
        <label class="form-label" for="email_owner">{{ trans('cruds.product.fields.email_owner') }}</label>
        <input class="form-control" type="text" name="email_owner" id="email_owner" wire:model.defer="product.email_owner">
        <div class="validation-message">
            {{ $errors->first('product.email_owner') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.email_owner_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.section') ? 'invalid' : '' }}">
        <label class="form-label" for="section">{{ trans('cruds.product.fields.section') }}</label>
        <textarea class="form-control" name="section" id="section" wire:model.defer="product.section" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('product.section') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.section_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.financial_details') ? 'invalid' : '' }}">
        <label class="form-label" for="financial_details">{{ trans('cruds.product.fields.financial_details') }}</label>
        <input class="form-control" type="text" name="financial_details" id="financial_details" wire:model.defer="product.financial_details">
        <div class="validation-message">
            {{ $errors->first('product.financial_details') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.financial_details_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.product_documents') ? 'invalid' : '' }}">
        <label class="form-label" for="documents">{{ trans('cruds.product.fields.documents') }}</label>
        <x-dropzone id="documents" name="documents" action="{{ route('admin.products.storeMedia') }}" collection-name="product_documents" max-file-size="8" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.product_documents') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.documents_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.state') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.product.fields.state') }}</label>
        <select class="form-control" wire:model="product.state">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['state'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('product.state') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.state_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.bonus_multiplier') ? 'invalid' : '' }}">
        <label class="form-label" for="bonus_multiplier">{{ trans('cruds.product.fields.bonus_multiplier') }}</label>
        <input class="form-control" type="number" name="bonus_multiplier" id="bonus_multiplier" wire:model.defer="product.bonus_multiplier" step="1">
        <div class="validation-message">
            {{ $errors->first('product.bonus_multiplier') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.bonus_multiplier_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>