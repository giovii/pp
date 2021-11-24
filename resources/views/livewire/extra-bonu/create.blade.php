<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('extraBonu.value') ? 'invalid' : '' }}">
        <label class="form-label" for="value">{{ trans('cruds.extraBonu.fields.value') }}</label>
        <input class="form-control" type="number" name="value" id="value" wire:model.defer="extraBonu.value" step="1">
        <div class="validation-message">
            {{ $errors->first('extraBonu.value') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.extraBonu.fields.value_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('extraBonu.every_when') ? 'invalid' : '' }}">
        <label class="form-label" for="every_when">{{ trans('cruds.extraBonu.fields.every_when') }}</label>
        <input class="form-control" type="text" name="every_when" id="every_when" wire:model.defer="extraBonu.every_when">
        <div class="validation-message">
            {{ $errors->first('extraBonu.every_when') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.extraBonu.fields.every_when_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.extra-bonus.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>