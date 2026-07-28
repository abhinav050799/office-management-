@include('layout.header')


<div class="dashboard">

    <div class="row justify-content-center">

        <div class="col-lg-7">


            <div class="card-box">


                <div class="title text-center">
                    <i class="bi bi-person-circle"></i>
                    My Profile
                </div>


                <!-- PROFILE IMAGE -->

                <div class="text-center mb-4">


                    <div class="profile-image">

                        <img src="" id="previewImage" alt="Profile">


                    </div>


                    <label class="btn btn-primary mt-3">

                        <i class="bi bi-camera"></i>
                        Change Photo

                        <input type="file" name="photo" id="photoInput" hidden>

                    </label>


                </div>



                <!-- FORM -->


                <form method="POST" action="#" enctype="multipart/form-data">


                    @csrf

                                            <div class="mb-3">

                        <label class="form-label">
                            <i class="bi bi-person"></i>
                            Account Id
                        </label>


                        <input type="text" name="account_id" class="form-control" value="{{session('username')}}">

                    </div>

                    

                    <div class="mb-3">

                        <label class="form-label">
                            <i class="bi bi-person"></i>
                            Name
                        </label>


                        <input type="text" name="name" class="form-control" value="{{session('username')}}">

                    </div>




                    <div class="mb-3">

                        <label class="form-label">
                            <i class="bi bi-envelope"></i>
                            Email
                        </label>


                        <input type="email" name="email" class="form-control" value="{{session('email')}}">

                    </div>




                    <div class="mb-3">

                        <label class="form-label">
                            <i class="bi bi-lock"></i>
                            New Password
                        </label>


                        <input type="password" name="password" class="form-control" placeholder="Enter new password">


                    </div>




                    <div class="mb-3">

                        <label class="form-label">
                            <i class="bi bi-shield-lock"></i>
                            Confirm Password
                        </label>


                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Confirm password">


                    </div>




                    <button class="btn btn-primary-custom">

                        <i class="bi bi-save me-2"></i>

                        Update Profile

                    </button>


                </form>


            </div>


        </div>


    </div>


</div>



<style>
    .profile-image {

        width: 160px;
        height: 160px;

        margin: auto;

        border-radius: 50%;

        overflow: hidden;

        border: 6px solid #5b8cff;

        box-shadow:
            0 0 40px rgba(91, 140, 255, .5);

    }


    .profile-image img {

        width: 100%;
        height: 100%;

        object-fit: cover;

    }



    .btn-primary {

        background: #1b4bff;

        border: none;

        border-radius: 30px;

        padding: 10px 25px;

    }


    .btn-primary:hover {

        background: #3f73ff;

    }



    .form-control {

        background: #091426 !important;

        border: 1px solid #1e3555 !important;

        color: white !important;

        border-radius: 18px;

    }


    .form-control:focus {

        border-color: #5b8cff !important;

        box-shadow: 0 0 10px rgba(91, 140, 255, .3) !important;

    }
</style>



<script>


    // Image Preview

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