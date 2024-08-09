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
                                            
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="governorate" class="form-label">{{ __('models.governorate') }}</label>
                                                    <select id="governorate" name="governorate" class="form-control">
                                                        <option value="">{{ __('models.select_governorate') }}</option>
                                                         @foreach($governorates as $governorate)
                                                         <option value="{{ $governorate->name }}" {{ old('governorate') == $governorate->name ? 'selected' : '' }}>{{ $governorate->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('governorate')
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

                                            <div class="col-6">
                                               <div class="form-group">
                                                    <label for="discount_type" class="form-label">{{ __('models.discount_type') }}</label>
                                                    <select id="discount_type" name="discount_type" class="form-control">
                                                       <option value="" disabled selected>{{ __('Select Discount Type') }}</option>
                                                       <option value="cash" {{ old('discount_type') == 'cash' ? 'selected' : '' }}>Cash</option>
                                                       <option value="percent" {{ old('discount_type') == 'percent' ? 'selected' : '' }}>Percent</option>
                                                    </select>
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
                                                  <div class="star-rating">
                                                    <input type="radio" id="star5" name="rate" value="5" {{ old('rate') == 5 ? 'checked' : '' }}><label for="star5" title="5 stars"><i class="fas fa-star"></i></label>
                                                    <input type="radio" id="star4" name="rate" value="4" {{ old('rate') == 4 ? 'checked' : '' }}><label for="star4" title="4 stars"><i class="fas fa-star"></i></label>
                                                    <input type="radio" id="star3" name="rate" value="3" {{ old('rate') == 3 ? 'checked' : '' }}><label for="star3" title="3 stars"><i class="fas fa-star"></i></label>
                                                    <input type="radio" id="star2" name="rate" value="2" {{ old('rate') == 2 ? 'checked' : '' }}><label for="star2" title="2 stars"><i class="fas fa-star"></i></label>
                                                    <input type="radio" id="star1" name="rate" value="1" {{ old('rate') == 1 ? 'checked' : '' }}><label for="star1" title="1 star"><i class="fas fa-star"></i></label>
                                                  </div>
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
                                                
                                                <input type="hidden" name="hold" value="0"> <!-- Default value when unchecked -->
                                                <input type="checkbox" id="hold" class="form-check-input" name="hold" value="1" {{ old('hold') == '1' ? 'checked' : '' }} />
                                                <label for="hold">{{ __('models.hold') }}</label>
                                                @error('hold')
                                                <span class="alert alert-danger">
                                                   <small class="errorTxt">{{ $message }}</small>
                                                </span>
                                                @enderror
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
    <style>
    .star-rating {
        direction: rtl;
        display: inline-flex;
        justify-content: flex-start;
    }
    .star-rating input[type="radio"] {
        display: none;
    }
    .star-rating label {
        font-size: 24px;
        color: #ddd;
        cursor: pointer;
        margin: 0 5px;
    }
    .star-rating input[type="radio"]:checked ~ label,
    .star-rating input[type="radio"]:hover ~ label {
        color: #ffc107;
    }
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #ffc107;
    }
</style>


    @push('js')
        <script src="{{ asset('dashboard/assets/js/custom/validation/organizationForm.js') }}"></script>
        <script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection

    

