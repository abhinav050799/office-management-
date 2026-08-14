<!DOCTYPE html>
<html lang="hi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stark Industries · Register</title>
    <!-- Bootstrap 5 + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Google Font (inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap"
        rel="stylesheet" />
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', sans-serif;
        background: #0b1120;
        /* deep dark blue base */
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
    }


    </style>
</head>

<body>

    <div class="card-register">
        <div class="row g-0">
            <!-- LEFT: Stark Industries brand -->
            <div class="col-lg-5 col-md-12 brand-panel">
                <div class="brand-icon">
                    <i class="bi bi-briefcase-fill"></i>
                </div>
                <h1>
                    Stark<br /><span>Industries</span>
                </h1>
                <div class="tagline">
                    <i class="bi bi-hdd-stack me-2" style="color: #5b8cff;"></i>
                    Office Management · next generation
                </div>
                <div class="office-badge">
                    <i class="bi bi-building"></i>
                    <span>v2.0 · enterprise</span>
                    <i class="bi bi-shield-check ms-2" style="color: #5b8cff;"></i>
                </div>
                <div style="margin-top: 2rem; opacity: 0.3; font-size: 0.8rem; color: #6b87b0;">
                    <i class="bi bi-dot"></i> secure · scalable · smart
                </div>
            </div>

            <!-- RIGHT: Registration form -->
            <div class="col-lg-7 col-md-12 form-panel">
                <div class="form-header">
                    <h3><i class="bi bi-person-plus me-2" style="color: #5b8cff;"></i>Create account</h3>
                    <p>Join Stark Industries · start managing your office</p>
                </div>

               <form action="{{ route('registeruser') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                    <div class="row g-3">
                        <!-- Full name -->
                        
                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-person me-1"></i> Full name</label>
                            <div class="input-group-custom">
                                <span class="input-icon"><i class="bi bi-person"></i></span>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Tony Stark"
                                    required />
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-envelope me-1"></i> Email</label>
                            <div class="input-group-custom">
                                <span class="input-icon"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="tony@stark.com" required />
                            </div>
                        </div>

                        <!-- Department -->
                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-diagram-3 me-1"></i> Department</label>
                            <div class="input-group-custom">
                                <span class="input-icon"><i class="bi bi-briefcase"></i></span>
                                <select class="form-select" name="department" id="department" required>
                                    <option value="" disabled selected>Select department</option>
                                    <option value="R&D">R&D · Engineering</option>
                                    <option value="Operations">Operations</option>
                                    <option value="Finance">Finance</option>
                                    <option value="HR">Human Resources</option>
                                    <option value="IT">IT · Infrastructure</option>
                                    <option value="Management">Management</option>
                                </select>
                            </div>
                        </div>
                        <!-- Role -->
                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-person-badge me-1"></i> Role</label>
                            <div class="input-group-custom">
                                <span class="input-icon"><i class="bi bi-star"></i></span>
                                <select class="form-select" name="role" id="role" required>
                                    <option value="" disabled selected>Select role</option>
                                    <option value="admin">Admin</option>
                                    <option value="manager">Manager</option>
                                    <option value="employee">Employee</option>
                                    <option value="intern">Intern</option>
                                </select>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-lock me-1"></i> Password</label>
                            <div class="input-group-custom">
                                <span class="input-icon"><i class="bi bi-key"></i></span>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="••••••••" required />
                            </div>
                        </div>
                        <!-- Confirm Password -->
                        <div class="col-md-6">
                            <label class="form-label"><i class="bi bi-shield-lock me-1"></i> Confirm</label>
                            <div class="input-group-custom">
                                <span class="input-icon"><i class="bi bi-check-circle"></i></span>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="••••••••" required />
                            </div>
                        </div>

                        <!-- T&C + remember -->
                        <div class="col-12 d-flex flex-wrap align-items-center justify-content-between mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="termsCheck" required />
                                <label class="form-check-label" for="termsCheck">
                                    I agree to <a href="#" style="color: #5b8cff; text-decoration: none;">terms &
                                        conditions</a>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberCheck" />
                                <label class="form-check-label" for="rememberCheck">
                                    Keep me signed in
                                </label>
                            </div>
                        </div>

                        <div class="col-12 mt-2">
                            <button type="submit" class="btn btn-primary-custom">
                                <i class="bi bi-person-plus me-2"></i> Register · Stark
                            </button>
                        </div>
                       

                        <div class="login-link">
                            Already have an account? <a href="#">Log in</a>
                        </div>

                        <div class="divider-line"></div>
                        <div
                            style="display: flex; gap: 1.2rem; justify-content: center; font-size: 0.9rem; color: #6b87b0;">
                            <span><i class="bi bi-shield-check me-1" style="color: #3b7bff;"></i> 256-bit
                                encryption</span>
                            <span><i class="bi bi-clock-history me-1" style="color: #3b7bff;"></i> 24/7 support</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional for any toggles) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>