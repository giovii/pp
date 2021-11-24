@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.manualBonu.title_singular') }}:
                    {{ trans('cruds.manualBonu.fields.id') }}
                    {{ $manualBonu->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('manual-bonu.edit', [$manualBonu])
        </div>
    </div>
</div>
@endsection