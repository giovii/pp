<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Admin\ProductResource;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource(Product::with(['category'])->get());
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());
        $product->category()->sync($request->input('category', []));
        foreach ($request->input('product_photo', []) as $file) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('product_photo');
        }

        foreach ($request->input('product_documents', []) as $file) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('product_documents');
        }

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource($product->load(['category']));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        $product->category()->sync($request->input('category', []));
        if (count($product->product_photo) > 0) {
            foreach ($product->product_photo as $media) {
                if (!in_array($media->file_name, $request->input('product_photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $product->product_photo->pluck('file_name')->toArray();
        foreach ($request->input('product_photo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('product_photo');
            }
        }

        if (count($product->product_documents) > 0) {
            foreach ($product->product_documents as $media) {
                if (!in_array($media->file_name, $request->input('product_documents', []))) {
                    $media->delete();
                }
            }
        }
        $media = $product->product_documents->pluck('file_name')->toArray();
        foreach ($request->input('product_documents', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('product_documents');
            }
        }

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
