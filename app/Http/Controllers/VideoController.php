<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
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
   public function store(StoreVideoRequest $request)
   {
      
       Video::create($request->all());

       return redirect()->route('index')->with('success',__('messages.success'));
   }

   public function show(Video $video)
   {
    
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
