@extends('admin.layouts.app')

@section('panel')
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body p-0">

                <div class="table-responsive--sm table-responsive">
                    <table class="table table--light style--two table-bordered">
                        <thead>
                            <tr>
                                <th>@lang('ID')</th>
                                <th>@lang('Name')</th>
                                <th>@lang('Login at')</th>
                                <th>@lang('IP')</th>
                                <th>@lang('Location')</th>
                                <th>@lang('Browser | OS')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($loginLogs as $k=>$log)
                            <tr>
                                <td data-label="@lang('User')">
                                    <span class="fw-bold">{{ ++$k }}</span>                                   
                                </td>
                                <td data-label="@lang('User')">
                                    <span class="fw-bold">{{ @$log->user->fullname }}</span>
                                    <br>
                                    <span class="small"> <a href="{{ route('admin.users.detail', $log->user_id) }}"><span>@</span>{{ @$log->user->username }}</a> </span>
                                </td>


                                <td data-label="@lang('Login at')">
                                    {{showDateTime($log->created_at) }} <br> {{diffForHumans($log->created_at) }}
                                </td>



                                <td data-label="@lang('IP')">
                                    <span class="fw-bold">
                                        <a href="{{route('admin.report.login.ipHistory',[$log->user_ip])}}">{{ $log->user_ip }}</a>
                                    </span>
                                </td>

                                <td data-label="@lang('Location')">{{ __($log->city) }} <br> {{ __($log->country) }}</td>
                                <td data-label="@lang('Browser | OS')">
                                    {{ __($log->browser) }} <br> {{ __($log->os) }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
            @if ($loginLogs->hasPages())
            <div class="card-footer py-4">
                {{ paginateLinks($loginLogs) }}
            </div>
            @endif
        </div><!-- card end -->
    </div>


</div>
@endsection



@push('breadcrumb-plugins')
@if(request()->routeIs('admin.report.login.history'))
<form action="{{ route('admin.report.login.history') }}" method="GET" class="form-inline float-sm-end">
    <div class="input-group">
        <input type="text" name="search" class="form-control bg--white" placeholder="@lang('Search Username')" value="{{ request()->search }}">
        <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
    </div>
</form>
@endif
@endpush
@if(request()->routeIs('admin.report.login.ipHistory'))
@push('breadcrumb-plugins')
<a href="https://www.ip2location.com/{{ $ip }}" target="_blank" class="btn btn--primary">@lang('Lookup IP') {{ $ip }}</a>
@endpush
@endif