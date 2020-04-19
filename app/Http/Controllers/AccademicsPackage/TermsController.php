<?php

namespace App\Http\Controllers\AccademicsPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AccademicsModel\Term;
use App\Http\Resources\AccademicsResource\TermsResource;

class TermsController extends Controller
{
    protected function createTerm(){
        $term = new Term();
        $term->term = request()->term;
        $term->year = request()->year;
        $term->duration = request()->duration;
        $term->save();
    }

    protected function updateTerm(Term $term, $id){
        $term->find($id)->update(array(
            'term'     => 1,
            'year'     => 2019,
            'duration' => '4.5 months'
        ));
    }

    protected function getAllTerms(Term $term){
        
        $collection = TermsResource::collection(Term::all());
        return view('admin_pages.terms',compact('collection'));
    }

    protected function getSingleTerm(Term $term, $id){
        return new TermsResource($term->find($id));
    }

    protected function deleteSingleTerm(Term $term, $id){
        $term->find($id)->delete();
    }

    protected function validateTerm(){
        if(empty(request()->term)){
            return redirect()->back()->withErrors("Please select a term to continue");
        }
        if(empty(request()->year)){
            return redirect()->back()->withErrors("Please select a year to continue");
        }
        if(empty(request()->duration)){
            return redirect()->back()->withErrors("Please select a year to continue");
        }else{
            return $this->createTerm();
        }
    }
}
