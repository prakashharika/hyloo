<x-layouts.app.sidebar :title="$title ?? 'Vendors'">
    <flux:main>

        <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">

        <div class="admin-container">

            <!-- Header -->
            <div class="admin-header">
                <h1 class="admin-title">
                    Vendors
                    <span class="text-muted text-sm">({{ $vendors->total() }})</span>
                </h1>

            </div>

            <!-- Flash Message -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Card -->
            <div class="admin-card">

                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Vendor</th>
                            <th>Contact</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th width="140">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($vendors as $vendor)
                            <tr>
                                <td>{{ $vendor->id }}</td>

                                <td>
                                    <strong>{{ $vendor->full_name }}</strong><br>
                                    <small class="text-muted">
                                        ID: {{ $vendor->id }}
                                    </small>
                                </td>

                                <td>
                                    {{ $vendor->email }}<br>
                                    <small class="text-muted">{{ $vendor->mobile }}</small>
                                </td>

                                <td>
                                    {{ $vendor->pincode ?? '—' }}
                                </td>

                                <td>
                                    {{ $vendor->shop_type ?? '—' }}
                                </td>

                                <td>
                                    @if($vendor->status === 'active')
                                        <span class="badge-active">Active</span>
                                    @else
                                        <span class="badge-inactive">Inactive</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                      <div class="flex space-x-2">
                                    <a href="{{ route('admin.vendor.view', $vendor->id) }}"
                                        class="text-blue-600 hover:text-blue-900">
                                            View
                                        </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    No vendors found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                {{ $vendors->links() }}

            </div>
        </div>

    </flux:main>
</x-layouts.app.sidebar>
