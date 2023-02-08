<?php

namespace App\Http\Controllers;

use App\Models\TendersandVacancies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TendersandVacanciesController extends Controller
{
    public function index(){
        return view('admin.tendersandvac');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'tendertitle' => 'required',
            'file' => 'required|mimes:pdf|max:10000',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{

            $tenders_vacancies = new TendersandVacancies;
            $tenders_vacancies->topic = $request->input('tendertitle');
            $tenders_vacancies->description_1 = $request->input('description_1');
            $tenders_vacancies->description_2 = $request->input('description_2');
            $tenders_vacancies->description_3 = $request->input('description_3');
            
            

            if ($request->hasFile('file')) {

                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('uploads/tenders-vacancies',$filename);

                $tenders_vacancies->file = $filename;

            }
            $tenders_vacancies->save();

            return response()->json([
                'status'=>200,
                'message'=> 'Tenders & Vacancies Added Successfully !!'
            ]);
        }
    }

    public function fetchData(){
        $tenders_vacancies = TendersandVacancies::all();

        return response()->json([
            'tenders_vacancies' => $tenders_vacancies,
        ]);
    }


    public function edit($id){
        $tenders_vacancies = TendersandVacancies::find($id);

        if($tenders_vacancies){
            return response()->json([
                'status'=>200,
                'tenders_vacancies'=>$tenders_vacancies,
            ]);
        }else {
            return response()->json([
                'status'=>404,
                'tenders_vacancies'=>'tenders_vacancies id not found',
            ]);
        }

    }


    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'e_t_tendertitle' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            $tenders_vacancies = TendersandVacancies::find($id);
            if ($tenders_vacancies) {
                $tenders_vacancies->topic = $request->input('e_t_tendertitle');
                $tenders_vacancies->description_1 = $request->input('e_t_description_1');
                $tenders_vacancies->description_2 = $request->input('e_t_description_2');
                $tenders_vacancies->description_3 = $request->input('e_t_description_3');

                if ($request->hasFile('e_t_file')) {

                    $path = 'uploads/tenders-vacancies/'.$tenders_vacancies->file;

                    if (File::exists($path)) {
                        
                        File::delete($path);
                    }

                    $file = $request->file('e_t_file');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' .$extension;
                    $file->move('uploads/tenders-vacancies',$filename);

                    $tenders_vacancies->file = $filename;

                }
                $tenders_vacancies->update();

                return response()->json([
                    'status'=>200,
                    'message'=> 'Tenders & Vacancies Updated Successfully !!'
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
        $tenders_vacancies = TendersandVacancies::Find($id);


        if ($tenders_vacancies) {
            $path = 'uploads/tenders-vacancies/'.$tenders_vacancies->file;

            if (File::exists($path)) {
                File::delete($path);
            }
            $tenders_vacancies->delete();
            return response()->json([
                'status'=>200,
                'message'=> 'Tenders & Vacancies Deleted Successfully !!'
            ]);
            
        }else{
            return response()->json([
                'status'=>400,
                'message'=> 'Data not found !!'
            ]);
        }
    }

}
