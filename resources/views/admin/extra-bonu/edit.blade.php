@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.extraBonu.title_singular') }}:
                    {{ trans('cruds.extraBonu.fields.id') }}
                    {{ $extraBonu->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('extra-bonu.edit', [$extraBonu])
        </div>
    </div>
</div>
@endsection