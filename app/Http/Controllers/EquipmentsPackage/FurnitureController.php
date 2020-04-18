<?php

namespace App\Http\Controllers\EquipmentsPackage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EquipmentsPackage\Furniture;
use App\Http\Resources\EquipmentsResources\Furniture as FurnitureResource;

class FurnitureController extends Controller
{
    protected function createFurniture(){
        $furniture = new Furniture();
        $furniture->furniture_name = request()->furniture_name;
        $furniture->number_bought  = request()->number_bought;
        $furniture->created_by     = request()->created_by;
        $furniture->save();
    }

    protected function updateFurniture(Furniture $furniture, $id){
        $furniture->find($id)->update(array(
            'furniture_name' => 'bench',
            'number_bought'  => 34,
            'created_by'     => 1
        ));
    }

    protected function getAllFurniture(){
        $collection = FurnitureResource::collection(Furniture::all());
        return $collection;
    }

    protected function deleteFurniture(Furniture $furniture, $id){
        $furniture->find($id)->delete();
    }

    protected function validateFurniture(){
        if(empty(request()->furniture_name)){
            return redirect()->back()->withErrors("Please put the name of the furniture beign added");
        }
        if(empty(request()->number_bought)){
            return redirect()->back()->withErrors("Please put the amount of the furniture beign added");
        }
        else{
            return $this->createFurniture();
        }
    }
}
