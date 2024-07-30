@extends('dashboard.layouts.app')

@section('title', __('models.organizations'))

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.organizations.index') }}">{{ __('models.organizations') }}</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="grid"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('admin.organizations.create') }}">
                                    <i class="mr-1" data-feather="circle"></i>
                                    <span class="align-middle">{{ __('models.add_n_organization') }}</span>
                                </a>
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
                                            <th>{{ __('models.organization_name') }}</th>
                                            <th>{{ __('models.user_name') }}</th>
                                            <th>{{ __('models.government') }}</th>
                                            
                                            <th>{{ __('models.city') }}</th>
                                            <th>{{ __('models.add_image') }}</th>
                                            <th>{{ __('models.organization_owner') }}</th>
                                            <th>{{ __('models.organization_type') }}</th>
                                            <th>{{ __('models.phone') }}</th>
                                            <th>{{ __('models.discount_type') }}</th>
                                            <th>{{ __('models.package_value') }}</th>
                                            <th>{{ __('models.package_type') }}</th>
                                            <th>{{ __('models.discount_value') }}</th>
                                            
                                            <th>{{ __('models.hold') }}</th>
                                            <th>{{ __('models.rate') }}</th>
                                            <th>{{ __('models.comments') }}</th>
                                            <th>{{ __('models.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($organizations as $organization)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $organization->organization_name ?? '-' }}</td>
                                                <td>{{ $organization->user_name ?? '-' }}</td>
                                                <td>{{ $organization->government ?? '-' }}</td>
                                             
                                                <td>{{ $organization->city ?? '-' }}</td>
                                                <td>
                                                    @if($organization->add_image)
                                                        <img src="{{ asset('storage/' . $organization->add_image) }}" style="width: 100px; height: auto;">
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>{{ $organization->organization_owner ?? '-' }}</td>
                                                <td>{{ $organization->facility_type ?? '-' }}</td>
                                                <td>{{ $organization->phone ?? '-' }}</td>
                                                <td>{{ $organization->discount_type ?? '-' }}</td>
                                                <td>{{ $organization->package_value ?? '-' }}</td>
                                                <td>{{ $organization->package_type ?? '-' }}</td>
                                                <td>{{ $organization->discount_value ?? '-' }}</td>
                                               
                                                <td>{{ $organization->hold ? 'Yes' : 'No' }}</td>
                                                <td>{{ $organization->rate ?? '-' }}</td>
                                                <td>{{ $organization->comments ?? '-' }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                        <a href="{{ route('admin.organizations.edit', $organization->id) }}" class="btn btn-sm btn-primary">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <form action="{{ route('admin.organizations.destroy', $organization->id) }}" data-id="{{ $organization->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </button>
                                                        </form>
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
    <!-- END: Content-->

    @push('js')
        <script src="{{ asset('dashboard/app-assets/js/custom/custom-delete.js') }}"></script>
    @endpush
@endsection


