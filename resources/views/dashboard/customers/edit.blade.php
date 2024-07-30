@extends('dashboard.layouts.app')

@section('title', __('models.edit_client'))

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
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.newCustomers.index') }}">{{ __('models.clients') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#">{{ __('models.edit_client') }}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Vertical form layout section start -->
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="card-title">{{ __('models.edit_client') }}</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="updateclientForm"
                                        action="{{ route('admin.newCustomers.update', $customer->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">
                                           
                                            <!-- Name Input -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name">{{ __('models.name') }}</label>
                                                    <input type="text" id="name" class="form-control" name="name"
                                                        value="{{ old('name', $customer->name) }}" />
                                                    @error('name')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Address Input -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="address">{{ __('models.address') }}</label>
                                                    <input type="text" id="address" class="form-control" name="address"
                                                        value="{{ old('address', $customer->address) }}" />
                                                    @error('address')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Governorate Input -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="government">{{ __('models.government') }}</label>
                                                    <input type="text" id="government" class="form-control" name="government"
                                                        value="{{ old('government', $customer->government) }}" />
                                                    @error('government')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- National ID Input -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="national_id">{{ __('models.national_id') }}</label>
                                                    <input type="text" id="national_id" class="form-control" name="national_id"
                                                        value="{{ old('national_id', $customer->national_id) }}" />
                                                    @error('national_id')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Password Input -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="password">{{ __('models.password') }}</label>
                                                    <input type="password" id="password" class="form-control" name="password"
                                                        value="{{ old('password') }}" />
                                                    @error('password')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Username Input -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="user_name">{{ __('models.user_name') }}</label>
                                                    <input type="text" id="user_name" class="form-control" name="user_name"
                                                        value="{{ old('user_name', $customer->user_name) }}" />
                                                    @error('user_name')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Assigned Delivery Name Input -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="delivery_name">{{ __('models.delivery_name') }}</label>
                                                    <input type="text" id="delivery_name" class="form-control" name="delivery_name"
                                                        value="{{ old('delivery_name', $customer->delivery_name) }}" />
                                                    @error('delivery_name')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Project Amount paid Input -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="amount_paid">{{ __('models.amount_paid') }}</label>
                                                    <input type="text" id="amount_paid" class="form-control" name="amount_paid"
                                                        value="{{ old('amount_paid', $customer->amount_paid) }}" />
                                                    @error('amount_paid')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- City Input -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city">{{ __('models.city') }}</label>
                                                    <input type="text" id="city" class="form-control" name="city"
                                                        value="{{ old('city', $customer->city) }}" />
                                                    @error('city')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Registration Date Input -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="registration_date">{{ __('models.registration_date') }}</label>
                                                    <input type="date" id="registration_date" class="form-control" name="registration_date"
                                                        value="{{ old('registration_date', $customer->registration_date) }}" />
                                                    @error('registration_date')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Registration Start Date Input -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="registration_start">{{ __('models.registration_start') }}</label>
                                                    <input type="date" id="registration_start" class="form-control" name="registration_start"
                                                        value="{{ old('registration_start', $customer->registration_start) }}" />
                                                    @error('registration_start')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Registration End Date Input -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="registration_end">{{ __('models.registration_end') }}</label>
                                                    <input type="date" id="registration_end" class="form-control" name="registration_end"
                                                        value="{{ old('registration_end', $customer->registration_end) }}" />
                                                    @error('registration_end')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Request Status Input -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="request_status">{{ __('models.request_status') }}</label>
                                                    <select class="form-control" id="request_status" name="request_status">
                                                        <option value="pending" {{ old('request_status', $customer->request_status) == 'pending' ? 'selected' : '' }}>{{ __('models.pending') }}</option>
                                                        <option value="approved" {{ old('request_status', $customer->request_status) == 'approved' ? 'selected' : '' }}>{{ __('models.approved') }}</option>
                                                        <option value="rejected" {{ old('request_status', $customer->request_status) == 'rejected' ? 'selected' : '' }}>{{ __('models.rejected') }}</option>
                                                    </select>
                                                    @error('request_status')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Registration Duration Input -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="registration_duration">{{ __('models.registration_duration') }}</label>
                                                    <input type="text" id="registration_duration" class="form-control" name="registration_duration"
                                                        value="{{ old('registration_duration', $customer->registration_duration) }}" />
                                                    @error('registration_duration')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Coupon Number Input -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="coupon_number">{{ __('models.coupon_number') }}</label>
                                                    <input type="text" id="coupon_number" class="form-control" name="coupon_number"
                                                        value="{{ old('coupon_number', $customer->coupon_number) }}" />
                                                    @error('coupon_number')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Hold Checkbox -->
                                            <div class="col-6">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="hold" name="hold" {{ old('hold', $customer->hold) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="hold">{{ __('models.hold') }}</label>
                                                    @error('hold')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1">{{ __('models.update') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Vertical form layout section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @push('js')
        <script src="{{ asset('dashboard/assets/js/custom/validation/clientForm.js') }}"></script>
        <script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
