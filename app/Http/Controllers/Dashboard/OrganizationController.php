<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\OrganizationRequest;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Governorate;


class OrganizationController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Organization::query();
    
        // Filter by date range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');
            $query->whereBetween('date', [$fromDate, $toDate]);
        }
    
        // Filter by user_name
        if ($request->filled('user_name')) {
            $userName = $request->input('user_name');
            $query->where('user_name', 'like', "%$userName%");
        }
    
        // Filter by organization_name
        if ($request->filled('organization_name')) {
            $organizationName = $request->input('organization_name');
            $query->where('organization_name', 'like', "%$organizationName%");
        }
    
        // Filter by organization_owner
        if ($request->filled('organization_owner')) {
            $organizationOwner = $request->input('organization_owner');
            $query->where('organization_owner', 'like', "%$organizationOwner%");
        }
    
        $organizations = $query->get();
    
        return view('dashboard.organizations.index', compact('organizations'));
    }


    public function create()
    {
        $governorates = Governorate::all();
        return view('dashboard.organizations.create', compact('governorates'));
       
    }

    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'organization_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255',
            'governorate' => 'required|string|max:255',
            'organization_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'organization_owner' => 'required|string|max:255',
            'organization_type' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'phone' => 'required|digits:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'discount_type' => 'required|string|max:255',
            'package_value' => 'required|numeric',
            'package_type' => 'required|string|max:255',
            'discount_value' => 'required|numeric',
            'date' => 'required|date',           
            'rate' => 'required|string|max:255',
            'comments' => 'nullable|string',
            'hold' => 'nullable|boolean', 
        ],$messages);
        
        if ($request->hasFile('add_image')) {
            $data['add_image'] = $request->file('add_image')->store('organization');
        }
        
        // Hash the password before saving
        $data['password'] = Hash::make($data['password']);
       
        
        Organization::create($data);

        if ($data) {
            return redirect()->route('admin.organizations.index')->with('success', __('models.added_success'));
        } else {
            return redirect()->back()->with('error', 'حدث خطأ أثناء الإضافة');
        }   
     }
  
    public function show()
    {
        //
    }

    public function edit($id)
    {
        $organization = Organization::findOrFail($id);

        if ($organization) {
            return view('dashboard.organizations.edit', compact('organization'));
        } else {
            return view('dashboard.error');
        }
    }

    public function update(Request $request, $id)
    {
        $organization = Organization::findOrFail($id);
        $data = $request->validate([
            'organization_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255',
            'governorate' => 'required|string|max:255',
            'organization_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'organization_owner' => 'required|string|max:255',
            'organization_type' => 'required|string|max:255',
            'password' => 'nullable|string|max:255',
            'phone' => 'required|digits:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'discount_type' => 'required|string|max:255',
            'package_value' => 'required|numeric',
            'package_type' => 'required|string|max:255',
            'discount_value' => 'required|numeric',
            'date' => 'required|date',           
            'rate' => 'required|string|max:255',
            'comments' => 'nullable|string',
            'hold' => 'nullable|boolean',
        ],$messages);
    
    
       // $data = $request->all();
    
        if ($request->hasFile('add_image')) {
            $data['add_image'] = $request->file('add_image')->store('organization');
        }
    
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        
        //$data['holded'] = $request->has('holded') ? 'yes' : 'no';
    
        $organization->update($data);
    
        return redirect()->route('admin.organizations.index')->with('success', 'Organization updated successfully.');
    }

    
    public function destroy($id)
    {
        $organization = Organization::findOrFail($id);
        if ($organization->image) {
            Storage::delete($organization->image);
        }

        $organization->delete();

        return redirect()->back()->with('success', __('models.deleted_success'));


        
    }

    public function messages(){
        return [            
            'organization_name.required' => 'اسم المنشاة مطلوب.',
            'organization_name.string' => 'يجب أن يكون اسم المنشاة نصاً.',
            'organization_name.max' => 'لا يمكن أن يتجاوز اسم المنشاة 255 حرفًا.',
            
            'user_name.required' => 'اسم المستخدم مطلوب.',
            'user_name.string' => 'يجب أن يكون اسم المستخدم نصاً.',
            'user_name.max' => 'لا يمكن أن يتجاوز اسم المستخدم 255 حرفًا.',
            
           'governorate.required' => 'المحافظة مطلوبة.',
           'governorate.string' => 'يجب أن تكون المحافظة نصاً.',
           'governorate.max' => 'لا يمكن أن تتجاوز المحافظة 255 حرفًا.',
            
            'organization_address.required' => 'عنوان المنشاة مطلوب.',
            'organization_address.string' => 'يجب أن يكون عنوان المنشاة نصاً.',
            'organization_address.max' => 'لا يمكن أن يتجاوز عنوان المنشاة 255 حرفًا.',
            
            'city.required' => 'المدينة مطلوبة.',
            'city.string' => 'يجب أن تكون المدينة نصاً.',
            'city.max' => 'لا يمكن أن تتجاوز المدينة 255 حرفًا.',
            
            'add_image.image' => 'يجب أن يكون الملف صورة.',
            'add_image.mimes' => 'يجب أن تكون الصورة من نوع: jpg، jpeg، png.',
            'add_image.max' => 'لا يمكن أن تكون الصورة أكبر من 2048 كيلوبايت.',
            
            'organization_owner.required' => 'مالك المنشاة مطلوب.',
            'organization_owner.string' => 'يجب أن يكون مالك المنشاة نصاً.',
            'organization_owner.max' => 'لا يمكن أن يتجاوز مالك المنشاة 255 حرفًا.',
            
            'organization_type.required' => 'نوع المنشاة مطلوب.',
            'organization_type.string' => 'يجب أن يكون نوع المنشاة نصاً.',
            'organization_type.max' => 'لا يمكن أن يتجاوز نوع المنشاة 255 حرفًا.',
            
            'password.required' => 'كلمة المرور مطلوبة.',
            'password.string' => 'يجب أن تكون كلمة المرور نصاً.',
            'password.min' => 'يجب أن تكون كلمة المرور مكونة من 6 أحرف على الأقل.',            
            
            'phone.required' => 'رقم الهاتف مطلوب.',
            'phone.digits' => 'يجب أن يحتوي رقم الهاتف على 11 رقماً بالضبط.',
            
            'discount_type.required' => 'نوع الخصم مطلوب.',
            'discount_type.string' => 'يجب أن يكون نوع الخصم نصاً.',
            'discount_type.max' => 'لا يمكن أن يتجاوز نوع الخصم 255 حرفًا.',
            
            'package_value.required' => 'قيمة الباقة مطلوبة.',
            'package_value.numeric' => 'يجب أن تكون قيمة الباقة رقماً.',
            
            'package_type.required' => 'نوع الباقة مطلوب.',
            'package_type.string' => 'يجب أن يكون نوع الباقة نصاً.',
            'package_type.max' => 'لا يمكن أن يتجاوز نوع الباقة 255 حرفًا.',
            
            'discount_value.required' => 'قيمة الخصم مطلوبة.',
            'discount_value.numeric' => 'يجب أن تكون قيمة الخصم رقماً.',
            
            'date.required' => 'التاريخ مطلوب.',
            'date.date' => 'يجب أن يكون التاريخ تاريخاً صحيحاً.',
        ];
            
    }
}
