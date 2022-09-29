@php

$currentPath = Request::path();
$pathTrim = preg_replace('/[0-9]+/', '', $currentPath);
$base_url = trim($pathTrim, '/');
// dd($base_url);
@endphp
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
{{-- Main Section --}}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>

            @endforeach
        </ul>
    </div>


    @endif
    <?php //echo Auth::user() ?>
    @if (session('success'))
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    {{-- / message alert --}}

    {{-- Body --}}
    @if ($base_url === "dashboard")
    @include('admin.mainpage')
    @endif

    @if ($base_url === "stationary" || $base_url === "single-stationary/edit")
    @include('admin.stationary')
    @endif
    @if ($base_url === "department" || $base_url === "single-department/edit")
    @include('admin.department')
    @endif
    @if ($base_url === "order_request")
    @include('admin.order_request')
    @endif
    @if ($base_url === "order_request_details")
    @include('admin.order_request_details')
    @endif
    @if ($base_url === "itemDetailShow")
    @include('admin.itemDetailShow')
    @endif
    @if ($base_url === "orderRequestApproved" || $base_url === "orderRequestPending" || $base_url
    ==="orderRequestReject")
    @include('admin.order_request_dashboard')
    @endif
    {{-- /Body --}}
</div>

{{-- /Main Section --}}
@include('admin.layouts.footer')