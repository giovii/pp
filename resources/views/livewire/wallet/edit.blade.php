<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('wallet.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.wallet.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="wallet.user_id" />
        <div class="validation-message">
            {{ $errors->first('wallet.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.wallet.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('wallet.real_money') ? 'invalid' : '' }}">
        <label class="form-label" for="real_money">{{ trans('cruds.wallet.fields.real_money') }}</label>
        <input class="form-control" type="number" name="real_money" id="real_money" wire:model.defer="wallet.real_money" step="0.01">
        <div class="validation-message">
            {{ $errors->first('wallet.real_money') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.wallet.fields.real_money_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('wallet.virtual_money') ? 'invalid' : '' }}">
        <label class="form-label" for="virtual_money">{{ trans('cruds.wallet.fields.virtual_money') }}</label>
        <input class="form-control" type="number" name="virtual_money" id="virtual_money" wire:model.defer="wallet.virtual_money" step="0.01">
        <div class="validation-message">
            {{ $errors->first('wallet.virtual_money') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.wallet.fields.virtual_money_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.wallets.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>