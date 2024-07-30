@extends('dashboard.layouts.app')

@section('title', 'اضف أوردر جديد')

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
                                    <li class="breadcrumb-item"><a href="#">إضافة طلب جديده</a>
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
                                    <h2 class="card-title">{{ __('models.add_n_service') }}</h2>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" id="createserviceForm"
                                        action="{{ route('admin.services.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                       
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="package"> باقة المنشأة </label>
                                                    <input type="text" id="package" class="form-control" name="package"
                                                    value="{{ old('package') }}" /> 
                                             
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="organization_name">اسم المنشأة </label>
                                                    <input type="text" id="organization_name" class="form-control" name="organization_name"
                                                        value="{{ old('organization_name') }}" />
                                                    @error('organization_name')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="discount"> قيمة الخصم </label>
                                                    <input type="text" id="discount" class="form-control" name="discount"
                                                    value="{{ old('discount') }}" />                                                  
                                                      @error('discount')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="order_num"> عدد الاوردرات </label>
                                                    <input type="text" id="order_num" class="form-control" name="order_num"
                                                    value="{{ old('order_num') }}" />                                                   
                                                     @error('order_num')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="price_after_discount">قيمة  المنتج بعد الخصم </label>
                                                    <input type="text" id="price_after_discount" class="form-control" name="price_after_discount"
                                                    value="{{ old('price_after_discount') }}" />                                                    
                                                    @error('desc_ar')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="client_name">اسم العميل </label>
                                                    <input type="text" id="client_name" class="form-control" name="client_name"
                                                    value="{{ old('client_name') }}" />                                                   
                                                     @error('client_name')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="serial_num">    رقم الكوبون </label>
                                                    <input type="text" id="serial_num" class="form-control" name="serial_num"
                                                    value="{{ old('serial_num') }}" />                                                   
                                                     @error('serial_num')
                                                        <span class="alert alert-danger">
                                                            <small class="errorTxt">{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                            <div class="d-flex justify-content-around">
          <div class="btn send mt-4">بيع</div>
          <div class="btn send mt-4">مرتجع</div>
        </div>
                                            </div>
                
                                            <div class="col-12">
                                                <button type="submit"
                                                    class="btn btn-primary mr-1">حفظ</button>
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
        <script src="{{ asset('dashboard/assets/js/custom/validation/serviceForm.js') }}"></script>
        <script src="{{ asset('dashboard/app-assets/js/custom/preview-image.js') }}"></script>
    @endpush
@endsection
