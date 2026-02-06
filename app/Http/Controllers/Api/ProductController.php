<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     * 
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $Products = Product::with('personnel')->get();
        return ProductResource::collection($Products);
    }

    /**
     * Store a newly created product.
     * 
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('Products', 'public');
        }

        $Product = Product::create($data);
        return (new ProductResource($Product->load('personnel')))->response()->setStatusCode(201);
    }

    /**
     * Display the specified product.
     * 
     * @param Product $Product
     * @return ProductResource
     */
    public function show(Product $Product)
    {
        return new ProductResource($Product->load('personnel'));
    }

    /**
     * Update the specified product.
     * 
     * @param UpdateProductRequest $request
     * @param Product $Product
     * @return ProductResource
     */
    public function update(UpdateProductRequest $request, Product $Product)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // Supprimer ancienne image si existe
            if ($Product->image) {
                Storage::disk('public')->delete($Product->image);
            }
            $data['image'] = $request->file('image')->store('Products', 'public');
        }

        $Product->update($data);
        return new ProductResource($Product->load('personnel'));
    }

    /**
     * Remove the specified product.
     * 
     * @param Product $Product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $Product)
    {
        // Supprimer image si existe
        if ($Product->image) {
            Storage::disk('public')->delete($Product->image);
        }

        $Product->delete();
        return response()->json(null, 204);
    }
}
