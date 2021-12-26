<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicines;
class Medicine extends Controller
{
    public function add(Request $request){

        $medicine = $request->Image;

        $medicine_new_name = time() . $medicine->getClientOriginalName();

        $medicine->move('uploads/medicines', $medicine_new_name);

    	$medicine= new Medicines();
    	$medicine->name=$request->Name;
    	$medicine->Group=$request->Group;
    	$medicine->Event=$request->Event;
    	$medicine->Indication=$request->Indication;
    	$medicine->Preparation=$request->Preparation;
    	$medicine->Dosage_and_administration=$request->Dosage_and_administration;
    	$medicine->Status=$request->Status;
    	$medicine->Image='uploads/medicines/' . $medicine_new_name;
    	$medicine->Manufacturing_by=$request->Manufacturing_by;
    	$medicine->save();
	    return response()->json([
            "message"=>'ok message',
            "data"=>'success'
        ]);
    }

    public function get(){
    	$medicines=Medicines::all();
    	    return response()->json([
                "message"=>'ok message',
                "data"=>$medicines
            ]);
    }
}
