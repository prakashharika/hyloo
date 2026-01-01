<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorRegisterController extends Controller
{
    public function create()
    {
        return view('vendor.register');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'full_name' => 'required|string|max:255',
        'mobile' => 'required|digits:10|unique:vendors,mobile',
        'email' => 'required|email|unique:vendors,email|max:255',
        'password' => 'required|confirmed|min:6',
        'business_type' => 'required|string|max:50',
        
        'shop_name' => 'required|string|max:255',
        'shop_address' => 'required|string',
        'shop_type' => 'required|string|max:50',
        'pincode' => 'nullable|digits:6',
        'gstin' => 'nullable|string|max:15',
        
        'account_holder' => 'required|string|max:255',
        'bank_name' => 'required|string|max:255',
        'account_number' => 'required|string|max:20',
        'ifsc' => 'required|string|max:11',
        'pan' => 'required|string|max:10',
        
        'shop_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'business_proof' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        'pan_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'bank_proof' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
    ]);

    try {
        // File uploads with unique names
        $shopPhoto = $request->hasFile('shop_photo') ? 
            $request->file('shop_photo')->store('vendors/shop', 'public') : null;
            
        $businessProof = $request->hasFile('business_proof') ? 
            $request->file('business_proof')->store('vendors/proof', 'public') : null;
            
        $panImage = $request->file('pan_image')->store('vendors/pan', 'public');
        $bankProof = $request->file('bank_proof')->store('vendors/bank', 'public');

        // Create vendor
        $vendor = Vendor::create([
            'full_name' => $validated['full_name'],
            'mobile' => $validated['mobile'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'business_type' => $validated['business_type'],

            'shop_name' => $validated['shop_name'],
            'shop_address' => $validated['shop_address'],
            'shop_type' => $validated['shop_type'],
            'pincode' => $validated['pincode'] ?? null,
            'gstin' => $validated['gstin'] ?? null,
            'shop_photo' => $shopPhoto,
            'business_proof' => $businessProof,

            'account_holder' => $validated['account_holder'],
            'bank_name' => $validated['bank_name'],
            'account_number' => $validated['account_number'],
            'ifsc' => $validated['ifsc'],
            'pan' => $validated['pan'],
            'pan_image' => $panImage,
            'bank_proof' => $bankProof,
            
            'status' => 'inactive',
            'registration_date' => now(),
        ]);

        // Optional: Send welcome email or notification
        // Mail::to($vendor->email)->send(new VendorWelcomeMail($vendor));

        return redirect()->back()
            ->with('success', '🎉 Application submitted successfully! We will review your application and contact you soon.')
            ->with('vendor_id', $vendor->id);

    } catch (\Exception $e) {
        Log::error('Vendor registration failed: ' . $e->getMessage());
        
        return redirect()->back()
            ->with('error', 'Something went wrong. Please try again.')
            ->withInput();
    }
}
}
