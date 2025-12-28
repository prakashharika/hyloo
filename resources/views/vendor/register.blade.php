@extends('app')

@section('title', 'Vendor Register')

@section('content')

<style>
    .step-card {
        animation: fadeSlide 0.4s ease;
    }

    @keyframes fadeSlide {
        from {
            opacity: 0;
            transform: translateX(40px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .step-indicator {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .step-indicator div {
        text-align: center;
        flex: 1;
        position: relative;
    }

    .step-indicator div::after {
        content: '';
        position: absolute;
        top: 15px;
        right: -50%;
        width: 100%;
        height: 2px;
        background: #dee2e6;
    }

    .step-indicator div:last-child::after {
        display: none;
    }

    .step-indicator .active {
        color: #0d6efd;
        font-weight: 600;
    }

    .step-indicator .completed {
        color: #198754;
    }

    .step-indicator .completed::after {
        background: #198754;
    }
</style>

<div class="container py-5">

    <!-- Header -->
    <div class="text-center mb-5">
        <h2 class="fw-bold">Become a Vendor</h2>
        <p class="text-muted">Complete the onboarding steps to get started</p>
    </div>

    <!-- Card -->
    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body p-4 p-md-5">

            <!-- Stepper -->
            <div class="step-indicator mb-5">
                <div class="step active">Account</div>
                <div class="step">Shop</div>
                <div class="step">Bank</div>
            </div>

            <form method="POST" action="{{ route('vendor.register') }}" enctype="multipart/form-data">
                @csrf

                <!-- ================= STEP 1 ================= -->
                <div class="form-step step-card">
                    <h4 class="mb-4 fw-semibold">Account & Business Basics</h4>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <input class="form-control form-control-lg" name="full_name" placeholder="Full Name" required>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control form-control-lg" name="mobile" placeholder="Mobile Number" required>
                        </div>

                        <div class="col-md-6">
                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select form-select-lg" name="business_type" required>
                                <option value="">Business Type</option>
                                <option>Grocery</option>
                                <option>Bakery</option>
                                <option>Medical</option>
                                <option>Others</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control form-control-lg" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>
                    </div>

                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" required>
                        <label class="form-check-label">
                            I confirm the above details are correct
                        </label>
                    </div>

                    <div class="text-end mt-5">
                        <button type="button" class="btn btn-primary btn-lg px-5 next-btn">
                            Continue →
                        </button>
                    </div>
                </div>

                <!-- ================= STEP 2 ================= -->
                <div class="form-step step-card d-none">
                    <h4 class="mb-4 fw-semibold">Shop Information</h4>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <input class="form-control form-control-lg" name="shop_name" placeholder="Shop Name" required>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select form-select-lg" name="shop_type" required>
                                <option value="">Shop Type</option>
                                <option>Grocery</option>
                                <option>Medicine</option>
                                <option>Bakery</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <textarea class="form-control form-control-lg" name="shop_address" rows="3" placeholder="Shop Address" required></textarea>
                        </div>

                        <div class="col-md-6">
                            <input class="form-control form-control-lg" name="pincode" placeholder="Pincode">
                        </div>

                        <div class="col-md-6">
                            <input class="form-control form-control-lg" name="gstin" placeholder="GSTIN (Optional)">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Shop Photo</label>
                            <input class="form-control" type="file" name="shop_photo">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Business Proof</label>
                            <input class="form-control" type="file" name="business_proof">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-5">
                        <button type="button" class="btn btn-outline-secondary btn-lg prev-btn">← Back</button>
                        <button type="button" class="btn btn-primary btn-lg next-btn">Continue →</button>
                    </div>
                </div>

                <!-- ================= STEP 3 ================= -->
                <div class="form-step step-card d-none">
                    <h4 class="mb-4 fw-semibold">Bank Details & Agreement</h4>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <input class="form-control form-control-lg" name="account_holder" placeholder="Account Holder Name" required>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control form-control-lg" name="bank_name" placeholder="Bank Name" required>
                        </div>

                        <div class="col-md-6">
                            <input class="form-control form-control-lg" name="account_number" placeholder="Account Number" required>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control form-control-lg" name="ifsc" placeholder="IFSC Code" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">PAN Card</label>
                            <input class="form-control" type="file" name="pan_image" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Cancelled Cheque</label>
                            <input class="form-control" type="file" name="bank_proof" required>
                        </div>
                    </div>

                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" required>
                        <label class="form-check-label">
                            I agree to the Terms & Conditions
                        </label>
                    </div>

                    <div class="d-flex justify-content-between mt-5">
                        <button type="button" class="btn btn-outline-secondary btn-lg prev-btn">← Back</button>
                        <button type="submit" class="btn btn-success btn-lg px-5">
                            Submit Application
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Step Logic -->
<script>
    const steps = document.querySelectorAll('.form-step');
    const indicators = document.querySelectorAll('.step-indicator .step');
    let current = 0;

    function updateSteps() {
        steps.forEach((s, i) => s.classList.toggle('d-none', i !== current));
        indicators.forEach((s, i) => {
            s.classList.toggle('active', i === current);
            s.classList.toggle('completed', i < current);
        });
    }

    document.querySelectorAll('.next-btn').forEach(btn => {
        btn.onclick = () => { current++; updateSteps(); };
    });

    document.querySelectorAll('.prev-btn').forEach(btn => {
        btn.onclick = () => { current--; updateSteps(); };
    });
</script>

@endsection
