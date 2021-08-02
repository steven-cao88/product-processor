<?php
namespace App\Processors;

use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductProcessor extends BaseProcessor
{
    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }

    public function process()
    {
        if (!isset($this->product_id)) {
            return $this->storeProduct();
        } else {
            return $this->updateProduct();
        }
    }

    private function storeProduct()
    {
        $product = Product::create([
            'product_name' => $this->product_name,
            'product_description' => $this->product_description,
        ]);

        return new ProductResource($product);
    }

    private function updateProduct()
    {
        $product = Product::findOrFail($this->product_id);

        foreach ($product->getFillable() as $fillableProperty) {
            if (isset($this->$fillableProperty)) {
                $product->$fillableProperty = $this->$fillableProperty;
            }
        }

        $product->save();

        return new ProductResource($product);
    }
}