<?php

namespace App\Http\Controllers\AccountingPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AccountingsModel\Fees;
use App\AccademicsModel\Term;
use App\UsersPackage\Students as Student;
use App\Http\Resources\AccountingsResource\FeesResource;

class FeesController extends Controller
{
    protected function makeFeesPayment(){
        $student_id = Student::where('sfirst_name',explode(' ',request()->student_name)[0])
        ->where('slast_name', explode(' ',request()->student_name)[1])->value('id');
        if(empty($student_id)){ return redirect()->back()->withErrors('Please select a Class to continue');}

        $term_id = Term::where('term', request()->term)->value('id');
        if(empty($term_id)){ return redirect()->back()->withErrors('Please select a term to continue');}

        $fees = new Fees();
        $fees->student_id = $student_id;
        $fees->term_id    = $term_id;
        $fees->amount     = request()->amount;
        $fees->created_by = request()->created_by;
        $fees->save();
        return redirect()->back()->with('msg',"Students fees payment has been registered successfully");
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
        $collection = FeesResource::collection(Fees::all());
        $terms = Term::all();
        $students = Student::all();
        return view('admin_pages.fees',compact('collection','terms','students'));
    }


    protected function getFeesForOneStudent($id){
        return new FeesResource(Fees::find($id));
    }

    protected function validateFeesPayment(){
        if(empty(request()->amount)){
            return redirect()->back()->withErrors("Please add a fees payment");
        }else{
            return $this->makeFeesPayment();
        }
    }
}
