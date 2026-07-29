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
                            <form action="{{ route('timein') }}" method="POST">
                                @csrf
                                <button class="btn btn-success" onclick="re">Time in</button>
                            </form>
                            <form action="{{ route('timeout') }}" method="POST">
                                @csrf
                                <button class="btn btn-danger">Time out </button>
                            </form>
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


<style>
    /* ─── CARD (exactly like your .watch container) ─── */
    .clock-card {
        background: #0e1a2b;
        border-radius: 40px;
        padding: 40px 30px 35px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.8), 0 0 0 1px rgba(91, 140, 255, 0.2);
        text-align: center;
        width: 340px;
        transition: all 0.2s ease;
    }

    /* ─── MODERN WATCH FACE ─── */
    .watch {
        width: 180px;
        height: 180px;
        margin: 0 auto 20px;
        border-radius: 50%;
        background: radial-gradient(circle at 30% 30%, #14243e, #091426);
        border: 6px solid #5b8cff;
        box-shadow:
            0 0 0 4px rgba(91, 140, 255, 0.2),
            0 0 40px rgba(91, 140, 255, 0.4),
            inset 0 0 30px rgba(0, 0, 0, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        transition: box-shadow 0.3s;
    }

    /* subtle glow on hover */
    .watch:hover {
        box-shadow:
            0 0 0 6px rgba(91, 140, 255, 0.25),
            0 0 60px rgba(91, 140, 255, 0.6),
            inset 0 0 30px rgba(0, 0, 0, 0.7);
    }

    /* ─── CLOCK HANDS (SVG) ─── */
    .clock-svg {
        width: 100%;
        height: 100%;
        transform: rotate(-90deg);
        /* 12 o'clock = top */
    }

    /* hands – all start at 12 o'clock */
    .hand {
        stroke-linecap: round;
        transition: transform 0.05s linear;
        /* smooth tick */
    }

    .hour-hand {
        stroke: #b8d0ff;
        stroke-width: 5;
        filter: drop-shadow(0 0 6px rgba(91, 140, 255, 0.5));
    }

    .minute-hand {
        stroke: #e0ecff;
        stroke-width: 3.5;
        filter: drop-shadow(0 0 8px rgba(91, 140, 255, 0.6));
    }

    .second-hand {
        stroke: #ff6b6b;
        stroke-width: 2;
        filter: drop-shadow(0 0 12px #ff6b6b);
    }

    /* center dot */
    .center-dot {
        fill: #5b8cff;
        r: 5;
        filter: drop-shadow(0 0 10px #5b8cff);
    }

    /* hour markers (tiny dots) */
    .marker {
        fill: #8aafe6;
        opacity: 0.7;
    }

    .marker-major {
        fill: #b8d0ff;
        opacity: 1;
    }

    /* ─── DIGITAL TIME (below watch) ─── */
    .digital-time {
        font-size: 2.4rem;
        font-weight: 600;
        letter-spacing: 3px;
        background: linear-gradient(135deg, #b8d0ff, #5b8cff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 0 0 20px rgba(91, 140, 255, 0.3);
        margin-top: 6px;
        font-variant-numeric: tabular-nums;
    }

    /* small date / label */
    .clock-label {
        color: #6d89b8;
        font-size: 0.85rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-top: 8px;
        opacity: 0.7;
    }

    /* ─── RESPONSIVE TWEAK ─── */
    @media (max-width: 480px) {
        .clock-card {
            width: 290px;
            padding: 30px 20px 25px;
        }

        .watch {
            width: 150px;
            height: 150px;
        }

        .digital-time {
            font-size: 2rem;
        }
    }
</style>

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
            // Get current time in India timezone (IST)
            const now = new Date();
            // Convert to IST (UTC +5:30)
            const istTime = new Date(now.toLocaleString('en-US', { timeZone: 'Asia/Kolkata' }));

            let hours = istTime.getHours();
            const minutes = istTime.getMinutes();
            const seconds = istTime.getSeconds();

            // 24-hour format (no AM/PM)
            const pad = (n) => String(n).padStart(2, '0');

            // Digital time in 24-hour format
            digitalClock.textContent = `${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;

            // ── SVG hand angles (in degrees) ──
            const secDeg = seconds * 6;
            const minDeg = minutes * 6 + seconds * 0.1;
            const hourDeg = (hours % 12) * 30 + minutes * 0.5;

            // apply rotation
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