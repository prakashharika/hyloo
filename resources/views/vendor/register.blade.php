@extends('app')

@section('title', 'Vendor Register')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user-style.css') }}">


<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Progress Steps -->
            <div class="progress-steps mb-5">
                <div class="step active" data-step="1">
                    <div class="step-number">1</div>
                    <div class="step-label">Account Details</div>
                </div>
                <div class="step" data-step="2">
                    <div class="step-number">2</div>
                    <div class="step-label">Shop Information</div>
                </div>
                <div class="step" data-step="3">
                    <div class="step-number">3</div>
                    <div class="step-label">Bank Details</div>
                </div>
                <div class="progress-bar" style="width: 0%;"></div>
            </div>

            <form method="POST" action="{{ route('vendor.register') }}" enctype="multipart/form-data" id="vendorForm">
                @csrf

                <!-- Success/Error Messages -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <!-- ================= STEP 1 ================= -->
                <div class="form-step step-card" id="step1">
                    <div class="text-start mb-5">
                        <h4 class="mb-4 fw-semibold"> Account & Business Basics</h4>
                        <p class="text-white-50">  Register your shop for free and start selling your products quickly</p>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control form-control-lg" name="full_name" placeholder="Full Name" required
                                    value="{{ old('full_name') }}">
                                <small class="form-text text-white-50">Your complete name as per ID proof</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control form-control-lg" name="mobile" placeholder="Mobile Number" required
                                    value="{{ old('mobile') }}">
                                <small class="form-text text-white-50">10-digit mobile number</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="email" name="email" placeholder="Email Address" required
                                    value="{{ old('email') }}">
                                <small class="form-text text-white-50">For communication and login</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-select form-select-lg" name="business_type" required>
                                    <option value="">Select Business Type</option>
                                    <option value="Grocery" {{ old('business_type') == 'Grocery' ? 'selected' : '' }}>Grocery</option>
                                    <option value="Bakery" {{ old('business_type') == 'Bakery' ? 'selected' : '' }}>Bakery</option>
                                    <option value="Medical" {{ old('business_type') == 'Medical' ? 'selected' : '' }}>Medical</option>
                                    <option value="Others" {{ old('business_type') == 'Others' ? 'selected' : '' }}>Others</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="password" name="password" placeholder="Password" required>
                                <small class="form-text text-white-50">Minimum 6 characters</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>
                        </div>
                    </div>

                    
                    <div class="text-end mt-5 header-nav">
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" id="step1Confirm" required>
                            <label class="form-check-label" for="step1Confirm">
                                I confirm the above details are correct
                            </label>
                        </div>
                        <button type="button" class="btn btn-gradient next-btn shop-btn" data-next="2">
                            Continue →
                        </button>
                    </div>
                   <div class="text-end mt-5 header-nav">
                        <a class="form-check-label" href="{{ route('vendor.login') }}">
                            Already have an account?
                        </a>
                    </div>

                </div>

                <!-- ================= STEP 2 ================= -->
                <div class="form-step step-card d-none" id="step2">
                    <h4 class="mb-4 fw-semibold">Shop Information</h4>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control form-control-lg" name="shop_name" placeholder="Shop Name" required
                                    value="{{ old('shop_name') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-select form-select-lg" name="shop_type" required>
                                    <option value="">Select Shop Type</option>
                                    <option value="Grocery" {{ old('shop_type') == 'Grocery' ? 'selected' : '' }}>Grocery</option>
                                    <option value="Medicine" {{ old('shop_type') == 'Medicine' ? 'selected' : '' }}>Medicine</option>
                                    <option value="Bakery" {{ old('shop_type') == 'Bakery' ? 'selected' : '' }}>Bakery</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control form-control-lg" name="shop_address" rows="3" placeholder="Complete Shop Address" required>{{ old('shop_address') }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control form-control-lg" name="pincode" placeholder="Pincode"
                                    value="{{ old('pincode') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control form-control-lg" name="gstin" placeholder="GSTIN (Optional)"
                                    value="{{ old('gstin') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">🖼️ Shop Photo</label>
                                <input class="form-control" type="file" name="shop_photo" accept="image/*">
                                <small class="form-text text-white-50">Store front or interior photo (Max 2MB)</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">📄 Business Proof</label>
                                <input class="form-control" type="file" name="business_proof" accept="image/*,.pdf">
                                <small class="form-text text-white-50">Trade license, GST certificate etc.</small>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-5 header-nav">
                        <button type="button" class="btn btn-outline-light prev-btn" data-prev="1">← Back</button>
                        <button type="button" class="btn btn-gradient next-btn shop-btn" data-next="3">Continue →</button>
                    </div>
                </div>

                <!-- ================= STEP 3 ================= -->
                <div class="form-step step-card d-none" id="step3">
                    <h4 class="mb-4 fw-semibold">Bank Details & Agreement</h4>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control form-control-lg" name="account_holder" placeholder="Account Holder Name" required
                                    value="{{ old('account_holder') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control form-control-lg" name="bank_name" placeholder="Bank Name" required
                                    value="{{ old('bank_name') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control form-control-lg" name="account_number" placeholder="Account Number" required
                                    value="{{ old('account_number') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control form-control-lg" name="ifsc" placeholder="IFSC Code" required
                                    value="{{ old('ifsc') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control form-control-lg" name="pan" placeholder="PAN Number" required
                                    value="{{ old('pan') }}">
                                <small class="form-text text-white-50">10-character PAN number</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">📄 PAN Card Image</label>
                                <input class="form-control" type="file" name="pan_image" accept="image/*" required>
                                <small class="form-text text-white-50">Clear photo of PAN card</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">🏦 Cancelled Cheque / Bank Proof</label>
                                <input class="form-control" type="file" name="bank_proof" accept="image/*,.pdf" required>
                                <small class="form-text text-white-50">Cancelled cheque or bank statement</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="termsAgreement" required>
                        <label class="form-check-label" for="termsAgreement">
                            I agree to the Terms & Conditions and confirm all information is accurate
                        </label>
                    </div>

                    <div class="d-flex justify-content-between mt-5 header-nav">
                        <button type="button" class="btn btn-outline-light prev-btn" data-prev="2">← Back</button>
                        <button type="submit" class="btn btn-gradient px-5 shop-btn" id="submitBtn">
                            Submit Application
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
       
<script>
document.addEventListener('DOMContentLoaded', function() {
    const steps = document.querySelectorAll('.form-step');
    const stepIndicators = document.querySelectorAll('.step');
    const progressBar = document.querySelector('.progress-bar');
    let currentStep = 1;

    // Function to show step
    function showStep(stepNumber) {
        // Hide all steps
        steps.forEach(step => {
            step.classList.add('d-none');
        });
        
        // Show current step
        document.getElementById(`step${stepNumber}`).classList.remove('d-none');
        
        // Update progress bar
        const progress = ((stepNumber - 1) / (steps.length - 1)) * 100;
        progressBar.style.width = `${progress}%`;
        
        // Update step indicators
        stepIndicators.forEach((indicator, index) => {
            if (index < stepNumber) {
                indicator.classList.add('active');
            } else {
                indicator.classList.remove('active');
            }
        });
        
        currentStep = stepNumber;
    }

    // Next button click
    document.querySelectorAll('.next-btn').forEach(button => {
        button.addEventListener('click', function() {
            const nextStep = parseInt(this.getAttribute('data-next'));
            
            // Validate current step before proceeding
            if (validateStep(currentStep)) {
                showStep(nextStep);
            }
        });
    });

    // Previous button click
    document.querySelectorAll('.prev-btn').forEach(button => {
        button.addEventListener('click', function() {
            const prevStep = parseInt(this.getAttribute('data-prev'));
            showStep(prevStep);
        });
    });

    // Form submission handler
    const form = document.getElementById('vendorForm');
    const submitBtn = document.getElementById('submitBtn');
    
    form.addEventListener('submit', function(e) {
        // Validate all steps before submission
        if (!validateAllSteps()) {
            e.preventDefault();
            alert('Please fill all required fields correctly.');
            return;
        }
        
        // Show loading spinner
        const spinner = submitBtn.querySelector('.spinner-border');
        spinner.classList.remove('d-none');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Submitting...';
    });

    // Validation functions
    function validateStep(step) {
        const currentStepEl = document.getElementById(`step${step}`);
        const inputs = currentStepEl.querySelectorAll('[required]');
        let isValid = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                highlightError(input);
            } else {
                removeErrorHighlight(input);
            }

            // Specific validations
            if (input.name === 'email' && input.value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(input.value)) {
                    isValid = false;
                    highlightError(input, 'Invalid email format');
                }
            }

            if (input.name === 'mobile' && input.value) {
                const mobileRegex = /^[6-9]\d{9}$/;
                if (!mobileRegex.test(input.value)) {
                    isValid = false;
                    highlightError(input, 'Invalid mobile number');
                }
            }

            if (input.name === 'password' && input.value && input.value.length < 6) {
                isValid = false;
                highlightError(input, 'Password must be at least 6 characters');
            }

            if (input.name === 'pan' && input.value) {
                const panRegex = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
                if (!panRegex.test(input.value.toUpperCase())) {
                    isValid = false;
                    highlightError(input, 'Invalid PAN number');
                }
            }
        });

        // Check checkboxes
        const checkboxes = currentStepEl.querySelectorAll('input[type="checkbox"][required]');
        checkboxes.forEach(checkbox => {
            if (!checkbox.checked) {
                isValid = false;
                highlightError(checkbox.closest('.form-check'));
            }
        });

        if (!isValid) {
            showStepAlert('Please fill all required fields correctly.', 'danger');
        }

        return isValid;
    }

    function validateAllSteps() {
        for (let i = 1; i <= 3; i++) {
            if (!validateStep(i)) {
                showStep(i); // Go to the step with error
                return false;
            }
        }
        return true;
    }

    function highlightError(element, message = 'This field is required') {
        element.classList.add('is-invalid');
        
        // Remove existing error message
        let errorDiv = element.nextElementSibling;
        if (errorDiv && errorDiv.classList.contains('invalid-feedback')) {
            errorDiv.remove();
        }
        
        // Add error message
        const errorMsg = document.createElement('div');
        errorMsg.className = 'invalid-feedback text-white fw-bold';
        errorMsg.textContent = message;
        element.parentNode.insertBefore(errorMsg, element.nextSibling);
    }

    function removeErrorHighlight(element) {
        element.classList.remove('is-invalid');
        const errorDiv = element.nextElementSibling;
        if (errorDiv && errorDiv.classList.contains('invalid-feedback')) {
            errorDiv.remove();
        }
    }

    function showStepAlert(message, type = 'info') {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible fade show mt-3`;
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        const currentStepEl = document.getElementById(`step${currentStep}`);
        const firstChild = currentStepEl.firstElementChild;
        currentStepEl.insertBefore(alertDiv, firstChild.nextSibling);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
    }

    // Real-time validation
    document.querySelectorAll('input, select, textarea').forEach(input => {
        input.addEventListener('blur', function() {
            if (this.hasAttribute('required')) {
                if (!this.value.trim()) {
                    highlightError(this);
                } else {
                    removeErrorHighlight(this);
                }
            }
        });

        input.addEventListener('input', function() {
            removeErrorHighlight(this);
        });
    });

    // Initialize first step
    showStep(1);
});
</script>

@endsection
