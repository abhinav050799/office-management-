@include('layout.header')

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

            <div class="notification-card"  data-bs-toggle="modal" data-bs-target="#notificationModal{{ $data->id }}" data-id="{{ $data->id }}" data>

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
                    {{ Str::limit(strip_tags($data->text), 100, '...' )}}
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
<div class="modal fade" id="notificationModal{{ $data->id }}" tabindex="-1">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    🚀 {{ $data->title }}
                </h5>

                <button type="button" 
                        class="btn-close" 
                        data-bs-dismiss="modal">
                </button>

            </div>


            <div class="modal-body">

                <div>
                    <span class="badge-department">
                        {{ $data->department }}
                    </span>

                    <span class="badge-role">
                        {{ $data->role }}
                    </span>
                </div>


                <hr>

               {{--  <!-- { !! data->text!!} {{ !! iski vajah se ise html samjh raha hai agar me {{ data->text }} to php ise text samjhta -->
                <div class="notification-full-text">

                    {!! $data->text !!}

                </div>


                <hr>


                <div>
                    <i class="bi bi-calendar3"></i>

                    {{ \Carbon\Carbon::parse($data->created_at)->format('F d,Y') }}

                    <br>

                    <i class="bi bi-clock"></i>

                    {{ \Carbon\Carbon::parse($data->created_at)->format('h:i A') }}

                </div>


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

    <textarea 
        id="notificationMessage" 
        name="notificationMessage">
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