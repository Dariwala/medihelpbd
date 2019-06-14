<?php

namespace App\Modules\Foreignmedical\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ForeignmedicalProduct;
use DB;

class ForeignmedicalProdutController extends Controller
{
    
    public function viewAddForeignmedicalProduct($id)
    {
        $foreignmedical_id = $id;

        return view('foreignmedical::foreignmedical_product_add',compact('foreignmedical_id'));
    }

    public function postAddForeignmedicalProduct(Request $request , $id)
    {
        $data = $request->all();


        $foreignmedical_product = new ForeignmedicalProduct;

        try {


            if($request->hasFile('foreignmedical_product_photo'))
            {
                $file = $request->file('foreignmedical_product_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/foreignmedical_product',$new_file_name);

                if($success)
                {
                    $foreignmedical_product->foreignmedical_product_photo = $new_file_name;
                    $foreignmedical_product->photo_path = 'uploads/foreignmedical_product/'.$new_file_name;
                }
            }

            $foreignmedical_product->foreignmedical_product_description   = $data['foreignmedical_product_description'];
            $foreignmedical_product->b_foreignmedical_product_description = $data['b_foreignmedical_product_description'];
            $foreignmedical_product->foreignmedical_id                    = $id;

            if($foreignmedical_product)
            {
                if($foreignmedical_product->save())
                {
                    
                     return redirect('foreignmedical/edit/info'.'/'.$id)
                        ->with('flash_message', 'Added Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('foreignmedical/edit/product/add'.'/'.$id)
                        ->with('flash_message', 'Something went wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('foreignmedical/edit/product/add'.'/'.$id)
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
    public function viewEditForeignmedicalProduct($id,$foreignmedical_id)
    {
        $foreignmedical_product = ForeignmedicalProduct::find($id);
        $product_id = $id;

        return view('foreignmedical::foreignmedical_product_edit',compact('foreignmedical_product','product_id','foreignmedical_id'));
    }

    
    public function postEditForeignmedicalProduct(Request $request , $id,$foreignmedical_id)
    {
        $data = $request->all();

        $foreignmedical_product = ForeignmedicalProduct::find($id);

        try {


            if($request->hasFile('foreignmedical_product_photo'))
            {
                $file = $request->file('foreignmedical_product_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/foreignmedical_product',$new_file_name);

                if($success)
                {
                    $foreignmedical_product->foreignmedical_product_photo = $new_file_name;
                    $foreignmedical_product->photo_path = 'uploads/foreignmedical_product/'.$new_file_name;
                }
            }

            $foreignmedical_product->foreignmedical_product_description   = $data['foreignmedical_product_description'];
            $foreignmedical_product->b_foreignmedical_product_description = $data['b_foreignmedical_product_description'];

            if($foreignmedical_product)
            {
                if($foreignmedical_product->update())
                {
                    
                     return redirect('foreignmedical/edit/info'.'/'.$foreignmedical_id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('foreignmedical/edit/product/edit'.'/'.$id)
                        ->with('flash_message', 'Something went wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                redirect('foreignmedical/edit/product/edit'.'/'.$id)
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
    public function destroy($foreignmedical_product_id)
    {
        $foreignmedical_product = ForeignmedicalProduct::find($foreignmedical_product_id);

        $foreignmedical_id      = ForeignmedicalProduct::find($foreignmedical_product_id)->foreignmedical->id;

        if($foreignmedical_product->delete())
        {
            return redirect('foreignmedical/edit/info'.'/'.$foreignmedical_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('foreignmedical/edit/info'.'/'.$foreignmedical_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getForeignmedicalProduct($foreignmedical_id)
    {
        
            $products = DB::table('foreignmedical_product')
            ->where('foreignmedical_id', $foreignmedical_id)
            ->get();

            return $products;
    }
    
}
