@extends('components.layout')
    @section('content')

        <div class="site-output">
        <div id="all-output" class="col-md-12">
                <h1 class="new-video-title"><i class="fa fa-bolt"></i> {{ $title }}</h1>
                <div class="row">
                    @foreach($videos as $video)
                    <x-video-box :video="$video"></x-video-box>
                    @endforeach
                   
                </div>
                <div class="text-center" dir="ltr">
                    {{ $videos->links() }}
                </div>
            </div><!-- // row -->
        </div>

    @endsection