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

class SubProductController extends Controller
{
    public function index()
    {
        $subproducts = ProductSubCategory::all();
    	return view('product::product_sub_category', compact('subproducts'));
    }

    public function viewAddSubProduct()
    {
        $products = ProductCategory::all();
    	return view('product::product_sub_category_add', compact('products'));
    }

    public function postAddSubProduct(Request $request)
    {
    	$data = $request->all();

        $this->validate($request, [
            'product_subcategory_name'   => 'required',
            'b_product_subcategory_name' => 'required',
            'product_category_id'        => 'required',
        ]);

        $subproduct_category = new ProductSubCategory;

        try {

            $subproduct_category->product_subcategory_name  = $data['product_subcategory_name'];
            $subproduct_category->b_product_subcategory_name = $data['b_product_subcategory_name'];
            $subproduct_category->product_category_id    = $data['product_category_id'];

            if($subproduct_category->save())
            {
                return redirect('product-category/sub-category')
                    ->with('flash_message', 'Added Successfully.')
                    ->with('flash_notification', 'success');
            }
            else
            {
                return redirect('product-category/sub-category')
                    ->with('flash_message', 'Some thing went to wrong!!!')
                    ->with('flash_notification', 'danger');        
            }
            
        } catch (Exception $e) {
            return $e->getMessage();
        }

        
    }

    public function viewSubProduct($id)
    {

        try {

                $product_category_name = ProductSubCategory::find($id)->productCategory->product_category_name;
                $b_product_category_name = ProductSubCategory::find($id)->productCategory->b_product_category_name;

                $subproduct_category = ProductSubCategory::find($id);

                if($subproduct_category && $product_category_name)
                {
                    return view('product::product_sub_category_view', compact('product_category_name','b_product_category_name','subproduct_category'));
                }
                else
                {
                    return redirect('product-category/sub-category')
                        ->with('flash_message', 'Invalid!!! No Data found!!!')
                        ->with('flash_notification', 'danger');
                }
            
           } 

          catch (Exception $e) 
          {
            return $e->getMessage();
          }
        
        
    }


    

    public function viewEditSubProduct($id)
    {


        try {

            $selected_product = ProductSubCategory::find($id)->productCategory->id;
            $products = ProductCategory::all();
            $subproduct_category = ProductSubCategory::find($id);


            if($subproduct_category)
            {

                return view('product::product_sub_category_edit', compact('selected_product', 'subproduct_category', 'products'));
            }
            else
            {
                return redirect('product-category/sub-category')
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function postEditSubProduct(Request $request, $id)
    {
        try {

            $data = $request->all();
            $subproduct_category = ProductSubCategory::find($id);

            $subproduct_category->product_subcategory_name   = $data['product_subcategory_name'];
            $subproduct_category->b_product_subcategory_name = $data['b_product_subcategory_name'];
            $subproduct_category->Product_category_id         = $data['Product_category_id'];

            if($subproduct_category)
            {
                if($subproduct_category->update())
                {
                     return redirect('product-category/sub-category')
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('product-category/sub-category')
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('product-category/sub-category')
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
    }




    public function deleteSubProduct($id)
    {

        try {

            $subproduct_category = ProductSubCategory::find($id);

            if($subproduct_category)
            {
                if($subproduct_category->delete())
                {
                    return redirect('product-category/sub-category')
                        ->with('flash_message', 'Deleted Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('product-category/sub-category')
                        ->with('flash_message', 'something went to wrong')
                        ->with('flash_notification', 'danger');
                }
            }
            else
            {
                return redirect('product-category/sub-category')
                    ->with('flash_message', 'Invalid!!! something went to wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            $e.getMessage();
        }
        
    }


// for api 

    public function getSubProductCategory($id)
    {


       return $product_subcategory = ProductCategory::find($id)->productSubCategories()->select('product_subcategory_name as text', 'id as value')->get(); 
        
    }

    public function getSelectedPharmacySubProductCategory($pharmacy_product_id)
    {

        $selected_product_subcategory = PharmacyProduct::find($pharmacy_product_id)->productSubcategory->id;
        $selected_product_category    = PharmacyProduct::find($pharmacy_product_id)->productCategory->id;

        $product_subcategories = DB::table('product_subcategory')->select('product_subcategory_name as text', 'id as value')->get();

        return response()->json([
            'product_subcategories' =>  $product_subcategories,
            'selected_product_subcategory' => $selected_product_subcategory,
            ], 201);
    }

    public function getSelectedHerbalCenterSubProductCategory($herbal_center_product_id)
    {

        $selected_product_subcategory = HerbalCenterProduct::find($herbal_center_product_id)->productSubcategory->id;
        $selected_product_category    = HerbalCenterProduct::find($herbal_center_product_id)->productCategory->id;

        $product_subcategories = DB::table('product_subcategory')->select('product_subcategory_name as text', 'id as value')->get();

        return response()->json([
            'product_subcategories' =>  $product_subcategories,
            'selected_product_subcategory' => $selected_product_subcategory,
            ], 201);
    }

    public function viewPharmacySubProductCategory($product_category_id,$pharmacy_id)
    {

        $product_subcategory_ids = PharmacyProduct::where('pharmacy_id', $pharmacy_id)->where('product_category_id', $product_category_id)->select('product_subcategory_id')->get();
        if(Session('language')=='bn')
        {
            $pharmacyproductsubcategory = ProductSubCategory::whereIn('id', $product_subcategory_ids)->select('b_product_subcategory_name as text', 'id as value')->get();
        }
        else
        {
            $pharmacyproductsubcategory = ProductSubCategory::whereIn('id', $product_subcategory_ids)->select('product_subcategory_name as text', 'id as value')->get();
        }
        
        
        return response()->json([
            'pharmacyproductsubcategory' =>  $pharmacyproductsubcategory,
            ], 201);
    }
}
