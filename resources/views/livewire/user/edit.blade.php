<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('user.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.user.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
        <div class="validation-message">
            {{ $errors->first('user.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.surname') ? 'invalid' : '' }}">
        <label class="form-label required" for="surname">{{ trans('cruds.user.fields.surname') }}</label>
        <input class="form-control" type="text" name="surname" id="surname" required wire:model.defer="user.surname">
        <div class="validation-message">
            {{ $errors->first('user.surname') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.surname_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.email') ? 'invalid' : '' }}">
        <label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" required wire:model.defer="user.email">
        <div class="validation-message">
            {{ $errors->first('user.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.password') ? 'invalid' : '' }}">
        <label class="form-label" for="password">{{ trans('cruds.user.fields.password') }}</label>
        <input class="form-control" type="password" name="password" id="password" wire:model.defer="password">
        <div class="validation-message">
            {{ $errors->first('user.password') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.password_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('roles') ? 'invalid' : '' }}">
        <label class="form-label required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
        <x-select-list class="form-control" required id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']" multiple />
        <div class="validation-message">
            {{ $errors->first('roles') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.roles_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.locale') ? 'invalid' : '' }}">
        <label class="form-label" for="locale">{{ trans('cruds.user.fields.locale') }}</label>
        <input class="form-control" type="text" name="locale" id="locale" wire:model.defer="user.locale">
        <div class="validation-message">
            {{ $errors->first('user.locale') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.locale_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.phone_number') ? 'invalid' : '' }}">
        <label class="form-label required" for="phone_number">{{ trans('cruds.user.fields.phone_number') }}</label>
        <input class="form-control" type="text" name="phone_number" id="phone_number" required wire:model.defer="user.phone_number">
        <div class="validation-message">
            {{ $errors->first('user.phone_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.phone_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.investor_type') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.user.fields.investor_type') }}</label>
        <select class="form-control" wire:model="user.investor_type">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['investor_type'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('user.investor_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.investor_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.address') ? 'invalid' : '' }}">
        <label class="form-label" for="address">{{ trans('cruds.user.fields.address') }}</label>
        <input class="form-control" type="text" name="address" id="address" wire:model.defer="user.address">
        <div class="validation-message">
            {{ $errors->first('user.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.city') ? 'invalid' : '' }}">
        <label class="form-label" for="city">{{ trans('cruds.user.fields.city') }}</label>
        <input class="form-control" type="text" name="city" id="city" wire:model.defer="user.city">
        <div class="validation-message">
            {{ $errors->first('user.city') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.city_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.zip_code') ? 'invalid' : '' }}">
        <label class="form-label" for="zip_code">{{ trans('cruds.user.fields.zip_code') }}</label>
        <input class="form-control" type="text" name="zip_code" id="zip_code" wire:model.defer="user.zip_code">
        <div class="validation-message">
            {{ $errors->first('user.zip_code') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.zip_code_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.user_documents') ? 'invalid' : '' }}">
        <label class="form-label" for="documents">{{ trans('cruds.user.fields.documents') }}</label>
        <x-dropzone id="documents" name="documents" action="{{ route('admin.users.storeMedia') }}" collection-name="user_documents" max-file-size="8" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.user_documents') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.documents_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.vat') ? 'invalid' : '' }}">
        <label class="form-label" for="vat">{{ trans('cruds.user.fields.vat') }}</label>
        <input class="form-control" type="text" name="vat" id="vat" wire:model.defer="user.vat">
        <div class="validation-message">
            {{ $errors->first('user.vat') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.vat_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>