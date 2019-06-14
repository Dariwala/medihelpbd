<?php

namespace App\Modules\Herbalcenter\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\HerbalCenter;
use App\Models\HerbalCenterProduct;
use DB;



class HerbalCenterProdutController extends Controller
{
    
    public function viewAddHerbalCenterProduct($id)
    {
        $herbal_center_id = $id;

        return view('herbalcenter::herbal_center_product_add',compact('herbal_center_id'));
    }

    public function postAddHerbalCenterProduct(Request $request , $id)
    {
        $data = $request->all();

        $herbal_center_product = new HerbalCenterProduct;

        try {


            if($request->hasFile('herbal_center_product_photo'))
            {
                $file = $request->file('herbal_center_product_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/herbal_center_product',$new_file_name);

                if($success)
                {
                    $herbal_center_product->herbal_center_product_photo = $new_file_name;
                    $herbal_center_product->photo_path = 'uploads/herbal_center_product/'.$new_file_name;
                }
            }


            $herbal_center_product->herbal_center_product_description   = $data['herbal_center_product_description'];
            $herbal_center_product->b_herbal_center_product_description = $data['b_herbal_center_product_description'];
            $herbal_center_product->herbal_center_id                    = $id;
            


            if($herbal_center_product)
            {
                if($herbal_center_product->save())
                {
                    
                     return redirect('herbal-center/edit/info'.'/'.$id)
                        ->with('flash_message', 'Added Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('herbal-center/edit/product/add'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('herbal-center/edit/product/add'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
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
    public function viewEditHerbalCenterProduct($id,$herbal_center_id)
    {
        $herbal_center_product = HerbalCenterProduct::find($id);
        $product_id = $id;

        return view('herbalcenter::herbal_center_product_edit',compact('herbal_center_product','product_id','herbal_center_id'));
    }

    
    public function postEditHerbalCenterProduct(Request $request , $id,$herbal_center_id)
    {
        $data = $request->all();

        $herbal_center_product = HerbalCenterProduct::find($id);

        try {


            if($request->hasFile('herbal_center_product_photo'))
            {
                $file = $request->file('herbal_center_product_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/herbal_center_product',$new_file_name);

                if($success)
                {
                    $herbal_center_product->herbal_center_product_photo = $new_file_name;
                    $herbal_center_product->photo_path = 'uploads/herbal_center_product/'.$new_file_name;
                }
            }

            $herbal_center_product->herbal_center_product_description   = $data['herbal_center_product_description'];
            $herbal_center_product->b_herbal_center_product_description = $data['b_herbal_center_product_description'];
          

            if($herbal_center_product)
            {
                if($herbal_center_product->update())
                {
                    
                     return redirect('herbal-center/edit/info'.'/'.$herbal_center_id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('herbal-center/edit/product/edit'.'/'.$id)
                        ->with('flash_message', 'Something went to wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                redirect('herbal-center/edit/product/edit'.'/'.$id)
                    ->with('flash_message', 'Invalid!!! Something went to wrong')
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
    public function destroy($herbal_center_product_id)
    {
        $herbal_center_product = HerbalCenterProduct::find($herbal_center_product_id);

        $herbal_center_id      = HerbalCenterProduct::find($herbal_center_product_id)->herbal_center_id;

        if($herbal_center_product->delete())
        {
            return redirect('herbal-center/edit/info'.'/'.$herbal_center_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('herbal-center/edit/info'.'/'.$herbal_center_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getHerbalCenterProduct($herbal_center_id)
    {
        
            $products = DB::table('herbal_center_product')
            ->where('herbal_center_id', $herbal_center_id)
            ->get();

            return $products;
    }
    
}
