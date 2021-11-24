@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.manualBonu.title_singular') }}:
                    {{ trans('cruds.manualBonu.fields.id') }}
                    {{ $manualBonu->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.manualBonu.fields.id') }}
                            </th>
                            <td>
                                {{ $manualBonu->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manualBonu.fields.value') }}
                            </th>
                            <td>
                                {{ $manualBonu->value }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manualBonu.fields.user') }}
                            </th>
                            <td>
                                @if($manualBonu->user)
                                    <span class="badge badge-relationship">{{ $manualBonu->user->email ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('manual_bonu_edit')
                    <a href="{{ route('admin.manual-bonus.edit', $manualBonu) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.manual-bonus.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection