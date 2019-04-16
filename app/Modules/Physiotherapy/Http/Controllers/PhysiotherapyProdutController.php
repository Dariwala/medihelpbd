<?php

namespace App\Modules\Physiotherapy\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PhysiotherapyProduct;
use DB;

class PhysiotherapyProdutController extends Controller
{
    
    public function viewAddPhysiotherapyProduct($id)
    {
        $physiotherapy_id = $id;

        return view('physiotherapy::physiotherapy_product_add',compact('physiotherapy_id'));
    }

    public function postAddPhysiotherapyProduct(Request $request , $id)
    {
        $data = $request->all();


        $physiotherapy_product = new PhysiotherapyProduct;

        try {


            if($request->hasFile('physiotherapy_product_photo'))
            {
                $file = $request->file('physiotherapy_product_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/physiotherapy_product',$new_file_name);

                if($success)
                {
                    $physiotherapy_product->physiotherapy_product_photo = $new_file_name;
                    $physiotherapy_product->photo_path = 'uploads/physiotherapy_product/'.$new_file_name;
                }
            }

            $physiotherapy_product->physiotherapy_product_description   = $data['physiotherapy_product_description'];
            $physiotherapy_product->b_physiotherapy_product_description = $data['b_physiotherapy_product_description'];
            $physiotherapy_product->physiotherapy_id                    = $id;

            if($physiotherapy_product)
            {
                if($physiotherapy_product->save())
                {
                    
                     return redirect('physiotherapy/edit/info'.'/'.$id)
                        ->with('flash_message', 'Added Successfully')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('physiotherapy/edit/product/add'.'/'.$id)
                        ->with('flash_message', 'Something went wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('physiotherapy/edit/product/add'.'/'.$id)
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
    public function viewEditPhysiotherapyProduct($id,$physiotherapy_id)
    {
        $physiotherapy_product = PhysiotherapyProduct::find($id);
        $product_id = $id;

        return view('physiotherapy::physiotherapy_product_edit',compact('physiotherapy_product','product_id','physiotherapy_id'));
    }

    
    public function postEditPhysiotherapyProduct(Request $request , $id,$physiotherapy_id)
    {
        $data = $request->all();

        $physiotherapy_product = PhysiotherapyProduct::find($id);

        try {


            if($request->hasFile('physiotherapy_product_photo'))
            {
                $file = $request->file('physiotherapy_product_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/physiotherapy_product',$new_file_name);

                if($success)
                {
                    $physiotherapy_product->physiotherapy_product_photo = $new_file_name;
                    $physiotherapy_product->photo_path = 'uploads/physiotherapy_product/'.$new_file_name;
                }
            }

            $physiotherapy_product->physiotherapy_product_description   = $data['physiotherapy_product_description'];
            $physiotherapy_product->b_physiotherapy_product_description = $data['b_physiotherapy_product_description'];

            if($physiotherapy_product)
            {
                if($physiotherapy_product->update())
                {
                    
                     return redirect('physiotherapy/edit/info'.'/'.$physiotherapy_id)
                        ->with('flash_message', 'Updated Successfully')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('physiotherapy/edit/product/edit'.'/'.$id)
                        ->with('flash_message', 'Something went wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                redirect('physiotherapy/edit/product/edit'.'/'.$id)
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
    public function destroy($physiotherapy_product_id)
    {
        $physiotherapy_product = PhysiotherapyProduct::find($physiotherapy_product_id);

        $physiotherapy_id      = PhysiotherapyProduct::find($physiotherapy_product_id)->physiotherapy->id;

        if($physiotherapy_product->delete())
        {
            return redirect('physiotherapy/edit/info'.'/'.$physiotherapy_id)
                ->with('flash_message', 'Deleted Successfully')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('physiotherapy/edit/info'.'/'.$physiotherapy_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getPhysiotherapyProduct($physiotherapy_id)
    {
        
            $products = DB::table('physiotherapy_product')
            ->where('physiotherapy_id', $physiotherapy_id)
            ->get();

            return $products;
    }
    
}
