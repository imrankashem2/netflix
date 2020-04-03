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
                 
                <div class="row">
                     <div class="col-sm-6">
                          <a href="{{ URL::to('admin/live_tv') }}"><h4 class="header-title m-t-0 m-b-30 text-primary pull-left" style="font-size: 20px;"><i class="fa fa-arrow-left"></i> {{trans('words.back')}}</h4></a>
                     </div>
                     @if(isset($tv_info->id))
                     <div class="col-sm-6">
                        <a href="{{ URL::to('live-tv/'.$tv_info->channel_slug.'/'.$tv_info->id) }}" target="_blank"><h4 class="header-title m-t-0 m-b-30 text-primary pull-right" style="font-size: 20px;">{{trans('words.preview')}} <i class="fa fa-eye"></i></h4> </a>
                     </div>
                     @endif
                   </div>

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
                

                 {!! Form::open(array('url' => array('admin/live_tv/add_edit_live_tv'),'class'=>'form-horizontal','name'=>'video_form','id'=>'video_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                  
                  <input type="hidden" name="id" value="{{ isset($tv_info->id) ? $tv_info->id : null }}">

                  <div class="row">

                  <div class="col-md-6">
                    <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;">{{trans('words.live_tv_info')}}</h4> 

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.live_tv_access')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="channel_access">                               
                                <option value="Paid" @if(isset($tv_info->channel_access) AND $tv_info->channel_access=='Paid') selected @endif>Paid</option>
                                <option value="Free" @if(isset($tv_info->channel_access) AND $tv_info->channel_access=='Free') selected @endif>Free</option>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.live_tv_category')}}*</label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="tv_category">
                                <option value="">{{trans('words.select_category')}}</option>
                                @foreach($cat_list as $cat_data)
                                  <option value="{{$cat_data->id}}" @if(isset($tv_info->id) && $cat_data->id==$tv_info->channel_cat_id) selected @endif>{{$cat_data->category_name}}</option>
                                @endforeach
                            </select>
                      </div>
                  </div> 
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.live_tv_name')}}*</label>
                    <div class="col-sm-8">
                      <input type="text" name="channel_name" value="{{ isset($tv_info->channel_name) ? stripslashes($tv_info->channel_name) : null }}" class="form-control">
                    </div>
                  </div>                  
                  <div class="form-group row">
                    <label for="webSite" class="col-sm-12 col-form-label">{{trans('words.description')}}</label>
                    <div class="col-sm-12">
                      <div class="card-box">
            
                      <textarea id="elm1" name="channel_description">{{ isset($tv_info->channel_description) ? stripslashes($tv_info->channel_description) : null }}</textarea>
                     
                    </div>
                    </div>
                  </div>                   
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.status')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="status">                               
                                <option value="1" @if(isset($tv_info->status) AND $tv_info->status==1) selected @endif>{{trans('words.active')}}</option>
                                <option value="0" @if(isset($tv_info->status) AND $tv_info->status==0) selected @endif>{{trans('words.inactive')}}</option>                            
                            </select>
                      </div>
                  </div>

                </div>
                <div class="col-md-6">
                    <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;">{{trans('words.live_tv_thumb_url')}}</h4>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.live_tv_stream_type')}} </label>
                      <div class="col-sm-8">
                            <select class="form-control" name="channel_url_type" id="channel_url_type">                               
                                <option value="hls" @if(isset($tv_info->channel_url_type) AND $tv_info->channel_url_type=="hls") selected @endif>HLS/M3U8/HTTP</option>
                                <option value="embed" @if(isset($tv_info->channel_url_type) AND $tv_info->channel_url_type=="embed") selected @endif>Embed Code</option>
                                <option value="youtube" @if(isset($tv_info->channel_url_type) AND $tv_info->channel_url_type=="youtube") selected @endif>Youtube</option> 
                                                             
                            </select>
                      </div>
                  </div>
                  
                   

                  <div class="form-group row" id="live_url_id" @if(isset($tv_info->channel_url_type) AND $tv_info->channel_url_type=="embed") style="display:none;" @endif>
                    <label class="col-sm-3 col-form-label">{{trans('words.live_tv_url')}}*</label>
                     <div class="col-sm-8">
                      <input type="text" name="channel_url" value="{{ isset($tv_info->channel_url) ? $tv_info->channel_url : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row" id="live_embed_id" @if(!isset($tv_info->channel_url_type)) style="display:none;" @endif @if(isset($tv_info->channel_url_type) AND $tv_info->channel_url_type!="embed") style="display:none;" @endif>
                    <label class="col-sm-3 col-form-label">{{trans('words.live_tv_url')}}*</label>
                     <div class="col-sm-8">
                      <textarea class="form-control" name="channel_url_embed">{{ isset($tv_info->channel_url) ? $tv_info->channel_url : null }}</textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">&nbsp;</label>
                      <div class="col-sm-8">                         
                        <p id="hls_stream_id" @if(!isset($tv_info->channel_url_type)) style="display:block;" @endif @if(isset($tv_info->channel_url_type) AND $tv_info->channel_url_type!="hls") style="display:none;" @endif><small id="emailHelp" class="form-text text-muted">Supported M3U8 URL </small></p>
                        <p id="embed_stream_id" @if(!isset($tv_info->channel_url_type)) style="display:none;" @endif @if(isset($tv_info->channel_url_type) AND $tv_info->channel_url_type!="embed") style="display:none;" @endif><small id="emailHelp" class="form-text text-muted">Supported Embeded URL <br>Recommended: iframe width="100%" and height="100%" </small></p>
                        <p id="youtube_stream_id" @if(!isset($tv_info->channel_url_type)) style="display:none;" @endif @if(isset($tv_info->channel_url_type) AND $tv_info->channel_url_type!="youtube") style="display:none;" @endif><small id="emailHelp" class="form-text text-muted">Supported Youtube Regular URL </small></p>
                      </div>  
                  </div>

                 
 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.live_tv_logo')}}* <small id="emailHelp" class="form-text text-muted">({{trans('words.recommended_resolution')}} : 650x350)</small></label>
                    <div class="col-sm-8">
                      <div class="input-group">

                        <input type="text" name="channel_thumb" id="channel_thumb" value="{{ isset($tv_info->channel_thumb) ? $tv_info->channel_thumb : null }}" class="form-control" readonly>
                        <div class="input-group-append">                           
                          <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#model_channel_thumb">Select</button>
                      
                        </div>
                      </div>
                     
                    </div>
                  </div>

                  @if(isset($tv_info->channel_thumb)) 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">
                                                                         
                           <img src="{{URL::to('upload/source/'.$tv_info->channel_thumb)}}" alt="video image" class="img-thumbnail" width="250">                        
                       
                    </div>
                  </div>
                  @endif
                   

                   <hr/>
                  <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;">{{trans('words.seo')}}</h4>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.seo_title')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="seo_title" id="seo_title" value="{{ isset($tv_info->seo_title) ? stripslashes($tv_info->seo_title) : old('seo_title') }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.seo_desc')}}</label>
                    <div class="col-sm-8">                       
                      <textarea name="seo_description" id="seo_description" class="form-control">{{ isset($tv_info->seo_description) ? stripslashes($tv_info->seo_description) : old('seo_description') }}</textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.seo_keyword')}}</label>
                    <div class="col-sm-8">                      
                      <textarea name="seo_keyword" id="seo_keyword" class="form-control">{{ isset($tv_info->seo_keyword) ? stripslashes($tv_info->seo_keyword) : old('seo_keyword') }}</textarea>
                      <small id="emailHelp" class="form-text text-muted">{{trans('words.seo_keyword_note')}}</small>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="offset-sm-9 col-sm-9">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i> {{trans('words.save')}} </button>                      
                    </div>
                  </div>  
                  
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

 

<!--  Movie Poster -->
<div id="model_channel_thumb" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" style="max-width: 900px;">
        <div class="modal-content">             
            <div class="modal-body">
               <div class="iframe-container">
               <iframe src="{{URL::to('responsive_filemanager/filemanager/dialog.php?type=2&sort_by=date&field_id=channel_thumb&relative_url=1')}}" frameborder="0"></iframe>
               </div>
            </div>
        </div> 
    </div> 
</div> 


@endsection