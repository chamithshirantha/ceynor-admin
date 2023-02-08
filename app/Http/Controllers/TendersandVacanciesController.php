<?php

namespace App\Http\Controllers;

use App\Models\TendersandVacancies;
use Illuminate\Http\Request;
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

}
