<?php

namespace App\Modules\Service\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

use App\Models\Notice;
use App\Models\District;
use App\Models\SubDistrict;
use DB;

use Exception;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::all();
        return view('service::notice.index', compact('notices'));
    }
    
    public function create()
    {   
        $districts      = District::all();
        $subdistricts   = SubDistrict::all();
        
        return view('service::notice.create', compact('districts','subdistricts'));
    }
    
    public function ajaxSubdistrict($id){
        
            
        if(Session('language')=='bn') 
        {
          $subdisctricts = SubDistrict::select('b_sub_district_name as sub_district_name','id')->orderBy('sub_district_name','ASC')->where('district_id', $id)->get();
        }
        else
        {
           $subdisctricts = SubDistrict::select('sub_district_name as sub_district_name','id')->orderBy('sub_district_name','ASC')->where('district_id', $id)->get();
        }
        
        return Response::json($subdisctricts);
    }
    
    public function store(Request $request)
    {   
        $this->validate($request, [
            'district_id'           => 'required',
            'sub_district_id'       => 'required',
            'service_provider'      => 'required',
            'thumbnail'             => 'required',
        ]);
        
        $notice                     = new Notice();
        $notice->district_id        = $request->district_id;
        $notice->sub_district_id    = $request->sub_district_id;
        $notice->service_provider   = $request->service_provider;
        $notice->title              = $request->title;
        $notice->b_title            = $request->b_title;
        $notice->details            = $request->details;
        $notice->b_details          = $request->b_details;
        
        if($request->hasFile('thumbnail')){
            $image = $request->file('thumbnail');
            $imageName = time().".".$image->getClientOriginalExtension();
            $directory = 'uploads/notice/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;
            $notice->thumbnail = $imageUrl;
        }
        
        $notice->save();
        
        if($notice->save()){
            return redirect()
                    ->route('notice_index')
    				->with('flash_message', 'Added Successfully.')
    				->with('flash_notification', 'success');
        }else{
            return redirect()
                    ->route('notice_index')
    				->with('flash_message', 'Sorry, Something went wrong!')
    				->with('flash_notification', 'danger');
        }
        
    }
    
    public function edit($id)
    {   
        $districts      = District::all();
        $subdistricts   = SubDistrict::all();
        $notice         = Notice::find($id);
        return view('service::notice.edit', compact('districts','subdistricts','notice'));
    }

    
    public function update(Request $request, $id)
    {   
        $this->validate($request, [
            'district_id'           => 'required',
            'sub_district_id'       => 'required',
            'service_provider'      => 'required',
        ]);
        
        $notice                     = Notice::find($id);
        $notice->district_id        = $request->district_id;
        $notice->sub_district_id    = $request->sub_district_id;
        $notice->service_provider   = $request->service_provider;
        $notice->title              = $request->title;
        $notice->b_title            = $request->b_title;
        $notice->details            = $request->details;
        $notice->b_details          = $request->b_details;
        
        if($request->hasFile('thumbnail')){
            $notice  = Notice::find($id);
            
            if(isset($notice->thumbnail)){
                unlink($notice->thumbnail);
            }
            
            $image = $request->file('thumbnail');
            $imageName = time().".".$image->getClientOriginalExtension();
            $directory = 'uploads/notice/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;
            $notice->thumbnail = $imageUrl;
        }
        
        $notice->save();
        
        if($notice->save()){
            return redirect()
                    ->route('notice_index')
    				->with('flash_message', 'Edited Successfully.')
    				->with('flash_notification', 'success');
        }else{
            return redirect('notice_index')
                    ->route('notice_index')
    				->with('flash_message', 'Sorry, Something went wrong!')
    				->with('flash_notification', 'danger');
        }
        
    }
    
    public function delete($id)
    {   
        
        $notice         = Notice::find($id);
        
        if($notice->delete()){
            
            if(isset($notice->thumbnail)){
                unlink($notice->thumbnail);
            }
            
            return redirect()
                    ->route('notice_index')
    				->with('flash_message', 'Deleted Successfully.')
    				->with('flash_notification', 'success');
        }else{
            return redirect()
                    ->route('notice_index')
    				->with('flash_message', 'Sorry, Something went wrong!')
    				->with('flash_notification', 'danger');
        }
        
    }
    
    public function noticeFrontend($id, $sub_district_id){
        $notice_all     = Notice::where('sub_district_id',$sub_district_id)->orderBy('id','DESC')->get();
        $total_notice   = Notice::where('sub_district_id', $sub_district_id)->count();
        $notice         = Notice::find($id);
        $notice_id      = $id;
        
        return view('service::notice.notice', compact('notice_all', 'total_notice','notice','notice_id'));
    }

}
