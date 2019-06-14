<?php

namespace App\Modules\Foreignmedical\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Foreignmedical;
use App\Models\ForeignmedicalNotice;

class ForeignmedicalNoticeController extends Controller
{
    public function getForeignmedicalNoticeAdd($foreignmedical_id)
    {
    	return view('foreignmedical::foreignmedical_notice_add', compact('foreignmedical_id'));
    }

    public function postForeignmedicalNoticeAdd(Request $request, $foreignmedical_id)
    {
    	$data = $request->all();

    	$foreignmedical_notice = new ForeignmedicalNotice;

    	$foreignmedical_notice->foreignmedical_notice_description 	= $data['foreignmedical_notice_description'];
    	$foreignmedical_notice->b_foreignmedical_notice_description = $data['b_foreignmedical_notice_description'];
    	$foreignmedical_notice->foreignmedical_id 					= $foreignmedical_id;

    	if($foreignmedical_notice->save())
        {
        	return redirect('foreignmedical/edit/info'.'/'.$foreignmedical_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('foreignmedical/edit/notice/add'.'/'.$foreignmedical_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getForeignmedicalNoticeEdit($foreignmedical_notice_id)
    {
        $foreignmedical_notice = ForeignmedicalNotice::find($foreignmedical_notice_id);

        return view('foreignmedical::foreignmedical_notice_edit', compact('foreignmedical_notice_id', 'foreignmedical_notice'));
    }

    public function postForeignmedicalNoticeEdit(Request $request, $foreignmedical_notice_id)
    {
        $data = $request->all();

        $foreignmedical_id = ForeignmedicalNotice::find($foreignmedical_notice_id)->foreignmedical->id;
        
        $foreignmedical_notice = ForeignmedicalNotice::find($foreignmedical_notice_id);

        

        $foreignmedical_notice->foreignmedical_notice_description     	= $data['foreignmedical_notice_description'];
        $foreignmedical_notice->b_foreignmedical_notice_description   	= $data['b_foreignmedical_notice_description'];
        $foreignmedical_notice->foreignmedical_id                      	= $foreignmedical_id;

        if($foreignmedical_notice->update())
        {
            return redirect('foreignmedical/edit/info'.'/'.$foreignmedical_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('foreignmedical/edit/notice/edit'.'/'.$foreignmedical_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function ForeignmedicalNoticeDelete($foreignmedical_notice_id)
    {
        $foreignmedical_notice = ForeignmedicalNotice::find($foreignmedical_notice_id);
        $foreignmedical_id     = ForeignmedicalNotice::find($foreignmedical_notice_id)->foreignmedical->id;

        if($foreignmedical_notice->delete())
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

}
