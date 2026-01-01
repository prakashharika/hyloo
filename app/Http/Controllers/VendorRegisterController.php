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
       $request->validate([
    'full_name' => 'required|string',
    'mobile' => 'required',
    'email' => 'required|email|unique:vendors',
    'password' => 'required|confirmed|min:6',
    'business_type' => 'required',

    'shop_name' => 'required',
    'shop_address' => 'required',
    'shop_type' => 'required',

    'account_holder' => 'required',
    'bank_name' => 'required',
    'account_number' => 'required',
    'ifsc' => 'required',
    'pan' => 'required',

    'pan_image' => 'required|image',
    'bank_proof' => 'required|image',
]);


        // File uploads
        $shopPhoto = $request->file('shop_photo')?->store('vendors/shop', 'public');
        $businessProof = $request->file('business_proof')?->store('vendors/proof', 'public');
        $panImage = $request->file('pan_image')->store('vendors/pan', 'public');
        $bankProof = $request->file('bank_proof')->store('vendors/bank', 'public');

        Vendor::create([
            'full_name' => $request->full_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'business_type' => $request->business_type,
            'experience' => $request->experience,
            'referral_code' => $request->referral_code,

            'shop_name' => $request->shop_name,
            'shop_address' => $request->shop_address,
            'pincode' => $request->pincode,
            'map_location' => $request->map_location,
            'shop_type' => $request->shop_type,
            'gstin' => $request->gstin,
            'fssai' => $request->fssai,
            'shop_photo' => $shopPhoto,
            'business_proof' => $businessProof,
            'home_delivery' => $request->has('home_delivery'),

            'account_holder' => $request->account_holder,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'ifsc' => $request->ifsc,
            'upi' => $request->upi,
            'pan' => $request->pan,
            'pan_image' => $panImage,
            'bank_proof' => $bankProof,
           'status' => 'inactive',

        ]);


        return redirect()->back()->with('success', 'Vendor application submitted successfully!');
    }
}
