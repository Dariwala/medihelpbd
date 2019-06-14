<?php

namespace App\Modules\Homeopathic\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\HomeopathicProduct;
use DB;

class HomeopathicProdutController extends Controller
{
    
    public function viewAddHomeopathicProduct($id)
    {
        $homeopathic_id = $id;

        return view('homeopathic::homeopathic_product_add',compact('homeopathic_id'));
    }

    public function postAddHomeopathicProduct(Request $request , $id)
    {
        $data = $request->all();


        $homeopathic_product = new HomeopathicProduct;

        try {


            if($request->hasFile('homeopathic_product_photo'))
            {
                $file = $request->file('homeopathic_product_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/homeopathic_product',$new_file_name);

                if($success)
                {
                    $homeopathic_product->homeopathic_product_photo = $new_file_name;
                    $homeopathic_product->photo_path = 'uploads/homeopathic_product/'.$new_file_name;
                }
            }

            $homeopathic_product->homeopathic_product_description   = $data['homeopathic_product_description'];
            $homeopathic_product->b_homeopathic_product_description = $data['b_homeopathic_product_description'];
            $homeopathic_product->homeopathic_id                    = $id;

            if($homeopathic_product)
            {
                if($homeopathic_product->save())
                {
                    
                     return redirect('homeopathic/edit/info'.'/'.$id)
                        ->with('flash_message', 'Added Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('homeopathic/edit/product/add'.'/'.$id)
                        ->with('flash_message', 'Something went wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                return redirect('homeopathic/edit/product/add'.'/'.$id)
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
    public function viewEditHomeopathicProduct($id,$homeopathic_id)
    {
        $homeopathic_product = HomeopathicProduct::find($id);
        $product_id = $id;

        return view('homeopathic::homeopathic_product_edit',compact('homeopathic_product','product_id','homeopathic_id'));
    }

    
    public function postEditHomeopathicProduct(Request $request , $id,$homeopathic_id)
    {
        $data = $request->all();

        $homeopathic_product = HomeopathicProduct::find($id);

        try {


            if($request->hasFile('homeopathic_product_photo'))
            {
                $file = $request->file('homeopathic_product_photo');

                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;

                $success = $file->move('uploads/homeopathic_product',$new_file_name);

                if($success)
                {
                    $homeopathic_product->homeopathic_product_photo = $new_file_name;
                    $homeopathic_product->photo_path = 'uploads/homeopathic_product/'.$new_file_name;
                }
            }

            $homeopathic_product->homeopathic_product_description   = $data['homeopathic_product_description'];
            $homeopathic_product->b_homeopathic_product_description = $data['b_homeopathic_product_description'];

            if($homeopathic_product)
            {
                if($homeopathic_product->update())
                {
                    
                     return redirect('homeopathic/edit/info'.'/'.$homeopathic_id)
                        ->with('flash_message', 'Edited Successfully.')
                        ->with('flash_notification', 'success');
                }
                else
                {
                    return redirect('homeopathic/edit/product/edit'.'/'.$id)
                        ->with('flash_message', 'Something went wrong')
                        ->with('flash_notification', 'success');
                }
            }
            else
            {
                redirect('homeopathic/edit/product/edit'.'/'.$id)
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
    public function destroy($homeopathic_product_id)
    {
        $homeopathic_product = HomeopathicProduct::find($homeopathic_product_id);

        $homeopathic_id      = HomeopathicProduct::find($homeopathic_product_id)->homeopathic->id;

        if($homeopathic_product->delete())
        {
            return redirect('homeopathic/edit/info'.'/'.$homeopathic_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('homeopathic/edit/info'.'/'.$homeopathic_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

    public function getHomeopathicProduct($homeopathic_id)
    {
        
            $products = DB::table('homeopathic_product')
            ->where('homeopathic_id', $homeopathic_id)
            ->get();

            return $products;
    }
    
}
