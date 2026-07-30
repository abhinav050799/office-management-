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


                        <!-- <div class="watch">

                                

                                
                            </div> -->

                        <div class="clock-card">

                            <!-- MODERN WATCH FACE (SVG) -->
                            <div class="watch">
                                <!-- MODERN WATCH FACE (SVG) -->
                                <div style="display: flex; flex-direction: column; align-items: center; width: 100%;">

                                    <svg viewBox="0 0 100 100" style="width: 100%; max-width: 170px; height: auto;"
                                        id="clockSvg">
                                        <circle cx="50" cy="50" r="44" fill="none" stroke="rgba(91,140,255,0.1)"
                                            stroke-width="1.5" />

                                        <!-- MAJOR markers -->
                                        <circle cx="50" cy="6" r="2.8" fill="#b8d0ff" />
                                        <circle cx="50" cy="94" r="2.8" fill="#b8d0ff" />
                                        <circle cx="6" cy="50" r="2.8" fill="#b8d0ff" />
                                        <circle cx="94" cy="50" r="2.8" fill="#b8d0ff" />

                                        <!-- MINOR markers -->
                                        <circle cx="50" cy="16" r="1.8" fill="#8aafe6" opacity="0.8" />
                                        <circle cx="50" cy="84" r="1.8" fill="#8aafe6" opacity="0.8" />
                                        <circle cx="16" cy="50" r="1.8" fill="#8aafe6" opacity="0.8" />
                                        <circle cx="84" cy="50" r="1.8" fill="#8aafe6" opacity="0.8" />
                                        <circle cx="72" cy="12" r="1.8" fill="#8aafe6" opacity="0.8" />
                                        <circle cx="28" cy="12" r="1.8" fill="#8aafe6" opacity="0.8" />
                                        <circle cx="72" cy="88" r="1.8" fill="#8aafe6" opacity="0.8" />
                                        <circle cx="28" cy="88" r="1.8" fill="#8aafe6" opacity="0.8" />
                                        <circle cx="88" cy="28" r="1.8" fill="#8aafe6" opacity="0.8" />
                                        <circle cx="88" cy="72" r="1.8" fill="#8aafe6" opacity="0.8" />
                                        <circle cx="12" cy="28" r="1.8" fill="#8aafe6" opacity="0.8" />
                                        <circle cx="12" cy="72" r="1.8" fill="#8aafe6" opacity="0.8" />

                                        <!-- HANDS -->
                                        <line x1="50" y1="50" x2="50" y2="28" class="hand hour-hand" id="hourHand"
                                            stroke="#b8d0ff" stroke-width="4.5" stroke-linecap="round" />
                                        <line x1="50" y1="50" x2="50" y2="20" class="hand minute-hand" id="minuteHand"
                                            stroke="#e0ecff" stroke-width="3" stroke-linecap="round" />
                                        <line x1="50" y1="50" x2="50" y2="14" class="hand second-hand" id="secondHand"
                                            stroke="#ff6b6b" stroke-width="2" stroke-linecap="round" />

                                        <!-- center dot -->
                                        <circle cx="50" cy="50" r="5" fill="#5b8cff" />
                                        <circle cx="50" cy="50" r="2.5" fill="#0e1a2b" />
                                    </svg>

                                    <!-- DIGITAL TIME in 24-hour format -->
                                    <!-- <div class="time" id="clock" style="margin-top: 12px; font-size: 1.4rem; font-weight: 600; letter-spacing: 2px; 
             background: linear-gradient(135deg, #b8d0ff, #5b8cff); -webkit-background-clip: text; 
             -webkit-text-fill-color: transparent; background-clip: text;">
            00:00:00
        </div> -->
                                </div>
                            </div>
                        </div>


                        <!-- <div class="time" id="clock">

                                00:00:00

                            </div> -->
                        <div class="time" id="clock" style="margin-top: 12px; font-size: 1.4rem; font-weight: 600; letter-spacing: 2px; 
             background: linear-gradient(135deg, #b8d0ff, #5b8cff); -webkit-background-clip: text; 
             -webkit-text-fill-color: transparent; background-clip: text;">
                            00:00:00
                        </div>

                        <div class="timeinout">
                           @if(!$attendance)
                            <form action="{{ route('timein') }}" method="POST">
                                @csrf
                                <button class="btn btn-success" onclick="return confirm('Are your sure you want to time-in?')">Time in</button>
                            </form>
                            @elseif($attendance && !$attendance->timeout)
                            <form action="{{ route('timeout') }}" method="POST">
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to time-out?')">Time out </button>
                            </form>
                            @endif
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

                @foreach ($upcominbirthday as $upBirthday )
                
                

                <div class="employee">

                    <i class="bi bi-person"></i>

                    {{ $upBirthday->name }}

                    <br>

                    <small>

                        {{ \Carbon\Carbon::parse($upBirthday->dob)->year(now()->year)->format('d-m-y,l') }}

                    </small>

                </div>
                @endforeach
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
                    Total Leave : {{ $leaveTotal }} Days
                </p>


                <p>
                    Used Leave : {{ $totalleaveTaken }} Days
                </p>


                <p>
                    Remaining Leave : {{ $remainingLeave }} Days
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





<!-- <script>


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


</script> -->



<script>
    (function () {
        "use strict";

        // DOM refs
        const hourHand = document.getElementById('hourHand');
        const minuteHand = document.getElementById('minuteHand');
        const secondHand = document.getElementById('secondHand');
        const digitalClock = document.getElementById('clock');

        // ─── CLOCK UPDATE ───
        function updateClock() {
    const now = new Date();
    const istTime = new Date(now.toLocaleString('en-US', { timeZone: 'Asia/Kolkata' }));

    let hours = istTime.getHours();
    const minutes = istTime.getMinutes();
    const seconds = istTime.getSeconds();

    const ampm = hours >= 12 ? 'PM' : 'AM';

    hours = hours % 12;
    hours = hours ? hours : 12; // 0 को 12 बनाना

    const pad = (n) => String(n).padStart(2, '0');

    // Digital time 12-hour format
    digitalClock.textContent = `${hours}:${pad(minutes)}:${pad(seconds)} ${ampm}`;

    // Clock hand angles
    const secDeg = seconds * 6;
    const minDeg = minutes * 6 + seconds * 0.1;
    const hourDeg = (hours % 12) * 30 + minutes * 0.5;

    hourHand.setAttribute('transform', `rotate(${hourDeg}, 50, 50)`);
    minuteHand.setAttribute('transform', `rotate(${minDeg}, 50, 50)`);
    secondHand.setAttribute('transform', `rotate(${secDeg}, 50, 50)`);
}

        // ─── RUN & SYNC ───
        updateClock();
        setInterval(updateClock, 1000);

        document.addEventListener('visibilitychange', () => {
            if (!document.hidden) updateClock();
        });

    })();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>