<?php

namespace App\Modules\Optical\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\OpticalProduct;
use DB;

class OpticalProdutController extends Controller
{
    
    public function viewAddOpticalProduct($id)
    {
        $optical_id = $id;

        return view('optical::optical_product_add',compact('optical_id'));
    }

    public function postAddOpticalProduct(Request $request , $id)
    {
        $data = $request->all();


        $optical_product = new OpticalProduct;

        try {


            if($request->hasFile('optical_product_photo'))
            {
                $file = $request->file('optical_product_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/optical_product',$new_file_name);

                if($success)
                {
                    $optical_product->optical_product_photo = $new_file_name;
                    $optical_product->photo_path = 'uploads/optical_product/'.$new_file_name;
                }
            }

            $optical_product->optical_product_description   = $data['optical_product_description'];
            $optical_product->b_optical_product_description = $data['b_optical_product_description'];
            $optical_product->optical_id                    = $id;

            if($optical_product)
            {
                if($optical_product->save())
                {
                    
                     return redirect('optical/edit/info'.'/'.$id)
                        ->with('flash_message', 'Added Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('optical/edit/product/add'.'/'.$id)
                        ->with('flash_message', 'Something went wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('optical/edit/product/add'.'/'.$id)
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
    public function viewEditOpticalProduct($id,$optical_id)
    {
        $optical_product = OpticalProduct::find($id);
        $product_id = $id;

        return view('optical::optical_product_edit',compact('optical_product','product_id','optical_id'));
    }

    
    public function postEditOpticalProduct(Request $request , $id,$optical_id)
    {
        $data = $request->all();

        $optical_product = OpticalProduct::find($id);

        try {


            if($request->hasFile('optical_product_photo'))
            {
                $file = $request->file('optical_product_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/optical_product',$new_file_name);

                if($success)
                {
                    $optical_product->optical_product_photo = $new_file_name;
                    $optical_product->photo_path = 'uploads/optical_product/'.$new_file_name;
                }
            }

            $optical_product->optical_product_description   = $data['optical_product_description'];
            $optical_product->b_optical_product_description = $data['b_optical_product_description'];

            if($optical_product)
            {
                if($optical_product->update())
                {
                    
                     return redirect('optical/edit/info'.'/'.$optical_id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('optical/edit/product/edit'.'/'.$id)
                        ->with('flash_message', 'Something went wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                redirect('optical/edit/product/edit'.'/'.$id)
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
    public function destroy($optical_product_id)
    {
        $optical_product = OpticalProduct::find($optical_product_id);

        $optical_id      = OpticalProduct::find($optical_product_id)->optical->id;

        if($optical_product->delete())
        {
            return redirect('optical/edit/info'.'/'.$optical_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('optical/edit/info'.'/'.$optical_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getOpticalProduct($optical_id)
    {
        
            $products = DB::table('optical_product')
            ->where('optical_id', $optical_id)
            ->get();

            return $products;
    }
    
}
