<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Stark Industries Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #070d1a;
            color: #fff;
            min-height: 100vh;
        }


        /* HEADER */

        .header {
            background: #0e1a2b;
            padding: 20px 40px;
            box-shadow: 0 10px 30px #000;
        }

        .logo {
            font-size: 28px;
            font-weight: 800;
            color: #5b8cff;
        }

        .header a {
            color: #9bb2d9;
            text-decoration: none;
        }


        /* MAIN */

        .dashboard {
            padding: 40px;
        }


        /* CARDS */

        .card-box {

            background: #0e1a2b;
            border-radius: 25px;
            padding: 30px;

            box-shadow:
                0 20px 50px rgba(0, 0, 0, .6),
                0 0 0 1px rgba(91, 140, 255, .15);

            height: 100%;
        }


        .title {

            color: #5b8cff;
            font-size: 22px;
            font-weight: 700;

            margin-bottom: 20px;

        }


        /* USER */

        .user-detail p {

            color: #b8cbea;
            margin-bottom: 12px;

        }


        .user-detail i {

            color: #5b8cff;
            margin-right: 10px;

        }


        /* WATCH */

        .watch {

            width: 150px;
            height: 150px;

            border-radius: 50%;

            background: #091426;

            border: 8px solid #5b8cff;

            display: flex;
            justify-content: center;
            align-items: center;

            margin: auto;

            font-size: 40px;

            box-shadow:
                0 0 40px rgba(91, 140, 255, .5);

        }


        .time {

            text-align: center;

            margin-top: 20px;

            font-size: 25px;

            color: #5b8cff;

        }


        /* BIRTHDAY */


        .employee {

            background: #091426;

            padding: 15px;

            border-radius: 15px;

            margin-bottom: 15px;

        }


        .employee i {

            color: #5b8cff;

        }



        /* LEAVE */


        .progress {

            height: 12px;

            background: #182942;

        }

        .progress-bar {

            background: #1b4bff;

        }


        /* FOOTER */


        .footer {

            background: #0e1a2b;

            padding: 20px;

            text-align: center;

            color: #8ba6d0;

            margin-top: 30px;

        }


        @media(max-width:768px) {

            .dashboard {
                padding: 20px;
            }

            .header {
                padding: 20px;
            }

        }
        .dropdown-menu{
    background:#0e1a2b;
    border:1px solid rgba(91,140,255,.2);
    border-radius:15px;
    padding:10px;
}

.dropdown-item{
    color:#bdd2f5;
    border-radius:10px;
}

.dropdown-item:hover{
    background:#1b4bff;
    color:white;
}

    </style>

</head>


<body>


    <!-- HEADER -->

    <header class="header">

        <div class="d-flex justify-content-between align-items-center">

            <div class="logo">

                <i class="bi bi-building"></i>
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

    </header>

