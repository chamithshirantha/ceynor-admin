<?php

namespace App\Http\Controllers;

use App\Models\OtherProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class OtherProductsController extends Controller
{
    public function index(){
        return view('admin.otherproducts');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'productname' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{

            $otherpro = new OtherProducts;
            $otherpro->product_name = $request->input('productname');
            $otherpro->length = $request->input('length');
            $otherpro->width = $request->input('width');
            $otherpro->height = $request->input('height');
            $otherpro->price = $request->input('price');
            $otherpro->short_description = $request->input('shortdescription');
            $otherpro->description = $request->input('description');
           
            

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('uploads/otherproducts',$filename);

                $otherpro->image = $filename;

            }
            $otherpro->save();

            return response()->json([
                'status'=>200,
                'message'=> 'Product Added Successfully !!'
            ]);
        }
    }

    public function fetchData(){
        $otherpro = OtherProducts::all();

        return response()->json([
            'otherpro' => $otherpro,
        ]);
    }

    public function edit($id){
        $otherpro = OtherProducts::find($id);

        if($otherpro){
            return response()->json([
                'status'=>200,
                'other_pro'=> $otherpro,
            ]);
        }else {
            return response()->json([
                'status'=>404,
                'other_pro'=>'other product id not found',
            ]);
        }

    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'o_e_productname' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
           $otherpro = OtherProducts::find($id);
            if ($otherpro) {
                $otherpro->product_name = $request->input('o_e_productname');
                $otherpro->length = $request->input('o_e_length');
                $otherpro->width = $request->input('o_e_width');
                $otherpro->height = $request->input('o_e_height');
                $otherpro->price = $request->input('o_e_price');
                $otherpro->short_description = $request->input('o_e_shortdescription');
                $otherpro->description = $request->input('o_e_description');

                if ($request->hasFile('o_e_image')) {

                    $path = 'uploads/otherproducts/'.$otherpro->image;

                    if (File::exists($path)) {
                        
                        File::delete($path);
                    }

                    $file = $request->file('o_e_image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' .$extension;
                    $file->move('uploads/otherproducts',$filename);

                   $otherpro->image = $filename;

                }
               $otherpro->update();

                return response()->json([
                    'status'=>200,
                    'message'=> 'Other Product Updated Successfully !!'
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
        $otherpro = OtherProducts::Find($id);


        if ( $otherpro) {
            $path = 'uploads/otherproducts/'.$otherpro->image;

            if (File::exists($path)) {
                File::delete($path);
            }
            $otherpro->delete();
            return response()->json([
                'status'=>200,
                'message'=> 'Other product Deleted Successfully !!'
            ]);
            
        }else{
            return response()->json([
                'status'=>400,
                'message'=> 'Data not found !!'
            ]);
        }
    }




}
