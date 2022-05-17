<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
{
   public function index()
   {
       $videos=Video::all();

       return $videos;
   }

   public function create()
   {
       $categoris=Category::all();
       return view('videos.create',compact('categoris'));
   }
   public function store(Request $request)
   {
        $path=Storage::putFile('contracts',$request->file);
        $request->merge([
            'url'=>$path
        ]);
        
        $request->user()->videos()->create($request->all());

        return redirect()->route('index')->with('success',__('messages.success'));
   }

   public function show(Video $video)
   {
    $video->load('comments.user');
    return view('videos.show',compact('video'));

   }

   public function edit(Video $video)
   { 
        $categoris =Category::all();
        return view('videos.edit',compact('video','categoris'));
   }

   public function update(UpdateVideoRequest $request, Video $video)
   {
       $video->update($request->all());
       return redirect()->route('videos.show',$video->slug)->with('success',__('messages.video_edit'));
   }
   
   
   
   
}
