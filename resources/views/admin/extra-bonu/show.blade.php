@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.extraBonu.title_singular') }}:
                    {{ trans('cruds.extraBonu.fields.id') }}
                    {{ $extraBonu->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.extraBonu.fields.id') }}
                            </th>
                            <td>
                                {{ $extraBonu->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.extraBonu.fields.value') }}
                            </th>
                            <td>
                                {{ $extraBonu->value }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.extraBonu.fields.every_when') }}
                            </th>
                            <td>
                                {{ $extraBonu->every_when }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('extra_bonu_edit')
                    <a href="{{ route('admin.extra-bonus.edit', $extraBonu) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.extra-bonus.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection