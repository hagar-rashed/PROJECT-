<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\OrganizationRequest;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::all();
        return view('dashboard.organizations.index', compact('organizations'));
    }

    public function create()
    {
        return view('dashboard.organizations.create');
    }

    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'organization_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255',
            'government' => 'required|string|max:255',
            'organization_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'organization_owner' => 'required|string|max:255',
            'organization_type' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'discount_type' => 'required|string|max:255',
            'package_value' => 'required|numeric',
            'package_type' => 'required|string|max:255',
            'discount_value' => 'required|numeric',
            'date' => 'required|date',           
            'rate' => 'required|string|max:255',
            'comments' => 'nullable|string',
            'hold' => 'nullable|boolean', // Ensure hold is treated as a boolean
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
            'government' => 'required|string|max:255',
            'organization_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'organization_owner' => 'required|string|max:255',
            'organization_type' => 'required|string|max:255',
            'password' => 'nullable|string|max:255',
            'phone' => 'required|string|max:255',
            'discount_type' => 'required|string|max:255',
            'package_value' => 'required|numeric',
            'package_type' => 'required|string|max:255',
            'discount_value' => 'required|numeric',
            'date' => 'required|date',           
            'rate' => 'required|string|max:255',
            'comments' => 'nullable|string',
        ]);
    
    
       // $data = $request->all();
    
        if ($request->hasFile('add_image')) {
            $data['add_image'] = $request->file('add_image')->store('organization');
        }
    
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        
        $data['holded'] = $request->has('holded') ? 'yes' : 'no';
    
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
            'organization_name.required' => 'Organization name is required.',
            'organization_name.string' => 'Organization name must be a string.',
            'organization_name.max' => 'Organization name cannot exceed 255 characters.',
            
            'user_name.required' => 'User name is required.',
            'user_name.string' => 'User name must be a string.',
            'user_name.max' => 'User name cannot exceed 255 characters.',
            
            'government.required' => 'Government is required.',
            'government.string' => 'Government must be a string.',
            'government.max' => 'Government cannot exceed 255 characters.',
            
            'organization_address.required' => 'Organization address is required.',
            'organization_address.string' => 'Organization address must be a string.',
            'organization_address.max' => 'Organization address cannot exceed 255 characters.',
            
            'city.required' => 'City is required.',
            'city.string' => 'City must be a string.',
            'city.max' => 'City cannot exceed 255 characters.',
            
            'add_image.image' => 'The file must be an image.',
            'add_image.mimes' => 'The image must be a file of type: jpg, jpeg, png.',
            'add_image.max' => 'The image cannot be larger than 2048 kilobytes.',
            
            'organization_owner.required' => 'Organization owner is required.',
            'organization_owner.string' => 'Organization owner must be a string.',
            'organization_owner.max' => 'Organization owner cannot exceed 255 characters.',
            
            'organization_type.required' => 'Organization type is required.',
            'organization_type.string' => 'Organization type must be a string.',
            'organization_type.max' => 'Organization type cannot exceed 255 characters.',
            
            'password.required' => 'Password is required.',
            'password.string' => 'Password must be a string.',
            'password.min' => 'Password must be at least 6 characters long.',
            
            'phone.required' => 'Phone number is required.',
            'phone.string' => 'Phone number must be a string.',
            'phone.max' => 'Phone number cannot exceed 15 characters.',
            
            'discount_type.required' => 'Discount type is required.',
            'discount_type.string' => 'Discount type must be a string.',
            'discount_type.max' => 'Discount type cannot exceed 255 characters.',
            
            'package_value.required' => 'Package value is required.',
            'package_value.numeric' => 'Package value must be a number.',
            
            'package_type.required' => 'Package type is required.',
            'package_type.string' => 'Package type must be a string.',
            'package_type.max' => 'Package type cannot exceed 255 characters.',
            
            'discount_value.required' => 'Discount value is required.',
            'discount_value.numeric' => 'Discount value must be a number.',
            
            'date.required' => 'Date is required.',
            'date.date' => 'Date must be a valid date.',
            
        ];
            
    }
}
