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

