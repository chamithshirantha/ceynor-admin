<?php

namespace App\Http\Controllers;

use App\Models\PassengerBoat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PassengerBoatController extends Controller
{
    public function index(){
        return view('admin.passengerboats');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'boatname' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{

            $boat = new PassengerBoat;
            $boat->boat_name = $request->input('boatname');
            $boat->short_description = $request->input('discription');
            $boat->length = $request->input('length');
            $boat->beam = $request->input('beam');
            $boat->draft = $request->input('draft');
            $boat->main_hull_beam = $request->input('mainhullbeam');
            $boat->fuel = $request->input('fuel');
            $boat->water = $request->input('water');
            $boat->seating_capacity = $request->input('seating_capacity');
            $boat->speed = $request->input('speed');
            $boat->beds = $request->input('beds');
            $boat->hull_type = $request->input('hulltype');
            $boat->fish_hold_capacity = $request->input('fish_hold_capacity');
            $boat->price = $request->input('price');
            

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('uploads/passengerboats',$filename);

                $boat->image = $filename;

            }
            $boat->save();

            return response()->json([
                'status'=>200,
                'message'=> 'Product Added Successfully !!'
            ]);
        }
    }

    public function fetchboat(){
        $boats = PassengerBoat::all();

        return response()->json([
            'boats' => $boats,
        ]);
    }

    public function edit($id){
        $boat = PassengerBoat::find($id);

        if($boat){
            return response()->json([
                'status'=>200,
                'boat'=>$boat,
            ]);
        }else {
            return response()->json([
                'status'=>404,
                'boat'=>'boat id not found',
            ]);
        }

    }


    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'p_e_boatname' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            $boat = PassengerBoat::find($id);
            if ($boat) {
                $boat->boat_name = $request->input('p_e_boatname');
                $boat->short_description = $request->input('p_e_discription');
                $boat->length = $request->input('p_e_length');
                $boat->beam = $request->input('p_e_beam');
                $boat->draft = $request->input('p_e_draft');
                $boat->main_hull_beam = $request->input('p_e_mainhullbeam');
                $boat->fuel = $request->input('p_e_fuel');
                $boat->water = $request->input('p_e_water');
                $boat->seating_capacity = $request->input('p_e_seating_capacity');
                $boat->speed = $request->input('p_e_speed');
                $boat->beds = $request->input('p_e_beds');
                $boat->hull_type = $request->input('p_e_hulltype');
                $boat->fish_hold_capacity = $request->input('p_e_fish_hold_capacity');
                $boat->price = $request->input('p_e_price');

                if ($request->hasFile('p_e_image')) {

                    $path = 'uploads/passengerboats/'.$boat->image;

                    if (File::exists($path)) {
                        
                        File::delete($path);
                    }

                    $file = $request->file('p_e_image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' .$extension;
                    $file->move('uploads/passengerboats',$filename);

                    $boat->image = $filename;

                }
                $boat->update();

                return response()->json([
                    'status'=>200,
                    'message'=> 'Product Updated Successfully !!'
                ]);

            }else {
                return response()->json([
                    'status'=>404,
                    'message'=> 'Data not found !!'
                ]);
            }
                

        }

    }

    public function destory($id){
        $boat = PassengerBoat::Find($id);


        if ($boat) {
            $path = 'uploads/passengerboats/'.$boat->image;

            if (File::exists($path)) {
                File::delete($path);
            }
            $boat->delete();
            return response()->json([
                'status'=>200,
                'message'=> 'Product Deleted Successfully !!'
            ]);
            
        }else{
            return response()->json([
                'status'=>400,
                'message'=> 'Data not found !!'
            ]);
        }
    }








}
