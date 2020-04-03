@extends("admin.admin_app")

@section("content")

  
  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card-box table-responsive">

                <div class="row">
                  <div class="col-sm-3">
                     <select class="form-control" name="gateway_select" id="gateway_select">
                        <option value="">{{trans('words.filter_by_gateway')}}</option>
                         
                          <option value="?gateway=Paypal" @if(isset($_GET['gateway']) && $_GET['gateway']=='Paypal' ) selected @endif>Paypal</option>
                          <option value="?gateway=Stripe" @if(isset($_GET['gateway']) && $_GET['gateway']=='Stripe' ) selected @endif>Stripe</option>
                        
                    </select>
                  </div>  
                  <div class="col-md-4">
                     {!! Form::open(array('url' => 'admin/transactions','class'=>'app-search','id'=>'search','role'=>'form','method'=>'get')) !!}   
                      <input type="text" name="s" placeholder="{{trans('words.search_by_payment_id_email')}}" class="form-control">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    {!! Form::close() !!}
                  </div>             
                  <div class="col-md-5">
                  <a href="{{URL::to('admin/transactions/export')}}" class="btn btn-info btn-md waves-effect waves-light m-b-20 pull-right" data-toggle="tooltip" title="{{trans('words.export_transactions')}}"><i class="fa fa-file-excel-o"></i> {{trans('words.export_transactions')}}</a>
                  </div>
              </div><br/>
               
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                <div class="table-responsive">
                 <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>{{trans('words.name')}}</th>
                      <th>{{trans('words.email')}}</th>
                      <th>{{trans('words.plan')}}</th>
                      <th>{{trans('words.amount')}}</th>
                      <th>{{trans('words.payment_gateway')}}</th>
                      <th>{{trans('words.payment_id')}}</th>
                      <th>{{trans('words.payment_date')}}</th>                      
                       
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($transactions_list as $i => $transaction_data)
                    <tr>
                      <td><a href="{{ url('admin/users/history/'.$transaction_data->user_id) }}" data-toggle="tooltip" title="User History">{{ \App\User::getUserFullname($transaction_data->user_id) }}</a></td>
                      <td>{{ $transaction_data->email }}</td>
                      <td>{{\App\SubscriptionPlan::getSubscriptionPlanInfo($transaction_data->plan_id,'plan_name')}}</td>
                      <td>{{getcong('currency_code')}} {{ $transaction_data->payment_amount }} </td>
                      <td>{{ $transaction_data->gateway }}</td>
                      <td>{{ $transaction_data->payment_id }}</td>
                      <td>{{ date('M d Y h:i A',$transaction_data->date) }}</td>                                              
                       
                    </tr>
                   @endforeach
                     
                     
                     
                  </tbody>
                 </table>
                </div>
                <nav class="paging_simple_numbers">
                @include('admin.pagination', ['paginator' => $transactions_list]) 
                </nav>
           
              </div>
            </div>
          </div>
        </div>
      </div>
      @include("admin.copyright") 
    </div>

    

@endsection