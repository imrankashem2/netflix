@extends("admin.admin_app")

@section("content")

<style type="text/css">
  .iframe-container {
  overflow: hidden;
  padding-top: 56.25% !important;
  position: relative;
}
 
.iframe-container iframe {
   border: 0;
   height: 100%;
   left: 0;
   position: absolute;
   top: 0;
   width: 100%;
}
</style>
 
  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card-box">
                 
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(Session::has('flash_message'))
                      <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                          {{ Session::get('flash_message') }}
                      </div>
                @endif
                

                 {!! Form::open(array('url' => array('admin/home_section'),'class'=>'form-horizontal','name'=>'settings_form','id'=>'settings_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                  
                  <input type="hidden" name="id" value="{{ isset($home_settings->id) ? $home_settings->id : null }}">
  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.section_l_latest_movies')}}*</label>
                    <div class="col-sm-8">
                      <select name="section1_latest_movie[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Select Movies...">
                                 @foreach($movies_list as $movies_data)
                                  <option value="{{$movies_data->id}}" @if(in_array($movies_data->id, explode(",",$home_settings->section1_latest_movie))) selected @endif>{{$movies_data->video_title}}</option>
                                @endforeach
                            </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.section_2_latest_series')}}*</label>
                    <div class="col-sm-8">
                      <select name="section2_latest_series[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Select Series...">
                                 @foreach($series_list as $series_data)
                                  <option value="{{$series_data->id}}" @if(in_array($series_data->id, explode(",",$home_settings->section2_latest_series))) selected @endif>{{$series_data->series_name}}</option>
                                @endforeach
                            </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.section_3_polular_movies')}}*</label>
                    <div class="col-sm-8">
                      <select name="section3_popular_movie[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Select Movies...">
                                 @foreach($movies_list as $movies_data)
                                  <option value="{{$movies_data->id}}" @if(in_array($movies_data->id, explode(",",$home_settings->section3_popular_movie))) selected @endif>{{$movies_data->video_title}}</option>
                                @endforeach
                            </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.section_4_popular_series')}}*</label>
                    <div class="col-sm-8">
                      <select name="section3_popular_series[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Select Series...">
                                 @foreach($series_list as $series_data)
                                  <option value="{{$series_data->id}}" @if(in_array($series_data->id, explode(",",$home_settings->section3_popular_series))) selected @endif>{{$series_data->series_name}}</option>
                                @endforeach
                            </select>
                    </div>
                  </div>

                  <hr/>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.section_5_title')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="section3_title" value="{{ isset($home_settings->section3_title) ? $home_settings->section3_title : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.type')}}*</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="section3_type">
                                <option value="Movie" @if(isset($home_settings->section3_type) AND $home_settings->section3_type=='Movie') selected @endif>Movie</option>
                                <option value="Series" @if(isset($home_settings->section3_type) AND $home_settings->section3_type=='Series') selected @endif>Series</option>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.language_text')}}</label>
                      <div class="col-sm-8">
                             <select class="form-control select2" name="section3_lang">
                                <option value="">{{trans('words.select_lang')}}</option>
                                @foreach($language_list as $language_data)
                                  <option value="{{$language_data->id}}" @if(isset($home_settings->id) && $language_data->id==$home_settings->section3_lang) selected @endif>{{$language_data->language_name}}</option>
                                @endforeach
                            </select>
                      </div>
                  </div>

                  <hr/>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.section_6_title')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="section4_title" value="{{ isset($home_settings->section4_title) ? $home_settings->section4_title : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.type')}}*</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="section4_type">
                                <option value="Movie" @if(isset($home_settings->section4_type) AND $home_settings->section4_type=='Movie') selected @endif>Movie</option>
                                <option value="Series" @if(isset($home_settings->section4_type) AND $home_settings->section4_type=='Series') selected @endif>Series</option>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.language_text')}}</label>
                      <div class="col-sm-8">
                             <select class="form-control select2" name="section4_lang">
                                <option value="">{{trans('words.select_lang')}}</option>
                                @foreach($language_list as $language_data)
                                  <option value="{{$language_data->id}}" @if(isset($home_settings->id) && $language_data->id==$home_settings->section4_lang) selected @endif>{{$language_data->language_name}}</option>
                                @endforeach
                            </select>
                      </div>
                  </div>

                  <hr/>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.section_7_title')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="section5_title" value="{{ isset($home_settings->section5_title) ? $home_settings->section5_title : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.type')}}*</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="section5_type">
                                <option value="Movie" @if(isset($home_settings->section5_type) AND $home_settings->section5_type=='Movie') selected @endif>Movie</option>
                                <option value="Series" @if(isset($home_settings->section5_type) AND $home_settings->section5_type=='Series') selected @endif>Series</option>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.language_text')}}</label>
                      <div class="col-sm-8">
                             <select class="form-control select2" name="section5_lang">
                                <option value="">{{trans('words.select_lang')}}</option>
                                @foreach($language_list as $language_data)
                                  <option value="{{$language_data->id}}" @if(isset($home_settings->id) && $language_data->id==$home_settings->section5_lang) selected @endif>{{$language_data->language_name}}</option>
                                @endforeach
                            </select>
                      </div>
                  </div>
  
                  <div class="form-group">
                    <div class="offset-sm-3 col-sm-9">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"> {{trans('words.save')}} </button>                      
                    </div>
                  </div>
                {!! Form::close() !!} 
              </div>
            </div>            
          </div>              
        </div>
      </div>
      @include("admin.copyright") 
    </div> 
 
<!--  Poster -->
<div id="model_poster" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" style="max-width: 900px;">
        <div class="modal-content">             
            <div class="modal-body">
               <div class="iframe-container">
               <iframe src="{{URL::to('responsive_filemanager/filemanager/dialog.php?type=2&field_id=slider_image&relative_url=1')}}" frameborder="0"></iframe>
               </div>
            </div>
        </div> 
    </div> 
</div> 


@endsection