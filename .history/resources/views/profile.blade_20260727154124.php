@include('layout.header')


<div class="dashboard">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card-box">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="title text-center">
                    <i class="bi bi-person-circle"></i>
                    My Profile
                </div>



                <!-- PROFILE IMAGE -->
                <form method="POST" action="{{ route('profileUpdate') }}" enctype="multipart/form-data">

                    @csrf

                    @foreach ($data as  )
                    
                    @endforeach
                    <div class="text-center mb-4">

                        <div class="profile-image">

                            <img src="{{ asset('images/default.png') }}" id="previewImage">

                        </div>


                        <label class="btn btn-primary mt-3">

                            <i class="bi bi-camera"></i>
                            Upload Image

                            <input type="file" name="photo" id="photoInput" hidden>

                        </label>

                    </div>








                    <div class="row g-3">


                        <!-- Account ID -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-person"></i>
                                Account ID
                            </label>

                            <input type="text" class="form-control" name="account_id" value="SK/NYK/IT/007">

                        </div>



                        <!-- Name -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-person"></i>
                                Name
                            </label>

                            <input type="text" class="form-control" name="name" value="Tony Stark">

                        </div>




                        <!-- Email -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-envelope"></i>
                                Email Address
                            </label>

                            <input type="email" class="form-control" name="email" value="abc.a@gamil.com">

                        </div>




                        <!-- Mobile -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-phone"></i>
                                Mobile No
                            </label>

                            <input type="text" class="form-control" name="mobile" value="1234567890">

                        </div>




                        <!-- Password -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-lock"></i>
                                New Password
                            </label>

                            <input type="password" class="form-control" name="password"
                                placeholder="Enter new password">

                        </div>



                        <!-- Confirm Password -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-shield-lock"></i>
                                Confirm Password
                            </label>

                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Confirm password">

                        </div>




                        <!-- DOJ -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-calendar"></i>
                                Date Of Joining
                            </label>

                            <input type="date" class="form-control" name="doj" value="2025-05-01">

                        </div>




                        <!-- DOB -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-calendar-heart"></i>
                                Date Of Birth
                            </label>

                            <input type="date" class="form-control" name="dob" value="2000-01-01">

                        </div>




                        <!-- Father Name -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-person"></i>
                                Father Name
                            </label>

                            <input type="text" class="form-control" name="father_name" value="Mr.Howard Stark">

                        </div>





                        <!-- Designation -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-briefcase"></i>
                                Designation
                            </label>

                            <input type="text" class="form-control" name="designation" value="Web Developer">

                        </div>





                        <!-- Department -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-diagram-3"></i>
                                Department
                            </label>

                            <input type="text" class="form-control" name="department" value="IT">

                        </div>





                        <!-- Office Location -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-building"></i>
                                Office Location
                            </label>

                            <input type="text" class="form-control" name="office_location" value="Nyk">

                        </div>






                        <!-- Address -->

                        <div class="col-12">

                            <label class="form-label">
                                <i class="bi bi-geo-alt"></i>
                                Address
                            </label>

                            <textarea class="form-control" name="address" rows="3"></textarea>

                        </div>






                        <!-- State -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-map"></i>
                                State
                            </label>

                            <input type="text" class="form-control" name="state" value="USA">

                        </div>





                        <!-- City -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-building"></i>
                                City
                            </label>

                            <input type="text" class="form-control" name="city" value="Nyk">

                        </div>





                        <button type="submit" class="btn btn-primary-custom mt-4">

                            <i class="bi bi-save me-2"></i>

                            Update Profile

                        </button>



                    </div>


                </form>


            </div>

        </div>

    </div>

</div>




<style>
    .form-control::placeholder {
        color: #fff !important;
        opacity: 1;
    }

    .profile-image {

        width: 160px;
        height: 160px;

        margin: auto;

        border-radius: 50%;

        overflow: hidden;

        border: 6px solid #5b8cff;

        box-shadow: 0 0 40px rgba(91, 140, 255, .5);

    }



    .profile-image img {

        width: 100%;
        height: 100%;

        object-fit: cover;

    }



    .form-control {

        background: #091426 !important;

        border: 1px solid #1e3555 !important;

        color: white !important;

        border-radius: 18px;

        padding: 12px;

    }



    .form-control:focus {

        border-color: #5b8cff !important;

        box-shadow: 0 0 10px rgba(91, 140, 255, .3) !important;

    }



    .btn-primary {

        background: #1b4bff;

        border: none;

        border-radius: 30px;

        padding: 10px 25px;

    }
</style>




<script>

    document.getElementById('photoInput')
        .addEventListener('change', function (e) {

            let reader = new FileReader();


            reader.onload = function (event) {

                document.getElementById('previewImage').src =
                    event.target.result;

            }


            reader.readAsDataURL(e.target.files[0]);

        });

</script>



@include('layout.footer')