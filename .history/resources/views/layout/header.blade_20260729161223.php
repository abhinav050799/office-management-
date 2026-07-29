<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Stark Industries Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <link href="" style="s">

</head>


<body>


    <!-- HEADER -->

    <header class="header">

        <div class="d-flex justify-content-between align-items-center">

            <div class="logo">

                <i class="bi bi-robot"></i>
                Stark Industries

            </div>


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

