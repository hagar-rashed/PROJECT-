@extends('dashboard.layouts.app')

@section('title', $service->name)

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
                                            href="{{ route('admin.services.index') }}">{{ __('models.services') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">{{ $service->name }}</a>
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
                                    <h2 class="card-title">{{ $service->name }}</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="updateserviceForm"
                                        action="{{ route('admin.services.update', $service->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">

                    
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name_ar">الباقة</label>
                                                    <input type="text" id="package" class="form-control"
                                                        name="package" value="{{ old('package', $service->package) }}" />
                                                    @error('package')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="organization_name">اسم المنشأه</label>
                                                    <input type="text" id="organization_name" class="form-control"
                                                        name="organization_name" value="{{ old('organization_name', $service->organization_name) }}" />
                                                    @error('organization_name')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="discount">الخصم</label>
                                                    <input type="text" class="form-control" name="discount" VALUE="{{ old('discount', $service->discount) }}">
                                                    @error('discount')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="desc_en">عدد الأوردرات</label>
                                                    <input type="text" class="form-control" name="order_num" VALUE="{{ old('order_num', $service->order_num) }}">
                                                    @error('order_num')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="desc_en"> رقم الكوبون  </label>
                                                    <input type="text" class="form-control" name="serial_num" VALUE="{{ old('serial_num', $service->serial_num) }}">
                                                    @error('serial_num')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="desc_en">إسم العميل </label>
                                                    <input type="text" class="form-control" name="client_name" VALUE="{{ old('client_name', $service->client_name) }}">
                                                    @error('client_name')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="price_after_discount">السعر بعد الخصم  </label>
                                                    <input type="text" class="form-control" name="price_after_discount" VALUE="{{ old('price_after_discount', $service->price_after_discount) }}">
                                                    @error('price_after_discount')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit"
                                                    class="btn btn-primary mr-1">{{ __('models.update') }}</button>
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
        <script src="{{ asset('dashboard/assets/js/custom/validation/serviceForm.js') }}"></script>
        <script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
