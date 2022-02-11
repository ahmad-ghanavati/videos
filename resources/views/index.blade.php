@extends('components.layout')
    @section('content')

        <div class="site-output">
        <div id="all-output" class="col-md-12">
            
            <x-latest-videos></x-latest-videos>
          
                <h1 class="new-video-title"><i class="fa fa-bolt"></i> پربازدیدترین ویدیوها</h1>
                <div class="row">
                    @foreach($mostViewedVideos as $video)
                    <!-- video-item -->
                    <x-video-box :video="$video"></x-video-box>
                    @endforeach
                </div>
    
                <h1 class="new-video-title"><i class="fa fa-bolt"></i> محبوب‌ترین‌ها</h1>
                <div class="row">
                    @foreach($mostPopularVideos as $video)
                    <!-- video-item -->
                    <x-video-box :video="$video"></x-video-box>
                    @endforeach
                   
                </div>
            </div><!-- // row -->
        </div>

    @endsection
    


 
  

