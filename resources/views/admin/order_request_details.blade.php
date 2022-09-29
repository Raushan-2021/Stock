
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Request Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order Request Details</li>
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
                <h3 class="card-title">Order List  </h3>
              </div>
            </div>
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
                    <th>Remark Admin</th>
                    <th>Remark Staff</th>
                    <th>View Product</th>
                  </tr>
                  </thead>
                  <tbody>
                    {{-- Check stationary data is null or n't null --}}
                    @if (isset($requtestDetails))
                    @php
                        $i =1;
                    @endphp
                      @foreach ($requtestDetails as $item)
                      
                      <tr>
                        <td> {{ $i }}</td>
                        <td>{{ Str::ucfirst($item->departmentName) }}</td>
                        <td>{{ $item->first_name. ' '. $item->last_name }} </td>
                        <td>{{ $item->orderApprovedUserId }}</td>
                        <td> {{ $item->orderStatus }}</td>
                        <td> {{ $item->remark_admin }}</td>
                        <td> {{ $item->remark_staff }}</td>
                        <td>
                        <a class="btn btn-info" href="{{ route('itemDetailShow',$item->orderRequestId) }}"><i class="fa fa-eye"></i> Details </a>
 
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
            </div>
          </div>
       </div>
      </div>
    </section>
 
 