
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Item Request Details </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Item Request Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          {{--Update Department  --}}           
         
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">User Request Details </h3>
              </div>
             
                <div class="card-body">
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="code" class="col-form-label">Department</label>
                      <input type="text" value="{{ $order_request[0]->department_name ? $order_request[0]->department_name : ''}}" id="department_id" class="form-control" readonly>
                    </div>
                    <div class="col-md-6 text-left form-group">
                      <label for="code" class="col-form-label">Requested User Name</label>

                      <input type="text" value="{{ $order_request[0]->first_name ? $order_request[0]->first_name. ' '. $order_request[0]->last_name : ''}}" id="department_id" class="form-control" readonly>
                    </div>            
                  
                  </div>
                  {{-- hidden values --}}
                  <input type="hidden" name="request_user_id" value="1">
                  <input type="hidden" name="approved_user_id" value="1">
                  {{-- hidden values --}}

                 <div class="form-group row ml-5">
                   <div class="col-md-8 ml-right">
                    <div class="p-4 card">
                      <table id="myTable" class="table table-bordered">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col" class="mx-5">S.NO</th>
                            <th scope="col" class="mx-5">Item</th>
                            <th scope="col" class="mx-5">Qty</th>                          
                          </tr>
                        </thead>
                        <tbody>
                          @if (count($req_item_order))
                          @php
                              $i=1;
                          @endphp
                          @foreach ($req_item_order as $item)
                          <tr>
                              <td>{{$i}}</td>
                              <td>
                              <input type="text" name="" id="" value="{{ $item->item}}" style="border: none transparent;
                              outline: none; width: -webkit-fill-available;">
                              </td>
                              <td>
                                <input type="text" name="" id="" value="{{ $item->qty }}" style="border: none transparent;
                                outline: none; width: -webkit-fill-available;">
                              </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                              @endforeach
                            @endif
                        </tbody>
                      </table>
                    </div>
                   </div>
                 </div>

                 <div class="form-group row">
                  <div class="col-md-2">
                    <label for="remark_admin" class="col-form-label">Remark admin</label>
                  </div>
                  <div class="col-md-6 text-left form-group">
                    <textarea class="form-control" id="remark_admin" name="remark_admin" rows="3">{{ $order_request[0]->remark_admin ? $order_request[0]->remark_admin : ''}}</textarea>
                  </div>
                 
                 </div>
                 <div class="form-group row">
                  <div class="col-md-2">
                    <label for="remark_staff" class="col-form-label">Remark staff</label>
                  </div>
                  <div class="col-md-6 text-left form-group">
                    <textarea class="form-control" id="remark_staff" name="remark_staff" rows="3">{{ $order_request[0]->remark_staff ? $order_request[0]->remark_staff : ''}}</textarea>
                  </div>
              
                </div>
                  
                </div>
                
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{ url()->previous() }}" class="btn btn-dark  pr-2 mr-1">Back</a>
                 
                  @if ($order_request[0]->status !== 'APPROVED')
                    <button class="btn btn-success p-1 mr-1">
                      <form action="{{route('approveRequest', [$order_request[0]->order_request_id])}}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="APPROVED">
                        <input type="submit" class="btn btn-success btn-sm" value="APPROVED" style="border: none transparent;
                        outline: none; width: -webkit-fill-available;">
                      </form>
                    </button>
                  @endif                  
                  <button class="btn btn-danger p-1 mr-1">
                    <form action="{{route('rejectRequest', [$order_request[0]->order_request_id])}}" method="POST">
                      @csrf  
                      <input type="hidden" name="status" value="REJECT">                    
                      <input type="submit" class="btn btn-danger btn-sm" value="REJECT" style="border: none transparent;
                      outline: none; width: -webkit-fill-available;">
                    </form>
                  </button>
                </div>
              {{-- </form> --}}
            </div>
          </div>    
       </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
 
    