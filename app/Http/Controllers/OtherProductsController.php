<?php

namespace App\Http\Controllers;

use App\Models\OtherProducts;
use Illuminate\Http\Request;
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
}
