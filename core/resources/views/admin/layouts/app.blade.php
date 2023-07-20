@extends('admin.layouts.master')

@section('content')
    <!-- page-wrapper start -->
    <div class="page-wrapper default-version">
        @include('admin.partials.sidenav')
        @include('admin.partials.topnav')
        <div class="m-5">
        <div class="body-wrapper bg-white">
            <div class="bodywrapper__inner">

                {{-- @include('admin.partials.breadcrumb') --}}

                @yield('panel')


            </div><!-- bodywrapper__inner end -->
        </div><!-- body-wrapper end -->
        </div>
    </div>
@endsection
