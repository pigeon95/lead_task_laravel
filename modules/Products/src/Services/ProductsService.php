<?php

namespace Products\Services;

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
        try {
            $success = true;
            $product->save();
            $prices = $request->input('prices');
            $array = explode(',', $prices);
            foreach ($array as $value) {
                $price = new Price();
                $price->value = $value;
                $price->product()->associate($product);
                $price->save();
            }
        } catch (\Exception $e) {
            $success = false;
        }
        return $success;
    }

    /**
     * @param Product $product
     * @throws \Exception
     * @return boolean
     */
    public function delete(Product $product)
    {
        try {
            $success = true;
            $product->delete();
        } catch (\Exception $e) {
            $success = false;
        }
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
        try {
            $success = true;
            $product->update($data);
            $prices = $request->input('prices');
            if ($prices != null) {
                $product->prices()->delete();
            }
            $array = explode(',', $prices);
            foreach ($array as $value) {
                $price = new Price();
                $price->value = $value;
                $price->product()->associate($product);
                $price->save();
            }
            if ($prices == null) {
                $product->prices()->delete();
            }
        } catch (\Exception $e) {
            $success = false;
        }
        return $success;
    }
}
