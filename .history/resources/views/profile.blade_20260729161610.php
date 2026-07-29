@include('layout.header')


<div class="dashboard">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card-box">
                @if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


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

                    
                    <div class="text-center mb-4">

                        <div class="profile-image">

                            <img src="{{ $data->photo ? asset('images/'.$data->photo) :asset('images/default.png') }}" id="previewImage">

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

                            <input type="text" class="form-control" name="account_id" value="{{ old('account_id', $data->account_id) }}" readonly>

                        </div>



                        <!-- Name -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-person"></i>
                                Name
                            </label>

                            <input type="text" class="form-control" name="name" value="{{ old('name', $data->name) }}">

                        </div>




                        <!-- Email -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-envelope"></i>
                                Email Address
                            </label>

                            <input type="email" class="form-control" name="email" value="{{ old('email', $data->email) }}">

                        </div>




                        <!-- Mobile -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-phone"></i>
                                Mobile No
                            </label>

                            <input type="text" class="form-control" name="mobile" value="{{ old('mobile' , $data->mobile) }}">

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

                            <input type="date" class="form-control" name="doj" value="{{ old('doj', $data->doj) }}" readonly>

                        </div>




                        <!-- DOB -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-calendar-heart"></i>
                                Date Of Birth
                            </label>

                            <input type="date" class="form-control" name="dob" value="{{ old('dob', $data->dob)  }}">

                        </div>




                        <!-- Father Name -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-person"></i>
                                Father Name
                            </label>

                            <input type="text" class="form-control" name="father_name" value="{{ old('father_name' , $data->father_name) }}">

                        </div>





                        <!-- Designation -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-briefcase"></i>
                                Designation
                            </label>

                            <input type="text" class="form-control" name="designation" value="{{ old('designation', $data->role) }}" readonly>

                        </div>





                        <!-- Department -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-diagram-3"></i>
                                Department
                            </label>

                            <input type="text" class="form-control" name="department" value="{{ old('department', $data->department) }}" readonly>

                        </div>





                        <!-- Office Location -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-building"></i>
                                Office Location
                            </label>

                            <input type="text" class="form-control" name="office_location" value="{{ old('office_location', $data->office_location) }}" readonly>

                        </div>






                        <!-- Address -->

                        <div class="col-12">

                            <label class="form-label">
                                <i class="bi bi-geo-alt"></i>
                                Address
                            </label>

                           <textarea class="form-control" name="address" rows="3">{{ old('address', $data->address) }}</textarea>


                        </div>






                        <!-- State -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-map"></i>
                                State
                            </label>

                            <input type="text" class="form-control" name="state" value="{{ old('state', $data->state) }}">

                        </div>





                        <!-- City -->

                        <div class="col-md-6">

                            <label class="form-label">
                                <i class="bi bi-building"></i>
                                City
                            </label>

                            <input type="text" class="form-control" name="city" value="{{ old('city', $data->city) }}">

                        </div>





                        <button type="submit" class="btn btn-primary-custom mt-4 updateProfile">

                            <i class="bi bi-save me-2"></i>

                            Update Profile

                        </button>



                    </div>


                </form>


            </div>

        </div>

    </div>

</div>








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