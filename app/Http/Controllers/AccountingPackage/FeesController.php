<?php

namespace App\Http\Controllers\AccountingPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AccountingsModel\Fees;
use App\Http\Resources\AccountingsResource\FeesResource;

class FeesController extends Controller
{
    protected function makeFeesPayment(){
        $fees = new Fees();
        $fees->student_id = request()->student_id;
        $fees->term_id    = request()->term_id;
        $fees->amount     = request()->amount;
        $fees->created_by = request()->created_by;
        $fees->save();
    }

    protected function updateFees(Fees $fees, $id){
        $fees->find($id)->update(array(
            'student_id' => 1,
            'term_id'    => 1,
            'amount'     => 270000,
            'created_by' => 1
        ));
    }

    protected function getAllFeesPayments(){
        return FeesResource::collection(Fees::join('students','students.id','fees.student_id')
        ->join('terms','terms.id','fees.term_id')
        ->join('users','users.id','fees.created_by')->get());
    }

    protected function getFeesForOneStudent($id){
        return new FeesResource(Fees::find($id));
    }

    protected function validateFeesPayment(){
        if(empty(request()->amount)){
            return redirect()->withErrors("Please add a fees payment");
        }else{
            return $this->makeFeesPayment();
        }
    }
}
