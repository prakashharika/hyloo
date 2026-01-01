<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
        <style>
            /* Theme Variables */
            .vendor-detail-view {
                --card-bg: rgba(255, 255, 255, 0.02);
                --card-border: rgba(255, 255, 255, 0.08);
                --section-bg: rgba(255, 255, 255, 0.03);
                --section-border: rgba(255, 255, 255, 0.1);
                --text-primary: #f8fafc;
                --text-secondary: #94a3b8;
                --accent-color: #3b82f6;
            }
            
            .light-theme .vendor-detail-view {
                --card-bg: #ffffff;
                --card-border: #e2e8f0;
                --section-bg: #f8fafc;
                --section-border: #e2e8f0;
                --text-primary: #1e293b;
                --text-secondary: #64748b;
            }
            
            /* Main Container */
            .vendor-detail-container {
                max-width: 1200px;
                margin: 0 auto;
            }
            
            /* Header */
            .detail-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 2rem;
                padding-bottom: 1rem;
                border-bottom: 1px solid var(--section-border);
            }
            
            .detail-title {
                font-size: 1.75rem;
                font-weight: 700;
                color: var(--text-primary);
                margin: 0;
            }
            
            .back-btn {
                padding: 0.625rem 1.25rem;
                border-radius: 8px;
                border: 1px solid var(--section-border);
                background: transparent;
                color: var(--text-primary);
                text-decoration: none;
                font-weight: 500;
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                transition: all 0.2s;
            }
            
            .back-btn:hover {
                background: var(--section-bg);
                border-color: var(--accent-color);
                color: var(--accent-color);
                transform: translateY(-1px);
            }
            
            /* Main Card */
            .detail-card {
                background: var(--card-bg);
                border: 1px solid var(--card-border);
                border-radius: 16px;
                padding: 2rem;
                backdrop-filter: blur(10px);
            }
            
            /* Section Headers */
            .section-header {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                margin-bottom: 1.5rem;
                padding-bottom: 0.75rem;
                border-bottom: 2px solid var(--section-border);
            }
            
            .section-title {
                font-size: 1.25rem;
                font-weight: 600;
                color: var(--text-primary);
                margin: 0;
            }
            
            .section-icon {
                width: 40px;
                height: 40px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: var(--section-bg);
                color: var(--accent-color);
            }
            
            /* Detail Grid */
            .detail-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 1rem;
                margin-bottom: 2.5rem;
            }
            
            .detail-item {
                background: var(--section-bg);
                border: 1px solid var(--section-border);
                border-radius: 12px;
                padding: 1.25rem;
                transition: all 0.2s;
            }
            
            .detail-item:hover {
                border-color: var(--accent-color);
                transform: translateY(-2px);
            }
            
            .detail-label {
                font-size: 0.75rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                color: var(--text-secondary);
                margin-bottom: 0.5rem;
                font-weight: 600;
            }
            
            .detail-value {
                font-size: 1rem;
                color: var(--text-primary);
                font-weight: 500;
                word-break: break-word;
            }
            
            .detail-value.empty {
                color: var(--text-secondary);
                font-style: italic;
            }
            
            /* Status Badge */
            .status-badge {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.375rem 0.875rem;
                border-radius: 20px;
                font-size: 0.75rem;
                font-weight: 600;
                margin-top: 0.5rem;
            }
            
            .status-active {
                background: rgba(34, 197, 94, 0.1);
                color: #22c55e;
                border: 1px solid rgba(34, 197, 94, 0.2);
            }
            
            /* Action Buttons */
            .action-buttons {
                display: flex;
                gap: 1rem;
                margin-top: 2rem;
                padding-top: 2rem;
                border-top: 1px solid var(--section-border);
            }
            
            .btn-primary {
                background: var(--accent-color);
                color: white;
                border: none;
                padding: 0.75rem 1.5rem;
                border-radius: 8px;
                font-weight: 500;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                transition: all 0.2s;
            }
            
            .btn-primary:hover {
                background: #2563eb;
                transform: translateY(-1px);
                box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
                color: white;
            }
            
            /* Full Width Items */
            .full-width {
                grid-column: 1 / -1;
            }
            
            /* Responsive */
            @media (max-width: 768px) {
                .detail-header {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 1rem;
                }
                
                .detail-grid {
                    grid-template-columns: 1fr;
                }
                
                .detail-card {
                    padding: 1.5rem;
                }
                
                .action-buttons {
                    flex-direction: column;
                }
                
                .btn-primary, .back-btn {
                    width: 100%;
                    justify-content: center;
                }
            }
            
            /* Vendor Info Header */
            .vendor-header-info {
                display: flex;
                align-items: center;
                gap: 1.5rem;
                margin-bottom: 2rem;
                padding: 1.5rem;
                background: var(--section-bg);
                border-radius: 12px;
                border: 1px solid var(--section-border);
            }
            
            .vendor-avatar-lg {
                width: 80px;
                height: 80px;
                border-radius: 16px;
                background: linear-gradient(135deg, var(--accent-color) 0%, #1d4ed8 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 2rem;
                font-weight: 700;
                flex-shrink: 0;
            }
            
            .vendor-main-info h3 {
                margin: 0 0 0.5rem 0;
                color: var(--text-primary);
                font-size: 1.5rem;
            }
            
            .vendor-subtitle {
                color: var(--text-secondary);
                display: flex;
                align-items: center;
                gap: 1rem;
                flex-wrap: wrap;
            }
            
            .vendor-subtitle span {
                display: inline-flex;
                align-items: center;
                gap: 0.375rem;
            }
            
            /* Document Preview */
            .document-section {
                margin-top: 2rem;
            }
            
            .document-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 1rem;
                margin-top: 1rem;
            }
            
            .document-card {
                background: var(--section-bg);
                border: 1px solid var(--section-border);
                border-radius: 12px;
                padding: 1rem;
                text-align: center;
                transition: all 0.2s;
            }
            
            .document-card:hover {
                border-color: var(--accent-color);
                transform: translateY(-2px);
            }
            
            .document-icon {
                font-size: 2rem;
                color: var(--accent-color);
                margin-bottom: 0.5rem;
            }
            
            .document-name {
                font-size: 0.875rem;
                color: var(--text-primary);
                margin-bottom: 0.5rem;
            }
            
            .document-status {
                font-size: 0.75rem;
                padding: 0.25rem 0.5rem;
                border-radius: 12px;
                background: rgba(34, 197, 94, 0.1);
                color: #22c55e;
                display: inline-block;
            }
        </style>
        
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