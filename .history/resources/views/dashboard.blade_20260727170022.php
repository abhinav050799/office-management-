@include('layout.header')


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
                                    Name : {{ $data->name }}
                                </p>


                                <p>
                                    <i class="bi bi-envelope"></i>
                                    Email : {{  }}
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

                            <div class="timeinout">
                                <button class="btn btn-success">Time in</button>
                                <button class="btn btn-danger">Time out </button>
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




@include('layout.footer')





    <script>


        function clock() {

            let date = new Date();

            // let time = date.toLocaleTimeString();
  let time = date.toLocaleTimeString('en-IN', {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: true
    });

            document.getElementById("clock").innerHTML = time;


        }


        setInterval(clock, 1000);


        clock();


    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>