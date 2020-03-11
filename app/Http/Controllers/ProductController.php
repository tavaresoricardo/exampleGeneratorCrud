<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $columns = Product::getColumns();

        return view('products.index', compact('columns'));
    }

    /**
     * Get a listing of the resource.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function data()
    {
        return Product::getDatatable();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductStoreRequest $request
     *
     * @return RedirectResponse
     */
    public function store(ProductStoreRequest $request)
    {
        try {
            $product = Product::create($request->validated());
            return redirect()->route('products.show', ['product' => $product->id])
                ->with(['type' => 'success', 'message' => __('messages.success.store', ['item' => __('products.show', ['product' => $product->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.store', ['item' => __('products.model')])])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Product $product
     *
     * @return Factory|View
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product $product
     *
     * @return Factory|View
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage
     *
     * @param  ProductUpdateRequest $request
     * @param  Product $product
     *
     * @return RedirectResponse
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        try {
            $product->update($request->validated());
            return redirect()->route('products.show', ['product' => $product->id])
                ->with(['type' => 'success', 'message' => __('messages.success.update', ['item' => __('products.show', ['product' => $product->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.update', ['item' => __('products.show', ['product' => $product->id])])])
                ->withInput();
        }
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  Product $product
     *
     * @return Factory|View
     */
    public function delete(Product $product)
    {
        return view('products.delete', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     *
     * @return RedirectResponse
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();

            return redirect()->route('products.index')
                ->with(['type' => 'success', 'message' => __('messages.success.destroy', ['item' => __('products.show', ['product' => $product->id])])]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['type' => 'danger', 'message' => __('messages.danger.destroy', ['item' => __('products.show', ['product' => $product->id])])])
                ->withInput();
        }
    }
}
