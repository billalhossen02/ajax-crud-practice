<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function addProduct(Request $request){

    $data = Product::insert([
        'name' => $request->name,
        'description' => $request->description,
        'Price' => $request->price,
       
    ]);

    return response()->json($data);


    }

    public function allData(){
        $data = Product::all();
        return response()->json($data);
    }

    public function editData($id){
        $data = Product::findOrFail($id);
        return response()->json($data);

    }
 

    public function updateData(Request $request, $id){
        $data = Product::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'Price' => $request->price,
        ]);
        return response()->json($data);
        
    }

      public function deleteData($id){
        $data = Product::findOrFail($id)->delete();
        return response()->json($data);

    }




}
