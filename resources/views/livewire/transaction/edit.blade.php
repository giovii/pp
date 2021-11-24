<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('transaction.opportunity_code_id') ? 'invalid' : '' }}">
        <label class="form-label" for="opportunity_code">{{ trans('cruds.transaction.fields.opportunity_code') }}</label>
        <x-select-list class="form-control" id="opportunity_code" name="opportunity_code" :options="$this->listsForFields['opportunity_code']" wire:model="transaction.opportunity_code_id" />
        <div class="validation-message">
            {{ $errors->first('transaction.opportunity_code_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.transaction.fields.opportunity_code_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('transaction.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.transaction.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="transaction.user_id" />
        <div class="validation-message">
            {{ $errors->first('transaction.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.transaction.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('transaction.invested') ? 'invalid' : '' }}">
        <label class="form-label" for="invested">{{ trans('cruds.transaction.fields.invested') }}</label>
        <input class="form-control" type="number" name="invested" id="invested" wire:model.defer="transaction.invested" step="0.01">
        <div class="validation-message">
            {{ $errors->first('transaction.invested') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.transaction.fields.invested_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.transactions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>