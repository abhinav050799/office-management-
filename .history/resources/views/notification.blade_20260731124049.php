@include('layout.header');

<style>
    /* ─── BASE ─── */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', 'Segoe UI', sans-serif;
        background: #070d1a;
        color: #fff;
        min-height: 100vh;
        padding: 30px;
        transition: all 0.3s ease;
    }

    /* ─── PAGE HEADER ─── */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 30px;
    }

    .page-title {
        font-size: 28px;
        font-weight: 700;
        color: #5b8cff;
    }

    .page-title i {
        margin-right: 12px;
    }

    .page-title span {
        color: #b8cbea;
        font-weight: 400;
        font-size: 16px;
        margin-left: 10px;
    }

    /* ─── ADD NOTIFICATION BUTTON ─── */
    .btn-add-notification {
        background: linear-gradient(135deg, #5b8cff, #4a7ae6);
        border: none;
        border-radius: 50px;
        padding: 12px 28px;
        color: #fff;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(91, 140, 255, 0.3);
    }

    .btn-add-notification:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(91, 140, 255, 0.5);
        color: #fff;
        background: linear-gradient(135deg, #4a7ae6, #3a6ad6);
    }

    .btn-add-notification i {
        margin-right: 10px;
    }

    /* ─── NOTIFICATION CARDS ─── */
    .notification-card {
        background: #0e1a2b;
        border-radius: 20px;
        padding: 24px;
        margin-bottom: 20px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(91, 140, 255, 0.1);
        transition: all 0.3s ease;
        border-left: 4px solid #5b8cff;
    }

    .notification-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(91, 140, 255, 0.2);
    }

    .notification-card .card-header-custom {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 12px;
    }

    .notification-card .badge-department {
        background: rgba(91, 140, 255, 0.15);
        color: #5b8cff;
        padding: 4px 14px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
    }

    .notification-card .badge-role {
        background: rgba(40, 167, 69, 0.15);
        color: #28a745;
        padding: 4px 14px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
    }

    .notification-card .badge-all {
        background: rgba(255, 193, 7, 0.15);
        color: #ffc107;
        padding: 4px 14px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
    }

    .notification-card .notification-title {
        font-size: 18px;
        font-weight: 600;
        color: #fff;
        margin-bottom: 8px;
    }

    .notification-card .notification-text {
        color: #b8cbea;
        line-height: 1.6;
        font-size: 14px;
    }

    .notification-card .notification-text a {
        color: #5b8cff;
        text-decoration: none;
    }

    .notification-card .notification-text a:hover {
        text-decoration: underline;
    }

    .notification-card .notification-meta {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-top: 14px;
        padding-top: 14px;
        border-top: 1px solid rgba(91, 140, 255, 0.08);
        font-size: 13px;
        color: #6d89b8;
    }

    .notification-card .notification-meta i {
        margin-right: 6px;
    }

    .notification-card .btn-delete {
        background: rgba(220, 53, 69, 0.1);
        border: none;
        color: #dc3545;
        padding: 6px 14px;
        border-radius: 8px;
        transition: all 0.2s ease;
        font-size: 13px;
    }

    .notification-card .btn-delete:hover {
        background: rgba(220, 53, 69, 0.2);
        transform: scale(1.05);
    }

    /* ─── MODAL ─── */
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
        color: #5b8cff;
        font-weight: 700;
        font-size: 22px;
    }

    .modal-header .modal-title i {
        margin-right: 12px;
    }

    .modal-header .btn-close {
        filter: brightness(0) invert(1);
        opacity: 0.6;
    }

    .modal-header .btn-close:hover {
        opacity: 1;
    }

    .modal-body {
        padding: 30px;
    }

    .modal-footer {
        border-top: 1px solid rgba(91, 140, 255, 0.1);
        padding: 20px 30px;
    }

    /* ─── FORM STYLES ─── */
    .form-label {
        color: #b8cbea;
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .form-label i {
        color: #5b8cff;
    }

    .input-group-custom {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #5b8cff;
        z-index: 10;
        font-size: 18px;
    }

    .form-select,
    .form-control {
        background: #091426 !important;
        border: 1px solid rgba(91, 140, 255, 0.15);
        color: #fff !important;
        border-radius: 12px;
        padding: 12px 16px 12px 46px;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .form-select:focus,
    .form-control:focus {
        border-color: #5b8cff;
        box-shadow: 0 0 0 0.25rem rgba(91, 140, 255, 0.15);
    }

    .form-select option {
        background: #0e1a2b;
        color: #fff;
    }

    .form-control::placeholder {
        color: #6d89b8 !important;
        opacity: 0.7;
    }

    .form-select option {
        padding: 8px;
    }

    /* ─── RICH TEXT EDITOR (simple) ─── */
    .rich-text-editor {
        background: #091426;
        border: 1px solid rgba(91, 140, 255, 0.15);
        border-radius: 12px;
        overflow: hidden;
    }

    .rich-text-toolbar {
        display: flex;
        gap: 6px;
        padding: 8px 12px;
        background: rgba(91, 140, 255, 0.05);
        border-bottom: 1px solid rgba(91, 140, 255, 0.08);
        flex-wrap: wrap;
    }

    .rich-text-toolbar button {
        background: transparent;
        border: none;
        color: #b8cbea;
        padding: 4px 10px;
        border-radius: 6px;
        transition: all 0.2s ease;
        font-size: 14px;
    }

    .rich-text-toolbar button:hover {
        background: rgba(91, 140, 255, 0.15);
        color: #fff;
    }

    .rich-text-toolbar .divider {
        width: 1px;
        background: rgba(91, 140, 255, 0.1);
        margin: 0 4px;
    }

    .rich-text-editor textarea {
        background: transparent;
        border: none;
        color: #fff;
        padding: 16px;
        width: 100%;
        min-height: 120px;
        resize: vertical;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        line-height: 1.6;
    }

    .rich-text-editor textarea:focus {
        outline: none;
    }

    .rich-text-editor textarea::placeholder {
        color: #6d89b8;
    }

    /* ─── MODAL BUTTONS ─── */
    .modal-footer .btn-secondary {
        background: transparent;
        border: 1px solid rgba(91, 140, 255, 0.2);
        color: #b8cbea;
        border-radius: 50px;
        padding: 10px 28px;
        transition: all 0.3s ease;
    }

    .modal-footer .btn-secondary:hover {
        background: rgba(91, 140, 255, 0.1);
        border-color: #5b8cff;
    }

    .modal-footer .btn-primary {
        background: linear-gradient(135deg, #5b8cff, #4a7ae6);
        border: none;
        border-radius: 50px;
        padding: 10px 28px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .modal-footer .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(91, 140, 255, 0.4);
    }

    /* ─── EMPTY STATE ─── */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-state i {
        font-size: 60px;
        color: rgba(91, 140, 255, 0.2);
        margin-bottom: 20px;
    }

    .empty-state h4 {
        color: #b8cbea;
        margin-bottom: 10px;
    }

    .empty-state p {
        color: #6d89b8;
    }

    /* ─── LIGHT MODE ─── */
    body.light-mode {
        background: #f0f4ff;
    }

    body.light-mode .page-title {
        color: #1a1a2e;
    }

    body.light-mode .page-title span {
        color: #666;
    }

    body.light-mode .notification-card {
        background: #ffffff;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
        border-left-color: #4a7ae6;
    }

    body.light-mode .notification-card .notification-title {
        color: #1a1a2e;
    }

    body.light-mode .notification-card .notification-text {
        color: #2d2d44;
    }

    body.light-mode .notification-card .notification-meta {
        color: #999;
        border-top-color: rgba(0, 0, 0, 0.05);
    }

    body.light-mode .notification-card .badge-department {
        background: rgba(74, 122, 230, 0.1);
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

    body.light-mode .form-label {
        color: #1a1a2e;
    }

    body.light-mode .form-select,
    body.light-mode .form-control {
        background: #f8faff !important;
        border-color: #d0d9f0 !important;
        color: #1a1a2e !important;
    }

    body.light-mode .form-select option {
        background: #ffffff;
        color: #1a1a2e;
    }

    body.light-mode .form-control::placeholder {
        color: #999 !important;
    }

    body.light-mode .rich-text-editor {
        background: #f8faff;
        border-color: #d0d9f0;
    }

    body.light-mode .rich-text-toolbar {
        background: rgba(0, 0, 0, 0.03);
        border-bottom-color: rgba(0, 0, 0, 0.05);
    }

    body.light-mode .rich-text-toolbar button {
        color: #2d2d44;
    }

    body.light-mode .rich-text-toolbar button:hover {
        background: rgba(0, 0, 0, 0.05);
    }

    body.light-mode .rich-text-editor textarea {
        color: #1a1a2e;
    }

    body.light-mode .rich-text-editor textarea::placeholder {
        color: #999;
    }

    body.light-mode .modal-footer .btn-secondary {
        color: #1a1a2e;
        border-color: #d0d9f0;
    }

    body.light-mode .modal-footer .btn-secondary:hover {
        background: #f0f4ff;
    }

    body.light-mode .empty-state i {
        color: rgba(0, 0, 0, 0.1);
    }

    body.light-mode .empty-state h4 {
        color: #1a1a2e;
    }

    body.light-mode .empty-state p {
        color: #999;
    }

    /* ─── RESPONSIVE ─── */
    @media (max-width: 768px) {
        body {
            padding: 15px;
        }

        .page-title {
            font-size: 22px;
        }

        .page-title span {
            display: block;
            font-size: 14px;
            margin-left: 0;
            margin-top: 4px;
        }

        .btn-add-notification {
            padding: 10px 20px;
            font-size: 14px;
            width: 100%;
            justify-content: center;
        }

        .notification-card {
            padding: 18px;
        }

        .notification-card .card-header-custom {
            flex-direction: column;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-header {
            padding: 16px 20px;
        }

        .modal-footer {
            flex-direction: column;
            gap: 10px;
        }

        .modal-footer .btn {
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .page-header {
            flex-direction: column;
            align-items: stretch;
        }

        .notification-card .notification-meta {
            flex-wrap: wrap;
            gap: 10px;
        }
    }
</style>
</head>

<body>
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
        @foreach($data as $data)
        <!-- Sample Notification 1 -->
        <div class="notification-card" data-id="1">
            <div class="card-header-custom">
                <div>
                    <span class="badge-department"><i class="bi bi-diagram-3 me-1"></i>{{ $data->department }}</span>
                    <span class="badge-role"><i class="bi bi-star me-1"></i>{{ $data->role }}</span>
                </div>
                <div>
                    <button class="btn-delete" onclick="deleteNotification(this)">
                        <i class="bi bi-trash3 me-1"></i> Delete
                    </button>
                </div>
            </div>
            <div class="notification-title">🚀 {{ $data->title }}</div>
            <div class="notification-text">
            {{ $data->text }} 
            </div>
            <div class="notification-meta">
                <span><i class="bi bi-calendar3"></i> {{\Carbon\Carbon::parse( $data->created_at )->format('F d,Y')}}</span>
                <span><i class="bi bi-clock"></i>{{\Carbon\Carbon::parse($data->created_at)->format('h:i A')  }}</span>
                <span><i class="bi bi-eye"></i> Sent to: R&D · Manager</span>
            </div>
        </div>

        <!-- Sample Notification 2 - All departments -->
        <div class="notification-card" data-id="2">
            <div class="card-header-custom">
                <div>
                    <span class="badge-all"><i class="bi bi-globe2 me-1"></i> All Departments</span>
                    <span class="badge-role"><i class="bi bi-star me-1"></i> Employee</span>
                </div>
                <div>
                    <button class="btn-delete" onclick="deleteNotification(this)">
                        <i class="bi bi-trash3 me-1"></i> Delete
                    </button>
                </div>
            </div>
            <div class="notification-title">📢 Company Town Hall</div>
            <div class="notification-text">
                Join us for the <strong>Quarterly Town Hall Meeting</strong> on August 5th at 3:00 PM.
                <ul style="margin-top: 8px; padding-left: 20px; color: #b8cbea;">
                    <li>Review of Q2 performance</li>
                    <li>Upcoming projects</li>
                    <li>Q&A session</li>
                </ul>
            </div>
            <div class="notification-meta">
                <span><i class="bi bi-calendar3"></i> July 29, 2026</span>
                <span><i class="bi bi-clock"></i> 2:15 PM</span>
                <span><i class="bi bi-eye"></i> Sent to: All · Employee</span>
            </div>
        </div>

        <!-- Empty State (hidden by default, shown when no notifications) -->
        <div class="empty-state" id="emptyState" style="display: none;">
            <i class="bi bi-bell-slash"></i>
            <h4>No Notifications</h4>
            <p>Click the "Add Notification" button to create your first notification.</p>
        </div>
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
                            <label class="form-label"><i class="bi bi-text-paragraph me-1"></i> Message</label>
                            <div class="rich-text-editor">
                                <div class="rich-text-toolbar">
                                    <button type="button" onclick="formatText('bold')"><b>B</b></button>
                                    <button type="button" onclick="formatText('italic')"><i>I</i></button>
                                    <button type="button" onclick="formatText('underline')"><u>U</u></button>
                                    <span class="divider"></span>
                                    <button type="button" onclick="insertList()"><i class="bi bi-list-ul"></i></button>
                                    <button type="button" onclick="insertLink()"><i
                                            class="bi bi-link-45deg"></i></button>
                                    <span class="divider"></span>
                                    <button type="button" onclick="clearFormatting()"><i
                                            class="bi bi-eraser"></i></button>
                                </div>
                                <textarea id="notificationMessage" name="notificationMessage"
                                    placeholder="Write your notification message here... You can use HTML tags like <strong>, <em>, <ul>, <a> etc."></textarea>
                            </div>
                            <small class="text-muted mt-2 d-block">
                                <i class="bi bi-info-circle me-1"></i> HTML tags supported: &lt;strong&gt;, &lt;em&gt;,
                                &lt;ul&gt;, &lt;a&gt;, &lt;br&gt;
                            </small>
                        </div>
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


    
    @include('layout.footer');