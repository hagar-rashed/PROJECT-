@extends('dashboard.layouts.app')

@section('title', __('models.edit_organization'))

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
                                    <li class="breadcrumb-item"><a href="#">{{ __('models.edit_organization') }}</a></li>
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
                                    <h2 class="card-title">{{ __('models.edit_organization') }}</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="updateorganizationForm"
                                        action="{{ route('admin.organizations.update', $organization->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="organization_name">{{ __('models.organization_name') }}</label>
                                                    <input type="text" id="organization_name" class="form-control" name="organization_name"
                                                        value="{{ old('organization_name', $organization->organization_name) }}" />
                                                    @error('organization_name')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="user_name">{{ __('models.user_name') }}</label>
                                                    <input type="text" id="user_name" class="form-control" name="user_name"
                                                        value="{{ old('user_name', $organization->user_name) }}" />
                                                    @error('user_name')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="government">{{ __('models.government') }}</label>
                                                    <input type="text" id="government" class="form-control" name="government"
                                                        value="{{ old('government', $organization->government) }}" />
                                                    @error('government')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="organization_address">{{ __('models.organization_address') }}</label>
                                                    <input type="text" id="organization_address" class="form-control" name="organization_address"
                                                        value="{{ old('organization_address', $organization->organization_address) }}" />
                                                    @error('organization_address')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city">{{ __('models.city') }}</label>
                                                    <input type="text" id="city" class="form-control" name="city"
                                                        value="{{ old('city', $organization->city) }}" />
                                                    @error('city')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="add_image">{{ __('models.add_image') }}</label>
                                                    <input class="form-control add_image" accept="image/png, image/jpeg" type="file" id="add_image" name="add_image">
                                                    @error('add_image')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group prev">
                                                    @if($organization->add_image)
                                                        <img src="{{ asset('storage/' . $organization->add_image) }}" style="width: 100px" class="img-thumbnail preview-add_image" alt="">
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="organization_owner">{{ __('models.organization_owner') }}</label>
                                                    <input type="text" id="organization_owner" class="form-control" name="organization_owner"
                                                        value="{{ old('organization_owner', $organization->organization_owner) }}" />
                                                    @error('organization_owner')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="organization_type">{{ __('models.organization_type') }}</label>
                                                    <input type="text" id="organization_type" class="form-control" name="organization_type"
                                                        value="{{ old('organization_type', $organization->organization_type) }}" />
                                                    @error('organization_type')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="phone">{{ __('models.phone') }}</label>
                                                    <input type="text" id="phone" class="form-control" name="phone"
                                                        value="{{ old('phone', $organization->phone) }}" />
                                                    @error('phone')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="discount_type">{{ __('models.discount_type') }}</label>
                                                    <input type="text" id="discount_type" class="form-control" name="discount_type"
                                                        value="{{ old('discount_type', $organization->discount_type) }}" />
                                                    @error('discount_type')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="package_value">{{ __('models.package_value') }}</label>
                                                    <input type="text" id="package_value" class="form-control" name="package_value"
                                                        value="{{ old('package_value', $organization->package_value) }}" />
                                                    @error('package_value')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="package_type">{{ __('models.package_type') }}</label>
                                                    <input type="text" id="package_type" class="form-control" name="package_type"
                                                        value="{{ old('package_type', $organization->package_type) }}" />
                                                    @error('package_type')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="discount_value">{{ __('models.discount_value') }}</label>
                                                    <input type="text" id="discount_value" class="form-control" name="discount_value"
                                                        value="{{ old('discount_value', $organization->discount_value) }}" />
                                                    @error('discount_value')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- <div class="col-6">
                                                <div class="form-group">
                                                    <label for="date">{{ __('models.date') }}</label>
                                                    <input type="date" id="date" class="form-control" name="date"
                                                        value="{{ old('date', $organization->date ? $organization->date->format('Y-m-d') : '') }}" />
                                                    @error('date')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div> -->

                                            <!-- Eighth row of inputs -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="date" class="form-label">{{ __('models.date') }}</label>
                                                    <input type="date" id="date" name="date" class="form-control" value="{{ old('date', optional($organization->date)->format('Y-m-d')) }}">
                                                    @error('date')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="hold">{{ __('models.hold') }}</label>
                                                    <input type="checkbox" id="hold" class="form-check-input" name="hold"
                                                        {{ old('hold', $organization->hold) ? 'checked' : '' }} />
                                                    <label class="form-check-label" for="hold">{{ __('models.hold') }}</label>
                                                    @error('hold')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="rate">{{ __('models.rate') }}</label>
                                                    <input type="text" id="rate" class="form-control" name="rate"
                                                        value="{{ old('rate', $organization->rate) }}" />
                                                    @error('rate')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="comments">{{ __('models.comments') }}</label>
                                                    <textarea class="form-control" id="comments" name="comments" rows="5">{{ old('comments', $organization->comments) }}</textarea>
                                                    @error('comments')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

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
        <script src="{{ asset('dashboard/assets/js/custom/validation/organizationForm.js') }}"></script>
        <script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
