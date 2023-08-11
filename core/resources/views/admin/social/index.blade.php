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
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($social as $key=>$social)
                            <tr>
                                <td data-label="@lang('S.N.')">{{  ++$key }}</td>
                                <td data-label="@lang('Name')">{{ __($social->name) }}</td>
                                <td data-label="@lang('Status')">
                                    @if ($social->status == 1)
                                        <span class="text--small badge font-weight-normal badge--success">@lang('Enabled')</span>
                                    @else
                                        <span class="text--small badge font-weight-normal badge--danger">@lang('Disabled')</span>
                                    @endif
                                </td>
                                <td data-label="@lang('Action')">
                                    <button class="btn btn-sm btn-outline--primary editButton" data-id="{{ $social->id }}" data-name="{{ $social->name }}">
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

                        <div class="form-group status">
                            <label>@lang('Status')</label>
                            <div class="col-sm-12">
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle" data-height="50" data-on="@lang('Enable')" data-off="@lang('Disable')" name="status">
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
                modal.find('.modal-title').text(`@lang('Add New Social')`);
                modal.find('.status').addClass('d-none');
                modal.find('form').attr('action', `{{ route('admin.social.store','') }}`);
                modal.modal('show');
            });

            $('.editButton').on('click', function() {
                modal.find('form').attr('action', `{{ route('admin.social.store','') }}/${$(this).data('id')}`);
                modal.find('.modal-title').text(`@lang('Update Social')`);
                modal.find('[name=name]').val($(this).data('name'));
                modal.find('.status').removeClass('d-none');
                modal.find('.profilePicPreview').attr('style', `background-image: url(${$(this).data('image')})`);
                if ($(this).data('status') == 0) {
                    modal.find('input[name=status]').bootstrapToggle('on');
                } else {
                    modal.find('input[name=status]').bootstrapToggle('off');
                }
                modal.modal('show')
            });

        })(jQuery);
</script>
@endpush
