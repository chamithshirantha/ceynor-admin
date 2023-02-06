<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index(){
        return view('admin.projects');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'projectname' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{

            $project = new Project;
            $project->project_name = $request->input('projectname');
            $project->start = $request->input('startdate');
            $project->end = $request->input('enddate');
            $project->status = $request->input('status');
            $project->location = $request->input('location');
            $project->short_description = $request->input('shortdescription');
            $project->description = $request->input('description');
            
            

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('uploads/projects',$filename);

                $project->image = $filename;

            }
            $project->save();

            return response()->json([
                'status'=>200,
                'message'=> 'Project Added Successfully !!'
            ]);
        }
    }

    public function fetchData(){
        $projects = Project::all();

        return response()->json([
            'projects' => $projects,
        ]);
    }

    public function edit($id){
        $project = Project::find($id);

        if($project){
            return response()->json([
                'status'=>200,
                'project'=>$project,
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
            'p_e_projectname' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
             $project = Project::find($id);
            if ($project) {
                $project->project_name = $request->input('p_e_projectname');
                $project->start = $request->input('p_e_startdate');
                $project->end = $request->input('p_e_enddate');
                $project->status = $request->input('p_e_status');
                $project->location = $request->input('p_e_location');
                $project->short_description = $request->input('p_e_shortdescription');
                $project->description = $request->input('p_e_description');
                

                if ($request->hasFile('p_e_image')) {

                    $path = 'uploads/projects/'.$project->image;

                    if (File::exists($path)) {
                        
                        File::delete($path);
                    }

                    $file = $request->file('p_e_image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' .$extension;
                    $file->move('uploads/projects',$filename);

                    $project->image = $filename;

                }
                $project->update();

                return response()->json([
                    'status'=>200,
                    'message'=> 'Project Updated Successfully !!'
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
        $project = Project::Find($id);


        if ($project) {
            $path = 'uploads/projects/'.$project->image;

            if (File::exists($path)) {
                File::delete($path);
            }
            $project->delete();
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
