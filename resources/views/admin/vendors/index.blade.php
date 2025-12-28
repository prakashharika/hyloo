@extends('admin.app')

@section('title', 'Vendors List')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Registered Vendors</h2>

    <div class="card shadow-sm rounded-4">
        <div class="card-body p-4">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Shop Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vendors as $vendor)
                    <tr>
                        <td>{{ $vendor->full_name }}</td>
                        <td>{{ $vendor->mobile }}</td>
                        <td>{{ $vendor->email }}</td>
                        <td>{{ $vendor->pincode ?? 'N/A' }}</td>
                        <td>{{ $vendor->shop_type ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('admin.vendor.view', $vendor->id) }}" class="btn btn-sm btn-primary">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $vendors->links() }}
        </div>
    </div>
</div>
@endsection
