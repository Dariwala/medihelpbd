<?php

namespace App\Modules\Pharmacy\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PharmacyProduct;
use DB;

class PharmacyProdutController extends Controller
{
    
    public function viewAddPharmacyProduct($id)
    {
        $pharmacy_id = $id;

        return view('pharmacy::pharmacy_product_add',compact('pharmacy_id'));
    }

    public function postAddPharmacyProduct(Request $request , $id)
    {
        $data = $request->all();


        $pharmacy_product = new PharmacyProduct;

        try {


            if($request->hasFile('pharmacy_product_photo'))
            {
                $file = $request->file('pharmacy_product_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/pharmacy_product',$new_file_name);

                if($success)
                {
                    $pharmacy_product->pharmacy_product_photo = $new_file_name;
                    $pharmacy_product->photo_path = 'uploads/pharmacy_product/'.$new_file_name;
                }
            }

            $pharmacy_product->pharmacy_product_description   = $data['pharmacy_product_description'];
            $pharmacy_product->b_pharmacy_product_description = $data['b_pharmacy_product_description'];
            $pharmacy_product->pharmacy_id                    = $id;

            if($pharmacy_product)
            {
                if($pharmacy_product->save())
                {
                    
                     return redirect('pharmacy/edit/info'.'/'.$id)
                        ->with('flash_message', 'Added Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('pharmacy/edit/product/add'.'/'.$id)
                        ->with('flash_message', 'Something went wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('pharmacy/edit/product/add'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewEditPharmacyProduct($id,$pharmacy_id)
    {
        $pharmacy_product = PharmacyProduct::find($id);
        $product_id = $id;

        return view('pharmacy::pharmacy_product_edit',compact('pharmacy_product','product_id','pharmacy_id'));
    }

    
    public function postEditPharmacyProduct(Request $request , $id,$pharmacy_id)
    {
        $data = $request->all();

        $pharmacy_product = PharmacyProduct::find($id);

        try {


            if($request->hasFile('pharmacy_product_photo'))
            {
                $file = $request->file('pharmacy_product_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/pharmacy_product',$new_file_name);

                if($success)
                {
                    $pharmacy_product->pharmacy_product_photo = $new_file_name;
                    $pharmacy_product->photo_path = 'uploads/pharmacy_product/'.$new_file_name;
                }
            }

            $pharmacy_product->pharmacy_product_description   = $data['pharmacy_product_description'];
            $pharmacy_product->b_pharmacy_product_description = $data['b_pharmacy_product_description'];

            if($pharmacy_product)
            {
                if($pharmacy_product->update())
                {
                    
                     return redirect('pharmacy/edit/info'.'/'.$pharmacy_id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('pharmacy/edit/product/edit'.'/'.$id)
                        ->with('flash_message', 'Something went wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                redirect('pharmacy/edit/product/edit'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went wrong')
                    ->with('flash_notification', 'danger');
            }
            
        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pharmacy_product_id)
    {
        $pharmacy_product = PharmacyProduct::find($pharmacy_product_id);

        $pharmacy_id      = PharmacyProduct::find($pharmacy_product_id)->pharmacy->id;

        if($pharmacy_product->delete())
        {
            return redirect('pharmacy/edit/info'.'/'.$pharmacy_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('pharmacy/edit/info'.'/'.$pharmacy_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getPharmacyProduct($pharmacy_id)
    {
        
            $products = DB::table('pharmacy_product')
            ->where('pharmacy_id', $pharmacy_id)
            ->get();

            return $products;
    }
    
}
