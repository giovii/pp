<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExtraBonu;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExtraBonuController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('extra_bonu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.extra-bonu.index');
    }

    public function create()
    {
        abort_if(Gate::denies('extra_bonu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.extra-bonu.create');
    }

    public function edit(ExtraBonu $extraBonu)
    {
        abort_if(Gate::denies('extra_bonu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.extra-bonu.edit', compact('extraBonu'));
    }

    public function show(ExtraBonu $extraBonu)
    {
        abort_if(Gate::denies('extra_bonu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.extra-bonu.show', compact('extraBonu'));
    }
}
