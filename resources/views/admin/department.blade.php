<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Department Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Department Form</li>
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
            @if (isset($department_detail))
            <div class="col-md-5">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Department </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('update-department',$department_detail->id) }}" method="POST">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ Auth()->user()->id ? Auth()->user()->id : ''}}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="code">Department Code</label>
                                <input type="text" class="form-control @error('code') border border-danger @enderror"
                                    id="code" placeholder="Enter code no" name="code"
                                    value="{{ $department_detail->code }}">
                                @error('code')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Department Name</label>
                                <input type="text" class="form-control  @error('name') border border-danger @enderror"
                                    id="name" name="name" placeholder="Enter department name"
                                    value="{{ $department_detail->name }}">
                                @error('name')
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
                        <h3 class="card-title">Add Department </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('department_store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth()->user()->id ? Auth()->user()->id : ''}}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="code">Department Code</label>
                                <input type="text" class="form-control @error('code') border border-danger @enderror"
                                    id="code" placeholder="Enter department code" name="code">
                                @error('code')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Department Name</label>
                                <input type="text" class="form-control  @error('name') border border-danger @enderror"
                                    id="name" name="name" placeholder="Enter name">
                                @error('name')
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
            {{--/Update Department  --}}

            <!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-7">
                <!-- Form Element sizes -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">List Department </h3>
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
                                    <th>Department Code</th>
                                    <th>Department Name</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Check Department data is null or n't null --}}
                                @if (isset($departments))
                                @php
                                $i =1;
                                @endphp
                                @foreach ($departments as $item)
                                <tr>
                                    <td> {{ $i }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->name }} </td>

                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{ route('single-department.edit',$item->id) }}"><i
                                                class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                            href="{{ route('department-destroy',$item->id)}}"><i
                                                class="fa fa-trash"></i></a>

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