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

    .card-register {
        max-width: 1200px;
        width: 100%;
        background: #0f172a;
        /* dark blue slate */
        border-radius: 2.5rem;
        box-shadow: 0 25px 50px -8px rgba(0, 0, 0, 0.8), 0 0 0 1px rgba(56, 132, 255, 0.15);
        overflow: hidden;
        backdrop-filter: blur(2px);
        transition: all 0.2s;
    }

    /* left side – brand panel */
    .brand-panel {
        background: linear-gradient(145deg, #0b1a30, #0f1f3a);
        padding: 3rem 2.5rem;
        height: 100%;
        min-height: 480px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        border-right: 1px solid rgba(56, 132, 255, 0.2);
    }

    .brand-panel .brand-icon {
        font-size: 3.8rem;
        color: #5b8cff;
        text-shadow: 0 0 20px rgba(43, 100, 255, 0.3);
        margin-bottom: 1.5rem;
    }

    .brand-panel h1 {
        font-weight: 700;
        font-size: 3.2rem;
        letter-spacing: -0.02em;
        color: #e8f0ff;
        line-height: 1.1;
    }

    .brand-panel h1 span {
        color: #5b8cff;
        background: linear-gradient(135deg, #5b8cff, #a0c0ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .brand-panel .tagline {
        font-weight: 400;
        font-size: 1.1rem;
        color: #94a9c9;
        margin-top: 1rem;
        letter-spacing: 0.3px;
        border-left: 4px solid #2b64ff;
        padding-left: 1.2rem;
        background: rgba(43, 100, 255, 0.06);
        border-radius: 0 8px 8px 0;
    }

    .brand-panel .office-badge {
        margin-top: 2.2rem;
        display: flex;
        align-items: center;
        gap: 0.7rem;
        color: #b4c9f0;
        font-size: 0.95rem;
        background: rgba(20, 50, 100, 0.35);
        padding: 0.7rem 1.3rem;
        border-radius: 60px;
        backdrop-filter: blur(4px);
        border: 1px solid rgba(56, 132, 255, 0.2);
        width: fit-content;
    }

    .brand-panel .office-badge i {
        color: #5b8cff;
        font-size: 1.2rem;
    }

    /* right side – form */
    .form-panel {
        padding: 2.8rem 2.8rem 2.8rem 2.5rem;
        background: #111d33;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .form-panel .form-header {
        margin-bottom: 2.2rem;
    }

    .form-panel .form-header h3 {
        font-weight: 600;
        color: #eef5ff;
        font-size: 1.9rem;
        letter-spacing: -0.3px;
    }

    .form-panel .form-header p {
        color: #90a9cf;
        font-size: 0.95rem;
        margin-top: 0.3rem;
    }

    .form-control,
    .form-select {
        background: #0b1729 !important;
        border: 1px solid #253a5a !important;
        color: #e2edff !important;
        padding: 0.7rem 1rem;
        border-radius: 16px;
        font-size: 0.95rem;
        transition: 0.2s;
        box-shadow: none !important;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #3b7bff !important;
        background: #0b1a30 !important;
        box-shadow: 0 0 0 4px rgba(43, 100, 255, 0.15) !important;
    }

    .form-control::placeholder {
        color: #5f7a9f;
        font-weight: 400;
        opacity: 0.8;
    }

    .input-group-custom {
        position: relative;
    }

    .input-group-custom .form-control {
        padding-left: 2.8rem;
    }

    .input-group-custom .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #5f7a9f;
        font-size: 1.2rem;
        z-index: 4;
        pointer-events: none;
    }

    .form-label {
        color: #b8cef0;
        font-weight: 500;
        font-size: 0.9rem;
        margin-bottom: 0.3rem;
        letter-spacing: 0.2px;
    }

    .btn-primary-custom {
        background: #1b4bff;
        border: none;
        padding: 0.8rem 1.8rem;
        border-radius: 60px;
        font-weight: 600;
        color: white;
        width: 100%;
        font-size: 1.05rem;
        transition: 0.2s;
        box-shadow: 0 8px 18px -6px #0b2b6e;
        letter-spacing: 0.5px;
        border: 1px solid #3b7bff;
    }

    .btn-primary-custom:hover {
        background: #2b5eff;
        transform: scale(1.02);
        box-shadow: 0 12px 24px -8px #0b2b6e;
        border-color: #5b8cff;
    }

    .btn-primary-custom:active {
        transform: scale(0.97);
    }

    .login-link {
        color: #90a9cf;
        text-align: center;
        margin-top: 1.8rem;
        font-size: 0.95rem;
    }

    .login-link a {
        color: #5b8cff;
        font-weight: 600;
        text-decoration: none;
        border-bottom: 1px dotted #2b64ff;
    }

    .login-link a:hover {
        color: #7aa0ff;
        border-bottom: 1px solid #7aa0ff;
    }

    .form-check-label {
        color: #b0c8ed;
        font-size: 0.9rem;
    }

    .form-check-input {
        background-color: #0b1729;
        border: 1px solid #2a4a6e;
    }

    .form-check-input:checked {
        background-color: #1b4bff;
        border-color: #1b4bff;
    }

    .divider-line {
        border-top: 1px solid #253a5a;
        margin: 1.2rem 0 1.8rem 0;
        opacity: 0.5;
    }

    /* responsive */
    @media (max-width: 768px) {
        .brand-panel {
            border-right: none;
            border-bottom: 1px solid rgba(56, 132, 255, 0.2);
            min-height: 200px;
            padding: 2rem 1.5rem;
        }

        .brand-panel h1 {
            font-size: 2.5rem;
        }

        .form-panel {
            padding: 2rem 1.5rem;
        }

        .card-register {
            border-radius: 1.8rem;
        }
    }

    @media (max-width: 480px) {
        .brand-panel h1 {
            font-size: 2rem;
        }

        .brand-panel .brand-icon {
            font-size: 2.8rem;
        }
    }

    /* custom scroll */
    ::-webkit-scrollbar {
        width: 6px;
        background: #0b1729;
    }

    ::-webkit-scrollbar-thumb {
        background: #2b4b7a;
        border-radius: 12px;
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