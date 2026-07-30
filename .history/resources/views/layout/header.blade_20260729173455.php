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

            <div class="logo">

                <i class="bi bi-robot"></i>
                Stark Industries

            </div>

 <button id="themeToggle" class="theme-toggle-btn" title="Toggle Theme">
                <i class="bi bi-moon-fill" id="themeIcon"></i>
            </button>

            <div class="dropdown">

                <a class="dropdown-toggle text-decoration-none text-light d-flex align-items-center gap-2" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    <i class="bi bi-person-circle fs-4"></i>

                    {{ session('username') }}

                </a>


                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <a class="dropdown-item" href="{{ url('profile') }}">
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

    </header>
    <script>
    // ─── THEME TOGGLE ───
    document.addEventListener('DOMContentLoaded', function() {
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
        themeToggle.addEventListener('click', function() {
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

