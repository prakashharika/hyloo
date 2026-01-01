<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
        <style>
            /* Base Table Styles - Works with both light/dark */
            .vendor-management {
                --card-bg: rgba(255, 255, 255, 0.02);
                --card-border: rgba(255, 255, 255, 0.08);
                --header-bg: rgba(255, 255, 255, 0.05);
                --hover-bg: rgba(255, 255, 255, 0.03);
                --text-primary: #f8fafc;
                --text-secondary: #94a3b8;
                --border-color: rgba(255, 255, 255, 0.1);
            }
            
            .light-theme .vendor-management {
                --card-bg: #ffffff;
                --card-border: #e2e8f0;
                --header-bg: #f8fafc;
                --hover-bg: #f1f5f9;
                --text-primary: #1e293b;
                --text-secondary: #64748b;
                --border-color: #e2e8f0;
            }
            
            /* Container */
            .vendor-container {
                background: var(--card-bg);
                border: 1px solid var(--card-border);
                border-radius: 12px;
                backdrop-filter: blur(10px);
                overflow: hidden;
            }
            
            /* Header */
            .vendor-header {
                padding: 1.5rem 2rem;
                border-bottom: 1px solid var(--border-color);
                background: var(--header-bg);
            }
            
            .vendor-title {
                font-size: 1.5rem;
                font-weight: 600;
                color: var(--text-primary);
                margin: 0;
            }
            
            /* Search Bar */
            .vendor-search {
                max-width: 300px;
                position: relative;
            }
            
            .vendor-search input {
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid var(--border-color);
                color: var(--text-primary);
                padding: 0.5rem 1rem 0.5rem 2.5rem;
                border-radius: 8px;
                width: 100%;
                transition: all 0.2s;
            }
            
            .light-theme .vendor-search input {
                background: #ffffff;
            }
            
            .vendor-search input:focus {
                outline: none;
                border-color: #3b82f6;
                box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            }
            
            .vendor-search i {
                position: absolute;
                left: 0.75rem;
                top: 50%;
                transform: translateY(-50%);
                color: var(--text-secondary);
            }
            
            /* Table */
            .vendor-table {
                width: 100%;
                border-collapse: separate;
                border-spacing: 0;
            }
            
            .vendor-table th {
                padding: 1rem 1.5rem;
                font-weight: 600;
                text-align: left;
                color: var(--text-secondary);
                font-size: 0.875rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                border-bottom: 1px solid var(--border-color);
                white-space: nowrap;
            }
            
            .vendor-table td {
                padding: 1.25rem 1.5rem;
                color: var(--text-primary);
                border-bottom: 1px solid var(--border-color);
                transition: background-color 0.2s;
            }
            
            .vendor-table tbody tr:last-child td {
                border-bottom: none;
            }
            
            .vendor-table tbody tr:hover {
                background-color: var(--hover-bg);
            }
            
            /* Vendor Info */
            .vendor-info {
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }
            
            .vendor-avatar {
                width: 40px;
                height: 40px;
                border-radius: 10px;
                background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-weight: 600;
                font-size: 0.875rem;
                flex-shrink: 0;
            }
            
            .vendor-name {
                font-weight: 500;
                color: var(--text-primary);
                margin-bottom: 0.25rem;
            }
            
            .vendor-id {
                font-size: 0.75rem;
                color: var(--text-secondary);
            }
            
            /* Contact Info */
            .contact-info {
                display: flex;
                flex-direction: column;
                gap: 0.25rem;
            }
            
            .contact-email {
                font-size: 0.875rem;
                color: var(--text-primary);
            }
            
            .contact-phone {
                font-size: 0.75rem;
                color: var(--text-secondary);
            }
            
            /* Status */
            .status-chip {
                display: inline-flex;
                align-items: center;
                gap: 0.375rem;
                padding: 0.375rem 0.75rem;
                border-radius: 20px;
                font-size: 0.75rem;
                font-weight: 500;
            }
            
            .status-active {
                background: rgba(34, 197, 94, 0.1);
                color: #22c55e;
                border: 1px solid rgba(34, 197, 94, 0.2);
            }
            
            .status-pending {
                background: rgba(245, 158, 11, 0.1);
                color: #f59e0b;
                border: 1px solid rgba(245, 158, 11, 0.2);
            }
            
            /* Action Button */
            .action-btn {
                padding: 0.5rem 1rem;
                border-radius: 8px;
                font-size: 0.875rem;
                font-weight: 500;
                border: 1px solid var(--border-color);
                background: transparent;
                color: var(--text-primary);
                cursor: pointer;
                transition: all 0.2s;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
            }
            
            .action-btn:hover {
                background: rgba(59, 130, 246, 0.1);
                border-color: #3b82f6;
                color: #3b82f6;
                transform: translateY(-1px);
            }
            
            /* Empty State */
            .empty-state {
                padding: 4rem 2rem;
                text-align: center;
            }
            
            .empty-icon {
                font-size: 3rem;
                color: var(--text-secondary);
                opacity: 0.5;
                margin-bottom: 1rem;
            }
            
            /* Pagination */
            .vendor-pagination {
                padding: 1.5rem 2rem;
                border-top: 1px solid var(--border-color);
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            
            .pagination-info {
                font-size: 0.875rem;
                color: var(--text-secondary);
            }
            
            /* Responsive */
            @media (max-width: 768px) {
                .vendor-header {
                    flex-direction: column;
                    gap: 1rem;
                }
                
                .vendor-search {
                    max-width: 100%;
                }
                
                .vendor-table {
                    display: block;
                }
                
                .vendor-table thead {
                    display: none;
                }
                
                .vendor-table tbody tr {
                    display: block;
                    padding: 1rem;
                    border-bottom: 1px solid var(--border-color);
                }
                
                .vendor-table tbody tr:last-child {
                    border-bottom: none;
                }
                
                .vendor-table td {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 0.75rem 0;
                    border-bottom: none;
                }
                
                .vendor-table td::before {
                    content: attr(data-label);
                    font-weight: 600;
                    color: var(--text-secondary);
                    font-size: 0.875rem;
                    text-transform: uppercase;
                }
                
                .vendor-info {
                    justify-content: space-between;
                    width: 100%;
                }
            }
        </style>
        
        <div class="vendor-management">
            <div class="vendor-container">
                <!-- Header with Search -->
                <div class="vendor-header d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="vendor-title">Registered Vendors</h2>
                        <p class="text-muted mb-0">{{ $vendors->total() }} total vendors</p>
                    </div>
                    <div class="vendor-search">
                        <i class="bi bi-search"></i>
                        <input type="text" placeholder="Search vendors...">
                    </div>
                </div>
                
                <!-- Table -->
                <div class="table-responsive">
                    <table class="vendor-table">
                        <thead>
                            <tr>
                                <th>Vendor</th>
                                <th>Contact</th>
                                <th>Location</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($vendors as $vendor)
                            <tr>
                                <td data-label="Vendor">
                                    <div class="vendor-info">
                                        <div class="vendor-avatar">
                                            {{ substr($vendor->full_name, 0, 1) }}
                                        </div>
                                        <div>
                                            <div class="vendor-name">{{ $vendor->full_name }}</div>
                                            <div class="vendor-id">ID: {{ $vendor->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Contact">
                                    <div class="contact-info">
                                        <div class="contact-email">{{ $vendor->email }}</div>
                                        <div class="contact-phone">{{ $vendor->mobile }}</div>
                                    </div>
                                </td>
                                <td data-label="Location">
                                    <div>{{ $vendor->pincode ?? 'N/A' }}</div>
                                </td>
                                <td data-label="Type">
                                    <div>{{ $vendor->shop_type ?? 'N/A' }}</div>
                                </td>
                                <td data-label="Status">
                                    @if($vendor->status === 'active')
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle-fill"></i> Active
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            <i class="bi bi-x-circle-fill"></i> Inactive
                                        </span>
                                    @endif
                                </td>

                                <td data-label="Actions">
                                    <a href="{{ route('admin.vendor.view', $vendor->id) }}" 
                                       class="action-btn">
                                        <i class="bi bi-eye"></i>
                                        View
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <div class="empty-icon">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <h4 class="mb-3">No vendors found</h4>
                                        <p class="text-muted mb-4">There are no registered vendors in the system yet.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="vendor-pagination">
                    <div class="pagination-info">
                        Showing {{ $vendors->firstItem() ?? 0 }}-{{ $vendors->lastItem() ?? 0 }} of {{ $vendors->total() }}
                    </div>
                    <div>
                        {{ $vendors->links() }}
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Detect theme and add appropriate class
                const isDarkTheme = document.documentElement.getAttribute('data-theme') === 'dark' || 
                                    document.body.classList.contains('dark-theme');
                
                if (isDarkTheme) {
                    document.querySelector('.vendor-management').classList.add('dark-theme');
                } else {
                    document.querySelector('.vendor-management').classList.add('light-theme');
                }
                
                // Simple search functionality
                const searchInput = document.querySelector('.vendor-search input');
                const tableRows = document.querySelectorAll('.vendor-table tbody tr');
                
                if (searchInput) {
                    searchInput.addEventListener('input', function(e) {
                        const searchTerm = e.target.value.toLowerCase().trim();
                        
                        tableRows.forEach(row => {
                            const text = row.textContent.toLowerCase();
                            if (text.includes(searchTerm) || searchTerm === '') {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                        });
                    });
                }
                
                // Add row hover effect
                tableRows.forEach(row => {
                    row.addEventListener('mouseenter', function() {
                        this.style.cursor = 'pointer';
                    });
                    
                    row.addEventListener('click', function(e) {
                        if (!e.target.closest('.action-btn')) {
                            const viewLink = this.querySelector('.action-btn');
                            if (viewLink) {
                                window.location = viewLink.href;
                            }
                        }
                    });
                });
            });
        </script>
    </flux:main>
</x-layouts.app.sidebar>