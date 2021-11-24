<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManualBonuRequest;
use App\Http\Requests\UpdateManualBonuRequest;
use App\Http\Resources\Admin\ManualBonuResource;
use App\Models\ManualBonu;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManualBonuApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manual_bonu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManualBonuResource(ManualBonu::with(['user'])->get());
    }

    public function store(StoreManualBonuRequest $request)
    {
        $manualBonu = ManualBonu::create($request->validated());

        return (new ManualBonuResource($manualBonu))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ManualBonu $manualBonu)
    {
        abort_if(Gate::denies('manual_bonu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManualBonuResource($manualBonu->load(['user']));
    }

    public function update(UpdateManualBonuRequest $request, ManualBonu $manualBonu)
    {
        $manualBonu->update($request->validated());

        return (new ManualBonuResource($manualBonu))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ManualBonu $manualBonu)
    {
        abort_if(Gate::denies('manual_bonu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manualBonu->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
