@extends('admin.app')

@section('title', 'Vendor Details')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Vendor Details: {{ $vendor->full_name }}</h2>

    <div class="card shadow-sm rounded-4 p-4">

        <h4 class="mb-3">Account Details</h4>
        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Full Name:</strong> {{ $vendor->full_name }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $vendor->email }}</li>
            <li class="list-group-item"><strong>Phone:</strong> {{ $vendor->mobile }}</li>
            <li class="list-group-item"><strong>Business Type:</strong> {{ $vendor->business_type }}</li>
            <li class="list-group-item"><strong>Experience:</strong> {{ $vendor->experience }} Years</li>
        </ul>

        <h4 class="mb-3">Shop / Business Details</h4>
        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Shop Name:</strong> {{ $vendor->shop_name }}</li>
            <li class="list-group-item"><strong>Shop Type:</strong> {{ $vendor->shop_type }}</li>
            <li class="list-group-item"><strong>Address:</strong> {{ $vendor->shop_address }}</li>
            <li class="list-group-item"><strong>Pincode:</strong> {{ $vendor->pincode }}</li>
            <li class="list-group-item"><strong>GSTIN:</strong> {{ $vendor->gstin }}</li>
            <li class="list-group-item"><strong>FSSAI:</strong> {{ $vendor->fssai }}</li>
        </ul>

        <h4 class="mb-3">Bank Details</h4>
        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Account Holder:</strong> {{ $vendor->account_holder }}</li>
            <li class="list-group-item"><strong>Bank Name:</strong> {{ $vendor->bank_name }}</li>
            <li class="list-group-item"><strong>Account Number:</strong> {{ $vendor->account_number }}</li>
            <li class="list-group-item"><strong>IFSC:</strong> {{ $vendor->ifsc }}</li>
            <li class="list-group-item"><strong>PAN:</strong> {{ $vendor->pan }}</li>
        </ul>

        <a href="{{ route('admin.vendors') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
</div>
@endsection
