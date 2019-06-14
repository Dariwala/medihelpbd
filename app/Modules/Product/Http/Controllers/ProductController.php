<?php

namespace App\Modules\Product\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\PharmacyProduct;
use App\Models\HerbalCenterProduct;

use Exception;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductCategory::all();
    	return view('product::product_category', compact('products'));
    }

    public function viewAddProduct()
    {
    	return view('product::product_category_add');
    }

    public function postAddProduct(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'product_category_name'   => 'required',
            'b_product_category_name' => 'required',
        ]);

        $product = new ProductCategory;

        try {

            $product->product_category_name  = $data['product_category_name'];
            $product->b_product_category_name = $data['b_product_category_name'];

            if($product->save())
            {
                return redirect('product-category')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('product-category')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {

            return $e->getMessage();
        }

    }

    public function viewProduct($id)
    {
        $product = ProductCategory::find($id);

        try {

            if($product)
            {
                return view('product::product_category_view', compact('product'));
            }
            else
            {
                return redirect('product-category')
                    ->with('flash_message', 'Invalid!!! No Data found!!!')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
        
    }


    

    public function viewEditProduct($id)
    {
        $product = ProductCategory::find($id);

        try {

            if($product)
            {
                return view('product::product_category_edit', compact('product'));
            }
            else
            {
                return redirect('product-category')
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }

    public function postEditProduct(Request $request, $id)
    {
        $data = $request->all();

        $product = ProductCategory::find($id);

        try {

            $product->product_category_name = $data['product_category_name'];
            $product->b_product_category_name = $data['b_product_category_name'];

            if($product)
            {
                if($product->update())
                {
                     return redirect('product-category')
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('product-category')
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('product-category')
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }




    public function deleteProduct($id)
    {
        $product = ProductCategory::find($id);

        try {

            if($product)
            {
                if($product->delete())
                {
                    return redirect('product-category')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('product-category')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('product-category')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }

    }

    public function getProductCategory()
    {
        $product_category = DB::table('product_category')->select('product_category_name as text', 'id as value')->get();
        return $product_category;
    }

    public function getSelectedPharmacyProductCategory($pharmacy_product_id)
    {

        $selected_product_category = PharmacyProduct::find($pharmacy_product_id)->productCategory->id;

        $product_categories = DB::table('product_category')->select('product_category_name as text', 'id as value')->get();

        return response()->json([
            'product_categories' =>  $product_categories,
            'selected_product_category' => $selected_product_category,
            ], 201);
    }

    public function getSelectedHerbalCenterProductCategory($herbal_center_product_id)
    {

        $selected_product_category = HerbalCenterProduct::find($herbal_center_product_id)->productCategory->id;

        $product_categories = DB::table('product_category')->select('product_category_name as text', 'id as value')->get();

        return response()->json([
            'product_categories' =>  $product_categories,
            'selected_product_category' => $selected_product_category,
            ], 201);
    }

    public function viewPharmacyProductCategory($pharmacy_id)
    {

        $product_category_ids = PharmacyProduct::where('pharmacy_id', $pharmacy_id)->select('product_category_id')->get();

        if(Session('language')=='bn')
        {
            $pharmacyproductcategory = ProductCategory::whereIn('id', $product_category_ids)->select('b_product_category_name as text', 'id as value')->get();
        }
        
        else
        {
            $pharmacyproductcategory = ProductCategory::whereIn('id', $product_category_ids)->select('product_category_name as text', 'id as value')->get();
        }
        return response()->json([
            'pharmacyproductcategory' =>  $pharmacyproductcategory,
            ], 201);
    }
    
    public function viewHerbalCenterProductCategory($herbal_center_id)
    {

        $product_category_ids = HerbalCenterProduct::where('herbal_center_id', $herbal_center_id)->select('product_category_id')->get();

        if(Session('language')=='bn')
        {
            $herbalcenterproductcategory = ProductCategory::whereIn('id', $product_category_ids)->select('b_product_category_name as text', 'id as value')->get();
        }
        
        else
        {
            $herbalcenterproductcategory = ProductCategory::whereIn('id', $product_category_ids)->select('product_category_name as text', 'id as value')->get();
        }
        return response()->json([
            '$herbalcenterproductcategory' =>  $herbalcenterproductcategory,
            ], 201);
    }

    
}
