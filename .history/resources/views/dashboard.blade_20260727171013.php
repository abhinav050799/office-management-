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
                                    Email : {{ $data->email }}
                                </p>


                                <p>
                                    <i class="bi bi-fingerprint"></i>
                                    Employee ID : {{ $data->account_id }}
                                </p>


                                <p>
                                    <i class="bi bi-geo-alt"></i>
                                    Location : {{ $data->address }}
                                </p>


                                <p>
                                    <i class="bi bi-calendar"></i>
                                    Date : {{ now()->format('d-m-Y') }}
                                </p>


                            </div>


                        </div>



                        <!-- WATCH -->


                        <div class="col-md-5">


                            <div class="watch">
    <!-- MODERN WATCH FACE (SVG) + digital time inside your .watch container -->
    <div style="display: flex; flex-direction: column; align-items: center; width: 100%;">
        
        <!-- SVG ANALOG CLOCK (fits inside .watch) -->
        <svg viewBox="0 0 100 100" style="width: 100%; height: auto; max-width: 180px; display: block;" id="clockSvg">
            <!-- subtle ring -->
            <circle cx="50" cy="50" r="44" fill="none" stroke="rgba(91,140,255,0.1)" stroke-width="1.5"/>
            
            <!-- MAJOR markers (12,3,6,9) -->
            <circle cx="50" cy="6" r="2.8" fill="#b8d0ff" filter="url(#glow)"/>
            <circle cx="50" cy="94" r="2.8" fill="#b8d0ff" filter="url(#glow)"/>
            <circle cx="6" cy="50" r="2.8" fill="#b8d0ff" filter="url(#glow)"/>
            <circle cx="94" cy="50" r="2.8" fill="#b8d0ff" filter="url(#glow)"/>
            
            <!-- MINOR markers -->
            <circle cx="50" cy="16" r="1.8" fill="#8aafe6" opacity="0.8"/>
            <circle cx="50" cy="84" r="1.8" fill="#8aafe6" opacity="0.8"/>
            <circle cx="16" cy="50" r="1.8" fill="#8aafe6" opacity="0.8"/>
            <circle cx="84" cy="50" r="1.8" fill="#8aafe6" opacity="0.8"/>
            <circle cx="72" cy="12" r="1.8" fill="#8aafe6" opacity="0.8"/>
            <circle cx="28" cy="12" r="1.8" fill="#8aafe6" opacity="0.8"/>
            <circle cx="72" cy="88" r="1.8" fill="#8aafe6" opacity="0.8"/>
            <circle cx="28" cy="88" r="1.8" fill="#8aafe6" opacity="0.8"/>
            <circle cx="88" cy="28" r="1.8" fill="#8aafe6" opacity="0.8"/>
            <circle cx="88" cy="72" r="1.8" fill="#8aafe6" opacity="0.8"/>
            <circle cx="12" cy="28" r="1.8" fill="#8aafe6" opacity="0.8"/>
            <circle cx="12" cy="72" r="1.8" fill="#8aafe6" opacity="0.8"/>

            <!-- HANDS (rotated via JS) -->
            <line x1="50" y1="50" x2="50" y2="28" class="hand hour-hand" id="hourHand" 
                  stroke="#b8d0ff" stroke-width="4.5" stroke-linecap="round" filter="url(#glowHand)"/>
            <line x1="50" y1="50" x2="50" y2="20" class="hand minute-hand" id="minuteHand" 
                  stroke="#e0ecff" stroke-width="3" stroke-linecap="round" filter="url(#glowHand)"/>
            <line x1="50" y1="50" x2="50" y2="14" class="hand second-hand" id="secondHand" 
                  stroke="#ff6b6b" stroke-width="2" stroke-linecap="round" filter="url(#glowSec)"/>

            <!-- center dot -->
            <circle cx="50" cy="50" r="5" fill="#5b8cff" filter="url(#glow)"/>
            <circle cx="50" cy="50" r="2.5" fill="#0e1a2b"/>

            <!-- SVG filters for glow -->
            <defs>
                <filter id="glow" x="-20%" y="-20%" width="140%" height="140%">
                    <feGaussianBlur stdDeviation="2" result="blur"/>
                    <feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
                </filter>
                <filter id="glowHand" x="-30%" y="-30%" width="160%" height="160%">
                    <feGaussianBlur stdDeviation="2.5" result="blur"/>
                    <feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
                </filter>
                <filter id="glowSec" x="-40%" y="-40%" width="180%" height="180%">
                    <feGaussianBlur stdDeviation="3" result="blur"/>
                    <feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
                </filter>
            </defs>
        </svg>

        <!-- DIGITAL TIME (styled to fit your .time class) -->
        <div class="time" id="clock" style="margin-top: 12px; font-size: 1.4rem; font-weight: 600; letter-spacing: 2px; 
             background: linear-gradient(135deg, #b8d0ff, #5b8cff); -webkit-background-clip: text; 
             -webkit-text-fill-color: transparent; background-clip: text; 
             text-shadow: 0 0 30px rgba(91,140,255,0.2);">
            00:00:00
        </div>
    </div>
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