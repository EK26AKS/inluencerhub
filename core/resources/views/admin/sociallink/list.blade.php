@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card bg-white">
                <div class="card-body p-0">
                    <div class="table-responsive--md table-responsive">
                        <table class="table table--light style--two table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('ID')</th>
                                    <th>@lang('SocialMedia')</th>
                                    <th>@lang('Followers')</th>
                                    <th>@lang('Link')</th>
                                    @if(request()->routeIs('admin.service.index'))
                                    <th>@lang('Status')</th>
                                    @endif
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($social as $k=>$social)
                                <tr>
                                    <td>
                                        <span class="fw-bold">
                                            {{ ++$k }}
                                        </span>
                                    </td>

                                    <td data-label="@lang('SocialMedia')">
                                        <span class="fw-bold">{{@$social->social_media_name}}</span>
                                    </td>

                                    <td data-label="@lang('Followers')">
                                        <span>{{ $social->followers }}</span>
                                    </td>

                                    <td data-label="@lang('Followers')">
                                        <span>{{ strLimit($social->url,30) }}</span>
                                    </td>

                                    @php
                                        $project = App\Models\ProjectLink::where('sociallink_id',$social->id)->first();
                                    @endphp
                                    @if($project)
                                    <td data-label="@lang('Action')">
                                        <a href="{{ route('admin.socialproj.details', $social->id) }}" class="btn btn-sm btn-outline--primary">
                                            <i class="las la-desktop text--shadow"></i> @lang('Details')
                                        </a>
                                    </td>
                                    @endif

                                </tr>
                                @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- @if ($services->hasPages())
                <div class="card-footer py-4">
                    {{ paginateLinks($services) }}
                </div>
                @endif --}}
            </div>
        </div>


    </div>
@endsection



@push('breadcrumb-plugins')
    <div class="d-flex flex-wrap justify-content-end">
        <form action="" method="GET" class="form-inline">
            <div class="input-group justify-content-end">
                <input type="text" name="search" class="form-control bg--white" placeholder="@lang('Search here')" value="{{ request()->search }}">
                <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
@endpush
