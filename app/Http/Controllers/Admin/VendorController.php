<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;

class VendorController extends Controller
{
    // Show all vendors
    public function index()
    {
        $vendors = Vendor::latest()->paginate(10); // pagination
        return view('admin.vendors.index', compact('vendors'));
    }

    // Show full details of a vendor
    public function show($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('admin.vendors.show', compact('vendor'));
    }
}
