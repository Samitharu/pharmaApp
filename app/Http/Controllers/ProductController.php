<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class ProductController extends Controller
{
    // Product save function
    public function saveProduct(Request $request)
    {
        try {
            DB::beginTransaction();
            // Validate the request
            $validatedData = $request->validate([
                'product_code' => 'required|unique:products,product_code|string|max:255',
                'product_name' => 'required|unique:products,product_name|string|max:255',
                'barcode' => 'nullable|unique:products,barcode|string|max:255',
                /* 'supplier_id' => 'required|exists:suppliers,id', */
                'pack_size' => 'nullable|string|max:255',
                'status' => 'required|boolean',
                'purchase_price' => 'required|numeric',
                'whole_sale_price' => 'required|numeric',
                'retail_price' => 'required|numeric',
            ]);

            // Handle image upload
            $imagePath = null;
            if ($request->hasFile('thumbnail')) {
                $imagePath = $request->file('thumbnail')->store('products', 'public'); // Store in 'storage/app/public/products'
            }

            // Add image path to validated data
            $validatedData['image'] = $imagePath;
            $validatedData['created_by'] = Auth::user()->id;

            // Create the product
            if (Product::create($validatedData)) {
                DB::commit();
                return response()->json(['message' => 'Product saved successfully', 'status' => true, 201]);
            } else {
                return response()->json(['message' => false]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    //Load all products to the item table
    public function getProducts(Request $request)
    {
        try {
            $product = DB::table('products')
                ->select('product_id', 'product_code', 'product_name', 'purchase_price', 'whole_sale_price', 'retail_price')
                ->get();
            return response()->json(['status' => true, 'data' => $product]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    //loading item using barcode from the db/ will be used for all transactions
    public function getItemByBarcode($barcode)
    {
        $item = Product::where('barcode', $barcode)->first();

        if ($item) {
            return response()->json([
                'success' => true,
                'item' => [
                    'item_code' => $item->item_code,
                    'name' => $item->name,
                    'pack_size' => $item->pack_size,
                    'purchase_price' => $item->purchase_price,
                    'wholesale_price' => $item->wholesale_price,
                    'retail_price' => $item->retail_price,
                ]
            ]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function getItemToPopupSearch() {
        $items = Product::all();

if ($items->isNotEmpty()) {
    return response()->json([
        'success' => true,
        'items' => $items->map(function ($item) {
            return [
                'product_code' => $item->product_code,
                'product_name' => $item->product_name,
                'pack_size' => $item->pack_size,
                'purchase_price' => $item->purchase_price,
                'wholesale_price' => $item->wholesale_price,
                'retail_price' => $item->retail_price,
            ];
        })
    ]);
} else {
    return response()->json(['success' => false]);
}

    }
}
