
@extends('admin.layouts.app')
@section('panel')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0">             
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>@lang('S.N.')</th>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                <tr>
                                    <td data-label="@lang('S.N.')">{{ $categories->firstItem() + $loop->index }}</td>
                                    <td data-label="@lang('Name')">{{ __($category->name) }}</td>
                                    <td data-label="@lang('Status')">
                                        @if ($category->status == 1)
                                            <span class="text--small badge font-weight-normal badge--success">@lang('Enabled')</span>
                                        @else
                                            <span class="text--small badge font-weight-normal badge--danger">@lang('Disabled')</span>
                                        @endif
                                    </td>
                                    <td data-label="@lang('Action')">
                                        <button class="btn btn-sm btn-outline--primary editButton" data-id="{{ $category->id }}" data-name="{{ $category->name }}" data-status="{{ $category->status }}" data-image="{{ getImage(getFilePath('category').'/'.$category->image, getFileSize('category')) }}">
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

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
<script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
</script>
@endpush
