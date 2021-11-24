<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('manualBonu.value') ? 'invalid' : '' }}">
        <label class="form-label" for="value">{{ trans('cruds.manualBonu.fields.value') }}</label>
        <input class="form-control" type="number" name="value" id="value" wire:model.defer="manualBonu.value" step="0.01">
        <div class="validation-message">
            {{ $errors->first('manualBonu.value') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manualBonu.fields.value_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manualBonu.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.manualBonu.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="manualBonu.user_id" />
        <div class="validation-message">
            {{ $errors->first('manualBonu.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manualBonu.fields.user_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.manual-bonus.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>