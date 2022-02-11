@extends('components.layout')

@section('content')
    
	<div class="site-output">
        <div class="col-md-2 no-padding-left hidden-sm hidden-xs">
            <div class="left-sidebar">
                <div id="sidebar-stick" >
                <ul class="menu-sidebar">
                    <li><a href="01-home.html"><i class="fa fa-home"></i>خانه</a></li>
                    <li><a href="#"><i class="fa fa-bolt"></i>رندوم</a></li>
                    <li><a href="14-history.html"><i class="fa fa-clock-o"></i>تاریخچه</a></li>
                    <li><a href="11-blog.html"><i class="fa fa-file-text"></i>وبلاگ</a></li>
                    <li><a href="10-upload.html"><i class="fa fa-upload"></i>آپلود</a></li>
                </ul>
                <ul class="menu-sidebar">
                    <li><a href="#"><i class="fa fa-edit"></i>ویرایش پروفایل</a></li>
                    <li><a href="#"><i class="fa fa-sign-out"></i>خروج</a></li>
                </ul>
                <ul class="menu-sidebar">
                    <li><a href="#"><i class="fa fa-gear"></i>تنظیمات</a></li>
                    <li><a href="#"><i class="fa fa-question-circle"></i>راهنما</a></li>
                    <li><a href="#"><i class="fa fa-send-o"></i>ارسال بازخورد</a></li>
                </ul>
                </div><!-- // sidebar-stick -->
                <div class="clear"></div>
            </div><!-- // left-sidebar -->
        </div><!-- // col-md-2 -->
        <x-validation-errors></x-validation-errors>
        <div id="all-output" class="col-md-10 upload">
        	<div id="upload">
                <div class="row">
                    <!-- upload -->
                    <div class="col-md-8">
						<h1 class="page-title"><span>آپلود</span> فیلم</h1>
						<form action="{{route('videos')}}" method="POST" enctype="multipart/form">
                            @csrf
                        	<div class="row">
                            	<div class="col-md-6">
                                	<label>@lang('videos.name')</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="@lang('videos.name')">
                                </div>
                            	<div class="col-md-6">
                                	<label>@lang('videos.category')</label>
                                    <select name="category_id" id="category" class="form-control" >
                                        @foreach ($categoris as $category)
                                            <option name="category_id"  value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            	<div class="col-md-6">
                                	<label>@lang('videos.timeFilm')</label>
                                    <input type="text" name="length" class="form-control" value="{{ old('length') }}" placeholder="@lang('videos.timeFilm')">
                                </div>
                            	<div class="col-md-6">
                                	<label>@lang('videos.labale')</label>
                                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="@lang('videos.labale')">
                                </div>
                            	<div class="col-md-6">
                                	<label>@lang('videos.uploadFilm')</label>
                                    <input id="upload_file" name="url"  class="file" value="{{ old('url') }}">
                                </div>
                            	<div class="col-md-12">
                                	<label>@lang('videos.description')</label>
                                    <textarea  name="description" class="form-control"  value="{{ old('description') }}" rows="4"  placeholder="@lang('videos.description')"></textarea>
                                </div>
                            	<div class="col-md-6">
                                	<label>@lang('videos.img')</label>
                                    <input id="featured_image" name="thumbnail"  value="{{ old('thumbnail"') }}" class="file">
                                </div>
                            	<div class="col-md-6">
                                    <button type="submit" id="contact_submit" class="btn btn-dm">@lang('videos.save')</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- // col-md-8 -->

                    <div class="col-md-4">
                    	<a href="#"><img src="{{asset('img/upload-adv.png')  }}" alt=""></a>
                    </div><!-- // col-md-8 -->
                    <!-- // upload -->
                </div><!-- // row -->
            </div><!-- // upload -->
		</div>
    </div>

@endsection
