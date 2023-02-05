<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index(){
        return view('admin.gallery');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'imagename' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{

            $gallery = new Gallery;
            $gallery->image_name = $request->input('imagename');
            
            

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('uploads/gallery',$filename);

                $gallery->image = $filename;

            }
            $gallery->save();

            return response()->json([
                'status'=>200,
                'message'=> 'Gallery Added Successfully !!'
            ]);
        }
    }

    public function fetchboat(){
        $images = Gallery::all();

        return response()->json([
            'images' => $images,
        ]);
    }

    public function edit($id){
        $images = Gallery::find($id);

        if($images){
            return response()->json([
                'status'=>200,
                'images'=>$images,
            ]);
        }else {
            return response()->json([
                'status'=>404,
                'message'=>'Data is not found',
            ]);
        }

    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'g_e_imagename' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            $image = Gallery::find($id);
            if ($image) {
                $image->image_name = $request->input('g_e_imagename');
                

                if ($request->hasFile('g_e_image')) {

                    $path = 'uploads/gallery/'.$image->image;

                    if (File::exists($path)) {
                        
                        File::delete($path);
                    }

                    $file = $request->file('g_e_image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' .$extension;
                    $file->move('uploads/gallery',$filename);

                    $image->image = $filename;

                }
                $image->update();

                return response()->json([
                    'status'=>200,
                    'message'=> 'Gallery Updated Successfully !!'
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
        $image = Gallery::Find($id);


        if ($image) {
            $path = 'uploads/gallery/'.$image->image;

            if (File::exists($path)) {
                File::delete($path);
            }
            $image->delete();
            return response()->json([
                'status'=>200,
                'message'=> 'Gallery Image Deleted Successfully !!'
            ]);
            
        }else{
            return response()->json([
                'status'=>400,
                'message'=> 'Data not found !!'
            ]);
        }
    }

}
