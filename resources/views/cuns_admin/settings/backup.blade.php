@extends('layouts.app')

@section('title', 'System Backup')
@section('page_title', 'Settings - Backup')

@section('content')

    <div class="container-fluid py-4">
        {{-- PAGE HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-light">System Backup Management</h2>
            <button class="btn btn-success rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#createBackupModal">
                <i class="fas fa-cloud-upload-alt me-1"></i> Create Backup
            </button>
        </div>

        {{-- BACKUP HISTORY TABLE --}}
        <div class="card bg-dark text-white shadow-lg border-light rounded-4">
            <div class="card-body table-responsive">
                <div class="d-flex justify-content-end mb-3">
                    <button id="exportCsvBtn" class="btn btn-primary rounded-pill">
                        <i class="fas fa-file-csv me-2"></i>Export CSV
                    </button>
                </div>

                <table id="backupTable"
                    class="table table-dark table-striped table-hover align-middle border border-secondary rounded-4 overflow-hidden">
                    <thead class="bg-black text-uppercase">
                        <tr>
                            <th>#</th>
                            <th>Backup Name</th>
                            <th>Created On</th>
                            <th>Size</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Backup-Jan-2025</td>
                            <td>2025-01-31</td>
                            <td>1.2 GB</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-light rounded-pill download-btn"><i
                                        class="fas fa-download"></i></button>
                                <button class="btn btn-sm btn-outline-danger rounded-pill"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Backup-Feb-2025</td>
                            <td>2025-02-28</td>
                            <td>1.5 GB</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-light rounded-pill download-btn"><i
                                        class="fas fa-download"></i></button>
                                <button class="btn btn-sm btn-outline-danger rounded-pill"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Backup-Mar-2025</td>
                            <td>2025-03-31</td>
                            <td>1.3 GB</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-light rounded-pill download-btn"><i
                                        class="fas fa-download"></i></button>
                                <button class="btn btn-sm btn-outline-danger rounded-pill"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {{-- CREATE BACKUP MODAL --}}

    <div class="modal fade" id="createBackupModal" tabindex="-1" aria-labelledby="createBackupLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white border-light rounded-4">
                <form id="createBackupForm">
                    <div class="modal-header bg-primary text-white rounded-top-4">
                        <h5 class="modal-title" id="createBackupLabel"><i class="fas fa-database me-2"></i>Create New Backup
                        </h5> <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="backupName" class="form-label fw-bold">Backup Name</label>
                            <input type="text" id="backupName" name="backupName"
                                class="form-control bg-dark text-white border-light" placeholder="e.g. Backup-Apr-2025"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="backupType" class="form-label fw-bold">Backup Type</label>
                            <select id="backupType" name="backupType" class="form-select bg-dark text-white border-light"
                                required>
                                <option value="">-- Select Type --</option>
                                <option value="Full">Full Backup</option>
                                <option value="Incremental">Incremental Backup</option>
                                <option value="Differential">Differential Backup</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="backupDescription" class="form-label fw-bold">Description</label>
                            <textarea id="backupDescription" name="backupDescription" class="form-control bg-dark text-white border-light"
                                rows="3" placeholder="Write any notes or comments..."></textarea>
                        </div>
                    </div>

                    <div class="modal-footer border-top border-secondary">
                        <button type="button" class="btn btn-outline-secondary rounded-pill"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Create Backup</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    {{-- jQuery Script for CSV Export and Modal --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // EXPORT CSV FUNCTION $('#exportCsvBtn').on('click', function () { let csv = []; let rows = document.querySelectorAll('#backupTable tr'); for (let i = 0; i < rows.length; i++) { let row = [], cols = rows[i].querySelectorAll('td, th'); for (let j = 0; j < cols.length - 1; j++) { // Skip last column (Actions) row.push(cols[j].innerText.trim()); } csv.push(row.join(',')); } let csvFile = new Blob([csv.join('\n')], { type: 'text/csv' }); let downloadLink = document.createElement('a'); downloadLink.download = 'system_backup_' + new Date().toISOString().slice(0, 10) + '.csv'; downloadLink.href = window.URL.createObjectURL(csvFile); downloadLink.click(); }); // DOWNLOAD BUTTON IN EACH ROW $(document).on('click', '.download-btn', function() { $('#exportCsvBtn').click(); }); // CREATE BACKUP MODAL SUBMIT + ADD NEW ROW $('#createBackupForm').on('submit', function (e) { e.preventDefault(); const name = $('#backupName').val(); const type = $('#backupType').val(); const desc = $('#backupDescription').val(); const date = new Date().toISOString().slice(0, 10); const id = $('#backupTable tbody tr').length + 1; const size = (Math.random() * (2 - 1) + 1).toFixed(1) + ' GB'; const newRow = ` <tr> <td>${String(id).padStart(3, '0')}</td> <td>${name}</td> <td>${date}</td> <td>${size}</td> <td><span class="badge bg-warning text-dark">${type}</span></td> <td> <button class="btn btn-sm btn-outline-light rounded-pill download-btn"><i class="fas fa-download"></i></button> <button class="btn btn-sm btn-outline-danger rounded-pill"><i class="fas fa-trash"></i></button> </td> </tr> `; $('#backupTable tbody').append(newRow); $('#createBackupModal').modal('hide'); this.reset(); alert('✅ Backup Created Successfully!\nName: ' + name + '\nType: ' + type + '\nDescription: ' + desc); }); 
    </script>

    {{-- FOOTER --}}

    <div class="container-fluid pt-4 px-4">
        <div class="bg-dark rounded-top p-4 border-top border-light">
            <div class="row text-center">
                <div class="col-12 col-sm-6 text-sm-start text-light"> &copy; <a href="#"
                        class="text-decoration-none text-primary">Icon Construction's</a>, All Rights Reserved. </div>
                <div class="col-12 col-sm-6 text-sm-end text-secondary"> Designed By G M Software Solution </div>
            </div>
        </div>
    </div>
@endsection
