@extends('cuns_manager.layouts.main')

@section('title', 'Materials Inventory - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Materials /</span> Inventory Management
                    </h4>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal"
                            data-bs-target="#inventorySettingsModal">
                            <span class="material-icons-round me-2">settings</span>
                            Settings
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMaterialModal">
                            <span class="material-icons-round me-2">add</span>
                            Add Material
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inventory Overview Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <h6 class="card-title text-muted mb-2">Total Items</h6>
                                <h4 class="text-primary mb-0">156</h4>
                                <small class="text-success">
                                    <span class="material-icons-round" style="font-size: 16px;">trending_up</span>
                                    +12 this month
                                </small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-primary" style="font-size: 48px;">inventory_2</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <h6 class="card-title text-muted mb-2">Low Stock</h6>
                                <h4 class="text-warning mb-0">8</h4>
                                <small class="text-muted">Need reordering</small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-warning" style="font-size: 48px;">warning</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <h6 class="card-title text-muted mb-2">Out of Stock</h6>
                                <h4 class="text-danger mb-0">3</h4>
                                <small class="text-muted">Critical items</small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-danger" style="font-size: 48px;">cancel</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <h6 class="card-title text-muted mb-2">Total Value</h6>
                                <h4 class="text-success mb-0">₹25.8L</h4>
                                <small class="text-muted">Inventory worth</small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-success" style="font-size: 48px;">savings</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions and Filters -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="categoryFilter" class="form-label">Category</label>
                                <select class="form-select" id="categoryFilter">
                                    <option value="">All Categories</option>
                                    <option value="cement">Cement & Concrete</option>
                                    <option value="steel">Steel & Metal</option>
                                    <option value="bricks">Bricks & Blocks</option>
                                    <option value="electrical">Electrical</option>
                                    <option value="plumbing">Plumbing</option>
                                    <option value="safety">Safety Equipment</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="statusFilter" class="form-label">Stock Status</label>
                                <select class="form-select" id="statusFilter">
                                    <option value="">All Status</option>
                                    <option value="adequate">Adequate</option>
                                    <option value="low">Low Stock</option>
                                    <option value="out">Out of Stock</option>
                                    <option value="excess">Excess Stock</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="supplierFilter" class="form-label">Supplier</label>
                                <select class="form-select" id="supplierFilter">
                                    <option value="">All Suppliers</option>
                                    <option value="abc">ABC Suppliers</option>
                                    <option value="xyz">XYZ Steel</option>
                                    <option value="prime">Prime Materials</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="locationFilter" class="form-label">Storage Location</label>
                                <select class="form-select" id="locationFilter">
                                    <option value="">All Locations</option>
                                    <option value="warehouse">Main Warehouse</option>
                                    <option value="site_a">Site A Storage</option>
                                    <option value="site_b">Site B Storage</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="d-flex gap-2">
                                    <button class="btn btn-primary" onclick="applyInventoryFilters()">
                                        <span class="material-icons-round me-2">search</span>
                                        Apply Filters
                                    </button>
                                    <button class="btn btn-outline-secondary" onclick="resetInventoryFilters()">
                                        <span class="material-icons-round me-2">refresh</span>
                                        Reset
                                    </button>
                                    <div class="ms-auto d-flex gap-2">
                                        <button class="btn btn-outline-success" onclick="exportInventory()">
                                            <span class="material-icons-round me-2">download</span>
                                            Export
                                        </button>
                                        <button class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#bulkUpdateModal">
                                            <span class="material-icons-round me-2">edit_note</span>
                                            Bulk Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inventory Table -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Materials Inventory</h5>
                <div class="d-flex gap-2">
                    <div class="input-group input-group-merge" style="width: 300px;">
                        <span class="input-group-text">
                            <span class="material-icons-round">search</span>
                        </span>
                        <input type="text" class="form-control" placeholder="Search materials..."
                            id="searchMaterials">
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown">
                            <span class="material-icons-round">view_list</span>
                            View
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="changeView('table')">Table View</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeView('grid')">Grid View</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeView('cards')">Card View</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Table View -->
                <div class="table-responsive" id="tableView">
                    <table class="table table-hover" id="inventoryTable">
                        <thead>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="selectAllItems">
                                    </div>
                                </th>
                                <th>Material</th>
                                <th>Category</th>
                                <th>Current Stock</th>
                                <th>Unit</th>
                                <th>Min Stock</th>
                                <th>Max Stock</th>
                                <th>Stock Status</th>
                                <th>Location</th>
                                <th>Last Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventory as $item)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input row-checkbox" type="checkbox"
                                                value="{{ $item['id'] ?? '' }}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="material-icon me-3">
                                                <span class="material-icons-round text-primary">inventory_2</span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $item['material_name'] }}</h6>
                                                <small class="text-muted">SKU:
                                                    {{ $item['sku'] ?? 'MAT-' . str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $item['category'] }}</span>
                                    </td>
                                    <td>
                                        <h6 class="mb-0">{{ $item['current_stock'] }}</h6>
                                    </td>
                                    <td>{{ $item['unit'] }}</td>
                                    <td>
                                        <small class="text-muted">{{ $item['min_stock'] }}</small>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $item['max_stock'] ?? 'N/A' }}</small>
                                    </td>
                                    <td>
                                        @if ($item['current_stock'] <= 0)
                                            <span class="badge bg-danger">Out of Stock</span>
                                        @elseif($item['current_stock'] <= $item['min_stock'])
                                            <span class="badge bg-warning">Low Stock</span>
                                        @else
                                            <span class="badge bg-success">Adequate</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $item['location'] ?? 'Main Warehouse' }}</small>
                                    </td>
                                    <td>
                                        <small
                                            class="text-muted">{{ \Carbon\Carbon::parse($item['last_updated'] ?? now())->format('M d, Y') }}</small>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                data-bs-target="#viewMaterialModal"
                                                onclick="viewMaterial({{ $item['id'] ?? $loop->index }})">
                                                <span class="material-icons-round"
                                                    style="font-size: 16px;">visibility</span>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                                data-bs-target="#editMaterialModal"
                                                onclick="editMaterial({{ $item['id'] ?? $loop->index }})">
                                                <span class="material-icons-round" style="font-size: 16px;">edit</span>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal"
                                                data-bs-target="#stockAdjustmentModal"
                                                onclick="adjustStock({{ $item['id'] ?? $loop->index }})">
                                                <span class="material-icons-round"
                                                    style="font-size: 16px;">swap_horiz</span>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger"
                                                onclick="deleteMaterial({{ $item['id'] ?? $loop->index }})">
                                                <span class="material-icons-round" style="font-size: 16px;">delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Grid View (Hidden by default) -->
                <div class="row d-none" id="gridView">
                    @foreach ($inventory as $item)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-4">
                            <div class="card material-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div class="material-icon">
                                            <span class="material-icons-round text-primary">inventory_2</span>
                                        </div>
                                        <div class="stock-status">
                                            @if ($item['current_stock'] <= 0)
                                                <span class="badge bg-danger">Out of Stock</span>
                                            @elseif($item['current_stock'] <= $item['min_stock'])
                                                <span class="badge bg-warning">Low</span>
                                            @else
                                                <span class="badge bg-success">Adequate</span>
                                            @endif
                                        </div>
                                    </div>
                                    <h6 class="card-title mb-2">{{ $item['material_name'] }}</h6>
                                    <p class="text-muted mb-3">{{ $item['category'] }}</p>
                                    <div class="material-details">
                                        <div class="d-flex justify-content-between mb-2">
                                            <small class="text-muted">Current Stock</small>
                                            <small class="fw-bold">{{ $item['current_stock'] }}
                                                {{ $item['unit'] }}</small>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <small class="text-muted">Min Stock</small>
                                            <small>{{ $item['min_stock'] }} {{ $item['unit'] }}</small>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted">Location</small>
                                            <small>{{ $item['location'] ?? 'Warehouse' }}</small>
                                        </div>
                                    </div>
                                    <div class="progress mt-3 mb-2" style="height: 6px;">
                                        @php
                                            $percentage = min(
                                                100,
                                                ($item['current_stock'] /
                                                    ($item['max_stock'] ?? $item['min_stock'] * 2)) *
                                                    100,
                                            );
                                            $progressClass =
                                                $item['current_stock'] <= $item['min_stock']
                                                    ? 'bg-warning'
                                                    : 'bg-success';
                                        @endphp
                                        <div class="progress-bar {{ $progressClass }}"
                                            style="width: {{ $percentage }}%"></div>
                                    </div>
                                    <div class="d-flex gap-2 mt-3">
                                        <button class="btn btn-outline-primary btn-sm flex-fill" data-bs-toggle="modal"
                                            data-bs-target="#viewMaterialModal"
                                            onclick="viewMaterial({{ $item['id'] ?? $loop->index }})">
                                            <span class="material-icons-round" style="font-size: 16px;">visibility</span>
                                        </button>
                                        <button class="btn btn-outline-secondary btn-sm flex-fill" data-bs-toggle="modal"
                                            data-bs-target="#editMaterialModal"
                                            onclick="editMaterial({{ $item['id'] ?? $loop->index }})">
                                            <span class="material-icons-round" style="font-size: 16px;">edit</span>
                                        </button>
                                        <button class="btn btn-outline-success btn-sm flex-fill" data-bs-toggle="modal"
                                            data-bs-target="#stockAdjustmentModal"
                                            onclick="adjustStock({{ $item['id'] ?? $loop->index }})">
                                            <span class="material-icons-round" style="font-size: 16px;">swap_horiz</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Low Stock Alert Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card border-warning">
                    <div class="card-header bg-warning text-white">
                        <h5 class="card-title mb-0">
                            <span class="material-icons-round me-2">warning</span>
                            Low Stock Alerts
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="alert-item p-3 border border-warning rounded">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h6 class="mb-0">Portland Cement</h6>
                                        <span class="badge bg-warning">50 Bags</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Minimum: 100 Bags</small>
                                        <button class="btn btn-sm btn-outline-primary">Order Now</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="alert-item p-3 border border-warning rounded">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h6 class="mb-0">Steel Bars 12mm</h6>
                                        <span class="badge bg-warning">200 KG</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Minimum: 500 KG</small>
                                        <button class="btn btn-sm btn-outline-primary">Order Now</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="alert-item p-3 border border-warning rounded">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h6 class="mb-0">Safety Helmets</h6>
                                        <span class="badge bg-warning">15 Pieces</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Minimum: 25 Pieces</small>
                                        <button class="btn btn-sm btn-outline-primary">Order Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Add Material Modal -->
    <div class="modal fade" id="addMaterialModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Material</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addMaterialForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="materialName" class="form-label">Material Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="materialName"
                                    placeholder="Enter material name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="materialSku" class="form-label">SKU Code</label>
                                <input type="text" class="form-control" id="materialSku"
                                    placeholder="Auto-generated if empty">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="materialCategory" class="form-label">Category <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" id="materialCategory" required>
                                    <option value="">Select Category</option>
                                    <option value="cement">Cement & Concrete</option>
                                    <option value="steel">Steel & Metal</option>
                                    <option value="bricks">Bricks & Blocks</option>
                                    <option value="electrical">Electrical</option>
                                    <option value="plumbing">Plumbing</option>
                                    <option value="safety">Safety Equipment</option>
                                    <option value="tools">Tools & Equipment</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="materialUnit" class="form-label">Unit of Measurement <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" id="materialUnit" required>
                                    <option value="">Select Unit</option>
                                    <option value="bags">Bags</option>
                                    <option value="kg">Kilograms (KG)</option>
                                    <option value="tons">Tons</option>
                                    <option value="pieces">Pieces</option>
                                    <option value="meters">Meters</option>
                                    <option value="liters">Liters</option>
                                    <option value="rolls">Rolls</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="initialStock" class="form-label">Initial Stock</label>
                                <input type="number" class="form-control" id="initialStock" value="0"
                                    min="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="minStock" class="form-label">Minimum Stock <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="minStock" required min="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="maxStock" class="form-label">Maximum Stock</label>
                                <input type="number" class="form-control" id="maxStock" min="0">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="storageLocation" class="form-label">Storage Location</label>
                                <select class="form-select" id="storageLocation">
                                    <option value="">Select Location</option>
                                    <option value="warehouse">Main Warehouse</option>
                                    <option value="site_a">Site A Storage</option>
                                    <option value="site_b">Site B Storage</option>
                                    <option value="site_c">Site C Storage</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="primarySupplier" class="form-label">Primary Supplier</label>
                                <select class="form-select" id="primarySupplier">
                                    <option value="">Select Supplier</option>
                                    <option value="abc">ABC Suppliers</option>
                                    <option value="xyz">XYZ Steel</option>
                                    <option value="prime">Prime Materials</option>
                                    <option value="quality">Quality Builders</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="materialDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="materialDescription" rows="3"
                                    placeholder="Material description, specifications..."></textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="materialNotes" class="form-label">Additional Notes</label>
                                <textarea class="form-control" id="materialNotes" rows="2" placeholder="Any additional notes..."></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="addMaterial()">Add Material</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Stock Adjustment Modal -->
    <div class="modal fade" id="stockAdjustmentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Stock Adjustment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="stockAdjustmentForm">
                        <div class="mb-3">
                            <label for="adjustmentMaterial" class="form-label">Material</label>
                            <input type="text" class="form-control" id="adjustmentMaterial" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="adjustmentType" class="form-label">Adjustment Type</label>
                            <select class="form-select" id="adjustmentType" required>
                                <option value="add">Add Stock</option>
                                <option value="remove">Remove Stock</option>
                                <option value="set">Set Stock Level</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="adjustmentQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="adjustmentQuantity" required min="0"
                                step="0.01">
                        </div>
                        <div class="mb-3">
                            <label for="adjustmentReason" class="form-label">Reason</label>
                            <select class="form-select" id="adjustmentReason" required>
                                <option value="">Select Reason</option>
                                <option value="purchase">Purchase Received</option>
                                <option value="project_use">Project Consumption</option>
                                <option value="damage">Damaged/Wasted</option>
                                <option value="theft">Theft/Loss</option>
                                <option value="correction">Stock Correction</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="adjustmentNotes" class="form-label">Notes</label>
                            <textarea class="form-control" id="adjustmentNotes" rows="3" placeholder="Additional notes..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveStockAdjustment()">Save
                        Adjustment</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .material-icon {
            width: 48px;
            height: 48px;
            border-radius: 8px;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3b82f6;
        }

        .material-card {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .material-card:hover {
            border-color: #3b82f6;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .alert-item {
            transition: all 0.3s ease;
        }

        .alert-item:hover {
            background: #fffbeb;
            border-color: #f59e0b !important;
        }

        .table th {
            border-top: none;
            font-weight: 600;
            color: #64748b;
        }

        .table td {
            vertical-align: middle;
        }

        .badge {
            font-size: 0.75rem;
        }

        .progress {
            background-color: #e2e8f0;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all functionality
            const selectAll = document.getElementById('selectAllItems');
            const rowCheckboxes = document.querySelectorAll('.row-checkbox');

            selectAll.addEventListener('change', function() {
                rowCheckboxes.forEach(checkbox => {
                    checkbox.checked = selectAll.checked;
                });
            });

            // Search functionality
            const searchInput = document.getElementById('searchMaterials');
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const rows = document.querySelectorAll('#inventoryTable tbody tr');

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });
        });

        function applyInventoryFilters() {
            // Implement filter logic
            console.log('Applying inventory filters...');
        }

        function resetInventoryFilters() {
            document.getElementById('categoryFilter').value = '';
            document.getElementById('statusFilter').value = '';
            document.getElementById('supplierFilter').value = '';
            document.getElementById('locationFilter').value = '';
            applyInventoryFilters();
        }

        function changeView(viewType) {
            const tableView = document.getElementById('tableView');
            const gridView = document.getElementById('gridView');

            if (viewType === 'table') {
                tableView.classList.remove('d-none');
                gridView.classList.add('d-none');
            } else if (viewType === 'grid') {
                tableView.classList.add('d-none');
                gridView.classList.remove('d-none');
            }
        }

        function addMaterial() {
            const form = document.getElementById('addMaterialForm');
            if (form.checkValidity()) {
                // Implement add material logic
                console.log('Adding new material');
                const modal = bootstrap.Modal.getInstance(document.getElementById('addMaterialModal'));
                modal.hide();
            } else {
                form.reportValidity();
            }
        }

        function viewMaterial(materialId) {
            // Implement view material details
            console.log('Viewing material:', materialId);
        }

        function editMaterial(materialId) {
            // Implement edit material
            console.log('Editing material:', materialId);
        }

        function adjustStock(materialId) {
            // Implement stock adjustment
            console.log('Adjusting stock for material:', materialId);
            // Pre-fill the adjustment form with material details
        }

        function saveStockAdjustment() {
            const form = document.getElementById('stockAdjustmentForm');
            if (form.checkValidity()) {
                // Implement save adjustment logic
                console.log('Saving stock adjustment');
                const modal = bootstrap.Modal.getInstance(document.getElementById('stockAdjustmentModal'));
                modal.hide();
            } else {
                form.reportValidity();
            }
        }

        function deleteMaterial(materialId) {
            if (confirm('Are you sure you want to delete this material? This action cannot be undone.')) {
                // Implement delete logic
                console.log('Deleting material:', materialId);
            }
        }

        function exportInventory() {
            // Implement export functionality
            console.log('Exporting inventory data');
        }
    </script>
@endsection
