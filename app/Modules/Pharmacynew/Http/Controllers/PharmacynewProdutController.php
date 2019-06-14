<?php

namespace App\Modules\Pharmacynew\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PharmacynewProduct;
use DB;

class PharmacynewProdutController extends Controller
{
    
    public function viewAddPharmacynewProduct($id)
    {
        $pharmacynew_id = $id;

        return view('pharmacynew::pharmacynew_product_add',compact('pharmacynew_id'));
    }

    public function postAddPharmacynewProduct(Request $request , $id)
    {
        $data = $request->all();


        $pharmacynew_product = new PharmacynewProduct;

        try {


            if($request->hasFile('pharmacynew_product_photo'))
            {
                $file = $request->file('pharmacynew_product_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/pharmacynew_product',$new_file_name);

                if($success)
                {
                    $pharmacynew_product->pharmacynew_product_photo = $new_file_name;
                    $pharmacynew_product->photo_path = 'uploads/pharmacynew_product/'.$new_file_name;
                }
            }

            $pharmacynew_product->pharmacynew_product_description   = $data['pharmacynew_product_description'];
            $pharmacynew_product->b_pharmacynew_product_description = $data['b_pharmacynew_product_description'];
            $pharmacynew_product->pharmacynew_id                    = $id;

            if($pharmacynew_product)
            {
                if($pharmacynew_product->save())
                {
                    
                     return redirect('pharmacynew/edit/info'.'/'.$id)
                        ->with('flash_message', 'Added Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('pharmacynew/edit/product/add'.'/'.$id)
                        ->with('flash_message', 'Something went wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('pharmacynew/edit/product/add'.'/'.$id)
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
    public function viewEditPharmacynewProduct($id,$pharmacynew_id)
    {
        $pharmacynew_product = PharmacynewProduct::find($id);
        $product_id = $id;

        return view('pharmacynew::pharmacynew_product_edit',compact('pharmacynew_product','product_id','pharmacynew_id'));
    }

    
    public function postEditPharmacynewProduct(Request $request , $id,$pharmacynew_id)
    {
        $data = $request->all();

        $pharmacynew_product = PharmacynewProduct::find($id);

        try {


            if($request->hasFile('pharmacynew_product_photo'))
            {
                $file = $request->file('pharmacynew_product_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/pharmacynew_product',$new_file_name);

                if($success)
                {
                    $pharmacynew_product->pharmacynew_product_photo = $new_file_name;
                    $pharmacynew_product->photo_path = 'uploads/pharmacynew_product/'.$new_file_name;
                }
            }

            $pharmacynew_product->pharmacynew_product_description   = $data['pharmacynew_product_description'];
            $pharmacynew_product->b_pharmacynew_product_description = $data['b_pharmacynew_product_description'];

            if($pharmacynew_product)
            {
                if($pharmacynew_product->update())
                {
                    
                     return redirect('pharmacynew/edit/info'.'/'.$pharmacynew_id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('pharmacynew/edit/product/edit'.'/'.$id)
                        ->with('flash_message', 'Something went wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                redirect('pharmacynew/edit/product/edit'.'/'.$id)
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
    public function destroy($pharmacynew_product_id)
    {
        $pharmacynew_product = PharmacynewProduct::find($pharmacynew_product_id);

        $pharmacynew_id      = PharmacynewProduct::find($pharmacynew_product_id)->pharmacynew->id;

        if($pharmacynew_product->delete())
        {
            return redirect('pharmacynew/edit/info'.'/'.$pharmacynew_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('pharmacynew/edit/info'.'/'.$pharmacynew_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getPharmacynewProduct($pharmacynew_id)
    {
        
            $products = DB::table('pharmacynew_product')
            ->where('pharmacynew_id', $pharmacynew_id)
            ->get();

            return $products;
    }
    
}
