@extends('cuns_manager.layouts.main')

@section('title', 'Add Expense - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Finance /</span> Add New Expense
                    </h4>
                    <button class="btn btn-outline-secondary" onclick="window.location.href='{{ route('finance.index') }}'">
                        <span class="material-icons-round me-2">arrow_back</span>
                        Back to Finance
                    </button>
                </div>
            </div>
        </div>

        <!-- Expense Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Expense Details</h5>
                    </div>
                    <div class="card-body">
                        <form id="expenseForm" action="{{ route('finance.expenses.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Basic Information -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Basic Information</h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="expenseTitle" class="form-label">Expense Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="expenseTitle" name="title"
                                        placeholder="Enter expense description" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="expenseDate" class="form-label">Expense Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="expenseDate" name="expense_date"
                                        value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="projectSelect" class="form-label">Project <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="projectSelect" name="project_id" required
                                        onchange="updateProjectBudget()">
                                        <option value="">Select Project</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project['id'] }}" data-budget="{{ $project['budget'] }}"
                                                data-spent="{{ $project['spent'] }}"
                                                data-remaining="{{ $project['remaining'] }}">
                                                {{ $project['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="expenseCategory" class="form-label">Category <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="expenseCategory" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="expenseType" class="form-label">Expense Type <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="expenseType" name="expense_type" required>
                                        <option value="operational">Operational</option>
                                        <option value="capital">Capital</option>
                                        <option value="material">Material</option>
                                        <option value="labor">Labor</option>
                                        <option value="equipment">Equipment</option>
                                        <option value="subcontractor">Subcontractor</option>
                                        <option value="administrative">Administrative</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Amount & Payment Details -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Amount & Payment Details</h6>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="amount" class="form-label">Amount (₹) <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" id="amount" name="amount"
                                            min="0" step="0.01" placeholder="0.00" required
                                            onchange="calculateTaxes()">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="taxAmount" class="form-label">Tax Amount (₹)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" id="taxAmount" name="tax_amount"
                                            min="0" step="0.01" placeholder="0.00" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="totalAmount" class="form-label">Total Amount (₹)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" id="totalAmount" name="total_amount"
                                            min="0" step="0.01" placeholder="0.00" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="paymentMethod" class="form-label">Payment Method <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="paymentMethod" name="payment_method" required>
                                        <option value="cash">Cash</option>
                                        <option value="bank_transfer">Bank Transfer</option>
                                        <option value="cheque">Cheque</option>
                                        <option value="online">Online Payment</option>
                                        <option value="card">Credit/Debit Card</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="paymentStatus" class="form-label">Payment Status <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="paymentStatus" name="payment_status" required>
                                        <option value="paid">Paid</option>
                                        <option value="pending">Pending</option>
                                        <option value="partially_paid">Partially Paid</option>
                                        <option value="due">Due</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="paymentDate" class="form-label">Payment Date</label>
                                    <input type="date" class="form-control" id="paymentDate" name="payment_date"
                                        value="{{ date('Y-m-d') }}">
                                </div>
                            </div>

                            <!-- Vendor & Reference Details -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Vendor & Reference Details</h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="vendorSelect" class="form-label">Vendor</label>
                                    <select class="form-select" id="vendorSelect" name="vendor_id">
                                        <option value="">Select Vendor</option>
                                        @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor['id'] }}">{{ $vendor['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">Or add new vendor below</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="invoiceNumber" class="form-label">Invoice/Bill Number</label>
                                    <input type="text" class="form-control" id="invoiceNumber" name="invoice_number"
                                        placeholder="Enter invoice number">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="vendorName" class="form-label">Vendor Name</label>
                                    <input type="text" class="form-control" id="vendorName" name="vendor_name"
                                        placeholder="Enter vendor name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="vendorGst" class="form-label">Vendor GSTIN</label>
                                    <input type="text" class="form-control" id="vendorGst" name="vendor_gst"
                                        placeholder="Enter GSTIN number">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="vendorAddress" class="form-label">Vendor Address</label>
                                    <textarea class="form-control" id="vendorAddress" name="vendor_address" rows="2"
                                        placeholder="Enter vendor address"></textarea>
                                </div>
                            </div>

                            <!-- Tax Details -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Tax Details</h6>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="taxType" class="form-label">Tax Type</label>
                                    <select class="form-select" id="taxType" name="tax_type"
                                        onchange="calculateTaxes()">
                                        <option value="exclusive">Tax Exclusive</option>
                                        <option value="inclusive">Tax Inclusive</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="gstRate" class="form-label">GST Rate (%)</label>
                                    <select class="form-select" id="gstRate" name="gst_rate"
                                        onchange="calculateTaxes()">
                                        <option value="0">0%</option>
                                        <option value="5">5%</option>
                                        <option value="12">12%</option>
                                        <option value="18" selected>18%</option>
                                        <option value="28">28%</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="tdsRate" class="form-label">TDS Rate (%)</label>
                                    <select class="form-select" id="tdsRate" name="tds_rate">
                                        <option value="0">0%</option>
                                        <option value="1">1%</option>
                                        <option value="2">2%</option>
                                        <option value="5">5%</option>
                                        <option value="10" selected>10%</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="tdsAmount" class="form-label">TDS Amount (₹)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" id="tdsAmount" name="tds_amount"
                                            min="0" step="0.01" placeholder="0.00" readonly>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="isTaxable" name="is_taxable"
                                            checked onchange="toggleTaxCalculation()">
                                        <label class="form-check-label" for="isTaxable">
                                            This expense is taxable
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Details -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Additional Details</h6>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"
                                        placeholder="Provide detailed description of the expense..."></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="siteLocation" class="form-label">Site Location</label>
                                    <input type="text" class="form-control" id="siteLocation" name="site_location"
                                        placeholder="Enter site location">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="approver" class="form-label">Approver</label>
                                    <select class="form-select" id="approver" name="approver_id">
                                        <option value="">Select Approver</option>
                                        @foreach ($approvers as $approver)
                                            <option value="{{ $approver['id'] }}">{{ $approver['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="isRecurring"
                                                    name="is_recurring">
                                                <label class="form-check-label" for="isRecurring">
                                                    Recurring Expense
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="requiresApproval"
                                                    name="requires_approval" checked>
                                                <label class="form-check-label" for="requiresApproval">
                                                    Requires Approval
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="isBillable"
                                                    name="is_billable">
                                                <label class="form-check-label" for="isBillable">
                                                    Billable to Client
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Attachments -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Attachments</h6>
                                </div>
                                <div class="col-12">
                                    <div class="border rounded p-3">
                                        <div id="attachmentArea" class="text-center">
                                            <div class="mb-3">
                                                <span class="material-icons-round text-muted"
                                                    style="font-size: 48px;">cloud_upload</span>
                                            </div>
                                            <p class="text-muted mb-2">Drag & drop receipts, invoices, or documents here
                                            </p>
                                            <p class="text-muted small mb-3">Supports PDF, JPG, PNG (Max: 10MB per file)
                                            </p>
                                            <input type="file" id="expenseAttachments" name="attachments[]" multiple
                                                class="d-none" accept=".pdf,.jpg,.jpeg,.png">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="document.getElementById('expenseAttachments').click()">
                                                <span class="material-icons-round me-2"
                                                    style="font-size: 16px;">upload</span>
                                                Choose Files
                                            </button>
                                        </div>
                                        <div id="fileList" class="mt-3"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Project Budget Alert -->
                            <div class="row mb-4" id="budgetAlert" style="display: none;">
                                <div class="col-12">
                                    <div class="alert alert-warning">
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons-round me-2">warning</span>
                                            <div>
                                                <h6 class="alert-heading mb-1">Budget Alert</h6>
                                                <p class="mb-0" id="budgetAlertMessage"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="window.location.href='{{ route('finance.index') }}'">
                                            <span class="material-icons-round me-2">cancel</span>
                                            Cancel
                                        </button>
                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="saveAsDraft()">
                                                <span class="material-icons-round me-2">save</span>
                                                Save as Draft
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <span class="material-icons-round me-2">check</span>
                                                Submit Expense
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>
        #attachmentArea {
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            padding: 30px;
            transition: all 0.3s ease;
        }

        #attachmentArea.drag-over {
            border-color: #3b82f6;
            background-color: #eff6ff;
        }

        .file-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 6px;
            margin-bottom: 8px;
            border: 1px solid #e9ecef;
        }

        .input-group-text {
            background-color: #f8f9fa;
        }

        .budget-progress {
            margin: 10px 0;
        }

        .budget-progress .progress {
            height: 6px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize file upload
            initializeFileUpload();

            // Set minimum dates to today
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('expenseDate').max = today;
            document.getElementById('paymentDate').max = today;

            // Calculate initial taxes
            calculateTaxes();
        });

        function initializeFileUpload() {
            const attachmentArea = document.getElementById('attachmentArea');
            const fileInput = document.getElementById('expenseAttachments');
            const fileList = document.getElementById('fileList');

            attachmentArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('drag-over');
            });

            attachmentArea.addEventListener('dragleave', function() {
                this.classList.remove('drag-over');
            });

            attachmentArea.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('drag-over');
                handleFiles(e.dataTransfer.files);
            });

            fileInput.addEventListener('change', function() {
                handleFiles(this.files);
            });
        }

        function handleFiles(files) {
            const fileList = document.getElementById('fileList');

            for (let file of files) {
                const fileItem = document.createElement('div');
                fileItem.className = 'file-item';
                fileItem.innerHTML = `
            <div class="d-flex align-items-center">
                <span class="material-icons-round text-primary me-2">description</span>
                <div>
                    <div class="fw-medium">${file.name}</div>
                    <small class="text-muted">${(file.size / (1024 * 1024)).toFixed(2)} MB</small>
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeFile(this)">
                <span class="material-icons-round" style="font-size: 16px;">delete</span>
            </button>
        `;
                fileList.appendChild(fileItem);
            }
        }

        function removeFile(button) {
            button.closest('.file-item').remove();
        }

        function updateProjectBudget() {
            const projectSelect = document.getElementById('projectSelect');
            const selectedOption = projectSelect.options[projectSelect.selectedIndex];
            const budgetAlert = document.getElementById('budgetAlert');

            if (selectedOption.value) {
                const budget = parseFloat(selectedOption.dataset.budget);
                const spent = parseFloat(selectedOption.dataset.spent);
                const remaining = parseFloat(selectedOption.dataset.remaining);
                const utilization = (spent / budget) * 100;

                // Check if budget is getting critical
                const amount = parseFloat(document.getElementById('amount').value) || 0;
                const newUtilization = ((spent + amount) / budget) * 100;

                if (newUtilization > 90) {
                    budgetAlert.style.display = 'block';
                    let message = '';

                    if (newUtilization > 100) {
                        message =
                            `This expense will exceed the project budget by ₹${(spent + amount - budget).toLocaleString()}.`;
                    } else if (newUtilization > 90) {
                        message = `This expense will bring project budget utilization to ${newUtilization.toFixed(1)}%.`;
                    }

                    document.getElementById('budgetAlertMessage').textContent = message;
                } else {
                    budgetAlert.style.display = 'none';
                }
            } else {
                budgetAlert.style.display = 'none';
            }
        }

        function calculateTaxes() {
            const amount = parseFloat(document.getElementById('amount').value) || 0;
            const taxType = document.getElementById('taxType').value;
            const gstRate = parseFloat(document.getElementById('gstRate').value) || 0;
            const isTaxable = document.getElementById('isTaxable').checked;

            let taxAmount = 0;
            let totalAmount = 0;

            if (isTaxable) {
                if (taxType === 'exclusive') {
                    taxAmount = amount * (gstRate / 100);
                    totalAmount = amount + taxAmount;
                } else {
                    // tax inclusive
                    taxAmount = amount - (amount / (1 + (gstRate / 100)));
                    totalAmount = amount;
                }
            } else {
                totalAmount = amount;
            }

            document.getElementById('taxAmount').value = taxAmount.toFixed(2);
            document.getElementById('totalAmount').value = totalAmount.toFixed(2);

            // Calculate TDS
            const tdsRate = parseFloat(document.getElementById('tdsRate').value) || 0;
            const tdsAmount = totalAmount * (tdsRate / 100);
            document.getElementById('tdsAmount').value = tdsAmount.toFixed(2);

            // Update project budget alert
            updateProjectBudget();
        }

        function toggleTaxCalculation() {
            const isTaxable = document.getElementById('isTaxable').checked;
            document.getElementById('taxType').disabled = !isTaxable;
            document.getElementById('gstRate').disabled = !isTaxable;
            calculateTaxes();
        }

        function saveAsDraft() {
            const form = document.getElementById('expenseForm');
            const draftInput = document.createElement('input');
            draftInput.type = 'hidden';
            draftInput.name = 'is_draft';
            draftInput.value = '1';
            form.appendChild(draftInput);

            // Validate required fields
            if (!validateForm()) {
                return;
            }

            form.submit();
        }

        function validateForm() {
            const requiredFields = [
                'expenseTitle', 'expenseDate', 'projectSelect', 'expenseCategory',
                'expenseType', 'amount', 'paymentMethod', 'paymentStatus'
            ];

            let isValid = true;

            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                showToast('Please fill all required fields', 'error');
                return false;
            }

            // Validate amount
            const amount = parseFloat(document.getElementById('amount').value);
            if (amount <= 0) {
                document.getElementById('amount').classList.add('is-invalid');
                showToast('Amount must be greater than 0', 'error');
                return false;
            }

            return true;
        }

        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            toast.style.cssText = 'top: 20px; right: 20px; z-index: 1055; min-width: 300px;';
            toast.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        // Auto-save draft every 2 minutes
        setInterval(function() {
            const form = document.getElementById('expenseForm');
            const title = document.getElementById('expenseTitle').value;
            const amount = document.getElementById('amount').value;

            if (title || amount) {
                console.log('Auto-saving expense draft...');
                saveDraftLocally();
            }
        }, 120000);

        function saveDraftLocally() {
            const formData = new FormData(document.getElementById('expenseForm'));
            const draftData = {};

            for (let [key, value] of formData.entries()) {
                if (key !== 'attachments[]') {
                    draftData[key] = value;
                }
            }

            localStorage.setItem('expenseDraft', JSON.stringify(draftData));
        }

        function loadDraft() {
            const draft = localStorage.getItem('expenseDraft');
            if (draft) {
                const draftData = JSON.parse(draft);

                // Populate form fields with draft data
                for (let key in draftData) {
                    const element = document.querySelector(`[name="${key}"]`);
                    if (element) {
                        element.value = draftData[key];
                    }
                }

                // Update dependent fields
                calculateTaxes();
                updateProjectBudget();

                console.log('Expense draft loaded successfully');

                // Ask user if they want to restore draft
                if (confirm('A saved draft was found. Do you want to restore it?')) {
                    showToast('Draft restored successfully!', 'success');
                } else {
                    clearDraft();
                }
            }
        }

        function clearDraft() {
            localStorage.removeItem('expenseDraft');
            showToast('Draft cleared!', 'info');
        }

        // Load draft when page loads
        window.addEventListener('load', loadDraft);

        // Add event listeners for auto-save
        document.querySelectorAll('#expenseForm input, #expenseForm select, #expenseForm textarea').forEach(element => {
            element.addEventListener('change', function() {
                saveDraftLocally();
                if (this.id === 'amount' || this.id === 'projectSelect') {
                    updateProjectBudget();
                }
            });
            element.addEventListener('input', saveDraftLocally);
        });

        // Form submission handler
        document.getElementById('expenseForm').addEventListener('submit', function(e) {
            if (!validateForm()) {
                e.preventDefault();
                return;
            }

            // Clear draft on successful submission
            clearDraft();

            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = `
        <span class="spinner-border spinner-border-sm me-2" role="status"></span>
        Processing...
    `;
            submitBtn.disabled = true;
        });
    </script>
@endsection
