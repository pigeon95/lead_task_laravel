<?php

namespace Products\Services;

use Illuminate\Support\Facades\DB;
use Products\Models\Price;
use Products\Models\Product;
use Products\Requests\ProductRequest;


/**
 * Class ProductsService
 *
 * @package Wires\Services
 */
class ProductsService
{
    /**
     * @param ProductRequest $request
     * @param array $data
     * @return boolean
     */
    public function save(array $data, ProductRequest $request)
    {
        $product = new Product($data);

        DB::beginTransaction();
        try {
            $success = true;
            $product->save();
            $prices = $request->input('prices');
            $array = explode(',', $prices);
            $this->fillPrices($array, $product);
        } catch (\Exception $e) {
            $success = false;
            DB::rollBack();
        }
        DB::commit();
        return $success;
    }

    /**
     * @param Product $product
     * @throws \Exception
     * @return boolean
     */
    public function delete(Product $product)
    {
        DB::beginTransaction();
        try {
            $success = true;
            $product->delete();
        } catch (\Exception $e) {
            $success = false;
            DB::rollBack();
        }
        DB::commit();
        return $success;
    }

    /**
     * @param ProductRequest $request
     * @param Product $product
     * @param array $data
     * @return boolean
     */
    public function update(Product $product, array $data, ProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $success = true;
            $product->update($data);
            $prices = $request->input('prices');
            if ($prices != null) {
                $product->prices()->delete();
            }
            $array = explode(',', $prices);
            $this->fillPrices($array, $product);
            if ($prices == null) {
                $product->prices()->delete();
            }
        } catch (\Exception $e) {
            $success = false;
            DB::rollBack();
        }
        DB::commit();
        return $success;
    }

    public function fillPrices(array $array, Product $product)
    {
        foreach ($array as $value) {
            $price = new Price();
            $price->value = $value;
            $price->product()->associate($product);
            $price->save();
        }
    }
}
