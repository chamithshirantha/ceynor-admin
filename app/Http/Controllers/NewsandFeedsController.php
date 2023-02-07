<?php

namespace App\Http\Controllers;

use App\Models\NewsandFeeds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class NewsandFeedsController extends Controller
{
    public function index(){
        return view('admin.newsandfeeds');
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'newstopic' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{

            $news_feeds = new NewsandFeeds;
            $news_feeds->topic = $request->input('newstopic');
            $news_feeds->description_1 = $request->input('description_1');
            $news_feeds->description_2 = $request->input('description_2');
            $news_feeds->description_3 = $request->input('description_3');
            
            

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('uploads/news-feeds',$filename);

                $news_feeds->image = $filename;

            }
            $news_feeds->save();

            return response()->json([
                'status'=>200,
                'message'=> 'News & Feeds Added Successfully !!'
            ]);
        }
    }


    public function fetchData(){
        $news_feeds = NewsandFeeds::all();

        return response()->json([
            'news_feeds' => $news_feeds,
        ]);
    }

    public function edit($id){
        $news_feeds = NewsandFeeds::find($id);

        if($news_feeds){
            return response()->json([
                'status'=>200,
                'news_feeds'=>$news_feeds,
            ]);
        }else {
            return response()->json([
                'status'=>404,
                'news_feeds'=>'news_feeds id not found',
            ]);
        }

    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'e_n_newstopic' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            $news_feeds = NewsandFeeds::find($id);
            if ($news_feeds) {
                $news_feeds->topic = $request->input('e_n_newstopic');
                $news_feeds->description_1 = $request->input('e_n_description_1');
                $news_feeds->description_2 = $request->input('e_n_description_2');
                $news_feeds->description_3 = $request->input('e_n_description_3');

                if ($request->hasFile('e_n_image')) {

                    $path = 'uploads/news-feeds/'.$news_feeds->image;

                    if (File::exists($path)) {
                        
                        File::delete($path);
                    }

                    $file = $request->file('e_n_image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' .$extension;
                    $file->move('uploads/news-feeds',$filename);

                    $news_feeds->image = $filename;

                }
                $news_feeds->update();

                return response()->json([
                    'status'=>200,
                    'message'=> 'News & Feeds Updated Successfully !!'
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
        $news_feeds = NewsandFeeds::Find($id);


        if ($news_feeds) {
            $path = 'uploads/news-feeds/'.$news_feeds->image;

            if (File::exists($path)) {
                File::delete($path);
            }
            $news_feeds->delete();
            return response()->json([
                'status'=>200,
                'message'=> 'News & Feeds Deleted Successfully !!'
            ]);
            
        }else{
            return response()->json([
                'status'=>400,
                'message'=> 'Data not found !!'
            ]);
        }
    }





}
