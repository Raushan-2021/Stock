
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->  

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $allReqCount}}</h3>
                <p>Total Request</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3> {{ $approvedCount }}<sup style="font-size: 20px"></sup></h3>
                <p>Approved Request</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('orderRequestApproved')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$pendingCount}}</h3>
                <p>Pending Request</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('orderRequestPending')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-md-3">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$rejectCount}}</h3>
                <p>Reject Request</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('orderRequestReject')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          {{-- All Items --}}
          <div class="col-lg-6 col-md-6 mt-5 overflow-auto">
            <!-- TO DO List -->
            <div class="card h-auto">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  All Items
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-wrapper-scroll-y my-custom-scrollbar">

                  <table class="table table-bordered table-striped mb-0">
                    <thead>
                      <tr>
                        <th scope="col">S.NO</th>
                        <th scope="col">Items  Name</th>
                        <th scope="col">Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i =1; @endphp
                      @foreach ($allStationary as $item)
                      <tr>
                        <th scope="row"> {{ $i }}</th>
                        <td> {{$item->item}}</td>
                        <td>{{$item->quantity_issued}}</td>
                      </tr>  
                      @php $i++ @endphp  
                      @endforeach
                      
                      
                      
                    </tbody>
                  </table>
                
                </div>
                
              </div>
              <!-- /.card-body -->
             
            </div>
            <!-- /.card -->
          </div>
          {{-- /All Stationary --}}

          <div class="col-lg-3 col-md-3 mt-5">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>Apply</h3>
                <p>Item Request</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('order_request')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
        </div>
      </div>
    </section>
  