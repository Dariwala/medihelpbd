<?php

namespace App\Modules\Gym\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Models\Gym;
use App\Models\GymNotice;
use DB;


class GymNoticeController extends Controller
{
    public function getGymNoticeAdd($gym_id)
    {
    	return view('gym::gym_notice_add', compact('gym_id'));
    }

    public function postGymNoticeAdd(Request $request, $gym_id)
    {
    	$data = $request->all();

    	$gym_notice = new GymNotice;

    	$gym_notice->gym_notice_description 	= $data['gym_notice_description'];
    	$gym_notice->b_gym_notice_description = $data['b_gym_notice_description'];
    	$gym_notice->gym_id 					= $gym_id;

    	if($gym_notice->save())
        {
        	return redirect('gym/edit/info'.'/'.$gym_id)
                ->with('flash_message', 'Added Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
        	return redirect('gym/edit/notice/add'.'/'.$gym_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function getGymNoticeEdit($gym_notice_id)
    {
        $gym_notice = GymNotice::find($gym_notice_id);

        return view('gym::gym_notice_edit', compact('gym_notice_id', 'gym_notice'));
    }

    public function postGymNoticeEdit(Request $request, $gym_notice_id)
    {
        $data = $request->all();

        $gym_id = GymNotice::find($gym_notice_id)->gym->id;
        
        $gym_notice = GymNotice::find($gym_notice_id);

        
        $gym_notice->gym_notice_description     	= $data['gym_notice_description'];
        $gym_notice->b_gym_notice_description   	= $data['b_gym_notice_description'];
        $gym_notice->gym_id                      	= $gym_id;

        if($gym_notice->update())
        {
            return redirect('gym/edit/info'.'/'.$gym_id)
                ->with('flash_message', 'Edited Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('gym/edit/notice/edit'.'/'.$gym_notice_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }


    public function GymNoticeDelete($gym_notice_id)
    {
        $gym_notice = GymNotice::find($gym_notice_id);

        $gym_id = GymNotice::find($gym_notice_id)->gym->id;

        if($gym_notice->delete())
        {
            return redirect('gym/edit/notice'.'/'.$gym_id)
                ->with('flash_message', 'Deleted Successfully.')
                ->with('flash_notification', 'success');
        }
        else
        {
            return redirect('gym/edit/notice'.'/'.$gym_id)
                ->with('flash_message', 'Some thing went to wrong!!!')
                ->with('flash_notification', 'danger');
        }
    }

}
