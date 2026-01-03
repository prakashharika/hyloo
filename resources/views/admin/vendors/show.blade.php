<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
  
        <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}"> 
       
        <div class="vendor-detail-view">
            <div class="vendor-detail-container">
                <!-- Header -->
                <div class="detail-header">
                    <h1 class="detail-title">Vendor Details</h1>
                    <a href="{{ route('admin.vendors') }}" class="back-btn">
                        <i class="bi bi-arrow-left"></i>
                        Back to List
                    </a>
                </div>
                
                <!-- Vendor Header Info -->
                <div class="vendor-header-info">
                    <div class="vendor-avatar-lg">
                        {{ substr($vendor->full_name, 0, 1) }}
                    </div>
                    <div class="vendor-main-info">
                        <h3>{{ $vendor->full_name }}</h3>
                        <div class="vendor-subtitle">
                            <span><i class="bi bi-envelope"></i> {{ $vendor->email }}</span>
                            <span><i class="bi bi-telephone"></i> {{ $vendor->mobile }}</span>
                            <span><i class="bi bi-shop"></i> {{ $vendor->business_type }}</span>                        
                            </span>  @if($vendor->status === 'active')
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle-fill"></i> Active
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            <i class="bi bi-x-circle-fill"></i> Inactive
                                        </span>
                                    @endif
                        </div>
                    </div>
                </div>
                
                <!-- Main Card -->
                <div class="detail-card">
                    <!-- Account Details Section -->
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <h2 class="section-title">Account Details</h2>
                    </div>
                    
                    <div class="detail-grid">
                        <div class="detail-item">
                            <div class="detail-label">Full Name</div>
                            <div class="detail-value">{{ $vendor->full_name }}</div>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">Email Address</div>
                            <div class="detail-value">{{ $vendor->email }}</div>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">Phone Number</div>
                            <div class="detail-value">{{ $vendor->mobile }}</div>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">Business Type</div>
                            <div class="detail-value">{{ $vendor->business_type }}</div>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">Experience</div>
                            <div class="detail-value">{{ $vendor->experience }} Years</div>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">Registration Date</div>
                            <div class="detail-value">{{ $vendor->created_at->format('F d, Y') ?? 'N/A' }}</div>
                        </div>
                    </div>
                    
                    <!-- Business Details Section -->
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="bi bi-shop"></i>
                        </div>
                        <h2 class="section-title">Business Details</h2>
                    </div>
                    
                    <div class="detail-grid">
                        <div class="detail-item">
                            <div class="detail-label">Shop Name</div>
                            <div class="detail-value">{{ $vendor->shop_name }}</div>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">Shop Type</div>
                            <div class="detail-value">{{ $vendor->shop_type ?? 'Not Specified' }}</div>
                        </div>
                        
                        <div class="detail-item full-width">
                            <div class="detail-label">Shop Address</div>
                            <div class="detail-value">{{ $vendor->shop_address }}</div>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">Pincode</div>
                            <div class="detail-value">{{ $vendor->pincode ?? 'N/A' }}</div>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">GSTIN Number</div>
                            <div class="detail-value {{ !$vendor->gstin ? 'empty' : '' }}">
                                {{ $vendor->gstin ?? 'Not Provided' }}
                            </div>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">FSSAI License</div>
                            <div class="detail-value {{ !$vendor->fssai ? 'empty' : '' }}">
                                {{ $vendor->fssai ?? 'Not Provided' }}
                            </div>
                        </div>
                    </div>
                    
                    <!-- Bank Details Section -->
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="bi bi-bank"></i>
                        </div>
                        <h2 class="section-title">Bank Details</h2>
                    </div>
                    
                    <div class="detail-grid">
                        <div class="detail-item">
                            <div class="detail-label">Account Holder</div>
                            <div class="detail-value">{{ $vendor->account_holder }}</div>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">Bank Name</div>
                            <div class="detail-value">{{ $vendor->bank_name }}</div>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">Account Number</div>
                            <div class="detail-value">{{ $vendor->account_number }}</div>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">IFSC Code</div>
                            <div class="detail-value">{{ $vendor->ifsc }}</div>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">PAN Number</div>
                            <div class="detail-value">{{ $vendor->pan }}</div>
                        </div>
                    </div>
                    
                    <!-- Document Section (Optional - if you have document fields) -->
                    <!-- Uncomment if you have document fields
                    <div class="document-section">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="bi bi-files"></i>
                            </div>
                            <h2 class="section-title">Documents</h2>
                        </div>
                        
                        <div class="document-grid">
                            <div class="document-card">
                                <div class="document-icon">
                                    <i class="bi bi-file-earmark-text"></i>
                                </div>
                                <div class="document-name">PAN Card</div>
                                <div class="document-status">Verified</div>
                            </div>
                            
                            <div class="document-card">
                                <div class="document-icon">
                                    <i class="bi bi-file-earmark-check"></i>
                                </div>
                                <div class="document-name">GST Certificate</div>
                                <div class="document-status">Pending</div>
                            </div>
                            
                            <div class="document-card">
                                <div class="document-icon">
                                    <i class="bi bi-file-earmark-pdf"></i>
                                </div>
                                <div class="document-name">Bank Statement</div>
                                <div class="document-status">Verified</div>
                            </div>
                        </div>
                    </div>
                    -->
                    
                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="{{ route('admin.vendors') }}" class="btn-primary">
                            <i class="bi bi-list-ul"></i>
                            Back to Vendor List
                        </a>
                        
                        <!-- Additional actions can be added here -->
                        <!--
                        <button class="back-btn">
                            <i class="bi bi-pencil"></i>
                            Edit Details
                        </button>
                        
                        <button class="back-btn">
                            <i class="bi bi-printer"></i>
                            Print Details
                        </button>
                        -->
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Detect theme and apply appropriate class
                const isDarkTheme = document.documentElement.getAttribute('data-theme') === 'dark' || 
                                    document.body.classList.contains('dark-theme');
                
                const detailView = document.querySelector('.vendor-detail-view');
                if (detailView) {
                    detailView.classList.add(isDarkTheme ? 'dark-theme' : 'light-theme');
                }
                
                // Add animation to detail items on load
                const detailItems = document.querySelectorAll('.detail-item');
                detailItems.forEach((item, index) => {
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(20px)';
                    
                    setTimeout(() => {
                        item.style.transition = 'all 0.4s ease';
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                    }, index * 50);
                });
                
                // Copy functionality for sensitive data
                const sensitiveFields = document.querySelectorAll('.detail-item');
                sensitiveFields.forEach(field => {
                    field.addEventListener('click', function(e) {
                        if (e.target.classList.contains('detail-value') && 
                            !e.target.classList.contains('empty')) {
                            
                            const textToCopy = e.target.textContent;
                            navigator.clipboard.writeText(textToCopy).then(() => {
                                // Show temporary copy notification
                                const originalText = e.target.textContent;
                                e.target.textContent = 'Copied!';
                                e.target.style.color = 'var(--accent-color)';
                                
                                setTimeout(() => {
                                    e.target.textContent = originalText;
                                    e.target.style.color = '';
                                }, 1500);
                            });
                        }
                    });
                });
            });
        </script>
    </flux:main>
</x-layouts.app.sidebar>