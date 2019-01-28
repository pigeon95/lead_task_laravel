<?php

namespace Products\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Products\Models\Product;
use Products\Requests\ProductRequest;
use Products\Services\ProductsService;

/**
 * Class ProductsController
 *
 * @package Products\Controllers
 */
class ProductsController extends Controller
{
    /**
     * @var ProductsService
     */
    private $productService;

    /**
     * ProductsController constructor.
     *
     * @param ProductsService $productService
     */
    public function __construct(ProductsService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @return View
     * @throws \Exception
     */
    public function listAction()
    {
        $products = Product::all();
        return view('products::list', compact('products'));
    }

    /**
     * @return View
     */
    public function createAction()
    {
        return view('products::create');
    }

    /**
     * @param ProductRequest $request
     * @return JsonResponse
     */
    public function storeAction(ProductRequest $request)
    {
        $this->productService->save($request->all(), $request);

        Session::flash('success', __('products::main.add.success'));
        return redirect()->route('products.list');
    }

    /**
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function editAction(Product $product)
    {
        return view('products::edit', compact('product'));
    }

    /**
     * @param Product $product
     * @param ProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAction(Product $product, ProductRequest $request)
    {
        $this->productService->update($product, $request->all(), $request);

        Session::flash('success', __('products::main.edit.success'));
        return redirect()->route('products.list');
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deleteAction(Product $product)
    {
        $this->productService->delete($product);

        Session::flash('success', __('products::main.delete.success'));
        return redirect()->route('products.list');
    }
}
