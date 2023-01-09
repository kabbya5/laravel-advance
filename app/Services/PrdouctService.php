<?php
namespace App\Services;

use App\Exceptions\ProductNotFoundException;
use App\Models\Product;

class ProductService {
    public function findByProduct($productName){
        $product = Product::where('slug', $productName)->first();

        if(!$product){
            throw new ProductNotFoundException('product is not Found by product name'. $productName);  
        }
        return $product;
    }
}

