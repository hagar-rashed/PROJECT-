@extends('dashboard.layouts.app')

@section('title', __('models.clients'))

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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.newCustomers.index') }}">{{ __('models.clients') }}</a></li>
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
                                <a class="dropdown-item" href="{{ route('admin.newCustomers.create') }}">
                                    <i class="mr-1" data-feather="circle"></i><span class="align-middle">{{ __('models.add_n_client') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Search filter form -->
                <form action="{{ route('admin.newCustomers.index') }}" method="GET">
                    <div class="row align-items-end">
                        <div class="col-md-2">
                            <label for="from_date">{{ __('models.from') }}</label>
                            <input type="date" id="from_date" name="from_date" class="form-control" value="{{ request('from_date') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="to_date">{{ __('models.to') }}</label>
                            <input type="date" id="to_date" name="to_date" class="form-control" value="{{ request('to_date') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="delivery_name">{{ __('models.delivery_name') }}</label>
                            <input type="text" id="delivery_name" name="delivery_name" class="form-control" value="{{ request('delivery_name') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="name">{{ __('models.name') }}</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ request('name') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="user_name">{{ __('models.user_name') }}</label>
                            <input type="text" id="user_name" name="user_name" class="form-control" value="{{ request('user_name') }}">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">{{ __('models.search') }}</button>
                        </div>
                    </div>
                </form>
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
                                            <th>{{ __('models.delivery_name') }}</th>
                                            <th>{{ __('models.amount_paid') }}</th>                                                                                      
                                            <th>{{ __('models.request_status') }}</th>
                                            <th>{{ __('models.registration_date') }}</th>
                                            <th>{{ __('models.registration_duration') }}</th>
                                            <th>{{ __('models.coupon_number') }}</th>
                                            <th>{{ __('models.hold') }}</th>
                                            <th>{{ __('models.actions') }}</th>                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td>{{ $customer->id }}</td>
                                                <td>{{ $customer->name }}</td> 
                                                <td>{{ $customer->delivery_name }}</td>
                                                <td>{{ $customer->amount_paid }}</td>                                                
                                                <td>{{ $customer->request_status }}</td>
                                                <td>{{ $customer->registration_date }}</td>
                                                <td>{{ $customer->registration_duration }}</td>
                                                <td>{{ $customer->coupon_number }}</td>
                                                <td>{{ $customer->hold ? __('models.yes') : __('models.no') }}</td>                                          
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                        <a href="{{ route('admin.newCustomers.edit', $customer->id) }}" class="btn btn-sm btn-primary">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <form action="{{ route('admin.newCustomers.destroy', $customer->id) }}" method="POST">
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
