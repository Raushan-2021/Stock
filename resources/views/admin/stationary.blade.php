
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Canteen Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Canteen Form</li>
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
          {{--Update Stationary  --}}           
          @if (isset($stationary_detail))
          <div class="col-md-5">
           <!-- general form elements -->
           <div class="card card-primary">
             <div class="card-header">
               <h3 class="card-title">Update Canteen </h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <form action="{{ route('update-stationary',$stationary_detail->id) }}" method="POST">
               @csrf
               
               <input type="hidden" name="user_id" value="{{ Auth()->user()->id ? Auth()->user()->id : ''}}">
               <div class="card-body">
                 <div class="form-group">
                   <label for="code_no">Code No</label>
                   <input type="text" class="form-control @error('code_no') border border-danger @enderror" id="code_no" placeholder="Enter code no" name="code_no" value="{{ $stationary_detail->code_no }}">
                   @error('code_no')
                       <div class="text-danger">
                           {{ $message }}
                       </div>
                      @enderror
                 </div>
                 <div class="form-group">
                   <label for="item">Item</label>
                   <input type="text" class="form-control  @error('item') border border-danger @enderror" id="item"  name="item" placeholder="Enter item" value="{{ $stationary_detail->item }}">
                   @error('item')
                   <div class="text-danger">
                     {{$message}}
                   </div>
               @enderror
                 </div>
                 <div class="form-group">
                   <label for="item_indented">Items Indented</label>
                   <input type="text" class="form-control @error('item_indented') border border-danger @enderror" id="item_indented" name="item_indented" placeholder="Enter item indented" value="{{ $stationary_detail->item_indented }}">
                   @error('item_indented')
                   <div class="text-danger">
                     {{$message}}
                   </div>
               @enderror
                 </div>
                 <div class="form-group">
                   <label for="quantity_issued">Quantity Issued</label>
                   <input type="text" class="form-control @error('quantity_issued') border border-danger @enderror" id="quantity_issued" name="quantity_issued" placeholder="Enter quantity issued" value="{{ $stationary_detail->quantity_issued }}">
                   @error('quantity_issued')
                       <div class="text-danger">
                         {{$message}}
                       </div>
                   @enderror
                 </div>
                
                 
               </div>
               <!-- /.card-body -->
               <div class="card-footer">
                 <button type="submit" class="btn btn-primary">Update</button>
               </div>
             </form>
           </div>
           
         </div>
          @else
          <div class="col-md-5">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Items </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('stationary_store')}}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id ? Auth()->user()->id : ''}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="code_no">Code No</label>
                    <input type="text" class="form-control @error('code_no') border border-danger @enderror" id="code_no" placeholder="Enter code no" name="code_no">
                    @error('code_no')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                       @enderror
                  </div>
                  <div class="form-group">
                    <label for="item">Item</label>
                    <input type="text" class="form-control  @error('item') border border-danger @enderror" id="item"  name="item" placeholder="Enter item">
                    @error('item')
                    <div class="text-danger">
                      {{$message}}
                    </div>
                @enderror
                  </div>
                  <div class="form-group">
                    <label for="item_indented">Items Indented</label>
                    <input type="text" class="form-control @error('item_indented') border border-danger @enderror" id="item_indented" name="item_indented" placeholder="Enter item indented">
                    @error('item_indented')
                    <div class="text-danger">
                      {{$message}}
                    </div>
                @enderror
                  </div>
                  <div class="form-group">
                    <label for="quantity_issued">Quantity Issued</label>
                    <input type="text" class="form-control @error('quantity_issued') border border-danger @enderror" id="quantity_issued" name="quantity_issued" placeholder="Enter quantity issued">
                    @error('quantity_issued')
                        <div class="text-danger">
                          {{$message}}
                        </div>
                    @enderror
                  </div>
                 
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            
          </div>
          @endif
         <!--/.col (left) -->
         {{--/Update Stationary  --}}
          
          <!--/.col (left) -->
          
          <!-- right column -->
          <div class="col-md-7">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">List Canteen </h3>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              {{-- <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div> --}}
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.NO</th>
                    <th>Code No</th>
                    <th>Item</th>
                    <th>Items Indented</th>
                    <th>Quantity</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    {{-- Check stationary data is null or n't null --}}
                    @if (isset($stationarys))
                    @php
                        $i =1;
                    @endphp
                      @foreach ($stationarys as $item)
                      <tr>
                        <td> {{ $i }}</td>
                        <td>{{ $item->code_no }}</td>
                        <td>{{ $item->item }} </td>
                        <td>{{ $item->item_indented }}</td>
                        <td> {{ $item->quantity_issued }}</td>
                        <td>
                          <a class="btn btn-primary" href="{{ route('single-stationary.edit',$item->id) }}"><i class="fa fa-edit"></i></a>

                          <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('stationary-destroy',$item->id)}}"><i class="fa fa-trash"></i></a>                         
                        </td>
                      </tr> 
                      @php
                          $i++
                      @endphp
                    @endforeach
                  @endif
                
                  
                 
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
           
          </div>
          <!--/.col (right) -->

          
       </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 
 