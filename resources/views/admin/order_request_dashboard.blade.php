@if (!empty($approved))
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Request Approved</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order Request Approved</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">List </h3>
              </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-dark ml-3">Back</a>
            <div class="card">
              <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                  <tr>
                    <th>S.NO</th>
                    <th>Department</th>
                    <th>Requested User</th>
                    <th>Approved User</th>
                    <th>Status</th>
                    <th>Remark Canteen</th>
                    <th>Remark Staff</th>
                    {{-- <th>View Product</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                    {{-- Check canteen data is null or n't null --}}
                   
                    @php
                        $i =1;
                    @endphp
                      @foreach ($approved as $approveditem)                      
                      <tr>
                        <td> {{ $i }}</td>
                        <td>{{ Str::ucfirst($approveditem->departmentName) }}</td>
                        <td>{{ $approveditem->first_name. ' '. $approveditem->last_name }} </td>
                        <td>{{ $approveditem->orderApprovedUserId }}</td>
                        <td> {{ $approveditem->orderStatus }}</td>
                        <td> {{ $approveditem->remark_canteen}}</td>
                        <td> {{ $approveditem->remark_staff }}</td>
                        <td>
                        {{-- <a class="btn btn-info" href="{{ route('itemDetailShow',$item->orderRequestId) }}"><i class="fa fa-eye"></i> Details </a> --}}
 
                      </td>
                      </tr> 
                      @php
                          $i++
                      @endphp
                    @endforeach
                
                  </tbody>
                </table>
              </div>
            </div>
          </div>
       </div>
      </div>
    </section>
 
@endif

{{-- Pending Report Dashborad --}}
@if (!empty($pending))
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Request Pending</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order Request Pending</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">List  </h3>
              </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-dark ml-3">Back</a>
            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                  <tr>
                    <th>S.NO</th>
                    <th>Department</th>
                    <th>Requested User</th>
                    <th>Approved User</th>
                    <th>Status</th>
                    <th>Remark Canteen</th>
                    <th>Remark Staff</th>
                    {{-- <th>View Product</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                    {{-- Check canteen data is null or n't null --}}
                  
                    @php
                        $i =1;
                    @endphp
                      @foreach ($pending as $pendingitem)
                      
                      <tr>
                        <td> {{ $i }}</td>
                        <td>{{ Str::ucfirst($pendingitem->departmentName) }}</td>
                        <td>{{ $pendingitem->first_name. ' '. $pendingitem->last_name }} </td>
                        <td>{{ $pendingitem->orderApprovedUserId }}</td>
                        <td> {{ $pendingitem->orderStatus }}</td>
                        <td> {{ $pendingitem->remark_canteen }}</td>
                        <td> {{ $pendingitem->remark_staff }}</td>
                        <td>
                        {{-- <a class="btn btn-info" href="{{ route('itemDetailShow',$pendingitem->orderRequestId) }}"><i class="fa fa-eye"></i> Details </a> --}}
 
                      </td>
                      </tr> 
                      @php
                          $i++
                      @endphp
                    @endforeach
                 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
       </div>
      </div>
    </section>
 
@endif
{{-- /Pending Report Dashborad --}}

{{-- Reject Report Dashboard --}}
@if (!empty($reject))
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Request Reject</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order Request Reject</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">List  </h3>
              </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-dark ml-3">Back</a>
            <div class="card">
              <div class="card-body">
                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                  <tr>
                    <th>S.NO</th>
                    <th>Department</th>
                    <th>Requested User</th>
                    <th>Approved User</th>
                    <th>Status</th>
                    <th>Remark Admin</th>
                    <th>Remark Staff</th>
                    {{-- <th>View Product</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                    {{-- Check canteen data is null or n't null --}}
                 
                    @php
                        $i =1;
                    @endphp
                      @foreach ($reject as $rejectitem)
                      
                      <tr>
                        <td> {{ $i }}</td>
                        <td>{{ Str::ucfirst($rejectitem->departmentName) }}</td>
                        <td>{{ $rejectitem->first_name. ' '. $rejectitem->last_name }} </td>
                        <td>{{ $rejectitem->orderApprovedUserId }}</td>
                        <td> {{ $rejectitem->orderStatus }}</td>
                        <td> {{ $rejectitem->remark_admin }}</td>
                        <td> {{ $rejectitem->remark_staff }}</td>
                        <td>
                        {{-- <a class="btn btn-info" href="{{ route('itemDetailShow',$rejectitem->orderRequestId) }}"><i class="fa fa-eye"></i> Details </a> --}}
 
                      </td>
                      </tr> 
                      @php
                          $i++
                      @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
       </div>
      </div>
    </section>
 
@endif
{{-- /Reject Report Dashboard --}}