@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="d-flex flex-colum flex-wrap gap-2 justify-content-end align-items-center  pb-2">
                <button class="btn btn-sm btn-outline--danger createButton">@lang('Add New')</button>        </div>
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th>@lang('S.N.')</th>
                                <th>@lang('Name')</th>
                                <th>@lang('Minimum')</th>
                                <th>@lang('Maximum')</th>
                                <th>@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($follower as $key=>$follower)
                            <tr>
                                <td data-label="@lang('S.N.')">{{  ++$key }}</td>
                                <td data-label="@lang('Name')">{{ __($follower->name) }}</td>
                                <td data-label="@lang('Minimum')">{{ __($follower->min) }}</td>
                                <td data-label="@lang('Maximum')">{{ __($follower->max) }}</td>

                                <td data-label="@lang('Action')">
                                    <button class="btn btn-sm btn-outline--primary editButton" data-id="{{ $follower->id }}" data-name="{{ $follower->name }}">
                                        <i class="la la-pencil"></i> @lang('Edit')
                                    </button>
                                </td>
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
                {{-- @if ($social->hasPages())
                <div class="card-footer py-4">
                    {{ paginateLinks($social) }}
                </div>
                @endif --}}
            </div>
        </div>
    </div>
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createModalLabel"></h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="las la-times"></i></button>
                </div>
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Name')</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('Minimum')</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{ old('min') }}" name="min" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('Maximum')</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{ old('max') }}" name="max" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--primary w-100 h-45" id="btn-save" value="add">@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('breadcrumb-plugins')
<div class="d-flex flex-colum flex-wrap gap-2 justify-content-end align-items-center">
    <button class="btn btn-lg btn-outline--primary createButton"><i class="las la-plus"></i>@lang('Add New')</button>

    <form action="" method="GET" class="form-inline float-sm-end">
        <div class="input-group justify-content-end">
            <input type="text" name="search" class="form-control bg--white" placeholder="@lang('Name')" value="{{ request()->search }}">
            <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </form>
</div>
@endpush

@push('script')
<script>
    (function($) {
            "use strict"

            let modal = $('#categoryModal');
            $('.createButton').on('click', function() {
                modal.find('.modal-title').text(`@lang('Add New Follower')`);
                modal.find('form').attr('action', `{{ route('admin.follower.store','') }}`);
                modal.modal('show');
            });

            $('.editButton').on('click', function() {
                modal.find('form').attr('action', `{{ route('admin.follower.store','') }}/${$(this).data('id')}`);
                modal.find('.modal-title').text(`@lang('Update Follower')`);
                modal.find('[name=name]').val($(this).data('name'));
                modal.find('[name=min]').val($(this).data('min'));
                modal.find('[name=max]').val($(this).data('max'));
                modal.modal('show')
            });

        })(jQuery);
</script>
@endpush
