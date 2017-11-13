<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BillRequest;
use App\Bill;
use App\BillDetail;

class BillController extends Controller
{
    public function getList(){
    	$data =Bill::select('id','id_customer','date_order','total','payment','note','status')->orderBy('id','DESC')->get()->toArray();
        return view('admin.bill.list',compact('data','customer'));
    }
    public function getEdit($id){
        $bills = Bill::find($id);
        $bill_details = Bill::find($id)->bill_detail->toArray();
        return view('admin.bill.edit',compact('bills','bill_details','customer'));
    }
    public function postEdit($id ,Request $request){
        $bills = Bill::find($id);
			$bills->status=$request->rdoStatus;
			$bills->save();
		return redirect()->route('admin.bills.getList')->with(['flash_message'=>'Đã sửa thành công ! ']);
    }

    public function getDetail($id){
        $data = Bill::findOrFail($id)->toArray();
        $detail =  Bill::find($id)->bill_detail->toArray();
        return view('admin.bill.details',compact('data','id','detail'));
    }
}
