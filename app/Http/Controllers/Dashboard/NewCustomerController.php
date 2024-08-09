<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\CustomerRequest;
use App\Repositories\Contract\BrandRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use App\Models\NewCustomer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Governorate;


class NewCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index(Request $request)
    {
        $query = NewCustomer::query();
    
     
        // Filter by registration_date
       if ($request->filled('from_date') && $request->filled('to_date')) {
           $fromDate = $request->input('from_date');
           $toDate = $request->input('to_date');
           $query->whereBetween('registration_date', [$fromDate, $toDate]);
        }

        // Filter by delivery_name
        if ($request->filled('delivery_name')) {
            $deliveryName = $request->input('delivery_name');
            $query->where('delivery_name', 'like', "%$deliveryName%");
        }

        // Filter by name
       if ($request->filled('name')) {
           $name = $request->input('name');
           $query->where('name', 'like', "%$name%");
        }

        // Filter by user_name
       if ($request->filled('user_name')) {
           $userName = $request->input('user_name');
           $query->where('user_name', 'like', "%$userName%");
        }
    
        $customers = $query->get();
    
        return view('dashboard.customers.index', compact('customers'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    
    {
        $governorates = Governorate::all();
        return view('dashboard.customers.create', compact('governorates'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'governorate' => 'required|string|max:255',
            'national_id' => 'required|string|max:14|unique:new_customers,national_id',
            'password' => 'required|string|min:6',
            'user_name' => 'required|string|max:255',
            'delivery_name' => 'required|string|max:255',
            'amount_paid' => 'required|numeric',
            'city' => 'required|string|max:255',
            'registration_date' => 'required|date',
            'registration_start' => 'required|date',
            'registration_end' => 'required|date|after:registration_start',
            'request_status' => 'required|string|max:255',
            'registration_duration' => 'required|integer',
            'coupon_number' => 'required|string|max:255|unique:new_customers,coupon_number',
            'hold' => 'nullable|boolean', 
        ],$messages);
    

        
     //   $data['type'] = 'client';
        $data['password'] = Hash::make($request->input('password')); // Hashing the password

        
        $customer = NewCustomer::create($data);

        if ($customer) {
            return redirect()->route('admin.newCustomers.index')->with('success', __('models.added_success'));
        } else {
            return redirect()->back()->with('error', 'حدث خطأ أثناء الإضافة');
        }
    }

      

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = NewCustomer::findOrFail($id);

        if ($customer) {
            return view('dashboard.customers.edit', compact('customer'));
        } else {
            return view('dashboard.error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = NewCustomer::findOrFail($id);
    
        $data = $request->except('_token', '_method');
    
        if (!empty($request->input('password'))) {
            $data['password'] = Hash::make($request->input('password'));
        } else {
            unset($data['password']);
        }
    
        // Use the instance update method
        $updated = $customer->update($data);
    
        if ($updated) {
            return redirect()->route('admin.newCustomers.index')->with('success', __('models.update_success'));
        } else {
            return redirect()->back()->with('error', 'حدث خطأ أثناء التعديل');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NewCustomer::where('id',$id)->delete();      

        return redirect()->back()->with('success', __('models.deleted_success'));

    }

    public function messages(){
        return [            
            'name.required' => 'الاسم مطلوب.',
            'name.string' => 'يجب أن يكون الاسم نصاً.',
            'name.max' => 'لا يمكن أن يتجاوز الاسم 255 حرفًا.',
            'address.required' => 'العنوان مطلوب.',
            'address.string' => 'يجب أن يكون العنوان نصاً.',
            'address.max' => 'لا يمكن أن يتجاوز العنوان 255 حرفًا.',
            'governorate.required' => 'المحافطة مطلوبة.',
            'governorate.string' => 'يجب أن تكون المحافطة نصاً.',
            'governorate.max' => 'لا يمكن أن تتجاوز المحافطة 255 حرفًا.',
            'national_id.required' => 'الرقم القومي مطلوب.',
            'national_id.string' => 'يجب أن يكون الرقم القومي نصاً.',
            'national_id.max' => 'لا يمكن أن يتجاوز الرقم القومي 14 حرفًا.',
            'national_id.unique' => 'تم استخدام الرقم القومي من قبل. يرجى إدخال رقم قومي فريد.',
            'password.required' => 'كلمة المرور مطلوبة.',
            'password.string' => 'يجب أن تكون كلمة المرور نصاً.',
            'password.min' => 'يجب أن تتكون كلمة المرور من 6 أحرف على الأقل.',
            'user_name.required' => 'اسم المستخدم مطلوب.',
            'user_name.string' => 'يجب أن يكون اسم المستخدم نصاً.',
            'user_name.max' => 'لا يمكن أن يتجاوز اسم المستخدم 255 حرفًا.',
            'delivery_name.required' => 'اسم المندوب مطلوب.',
            'delivery_name.string' => 'يجب أن يكون اسم المندوب نصاً.',
            'delivery_name.max' => 'لا يمكن أن يتجاوز اسم المندوب 255 حرفًا.',
            'amount_paid.required' => 'المبلغ المدفوع مطلوب.',
            'amount_paid.numeric' => 'يجب أن يكون المبلغ المدفوع رقمًا.',
            'city.required' => 'المدينة مطلوبة.',
            'city.string' => 'يجب أن تكون المدينة نصاً.',
            'city.max' => 'لا يمكن أن تتجاوز المدينة 255 حرفًا.',
            'registration_date.required' => 'تاريخ التسجيل مطلوب.',
            'registration_date.date' => 'يجب أن يكون تاريخ التسجيل تاريخًا صحيحًا.',
            'registration_start.required' => 'تاريخ بدء التسجيل مطلوب.',
            'registration_start.date' => 'يجب أن يكون تاريخ بدء التسجيل تاريخًا صحيحًا.',
            'registration_end.required' => 'تاريخ انتهاء التسجيل مطلوب.',
            'registration_end.date' => 'يجب أن يكون تاريخ انتهاء التسجيل تاريخًا صحيحًا.',
            'registration_end.after' => 'يجب أن يكون تاريخ انتهاء التسجيل بعد تاريخ بدء التسجيل.',
            'request_status.required' => 'حالة الطلب مطلوبة.',
            'request_status.string' => 'يجب أن تكون حالة الطلب نصاً.',
            'request_status.max' => 'لا يمكن أن تتجاوز حالة الطلب 255 حرفًا.',
            'registration_duration.required' => 'مدة التسجيل مطلوبة.',
            'registration_duration.integer' => 'يجب أن تكون مدة التسجيل عددًا صحيحًا.',
            'coupon_number.required' => 'رقم القسيمة مطلوب.',
            'coupon_number.string' => 'يجب أن يكون رقم القسيمة نصاً.',
            'coupon_number.max' => 'لا يمكن أن يتجاوز رقم القسيمة 255 حرفًا.',
            'coupon_number.unique' => 'تم استخدام رقم القسيمة من قبل. يرجى إدخال رقم فريد.',

        ];
            
    }
}


