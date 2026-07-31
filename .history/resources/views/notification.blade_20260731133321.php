@include('layout.header')
<style>
    /* ─── NOTIFICATION MODAL STYLES ─── */
.notification-full-text {
    color: #b8cbea;
    font-size: 15px;
    line-height: 1.8;
    padding: 5px 0;
}

.notification-full-text strong {
    color: #fff;
}

.notification-full-text a {
    color: #5b8cff;
    text-decoration: none;
}

.notification-full-text a:hover {
    text-decoration: underline;
}

.notification-full-text ul, 
.notification-full-text ol {
    padding-left: 20px;
    margin-top: 8px;
    margin-bottom: 8px;
}

.notification-full-text ul li,
.notification-full-text ol li {
    margin-bottom: 4px;
}

/* ─── BADGE STYLES ─── */
.badge-department {
    background: rgba(91, 140, 255, 0.15);
    color: #5b8cff;
    padding: 6px 16px;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 600;
    display: inline-block;
}

.badge-role {
    background: rgba(40, 167, 69, 0.15);
    color: #28a745;
    padding: 6px 16px;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 600;
    display: inline-block;
}

.badge-all {
    background: rgba(255, 193, 7, 0.15);
    color: #ffc107;
    padding: 6px 16px;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 600;
    display: inline-block;
}

.badge-all-role {
    background: rgba(23, 162, 184, 0.15);
    color: #17a2b8;
    padding: 6px 16px;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 600;
    display: inline-block;
}

/* ─── META INFO ─── */
.notification-meta-modal {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    color: #6d89b8;
    font-size: 14px;
}

.notification-meta-modal .meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
}

.notification-meta-modal .meta-item i {
    color: #5b8cff;
    font-size: 16px;
}

/* ─── MODAL OVERRIDES ─── */
.modal-content {
    background: #0e1a2b;
    border: 1px solid rgba(91, 140, 255, 0.15);
    border-radius: 25px;
    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.8);
}

.modal-header {
    border-bottom: 1px solid rgba(91, 140, 255, 0.1);
    padding: 20px 30px;
}

.modal-header .modal-title {
    color: #fff;
    font-weight: 700;
    font-size: 22px;
}

.modal-header .btn-close {
    filter: brightness(0) invert(1);
    opacity: 0.6;
}

.modal-header .btn-close:hover {
    opacity: 1;
}

.modal-body {
    padding: 25px 30px 20px;
}

.modal-footer {
    border-top: 1px solid rgba(91, 140, 255, 0.1);
    padding: 16px 30px;
}

.modal-footer .btn-secondary {
    background: transparent;
    border: 1px solid rgba(91, 140, 255, 0.2);
    color: #b8cbea;
    border-radius: 50px;
    padding: 8px 24px;
    transition: all 0.3s ease;
}

.modal-footer .btn-secondary:hover {
    background: rgba(91, 140, 255, 0.1);
    border-color: #5b8cff;
}

/* ─── LIGHT MODE ─── */
body.light-mode .notification-full-text {
    color: #2d2d44;
}

body.light-mode .notification-full-text strong {
    color: #1a1a2e;
}

body.light-mode .notification-full-text a {
    color: #4a7ae6;
}

body.light-mode .modal-content {
    background: #ffffff;
    border-color: rgba(0, 0, 0, 0.08);
}

body.light-mode .modal-header .modal-title {
    color: #1a1a2e;
}

body.light-mode .modal-header .btn-close {
    filter: none;
}

body.light-mode .badge-department {
    background: rgba(74, 122, 230, 0.1);
    color: #4a7ae6;
}

body.light-mode .badge-role {
    background: rgba(40, 167, 69, 0.1);
    color: #28a745;
}

body.light-mode .badge-all {
    background: rgba(255, 193, 7, 0.1);
    color: #d4a000;
}

body.light-mode .badge-all-role {
    background: rgba(23, 162, 184, 0.1);
    color: #17a2b8;
}

body.light-mode .notification-meta-modal {
    color: #999;
}

body.light-mode .notification-meta-modal .meta-item i {
    color: #4a7ae6;
}

body.light-mode .modal-footer .btn-secondary {
    color: #1a1a2e;
    border-color: #d0d9f0;
}

body.light-mode .modal-footer .btn-secondary:hover {
    background: #f0f4ff;
}

body.light-mode hr {
    border-color: rgba(0, 0, 0, 0.08) !important;
}

/* ─── RESPONSIVE ─── */
@media (max-width: 768px) {
    .modal-body {
        padding: 20px;
    }
    
    .modal-header {
        padding: 16px 20px;
    }
    
    .modal-footer {
        padding: 14px 20px;
    }
    
    .notification-meta-modal {
        gap: 12px;
        font-size: 13px;
    }
    
    .badge-department,
    .badge-role,
    .badge-all,
    .badge-all-role {
        font-size: 12px;
        padding: 4px 12px;
    }
}

@media (max-width: 576px) {
    .modal-header .modal-title {
        font-size: 18px;
    }
    
    .notification-full-text {
        font-size: 14px;
    }
}
    </style>


@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<!-- ─── PAGE HEADER ─── -->
<div class="page-header">
    <div class="page-title">
        <i class="bi bi-bell-fill"></i>
        Notifications
        <span>Manage all system notifications</span>
    </div>
    <button class="btn-add-notification" data-bs-toggle="modal" data-bs-target="#addNotificationModal">
        <i class="bi bi-plus-lg"></i> Add Notification
    </button>
</div>

<!-- ─── NOTIFICATION LIST ─── -->
<div id="notificationList">

    @foreach($dataNoti as $data)

        <div class="notification-card" data-bs-toggle="modal" data-bs-target="#notificationModal{{ $data->id }}"
            data-id="{{ $data->id }}" data>

            <div class="card-header-custom">
                <div>
                    <span class="badge-department">
                        <i class="bi bi-diagram-3 me-1"></i>
                        {{ $data->department }}
                    </span>

                    <span class="badge-role">
                        <i class="bi bi-star me-1"></i>
                        {{ $data->role }}
                    </span>
                </div>

                <div>
                    <button class="btn-delete">
                        <i class="bi bi-trash3 me-1"></i> Delete
                    </button>
                </div>
            </div>


            <div class="notification-title">
                🚀 {{ $data->title }}
            </div>


            <div class="notification-text">
                {{ Str::limit(strip_tags($data->text), 100, '...')}}
            </div>


            <div class="notification-meta">

                <span>
                    <i class="bi bi-calendar3"></i>
                    {{ \Carbon\Carbon::parse($data->created_at)->format('F d, Y') }}
                </span>

                <span>
                    <i class="bi bi-clock"></i>
                    {{ \Carbon\Carbon::parse($data->created_at)->format('h:i A') }}
                </span>

                <span>
                    <i class="bi bi-eye"></i>
                    Sent to: {{ $data->department }} · {{ $data->role }}
                </span>

            </div>

        </div>
        <!-- Notification Data view -->
<div class="modal fade" id="notificationModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-bell-fill me-2" style="color: #5b8cff;"></i>
                    {{ $data->title }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!-- Badges -->
                <div class="d-flex gap-2 flex-wrap mb-3">
                    @if($data->department == 'All')
                        <span class="badge-all">
                            <i class="bi bi-globe2 me-1"></i> {{ $data->department }}
                        </span>
                    @else
                        <span class="badge-department">
                            <i class="bi bi-diagram-3 me-1"></i> {{ $data->department }}
                        </span>
                    @endif
                    
                    @if($data->role == 'All')
                        <span class="badge-all-role">
                            <i class="bi bi-people me-1"></i> {{ $data->role }}
                        </span>
                    @else
                        <span class="badge-role">
                            <i class="bi bi-star me-1"></i> {{ ucfirst($data->role) }}
                        </span>
                    @endif
                </div>

                <hr style="border-color: rgba(91, 140, 255, 0.1);">

                <!-- Notification Content -->
                <div class="notification-full-text">
                    {!! $data->text !!}
                </div>

                <hr style="border-color: rgba(91, 140, 255, 0.1);">

                <!-- Meta Info -->
                <div class="notification-meta-modal">
                    <div class="meta-item">
                        <i class="bi bi-calendar3"></i>
                        {{ \Carbon\Carbon::parse($data->created_at)->format('F d, Y') }}
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-clock"></i>
                        {{ \Carbon\Carbon::parse($data->created_at)->format('h:i A') }}
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-person"></i>
                        Sent by: Admin
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i> Close
                </button>
            </div>
        </div>
    </div>
</div>
    @endforeach


    @if($dataNoti->count() == 0)

        <div class="empty-state">
            <i class="bi bi-bell-slash"></i>
            <h4>No Notifications</h4>
            <p>No notification found.</p>
        </div>
    @endif
</div>

<!-- ─── ADD NOTIFICATION MODAL ─── -->
<div class="modal fade" id="addNotificationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus-circle"></i> Add Notification
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('notificationInsert') }}" id="notificationForm" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Department & Role -->
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-diagram-3 me-1"></i> Department</label>
                            <div class="input-group-custom">
                                <span class="input-icon"><i class="bi bi-briefcase"></i></span>
                                <select class="form-select" name="department" id="department" required>
                                    <option value="" disabled selected>Select department</option>
                                    <option value="All">🌍 All Departments</option>
                                    <option value="R&D">R&D · Engineering</option>
                                    <option value="Operations">Operations</option>
                                    <option value="Finance">Finance</option>
                                    <option value="HR">Human Resources</option>
                                    <option value="IT">IT · Infrastructure</option>
                                    <option value="Management">Management</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-person-badge me-1"></i> Role</label>
                            <div class="input-group-custom">
                                <span class="input-icon"><i class="bi bi-star"></i></span>
                                <select class="form-select" name="role" id="role" required>
                                    <option value="" disabled selected>Select role</option>
                                    <option value="All">👥 All Roles</option>
                                    <option value="admin">Admin</option>
                                    <option value="manager">Manager</option>
                                    <option value="employee">Employee</option>
                                    <option value="intern">Intern</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Title -->
                    <div class="mt-4">
                        <label class="form-label"><i class="bi bi-heading me-1"></i> Notification Title</label>
                        <div class="input-group-custom">
                            <span class="input-icon"><i class="bi bi-pencil"></i></span>
                            <input type="text" class="form-control" name="title" id="notificationTitle"
                                placeholder="Enter notification title" required>
                        </div>
                    </div>

                    <!-- Message / Rich Text -->
                    <div class="mt-4">
                        <label class="form-label">
                            <i class="bi bi-text-paragraph me-1"></i> Message
                        </label>

                        <textarea id="notificationMessage" name="notificationMessage">
    </textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn-primary">
                            <i class="bi bi-send me-2"></i> Send Notification
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>





@include('layout.footer')