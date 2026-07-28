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