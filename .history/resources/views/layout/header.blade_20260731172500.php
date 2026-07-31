<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Stark Industries Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/style.css">

</head>


<body>

    <!-- HEADER -->
    <header class="header">
        <div class="d-flex justify-content-between align-items-center">
            <!-- LOGO with dashboard route -->
            <a href="{{ route('dashboard') }}" class="text-decoration-none">
                <div class="logo">
                    <i class="bi bi-robot"></i>
                    Stark Industries
                </div>
            </a>

            <!-- Right side: Notification + Theme + Nav + Profile -->
            <div class="d-flex align-items-center gap-3">
                <!-- NOTIFICATION BELL -->
                <div class="dropdown">
                    <a class="text-decoration-none text-light position-relative d-flex align-items-center"   href="{{ route('notificationPage') }}"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell fs-4" style="color: #5b8cff;"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            style="font-size: 10px; padding: 4px 7px;">
                            0
                            <span class="visually-hidden">unread notifications</span>
                        </span>
                    </a>
                </div>

                <!-- THEME TOGGLE -->
                <button id="themeToggle" class="theme-toggle-btn" title="Toggle Theme">
                    <i class="bi bi-moon-fill" id="themeIcon"></i>
                </button>

                <!-- NAV DROPDOWN (Leave & Attendance - Separate) -->
                <div class="dropdown">
                    <a class="dropdown-toggle text-decoration-none text-light d-flex align-items-center gap-2 nav-dropdown-toggle"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-grid-3x3-gap-fill fs-5" style="color: #5b8cff;"></i>
                        <span style="color: #b8cbea;">Menu</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end nav-dropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                <i class="bi bi-speedometer2 me-2" style="color: #5b8cff;"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('getAlluserAttendance') }}">
                                <i class="bi bi-clock-history me-2" style="color: #5b8cff;"></i>
                                Attendance
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('leaveView') }}">
                                <i class="bi bi-calendar-check me-2" style="color: #28a745;"></i>
                                Leave Management
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- PROFILE DROPDOWN (Settings & Logout - Separate) -->
                <div class="dropdown">
                    <a class="dropdown-toggle text-decoration-none text-light d-flex align-items-center gap-2" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4"></i>
                        {{ session('username') }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end profile-dropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <i class="bi bi-gear me-2"></i>
                                Settings
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <script>
        // ─── THEME TOGGLE ───
        document.addEventListener('DOMContentLoaded', function () {
            const themeToggle = document.getElementById('themeToggle');
            const themeIcon = document.getElementById('themeIcon');

            // Check for saved theme preference
            const savedTheme = localStorage.getItem('theme') || 'dark';

            // Apply saved theme
            if (savedTheme === 'light') {
                document.body.classList.add('light-mode');
                themeIcon.className = 'bi bi-sun-fill';
            } else {
                themeIcon.className = 'bi bi-moon-fill';
            }

            // Toggle theme on button click
            themeToggle.addEventListener('click', function () {
                document.body.classList.toggle('light-mode');

                // Update icon
                if (document.body.classList.contains('light-mode')) {
                    themeIcon.className = 'bi bi-sun-fill';
                    localStorage.setItem('theme', 'light');
                } else {
                    themeIcon.className = 'bi bi-moon-fill';
                    localStorage.setItem('theme', 'dark');
                }
            });
        });
    </script>

    <script>
        function getNotificationCount(){
            fetch("{{ route('NotificationCount') }}")
            .then(Response => response.json())
            .then
        }
    </script>


