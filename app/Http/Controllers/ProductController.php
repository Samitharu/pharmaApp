<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Product save function
    public function saveProduct(Request $request)
    {
        try {
            // Validate the request
            $validatedData = $request->validate([
                'product_code' => 'required|unique:products,product_code|string|max:255',
                'product_name' => 'required|unique:products,product_name|string|max:255',
                'barcode' => 'nullable|unique:products,barcode|string|max:255',
                /* 'supplier_id' => 'required|exists:suppliers,id', */
                'pack_size' => 'nullable|string|max:255',
                'status' => 'required|boolean',
                'purchase_price' => 'required|numeric',
                'wholesale_price' => 'required|numeric',
                'retail_price' => 'required|numeric',
            ]);

            // Handle image upload
            $imagePath = null;
            if ($request->hasFile('thumbnail')) {
                $imagePath = $request->file('thumbnail')->store('products', 'public'); // Store in 'storage/app/public/products'
            }

            // Add image path to validated data
            $validatedData['image'] = $imagePath;

            // Create the product
            if(Product::create($validatedData)) {
                return response()->json(['message' => 'Product saved successfully'], 200);
            }else{
                return response()->json(['message'=> ''],0);
            }

            
        } catch (\Exception $e) {
            return back()->with("error", $e->getMessage());
        }
    }
}
