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
                        <a class="dropdown-item" href="#">
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




    <!-- DASHBOARD -->


    <div class="dashboard">


        <div class="row g-4">


            <!-- LEFT USER BOX -->


            <div class="col-lg-8">


                <div class="card-box">


                    <div class="row align-items-center">


                        <!-- USER DETAILS -->

                        <div class="col-md-7">


                            <div class="title">

                                <i class="bi bi-person"></i>
                                Employee Profile

                            </div>


                            <div class="user-detail">


                                <p>
                                    <i class="bi bi-person-fill"></i>
                                    Name : {{ session('username') }}
                                </p>


                                <p>
                                    <i class="bi bi-envelope"></i>
                                    Email : {{ session('email') }}
                                </p>


                                <p>
                                    <i class="bi bi-fingerprint"></i>
                                    Employee ID : STK1024
                                </p>


                                <p>
                                    <i class="bi bi-geo-alt"></i>
                                    Location : New York
                                </p>


                                <p>
                                    <i class="bi bi-calendar"></i>
                                    Joining Date : 15 March 2025
                                </p>


                            </div>


                        </div>



                        <!-- WATCH -->


                        <div class="col-md-5">


                            <div class="watch">

                                <i class="bi bi-clock"></i>

                            </div>


                            <div class="time" id="clock">

                                00:00:00

                            </div>

                            <div class="">
                                <button class="btn btn">Time in</button>
                            </div>


                        </div>


                    </div>


                </div>



            </div>





            <!-- RIGHT BIRTHDAY BOX -->


            <div class="col-lg-4">


                <div class="card-box">


                    <div class="title">

                        <i class="bi bi-cake"></i>

                        Upcoming Birthday

                    </div>



                    <div class="employee">

                        <i class="bi bi-person"></i>

                        Peter Parker

                        <br>

                        <small>

                            12 August

                        </small>

                    </div>



                    <div class="employee">

                        <i class="bi bi-person"></i>

                        Bruce Wayne

                        <br>

                        <small>

                            25 August

                        </small>

                    </div>



                    <div class="employee">

                        <i class="bi bi-person"></i>

                        Natasha Romanoff

                        <br>

                        <small>

                            02 September

                        </small>

                    </div>



                </div>


            </div>




            <!-- LEAVE STATUS -->


            <div class="col-lg-8">


                <div class="card-box">


                    <div class="title">

                        <i class="bi bi-calendar-x"></i>

                        Leave Status

                    </div>


                    <p>
                        Total Leave : 24 Days
                    </p>


                    <p>
                        Used Leave : 10 Days
                    </p>


                    <p>
                        Remaining Leave : 14 Days
                    </p>



                    <div class="progress">

                        <div class="progress-bar" style="width:42%">

                        </div>

                    </div>


                </div>


            </div>





        </div>


    </div>




    <!-- FOOTER -->


    <footer class="footer">


        <i class="bi bi-shield-check"></i>

        Stark Industries Enterprise Dashboard

        <br>

        © 2026 All Rights Reserved


    </footer>





    <script>


        function clock() {

            let date = new Date();

            let time = date.toLocaleTimeString();


            document.getElementById("clock").innerHTML = time;


        }


        setInterval(clock, 1000);


        clock();


    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>