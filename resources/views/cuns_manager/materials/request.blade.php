@extends('cuns_manager.layouts.main')

@section('title', 'Material Request - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Materials /</span> Request Materials
                    </h4>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary"
                            onclick="window.location.href='{{ route('materials.index') }}'">
                            <span class="material-icons-round me-2">arrow_back</span>
                            Back to Inventory
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickRequestModal">
                            <span class="material-icons-round me-2">add</span>
                            Quick Request
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Request Statistics -->
        <div class="row mb-4">
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Pending</h6>
                            <h4 class="text-warning mb-0">{{ $stats['pending'] }}</h4>
                            <small class="text-muted">Awaiting Approval</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Approved</h6>
                            <h4 class="text-success mb-0">{{ $stats['approved'] }}</h4>
                            <small class="text-muted">This Month</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Rejected</h6>
                            <h4 class="text-danger mb-0">{{ $stats['rejected'] }}</h4>
                            <small class="text-muted">This Month</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Delivered</h6>
                            <h4 class="text-info mb-0">{{ $stats['delivered'] }}</h4>
                            <small class="text-muted">This Month</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Total Value</h6>
                            <h4 class="text-primary mb-0">₹{{ number_format($stats['total_value'] / 1000, 1) }}K</h4>
                            <small class="text-muted">Pending Requests</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Avg. Time</h6>
                            <h4 class="text-secondary mb-0">{{ $stats['avg_processing_time'] }}h</h4>
                            <small class="text-muted">Approval to Delivery</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Material Request Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">New Material Request</h5>
                    </div>
                    <div class="card-body">
                        <form id="materialRequestForm" action="{{ route('materials.requests.store') }}" method="POST">
                            @csrf

                            <!-- Request Information -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Request Information</h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="requestTitle" class="form-label">Request Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="requestTitle" name="title"
                                        placeholder="Enter request title" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="projectSelect" class="form-label">Project <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="projectSelect" name="project_id" required
                                        onchange="updateProjectDetails()">
                                        <option value="">Select Project</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project['id'] }}" data-manager="{{ $project['manager'] }}"
                                                data-location="{{ $project['location'] }}">
                                                {{ $project['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="siteLocation" class="form-label">Site Location</label>
                                    <input type="text" class="form-control" id="siteLocation" name="site_location"
                                        readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="projectManager" class="form-label">Project Manager</label>
                                    <input type="text" class="form-control" id="projectManager" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="priority" class="form-label">Priority <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="priority" name="priority" required>
                                        <option value="low">Low</option>
                                        <option value="medium" selected>Medium</option>
                                        <option value="high">High</option>
                                        <option value="urgent">Urgent</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="requestDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="requestDescription" name="description" rows="3"
                                        placeholder="Describe the purpose of this material request..."></textarea>
                                </div>
                            </div>

                            <!-- Requested Items -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="text-primary mb-0">Requested Materials</h6>
                                        <button type="button" class="btn btn-sm btn-outline-primary"
                                            onclick="addMaterialItem()">
                                            <span class="material-icons-round me-1" style="font-size: 16px;">add</span>
                                            Add Item
                                        </button>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="materialItemsTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th width="30%">Material</th>
                                                    <th width="15%">Quantity</th>
                                                    <th width="15%">Unit</th>
                                                    <th width="15%">Unit Price</th>
                                                    <th width="15%">Total</th>
                                                    <th width="10%">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="materialItemsBody">
                                                <tr class="material-item">
                                                    <td>
                                                        <select class="form-select material-select"
                                                            name="materials[0][material_id]"
                                                            onchange="updateMaterialDetails(this)" required>
                                                            <option value="">Select Material</option>
                                                            @foreach ($materials as $material)
                                                                <option value="{{ $material['id'] }}"
                                                                    data-unit="{{ $material['unit'] }}"
                                                                    data-price="{{ $material['unit_price'] }}"
                                                                    data-stock="{{ $material['current_stock'] }}"
                                                                    data-min-stock="{{ $material['min_stock'] }}">
                                                                    {{ $material['name'] }} ({{ $material['category'] }})
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control quantity-input"
                                                            name="materials[0][quantity]" min="1" step="0.01"
                                                            required onchange="calculateTotal(this)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control unit-input" readonly>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <span class="input-group-text">₹</span>
                                                            <input type="number" class="form-control price-input"
                                                                name="materials[0][unit_price]" step="0.01" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <span class="input-group-text">₹</span>
                                                            <input type="number" class="form-control total-input"
                                                                readonly>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                            onclick="removeMaterialItem(this)" disabled>
                                                            <span class="material-icons-round"
                                                                style="font-size: 16px;">delete</span>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" class="text-end fw-bold">Grand Total:</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <span class="input-group-text">₹</span>
                                                            <input type="number" class="form-control" id="grandTotal"
                                                                value="0" readonly>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Delivery Information -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Delivery Information</h6>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="requiredDate" class="form-label">Required By Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="requiredDate" name="required_date"
                                        min="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="deliveryLocation" class="form-label">Delivery Location</label>
                                    <input type="text" class="form-control" id="deliveryLocation"
                                        name="delivery_location" placeholder="Specific delivery location on site">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="preferredSupplier" class="form-label">Preferred Supplier</label>
                                    <select class="form-select" id="preferredSupplier" name="preferred_supplier">
                                        <option value="">Select Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier['id'] }}">{{ $supplier['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="deliveryInstructions" class="form-label">Delivery Instructions</label>
                                    <textarea class="form-control" id="deliveryInstructions" name="delivery_instructions" rows="2"
                                        placeholder="Any special delivery instructions..."></textarea>
                                </div>
                            </div>

                            <!-- Additional Information -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Additional Information</h6>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="justification" class="form-label">Justification <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="justification" name="justification" rows="3"
                                        placeholder="Explain why these materials are needed..." required></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="alternativeMaterials" class="form-label">Alternative Materials</label>
                                    <textarea class="form-control" id="alternativeMaterials" name="alternative_materials" rows="2"
                                        placeholder="List any acceptable alternative materials..."></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="safetyEquipment"
                                            name="safety_equipment">
                                        <label class="form-check-label" for="safetyEquipment">
                                            This request includes safety equipment
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="emergencyRequest"
                                            name="emergency_request">
                                        <label class="form-check-label" for="emergencyRequest">
                                            This is an emergency request (bypass normal approval process)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="partialDelivery"
                                            name="partial_delivery">
                                        <label class="form-check-label" for="partialDelivery">
                                            Allow partial delivery if full quantity not available
                                        </label>
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
                                            <p class="text-muted mb-2">Drag & drop files here or click to upload</p>
                                            <p class="text-muted small mb-3">Supports PDF, JPG, PNG, DOC (Max: 10MB per
                                                file)</p>
                                            <input type="file" id="requestAttachments" name="attachments[]" multiple
                                                class="d-none" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="document.getElementById('requestAttachments').click()">
                                                <span class="material-icons-round me-2"
                                                    style="font-size: 16px;">upload</span>
                                                Choose Files
                                            </button>
                                        </div>
                                        <div id="fileList" class="mt-3"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="window.location.href='{{ route('materials.index') }}'">
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
                                                <span class="material-icons-round me-2">send</span>
                                                Submit Request
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

    <!-- Quick Request Modal -->
    <div class="modal fade" id="quickRequestModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Quick Material Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="quickRequestForm">
                        <div class="mb-3">
                            <label for="quickMaterial" class="form-label">Material</label>
                            <select class="form-select" id="quickMaterial">
                                <option value="">Select Material</option>
                                @foreach ($materials as $material)
                                    <option value="{{ $material['id'] }}">{{ $material['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="quickQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quickQuantity" min="1"
                                value="1">
                        </div>
                        <div class="mb-3">
                            <label for="quickProject" class="form-label">Project</label>
                            <select class="form-select" id="quickProject">
                                <option value="">Select Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project['id'] }}">{{ $project['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="quickPriority" class="form-label">Priority</label>
                            <select class="form-select" id="quickPriority">
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                                <option value="urgent">Urgent</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="submitQuickRequest()">Submit Quick
                        Request</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .material-item {
            transition: all 0.3s ease;
        }

        .material-item:hover {
            background-color: #f8f9fa;
        }

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

        .stock-info {
            font-size: 0.875rem;
        }

        .stock-adequate {
            color: #10b981;
        }

        .stock-low {
            color: #f59e0b;
        }

        .stock-out {
            color: #ef4444;
        }

        .input-group-text {
            background-color: #f8f9fa;
        }
    </style>

    <script>
        let itemCounter = 1;

        document.addEventListener('DOMContentLoaded', function() {
            // Set minimum required date to today
            document.getElementById('requiredDate').min = new Date().toISOString().split('T')[0];

            // File upload handling
            initializeFileUpload();

            // Calculate initial total
            calculateGrandTotal();
        });

        function updateProjectDetails() {
            const projectSelect = document.getElementById('projectSelect');
            const selectedOption = projectSelect.options[projectSelect.selectedIndex];

            if (selectedOption.value) {
                document.getElementById('siteLocation').value = selectedOption.dataset.location;
                document.getElementById('projectManager').value = selectedOption.dataset.manager;
            } else {
                document.getElementById('siteLocation').value = '';
                document.getElementById('projectManager').value = '';
            }
        }

        function addMaterialItem() {
            const tbody = document.getElementById('materialItemsBody');
            const newRow = document.createElement('tr');
            newRow.className = 'material-item';
            newRow.innerHTML = `
        <td>
            <select class="form-select material-select" name="materials[${itemCounter}][material_id]" onchange="updateMaterialDetails(this)" required>
                <option value="">Select Material</option>
                @foreach ($materials as $material)
                <option value="{{ $material['id'] }}" 
                        data-unit="{{ $material['unit'] }}" 
                        data-price="{{ $material['unit_price'] }}"
                        data-stock="{{ $material['current_stock'] }}"
                        data-min-stock="{{ $material['min_stock'] }}">
                    {{ $material['name'] }} ({{ $material['category'] }})
                </option>
                @endforeach
            </select>
        </td>
        <td>
            <input type="number" class="form-control quantity-input" name="materials[${itemCounter}][quantity]" 
                   min="1" step="0.01" required onchange="calculateTotal(this)">
        </td>
        <td>
            <input type="text" class="form-control unit-input" readonly>
        </td>
        <td>
            <div class="input-group">
                <span class="input-group-text">₹</span>
                <input type="number" class="form-control price-input" name="materials[${itemCounter}][unit_price]" 
                       step="0.01" readonly>
            </div>
        </td>
        <td>
            <div class="input-group">
                <span class="input-group-text">₹</span>
                <input type="number" class="form-control total-input" readonly>
            </div>
        </td>
        <td class="text-center">
            <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeMaterialItem(this)">
                <span class="material-icons-round" style="font-size: 16px;">delete</span>
            </button>
        </td>
    `;
            tbody.appendChild(newRow);
            itemCounter++;

            // Enable delete button for first item if there are multiple items
            if (tbody.children.length > 1) {
                tbody.children[0].querySelector('button').disabled = false;
            }
        }

        function removeMaterialItem(button) {
            const row = button.closest('tr');
            const tbody = document.getElementById('materialItemsBody');

            if (tbody.children.length > 1) {
                row.remove();
                calculateGrandTotal();

                // Disable delete button for first item if only one remains
                if (tbody.children.length === 1) {
                    tbody.children[0].querySelector('button').disabled = true;
                }
            }
        }

        function updateMaterialDetails(select) {
            const row = select.closest('tr');
            const selectedOption = select.options[select.selectedIndex];

            if (selectedOption.value) {
                const unit = selectedOption.dataset.unit;
                const price = selectedOption.dataset.price;
                const stock = selectedOption.dataset.stock;
                const minStock = selectedOption.dataset.minStock;

                row.querySelector('.unit-input').value = unit;
                row.querySelector('.price-input').value = price;

                // Show stock information
                let stockClass = 'stock-adequate';
                let stockText = `In Stock: ${stock}`;

                if (stock == 0) {
                    stockClass = 'stock-out';
                    stockText = 'Out of Stock';
                } else if (stock <= minStock) {
                    stockClass = 'stock-low';
                    stockText = `Low Stock: ${stock}`;
                }

                // Remove existing stock info
                const existingStockInfo = row.querySelector('.stock-info');
                if (existingStockInfo) {
                    existingStockInfo.remove();
                }

                // Add stock info
                const stockInfo = document.createElement('div');
                stockInfo.className = `stock-info ${stockClass} mt-1`;
                stockInfo.textContent = stockText;
                select.parentNode.appendChild(stockInfo);

                // Calculate total if quantity is set
                const quantityInput = row.querySelector('.quantity-input');
                if (quantityInput.value) {
                    calculateTotal(quantityInput);
                }
            } else {
                row.querySelector('.unit-input').value = '';
                row.querySelector('.price-input').value = '';
                row.querySelector('.total-input').value = '';

                // Remove stock info
                const existingStockInfo = row.querySelector('.stock-info');
                if (existingStockInfo) {
                    existingStockInfo.remove();
                }
            }
        }

        function calculateTotal(input) {
            const row = input.closest('tr');
            const price = parseFloat(row.querySelector('.price-input').value) || 0;
            const quantity = parseFloat(input.value) || 0;
            const total = price * quantity;

            row.querySelector('.total-input').value = total.toFixed(2);
            calculateGrandTotal();
        }

        function calculateGrandTotal() {
            let grandTotal = 0;
            document.querySelectorAll('.total-input').forEach(input => {
                grandTotal += parseFloat(input.value) || 0;
            });

            document.getElementById('grandTotal').value = grandTotal.toFixed(2);
        }

        function initializeFileUpload() {
            const attachmentArea = document.getElementById('attachmentArea');
            const fileInput = document.getElementById('requestAttachments');
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

        function saveAsDraft() {
            const form = document.getElementById('materialRequestForm');
            const draftInput = document.createElement('input');
            draftInput.type = 'hidden';
            draftInput.name = 'is_draft';
            draftInput.value = '1';
            form.appendChild(draftInput);

            form.submit();
        }

        function submitQuickRequest() {
            const materialId = document.getElementById('quickMaterial').value;
            const quantity = document.getElementById('quickQuantity').value;
            const projectId = document.getElementById('quickProject').value;
            const priority = document.getElementById('quickPriority').value;

            if (!materialId || !quantity || !projectId) {
                showToast('Please fill all required fields', 'error');
                return;
            }

            console.log('Submitting quick request:', {
                materialId,
                quantity,
                projectId,
                priority
            });

            // Submit the quick request
            // fetch('/api/material-requests/quick', {
            //     method: 'POST',
            //     headers: { 'Content-Type': 'application/json' },
            //     body: JSON.stringify({ materialId, quantity, projectId, priority })
            // })
            // .then(response => response.json())
            // .then(data => {
            //     if (data.success) {
            //         const modal = bootstrap.Modal.getInstance(document.getElementById('quickRequestModal'));
            //         modal.hide();
            //         showToast('Quick request submitted successfully!', 'success');
            //     }
            // });

            // Simulate success
            const modal = bootstrap.Modal.getInstance(document.getElementById('quickRequestModal'));
            modal.hide();
            showToast('Quick request submitted successfully!', 'success');
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
            const form = document.getElementById('materialRequestForm');
            const title = document.getElementById('requestTitle').value;
            const project = document.getElementById('projectSelect').value;

            if (title || project) {
                console.log('Auto-saving draft...');
                // Implement auto-save functionality
                // saveDraftLocally();
            }
        }, 120000);

        function saveDraftLocally() {
            const formData = new FormData(document.getElementById('materialRequestForm'));
            const draftData = {};

            for (let [key, value] of formData.entries()) {
                draftData[key] = value;
            }

            localStorage.setItem('materialRequestDraft', JSON.stringify(draftData));
        }

        function loadDraft() {
            const draft = localStorage.getItem('materialRequestDraft');
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
                updateProjectDetails();
                calculateGrandTotal();

                console.log('Draft loaded successfully');
            }
        }

        // Load draft when page loads
        window.addEventListener('load', loadDraft);

        // Add event listeners for auto-save
        document.querySelectorAll('#materialRequestForm input, #materialRequestForm select, #materialRequestForm textarea')
            .forEach(element => {
                element.addEventListener('change', saveDraftLocally);
                element.addEventListener('input', saveDraftLocally);
            });
    </script>
@endsection
