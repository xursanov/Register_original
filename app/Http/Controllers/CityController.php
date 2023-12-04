<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    
    public function index()
    {
        
        return City::get();
    }



  
    public function store(Request $request)
    {
        $city = City::create([
            'title'=>$request->title
        ]);
        return response()->json(['data'=>$city], 201);
    }




    
    public function show(int $id)
    {
        return City::find($id);  //-->select * from city where id = $id;
    }

   



    public function update(Request $request, $id)
    {
         $city = City::find($id);
         if(!$city){
            return response()->json(['message'=>'City mavjud emas'], 404);
         }
         $city->update([
            'title'=>$request->title
         ]);
         return response()->json(['message'=>'City updated succesfully!'], 200);
    }

    



    public function destroy(Request $request, $id)
    {
        $city = City::find($id);
         if(!$city){
            return response()->json(['message'=>'City mavjud emas'], 404);
         }
         //$city->delete();

         $city->delete([
            'title'=>$request->title
         ]);

         return response()->json(['message'=>'City deleted succesfully!'], 200);
    }




    public function changeActive(int $id){
        $city = City::find($id);
        if (!$city){
            return response()->json(['message'=>'City mavjud emas'], 404);
        }

        // $city->update([
        //     'active'=>!$city->active
        // ]);

        
        // $city->update([
        //     'active'=> 1 - $city->active         //1 => new = 1 - 1 = 0
        //                                            // 0=> new = 1 - 0 = 1
        // ]);                            

        if ($city->active == true){
            $city->update([
                'active'=>false
            ]);
        }else{ 
            $city->update([
                'active'=>true
            ]);
        }
        return response()->json(['message'=>'City change succesfully!'], 200);

    }
}
