@extends('dashboard.layouts.app')

@section('title', __('models.add_organization'))

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
                                    <li class="breadcrumb-item"><a href="#">{{ __('models.add_organization') }}</a></li>
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
                                    <h2 class="card-title">{{ __('models.add_organization') }}</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="createOrganizationForm" action="{{ route('admin.organizations.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <!-- First row of inputs -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="organization_name" class="form-label">{{ __('models.organization_name') }}</label>
                                                    <input type="text" id="organization_name" name="organization_name" class="form-control" value="{{ old('organization_name') }}">
                                                    @error('organization_name')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="user_name" class="form-label">{{ __('models.user_name') }}</label>
                                                    <input type="text" id="user_name" name="user_name" class="form-control" value="{{ old('user_name') }}">
                                                    @error('user_name')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Second row of inputs -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="government" class="form-label">{{ __('models.government') }}</label>
                                                    <input type="text" id="government" name="government" class="form-control" value="{{ old('government') }}">
                                                    @error('government')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="organization_address" class="form-label">{{ __('models.organization_address') }}</label>
                                                    <input type="text" id="organization_address" name="organization_address" class="form-control" value="{{ old('organization_address') }}">
                                                    @error('organization_address')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Third row of inputs -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class="form-label">{{ __('models.city') }}</label>
                                                    <input type="text" id="city" name="city" class="form-control" value="{{ old('city') }}">
                                                    @error('city')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="add_image" class="form-label">{{ __('models.add_image') }}</label>
                                                    <input class="form-control" accept="image/png, image/jpeg" type="file" id="add_image" name="add_image">
                                                    @error('add_image')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group prev">
                                                    <img src="" style="width: 100px" class="img-thumbnail preview-add_image" alt="">
                                                </div>
                                            </div>

                                            <!-- Fourth row of inputs -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="organization_owner" class="form-label">{{ __('models.organization_owner') }}</label>
                                                    <input type="text" id="organization_owner" name="organization_owner" class="form-control" value="{{ old('organization_owner') }}">
                                                    @error('organization_owner')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="organization_type" class="form-label">{{ __('models.organization_type') }}</label>
                                                    <input type="text" id="organization_type" name="organization_type" class="form-control" value="{{ old('organization_type') }}">
                                                    @error('organization_type')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Fifth row of inputs -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="password" class="form-label">{{ __('models.password') }}</label>
                                                    <input type="password" id="password" name="password" class="form-control" value="{{ old('password') }}">
                                                    @error('password')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="phone" class="form-label">{{ __('models.phone') }}</label>
                                                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}">
                                                    @error('phone')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Sixth row of inputs -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="discount_type" class="form-label">{{ __('models.discount_type') }}</label>
                                                    <input type="text" id="discount_type" name="discount_type" class="form-control" value="{{ old('discount_type') }}">
                                                    @error('discount_type')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="package_value" class="form-label">{{ __('models.package_value') }}</label>
                                                    <input type="text" id="package_value" name="package_value" class="form-control" value="{{ old('package_value') }}">
                                                    @error('package_value')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Seventh row of inputs -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="package_type" class="form-label">{{ __('models.package_type') }}</label>
                                                    <input type="text" id="package_type" name="package_type" class="form-control" value="{{ old('package_type') }}">
                                                    @error('package_type')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="discount_value" class="form-label">{{ __('models.discount_value') }}</label>
                                                    <input type="text" id="discount_value" name="discount_value" class="form-control" value="{{ old('discount_value') }}">
                                                    @error('discount_value')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Eighth row of inputs -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="date" class="form-label">{{ __('models.date') }}</label>
                                                    <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}">
                                                    @error('date')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="rate" class="form-label">{{ __('models.rate') }}</label>
                                                    <input type="text" id="rate" name="rate" class="form-control" value="{{ old('rate') }}">
                                                    @error('rate')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Ninth row of inputs -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="comments" class="form-label">{{ __('models.comments') }}</label>
                                                    <textarea id="comments" name="comments" class="form-control">{{ old('comments') }}</textarea>
                                                    @error('comments')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                             <div class="form-group">
                                               <label class="form-label" for="holded">{{ __('models.holded') }}</label>
                                               <input type="hidden" name="holded" value="no">
                                               <input type="checkbox" name="holded" value="yes" {{ old('holded', 'no') === 'yes' ? 'checked' : '' }} class="form-control">
                                             </div>
                                           </div>   

                                         <div class="col-12">
                                            <button type="submit" class="btn btn-primary me-1">{{ __('models.add') }}</button>
                                            <button type="reset" class="btn btn-outline-secondary">{{ __('models.cancel') }}</button>
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

    

