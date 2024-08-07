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
use App\Models\Government;


class NewCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = NewCustomer::get();

        return view('dashboard.customers.index', compact('customers'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    
    {
        $governments = Government::all();
        return view('dashboard.customers.create', compact('governments'));
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
            'government' => 'required|string|max:255',
            'national_id' => 'required|string|max:255',
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
            'coupon_number' => 'required|string|max:255',
            'hold' => 'nullable|boolean', // Ensure hold is treated as a boolean
        ]);
    

        
     //   $data['type'] = 'client';
        $data['password'] = Hash::make($request->input('password')); // Hashing the password

          // Generate a unique coupon number
       // $data['coupon_number'] = $this->generateUniqueCouponNumber();
        

       // $customer = $this->brandRepo->create($data);
        $customer = NewCustomer::create($data);

        if ($customer) {
            return redirect()->route('admin.newCustomers.index')->with('success', __('models.added_success'));
        } else {
            return redirect()->back()->with('error', 'حدث خطأ أثناء الإضافة');
        }
    }

    // private function generateUniqueCouponNumber()
    // {
    //     do {
    //         $couponNumber = Str::random(10); // Generates a random 10 character string
    //     } while (NewCustomer::where('coupon_number', $couponNumber)->exists());

    //     return $couponNumber;
    // }

    

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
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be a string.',
            'name.max' => 'Name cannot exceed 255 characters.',
            'address.required' => 'Address is required.',
            'address.string' => 'Address must be a string.',
            'address.max' => 'Address cannot exceed 255 characters.',
            'government.required' => 'Government is required.',
            'government.string' => 'Government must be a string.',
            'government.max' => 'Government cannot exceed 255 characters.',
            'national_id.required' => 'National ID is required.',
            'national_id.string' => 'National ID must be a string.',
            'national_id.max' => 'National ID cannot exceed 255 characters.',
            'password.required' => 'Password is required.',
            'password.string' => 'Password must be a string.',
            'password.min' => 'Password must be at least 6 characters long.',
            'user_name.required' => 'Username is required.',
            'user_name.string' => 'Username must be a string.',
            'user_name.max' => 'Username cannot exceed 255 characters.',
            'delivery_name.required' => 'Delivery name is required.',
            'delivery_name.string' => 'Delivery name must be a string.',
            'delivery_name.max' => 'Delivery name cannot exceed 255 characters.',
            'amount_paid.required' => 'Amount paid is required.',
            'amount_paid.numeric' => 'Amount paid must be a number.',
            'city.required' => 'City is required.',
            'city.string' => 'City must be a string.',
            'city.max' => 'City cannot exceed 255 characters.',
            'registration_date.required' => 'Registration date is required.',
            'registration_date.date' => 'Registration date must be a valid date.',
            'registration_start.required' => 'Registration start date is required.',
            'registration_start.date' => 'Registration start date must be a valid date.',
            'registration_end.required' => 'Registration end date is required.',
            'registration_end.date' => 'Registration end date must be a valid date.',
            'registration_end.after' => 'Registration end date must be after the registration start date.',
            'request_status.required' => 'Request status is required.',
            'request_status.string' => 'Request status must be a string.',
            'request_status.max' => 'Request status cannot exceed 255 characters.',
            'registration_duration.required' => 'Registration duration is required.',
            'registration_duration.integer' => 'Registration duration must be an integer.',
            'coupon_number.required' => 'Coupon number is required.',
            'coupon_number.string' => 'Coupon number must be a string.',
            'coupon_number.max' => 'Coupon number cannot exceed 255 characters.',
            
        ];
            
    }
}


