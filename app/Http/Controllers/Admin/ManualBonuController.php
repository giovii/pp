<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManualBonu;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManualBonuController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manual_bonu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manual-bonu.index');
    }

    public function create()
    {
        abort_if(Gate::denies('manual_bonu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manual-bonu.create');
    }

    public function edit(ManualBonu $manualBonu)
    {
        abort_if(Gate::denies('manual_bonu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manual-bonu.edit', compact('manualBonu'));
    }

    public function show(ManualBonu $manualBonu)
    {
        abort_if(Gate::denies('manual_bonu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manualBonu->load('user');

        return view('admin.manual-bonu.show', compact('manualBonu'));
    }
}
