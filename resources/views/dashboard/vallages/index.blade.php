@extends('dashboard.layouts.app')

@section('title', __('models.vallages'))

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('admin.vallages.index') }}">{{ __('models.values') }}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                    href="{{ route('admin.vallages.create') }}"><i class="mr-1"
                                        data-feather="circle"></i><span class="align-middle">{{ __('models.add_n_value') }}
                                    </span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('models.name') }}</th>
                                            <th>{{ __('models.desc') }}</th>
                                            <th>{{ __('models.location') }}</th>
                                            <th>{{ __('models.lat') }}</th>
                                            <th>{{ __('models.lng') }}</th>
                                            <th>{{ __('models.owner_name') }}</th>
                                            <th>{{ __('models.image') }}</th>
                                            <th>{{ __('models.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vallages as $vallage)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $vallage->name_ar }}</td>
                                                <td>{{ $vallage->desc_ar }}</td>
                                                <td>{{ $vallage->location }}</td>
                                                <td>{{ $vallage->lat }}</td>
                                                <td>{{ $vallage->lng }}</td>
                                                <th>{{ __('models.images') }}</th>
                                                <td>{{ $vallage->owner_name_ar }}</td>
                                                <!-- <td>{{ Str::words($vallage->desc, 15) }}</td> -->
                                                <td>
                                                <button class="btn btn-sm btn-info preview-images"   data-toggle="modal" data-target="#imagePreviewModal"><i class="fa-solid fa-eye"></i></button>

                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                        <a href="{{ route('admin.vallages.edit', $vallage->id) }}"
                                                            class="btn btn-sm btn-primary"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="{{ route('admin.vallages.destroy', $vallage->id) }}"
                                                           data-id="{{ $vallage->id }}"
                                                            class="btn btn-sm btn-danger item-delete"><i
                                                                class="fa-solid fa-trash-can"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Basic table -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" role="dialog" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imagePreviewModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="imageContainer"></div>
                </div>
            </div>
        </div>
</div>
    <!-- END: Content-->
    @push('js')
        <script src="{{ asset('dashboard/app-assets/js/custom/custom-delete.js') }}"></script>
    @endpush
@endsection
