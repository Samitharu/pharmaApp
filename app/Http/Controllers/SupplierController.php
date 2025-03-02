<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    //Save Supplier
    public function saveSupplier(Request $request){
        try{
            DB::beginTransaction();
            $validatedData = $request->validate([
                'supplier_code' => 'required|unique:suppliers,supplier_code|string|max:255',
                'supplier_name' => 'required|unique:suppliers,supplier_name|string|max:255',
                'supplier_address' => 'required|string|max:255',
                'supplier_contact' => 'required|string|max:255',
                
            ]);
            $validatedData['created_by'] = Auth::user()->id;

               // Create the supplier
               if (Supplier::create($validatedData)) {
                DB::commit();
                return response()->json(['message' => 'Product saved successfully',201]);
            } else {
                return response()->json(['message' => false]);
            }
           
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
