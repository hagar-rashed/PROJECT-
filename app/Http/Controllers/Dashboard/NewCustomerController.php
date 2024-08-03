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
        return view('dashboard.customers.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        
     //   $data['type'] = 'client';
        $data['password'] = Hash::make($request->input('password')); // Hashing the password

          // Generate a unique coupon number
        $data['coupon_number'] = $this->generateUniqueCouponNumber();
        

       // $customer = $this->brandRepo->create($data);
        $customer = NewCustomer::create($data);

        if ($customer) {
            return redirect()->route('admin.newCustomers.index')->with('success', __('models.added_success'));
        } else {
            return redirect()->back()->with('error', 'حدث خطأ أثناء الإضافة');
        }
    }

    private function generateUniqueCouponNumber()
    {
        do {
            $couponNumber = Str::random(10); // Generates a random 10 character string
        } while (NewCustomer::where('coupon_number', $couponNumber)->exists());

        return $couponNumber;
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
}
