<!DOCTYPE html>
<html lang="hi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Stark Industries · Login & Register</title>
  <!-- Bootstrap 5 + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <!-- Google Font (Inter) -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: #070d1a;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
      position: relative;
    }

    /* subtle animated background glow */
    body::before {
      content: '';
      position: fixed;
      top: -40%;
      left: -20%;
      width: 80%;
      height: 80%;
      background: radial-gradient(circle, rgba(30, 80, 200, 0.08) 0%, transparent 70%);
      pointer-events: none;
      z-index: 0;
      animation: pulseGlow 12s infinite alternate;
    }

    @keyframes pulseGlow {
      0% {
        transform: scale(1) translate(0, 0);
        opacity: 0.4;
      }
      100% {
        transform: scale(1.3) translate(10%, 10%);
        opacity: 0.9;
      }
    }

    .card-auth {
      max-width: 1240px;
      width: 100%;
      background: #0e1a2b;
      border-radius: 3rem;
      box-shadow: 0 40px 80px -12px rgba(0, 0, 0, 0.9), 0 0 0 1px rgba(56, 132, 255, 0.12);
      overflow: hidden;
      backdrop-filter: blur(4px);
      position: relative;
      z-index: 2;
      transition: all 0.3s ease;
    }

    /* ----- LEFT PANEL : Stark Industries brand ----- */
    .brand-panel {
      background: linear-gradient(160deg, #0b1a30, #0d1f38);
      padding: 3.5rem 3rem;
      height: 100%;
      min-height: 520px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      border-right: 1px solid rgba(56, 132, 255, 0.15);
      position: relative;
      overflow: hidden;
    }

    .brand-panel::after {
      content: '';
      position: absolute;
      top: -30%;
      right: -20%;
      width: 250px;
      height: 250px;
      background: radial-gradient(circle, rgba(43, 100, 255, 0.06) 0%, transparent 70%);
      border-radius: 50%;
      pointer-events: none;
    }

    .brand-panel .brand-icon {
      font-size: 4.2rem;
      color: #5b8cff;
      text-shadow: 0 0 30px rgba(43, 100, 255, 0.25);
      margin-bottom: 1.8rem;
      position: relative;
      z-index: 2;
      display: inline-block;
      animation: floatIcon 6s ease-in-out infinite;
    }

    @keyframes floatIcon {
      0%,
      100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-8px);
      }
    }

    .brand-panel h1 {
      font-weight: 800;
      font-size: 3.6rem;
      letter-spacing: -0.03em;
      color: #edf4ff;
      line-height: 1.05;
      position: relative;
      z-index: 2;
    }

    .brand-panel h1 span {
      background: linear-gradient(135deg, #5b8cff, #a0c4ff, #7aa9ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .brand-panel .tagline {
      font-weight: 400;
      font-size: 1.1rem;
      color: #9bb2d9;
      margin-top: 1.2rem;
      letter-spacing: 0.3px;
      border-left: 4px solid #3b7bff;
      padding-left: 1.3rem;
      background: rgba(43, 100, 255, 0.05);
      border-radius: 0 10px 10px 0;
      position: relative;
      z-index: 2;
    }

    .brand-panel .office-badge {
      margin-top: 2.5rem;
      display: flex;
      align-items: center;
      gap: 0.7rem;
      color: #bfd3f5;
      font-size: 0.95rem;
      background: rgba(20, 50, 100, 0.35);
      padding: 0.7rem 1.5rem;
      border-radius: 60px;
      backdrop-filter: blur(6px);
      border: 1px solid rgba(56, 132, 255, 0.2);
      width: fit-content;
      position: relative;
      z-index: 2;
      transition: 0.3s;
    }

    .brand-panel .office-badge:hover {
      border-color: rgba(56, 132, 255, 0.5);
      background: rgba(20, 50, 100, 0.5);
    }

    .brand-panel .office-badge i {
      color: #5b8cff;
      font-size: 1.2rem;
    }

    .brand-stats {
      margin-top: 2.5rem;
      display: flex;
      gap: 2rem;
      position: relative;
      z-index: 2;
    }

    .brand-stats .stat-item {
      display: flex;
      flex-direction: column;
    }

    .brand-stats .stat-item .number {
      font-weight: 700;
      font-size: 1.5rem;
      color: #e8f0ff;
      letter-spacing: -0.02em;
    }

    .brand-stats .stat-item .label {
      font-size: 0.75rem;
      color: #7a97c4;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-top: 0.1rem;
    }

    /* ----- RIGHT PANEL : Form (shared for both login & register) ----- */
    .form-panel {
      padding: 3.2rem 3.2rem 3.2rem 2.8rem;
      background: #0f1d33;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .form-panel .form-header {
      margin-bottom: 2.2rem;
    }

    .form-panel .form-header h3 {
      font-weight: 700;
      color: #f0f6ff;
      font-size: 2rem;
      letter-spacing: -0.4px;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .form-panel .form-header h3 i {
      color: #5b8cff;
      font-size: 2rem;
    }

    .form-panel .form-header p {
      color: #8ba6d0;
      font-size: 0.95rem;
      margin-top: 0.3rem;
      padding-left: 0.2rem;
    }

    .form-control,
    .form-select {
      background: #0a1729 !important;
      border: 1px solid #1e3555 !important;
      color: #e6efff !important;
      padding: 0.8rem 1rem 0.8rem 2.8rem;
      border-radius: 18px;
      font-size: 0.95rem;
      transition: all 0.25s ease;
      box-shadow: none !important;
      backdrop-filter: blur(2px);
    }

    .form-control:hover,
    .form-select:hover {
      border-color: #2f5a8a !important;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: #4a84ff !important;
      background: #0c1d33 !important;
      box-shadow: 0 0 0 5px rgba(43, 100, 255, 0.12) !important;
      transform: translateY(-1px);
    }

    .form-control::placeholder {
      color: #4d6f9a;
      font-weight: 400;
      opacity: 0.8;
    }

    .input-group-custom {
      position: relative;
    }

    .input-group-custom .form-control {
      padding-left: 3rem;
    }

    .input-group-custom .input-icon {
      position: absolute;
      left: 1.1rem;
      top: 50%;
      transform: translateY(-50%);
      color: #4d6f9a;
      font-size: 1.2rem;
      z-index: 4;
      pointer-events: none;
      transition: 0.2s;
    }

    .input-group-custom:focus-within .input-icon {
      color: #5b8cff;
    }

    .form-label {
      color: #bdd2f5;
      font-weight: 500;
      font-size: 0.85rem;
      margin-bottom: 0.35rem;
      letter-spacing: 0.2px;
      display: flex;
      align-items: center;
      gap: 0.3rem;
    }

    .form-label i {
      color: #5b8cff;
      font-size: 0.9rem;
    }

    .btn-primary-custom {
      background: linear-gradient(135deg, #1b4bff, #2a5eff);
      border: none;
      padding: 0.9rem 1.8rem;
      border-radius: 60px;
      font-weight: 600;
      color: white;
      width: 100%;
      font-size: 1.05rem;
      transition: all 0.25s ease;
      box-shadow: 0 10px 24px -8px #0b2b6e;
      letter-spacing: 0.3px;
      border: 1px solid rgba(91, 140, 255, 0.3);
      position: relative;
      overflow: hidden;
    }

    .btn-primary-custom::after {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.05) 0%, transparent 60%);
      opacity: 0;
      transition: 0.5s;
    }

    .btn-primary-custom:hover::after {
      opacity: 1;
    }

    .btn-primary-custom:hover {
      background: linear-gradient(135deg, #2b5eff, #3f73ff);
      transform: scale(1.02) translateY(-2px);
      box-shadow: 0 16px 32px -10px #0b2b6e;
      border-color: #5b8cff;
    }

    .btn-primary-custom:active {
      transform: scale(0.97);
    }

    .auth-link {
      color: #8ba6d0;
      text-align: center;
      margin-top: 1.6rem;
      font-size: 0.95rem;
    }

    .auth-link a {
      color: #5b8cff;
      font-weight: 600;
      text-decoration: none;
      border-bottom: 2px solid transparent;
      transition: 0.2s;
    }

    .auth-link a:hover {
      color: #7aa0ff;
      border-bottom-color: #5b8cff;
    }

    .form-check-label {
      color: #b0c8ed;
      font-size: 0.9rem;
    }

    .form-check-input {
      background-color: #0a1729;
      border: 1px solid #1e3555;
      width: 1.1rem;
      height: 1.1rem;
      margin-top: 0.15rem;
      cursor: pointer;
      transition: 0.2s;
    }

    .form-check-input:checked {
      background-color: #1b4bff;
      border-color: #1b4bff;
      box-shadow: 0 0 0 3px rgba(43, 100, 255, 0.2);
    }

    .form-check-input:focus {
      box-shadow: 0 0 0 3px rgba(43, 100, 255, 0.15);
      border-color: #3b7bff;
    }

    .divider-line {
      border-top: 1px solid #1e3555;
      margin: 1.2rem 0 1.6rem 0;
      opacity: 0.4;
    }

    .footer-badges {
      display: flex;
      gap: 1.5rem;
      justify-content: center;
      font-size: 0.85rem;
      color: #5f7fa8;
      flex-wrap: wrap;
    }

    .footer-badges span {
      display: flex;
      align-items: center;
      gap: 0.4rem;
      transition: 0.2s;
    }

    .footer-badges span:hover {
      color: #8ba6d0;
    }

    .footer-badges i {
      color: #3b7bff;
    }

    .form-select {
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%235b8cff' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
      background-position: right 1.2rem center;
      background-repeat: no-repeat;
      background-size: 14px;
      padding-right: 2.8rem;
      appearance: none;
    }

    .form-select option {
      background: #0b1a30;
      color: #e6efff;
    }

    /* page toggle tabs */
    .auth-tabs {
      display: flex;
      gap: 0.5rem;
      background: #0a1729;
      padding: 0.4rem;
      border-radius: 60px;
      margin-bottom: 1.8rem;
      border: 1px solid #1e3555;
      width: fit-content;
    }

    .auth-tabs .tab-btn {
      padding: 0.5rem 1.8rem;
      border-radius: 60px;
      border: none;
      background: transparent;
      color: #8ba6d0;
      font-weight: 600;
      font-size: 0.9rem;
      transition: 0.3s;
      cursor: pointer;
      font-family: 'Inter', sans-serif;
    }

    .auth-tabs .tab-btn.active {
      background: linear-gradient(135deg, #1b4bff, #2a5eff);
      color: white;
      box-shadow: 0 4px 16px rgba(43, 100, 255, 0.3);
    }

    .auth-tabs .tab-btn:hover:not(.active) {
      color: #e6efff;
    }

    .form-section {
      display: none;
      animation: fadeIn 0.4s ease;
    }

    .form-section.active {
      display: block;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* ----- RESPONSIVE ----- */
    @media (max-width: 992px) {
      .brand-panel {
        border-right: none;
        border-bottom: 1px solid rgba(56, 132, 255, 0.12);
        min-height: 220px;
        padding: 2.2rem 2rem;
      }
      .brand-panel h1 {
        font-size: 2.8rem;
      }
      .brand-stats {
        margin-top: 1.5rem;
        gap: 1.5rem;
      }
      .form-panel {
        padding: 2.2rem 1.8rem;
      }
      .card-auth {
        border-radius: 2.2rem;
      }
    }

    @media (max-width: 576px) {
      .brand-panel {
        padding: 1.8rem 1.2rem;
        min-height: 180px;
      }
      .brand-panel h1 {
        font-size: 2.2rem;
      }
      .brand-panel .brand-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
      }
      .brand-panel .tagline {
        font-size: 0.95rem;
        padding-left: 0.8rem;
      }
      .brand-panel .office-badge {
        font-size: 0.8rem;
        padding: 0.4rem 1rem;
        margin-top: 1.5rem;
      }
      .brand-stats .stat-item .number {
        font-size: 1.2rem;
      }
      .form-panel {
        padding: 1.8rem 1.2rem;
      }
      .form-panel .form-header h3 {
        font-size: 1.6rem;
      }
      .form-control,
      .form-select {
        padding: 0.65rem 0.9rem 0.65rem 2.6rem;
        font-size: 0.9rem;
      }
      .btn-primary-custom {
        font-size: 0.95rem;
        padding: 0.7rem 1.2rem;
      }
      .footer-badges {
        gap: 0.8rem;
        font-size: 0.75rem;
      }
      .auth-tabs .tab-btn {
        padding: 0.4rem 1.2rem;
        font-size: 0.8rem;
      }
    }

    ::-webkit-scrollbar {
      width: 5px;
      background: #0a1525;
    }
    ::-webkit-scrollbar-thumb {
      background: #1b4bff;
      border-radius: 20px;
    }
  </style>
</head>
<body>

  <div class="card-auth">
    <div class="row g-0">

      <!-- LEFT PANEL : Stark Industries -->
      <div class="col-lg-5 col-md-12 brand-panel">
        <div class="brand-icon">
          <i class="bi bi-briefcase-fill"></i>
        </div>
        <h1>
          Stark<br /><span>Industries</span>
        </h1>
        <div class="tagline">
          <i class="bi bi-hdd-stack me-2" style="color: #5b8cff;"></i>
          Office Management · next gen
        </div>
        <div class="office-badge">
          <i class="bi bi-building"></i>
          <span>v3.0 · enterprise</span>
          <i class="bi bi-shield-check ms-2" style="color: #5b8cff;"></i>
        </div>

        <div class="brand-stats">
          <div class="stat-item">
            <span class="number">12k+</span>
            <span class="label">Employees</span>
          </div>
          <div class="stat-item">
            <span class="number">98%</span>
            <span class="label">Satisfaction</span>
          </div>
          <div class="stat-item">
            <span class="number">24/7</span>
            <span class="label">Support</span>
          </div>
        </div>
      </div>

      <!-- RIGHT PANEL : Login + Register Tabs -->
      <div class="col-lg-7 col-md-12 form-panel">

      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @else(session('error'))
      @endif


        <!-- Tabs -->
        <div class="auth-tabs">
          <button class="tab-btn active" data-tab="login">Log In</button>
          <button class="tab-btn" data-tab="register">Register</button>
        </div>

        <!-- ====== LOGIN FORM ====== -->
        <div id="login-section" class="form-section active">
          <div class="form-header">
            <h3>
              <i class="bi bi-box-arrow-in-right"></i> Welcome back
            </h3>
            <p>Log in to your Stark Industries account</p>
          </div>

          <form>
            <div class="row g-3">
              <!-- Email -->
              <div class="col-12">
                <label class="form-label"><i class="bi bi-envelope"></i> Email</label>
                <div class="input-group-custom">
                  <span class="input-icon"><i class="bi bi-envelope"></i></span>
                  <input type="email" class="form-control" placeholder="tony@stark.com" required />
                </div>
              </div>

              <!-- Password -->
              <div class="col-12">
                <label class="form-label"><i class="bi bi-lock"></i> Password</label>
                <div class="input-group-custom">
                  <span class="input-icon"><i class="bi bi-key"></i></span>
                  <input type="password" class="form-control" placeholder="••••••••" required />
                </div>
              </div>

              <!-- Remember & Forgot -->
              <div class="col-12 d-flex flex-wrap align-items-center justify-content-between mt-2">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="rememberLogin" />
                  <label class="form-check-label" for="rememberLogin">
                    Remember me
                  </label>
                </div>
                <a href="#" style="color: #5b8cff; text-decoration: none; font-size: 0.9rem; font-weight: 500;">
                  Forgot password?
                </a>
              </div>

              <!-- Submit -->
              <div class="col-12 mt-2">
                <button type="submit" class="btn btn-primary-custom">
                  <i class="bi bi-box-arrow-in-right me-2"></i> Log In
                </button>
              </div>

              <div class="auth-link">
                Don't have an account? <a href="#" id="switchToRegister">Register</a>
              </div>

              <div class="divider-line"></div>

              <div class="footer-badges">
                <span><i class="bi bi-shield-check"></i> 256-bit encryption</span>
                <span><i class="bi bi-clock-history"></i> 24/7 support</span>
                <span><i class="bi bi-cloud-check"></i> Cloud sync</span>
              </div>
            </div>
          </form>
        </div>

        <!-- ====== REGISTER FORM ====== -->
        <div id="register-section" class="form-section">
          <div class="form-header">
            <h3>
              <i class="bi bi-person-plus"></i> Create account
            </h3>
            <p>Join Stark Industries · manage your office smarter</p>
          </div>

          <form>
            <div class="row g-3">
              <!-- Full name -->
              <div class="col-md-6">
                <label class="form-label"><i class="bi bi-person"></i> Full name</label>
                <div class="input-group-custom">
                  <span class="input-icon"><i class="bi bi-person"></i></span>
                  <input type="text" class="form-control" placeholder="Tony Stark" required />
                </div>
              </div>

              <!-- Email -->
              <div class="col-md-6">
                <label class="form-label"><i class="bi bi-envelope"></i> Email</label>
                <div class="input-group-custom">
                  <span class="input-icon"><i class="bi bi-envelope"></i></span>
                  <input type="email" class="form-control" placeholder="tony@stark.com" required />
                </div>
              </div>

              <!-- Department -->
              <div class="col-md-6">
                <label class="form-label"><i class="bi bi-diagram-3"></i> Department</label>
                <div class="input-group-custom">
                  <span class="input-icon"><i class="bi bi-briefcase"></i></span>
                  <select class="form-select" required>
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
                <label class="form-label"><i class="bi bi-person-badge"></i> Role</label>
                <div class="input-group-custom">
                  <span class="input-icon"><i class="bi bi-star"></i></span>
                  <select class="form-select" required>
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
                <label class="form-label"><i class="bi bi-lock"></i> Password</label>
                <div class="input-group-custom">
                  <span class="input-icon"><i class="bi bi-key"></i></span>
                  <input type="password" class="form-control" placeholder="••••••••" required />
                </div>
              </div>

              <!-- Confirm Password -->
              <div class="col-md-6">
                <label class="form-label"><i class="bi bi-shield-lock"></i> Confirm</label>
                <div class="input-group-custom">
                  <span class="input-icon"><i class="bi bi-check-circle"></i></span>
                  <input type="password" class="form-control" placeholder="••••••••" required />
                </div>
              </div>

              <!-- Terms & Remember -->
              <div class="col-12 d-flex flex-wrap align-items-center justify-content-between mt-2">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="termsCheck" required />
                  <label class="form-check-label" for="termsCheck">
                    I agree to <a href="#" style="color: #5b8cff; text-decoration: none; font-weight: 500;">terms & conditions</a>
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="rememberRegister" />
                  <label class="form-check-label" for="rememberRegister">
                    Keep me signed in
                  </label>
                </div>
              </div>

              <!-- Submit -->
              <div class="col-12 mt-2">
                <button type="submit" class="btn btn-primary-custom">
                  <i class="bi bi-person-plus me-2"></i> Register · Stark
                </button>
              </div>

              <div class="auth-link">
                Already have an account? <a href="#" id="switchToLogin">Log in</a>
              </div>

              <div class="divider-line"></div>

              <div class="footer-badges">
                <span><i class="bi bi-shield-check"></i> 256-bit encryption</span>
                <span><i class="bi bi-clock-history"></i> 24/7 support</span>
                <span><i class="bi bi-cloud-check"></i> Cloud sync</span>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
  </script>

  <script>
    // Tab switching logic
    const tabBtns = document.querySelectorAll('.tab-btn');
    const loginSection = document.getElementById('login-section');
    const registerSection = document.getElementById('register-section');

    function switchTab(tab) {
      // Update buttons
      tabBtns.forEach(btn => btn.classList.remove('active'));
      document.querySelector(`.tab-btn[data-tab="${tab}"]`).classList.add('active');

      // Update sections
      if (tab === 'login') {
        loginSection.classList.add('active');
        registerSection.classList.remove('active');
      } else {
        registerSection.classList.add('active');
        loginSection.classList.remove('active');
      }
    }

    tabBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        const tab = this.getAttribute('data-tab');
        switchTab(tab);
      });
    });

    // Switch from login to register via link
    document.getElementById('switchToRegister').addEventListener('click', function(e) {
      e.preventDefault();
      switchTab('register');
    });

    // Switch from register to login via link
    document.getElementById('switchToLogin').addEventListener('click', function(e) {
      e.preventDefault();
      switchTab('login');
    });
  </script>

</body>
</html>