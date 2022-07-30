<template>
    <div class="container mb-11 mt-2">
        <div id="main-wrapper">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row no-gutters">
                                <div class="col-lg-6 d-none d-lg-inline-block">
                                    <div class="account-block rounded-right" style="background-image: url('https://upschool.co/wp-content/uploads/2022/04/7736bf08-c9f4-413d-bd1f-2999c0264109.jpg');background-repeat: no-repeat;background-size:cover;height:100%;position:relative">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="p-5" style="padding-left: 0px !important;padding-top: 2rem !important">
                                        <h2 class="mb-0" style="color: #242254;font-weight:bold">Create a Free Account</h2>
                                        <p class="text-muted mt-2 mb-5">You are a few clicks away from creating your account.</p>
                                        <div v-if="!this.loading && this.errors.length" class='alert alert-danger'>
                                            Whoops! Something went wrong.
                                            <ul>
                                                <li v-for="(item,index) in this.errors" :key="index">
                                                    {{ item }}
                                                </li>
                                            </ul>
                                        </div>
                                        <form @submit.prevent="submitRegistration">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="first_name">First Name
                                                            <sup class="text-danger">*</sup>
                                                        </label>
                                                        <input v-model="this.fields.first_name"  v-bind="{attribute: this.loading}"  type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" required />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name </label>
                                                        <input type="text"  v-model="this.fields.last_name"  name="last_name"  v-bind="{attribute: this.loading}"  class="form-control" id="last_name" placeholder="Last Name" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mt-3">
                                                    <div class="form-group">
                                                        <label for="email">Email address
                                                            <sup class="text-danger">*</sup>
                                                        </label>
                                                        <input type="email"   v-model="this.fields.email"  v-bind="{attribute: this.loading}"  name="email" placeholder="E-Mail" class="form-control" id="email">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="country">Your Country
                                                            <sup class="text-danger">*</sup>
                                                        </label>
                                                        <select  name="country"  v-model="this.fields.country"  class="form-control" id="country">
                                                            <option value='aus'>Australia</option>
                                                            <option value='ca'>Canada</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="role">
                                                            What Describes You
                                                            <sup class="text-danger">*</sup>
                                                        </label>
                                                        <select v-model="this.fields.role" v-bind:class="{disabled: this.loading}" name="role" id="role" class="form-control">
                                                            <option value="parent">Parent of Student</option>
                                                            <option value="student-above">Student Above 18</option>
                                                            <option value="student-below">Student Below 18</option>
                                                            <option value="teacher">School Teacher</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="form-group ">
                                                        <label for="password">
                                                            Password
                                                            <sup class="text-danger">*</sup>
                                                        </label>
                                                        <input type="password" v-model="this.fields.password"  v-bind="{attribute: this.loading}"  id="password" class="form-control"  />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="confirm_password">
                                                            Confirm Password
                                                            <sup class="text-danger">*</sup>
                                                        </label>
                                                        <input type="password"  v-model="this.fields.password_confirmation" v-bind="{attribute: this.loading}"  name="confirm_password" class="form-control" id="confirm_password" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-5">
                                                <label for="modalSignupEmail1">Consent
                                                    <sup class="text-danger">*</sup>    
                                                </label>
                                                <br />
                                                <input v-model="this.fields.terms" style="width:20px; height:20px;" type="checkbox" v-bind:class="{disabled: this.loading}" class='input-checkbox' value='1' /> Yes, I consent with providing the required information.
                                                <div class="form-control disabled mt-2 bg-secondary text-white" style="opacity:1">I agree to that the information provided will be used for internal communication and for the website on-boarding purposes.</div> 
                                            </div>


                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <button v-bind:class="{disabled: this.loading}" class="btn btn-block btn-dark w-100" type="submit">
                                                        <div v-if="this.loading" class="spinner-border text-white mb-1" role="status">
                                                            <span class="sr-only">Loading...</span>
                                                        </div>
                                                        <div style="text-transform:uppercase" v-else>
                                                            Register
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                            <button type="button" class="btn d-inline-block">Are you associated with university or organisation ??</button>
                                            <a href="#l" class="forgot-link float-right text-primary m-3">Organisation Registration</a>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <p class="text-muted text-center mt-3 mb-0">Already Have an account 
                        <router-link class='text-underline text-primary ml-1' to='/login'>
                            Login
                        </router-link>
                    </p>

                    <!-- end row -->

                </div>
            <!-- end col -->
        </div>
    <!-- Row -->
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            fields : {
                first_name : null,
                middle_name : null,
                last_name : null,
                country : null,
                city : null,
                state: null,
                email : null,
                terms : false,
                role : "parent",
                local_address : null,
                gender : "Male",
                date_of_birth : null,
                phone_number : null,
                password : null,
                password_confirmation : null
            },
            loading: false,
            errors :[],
            preRegister : true,
            serverResponse : {
                success : false,
                error : false,
                message : null,
            }
        }
    },
    methods : {
        ValidateInput() {
            this.errors = [];
            let field_error = []
            if ( ! this.fields.first_name ) {
                this.errors.push("First Name is required.");
            }

            // if ( ! this.fields.last_name) {
            //     this.errors.push("Last name is required");
            // }
            if (! this.fields.email || ! this.validEmail(this.fields.email)) {
                this.errors.push("Email Field is require");
            }

            if ( ! this.fields.role ) {
                this.errors.push("Select Your Role.");
            }

            if ( ! this.fields.terms) {
                this.errors.push("You must agree to our terms and conditions.");
            }

            if ( ! this.fields.password) {
                this.errors.push("Password Field is required")
            }

            if ( this.fields.password !== this.fields.password_confirmation) {
                this.errors.push("Confirm Password doesn't match.");
            }
        },

        submitRegistration() {
            this.loading = true;
            this.ValidateInput();
            if ( ! this.errors.length) {
                axios.defaults.headers.post["X-CSRF-TOKEN"] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                axios.post("/api/register",this.fields).then(response => {
                    this.serverResponse.success = true,
                    this.serverResponse.message = response.data.message;
                    window.scrollTo(0,0);
                    if ( response.data.redirect ) {
                        window.location.href = response.data.location;
                        // router.go(response.data.path);
                    }
                    this.loading = false;
                }).catch(error => {
                    if(error.response.status == 422)  {
                        this.errors.push(error.response.data.message);
                    }
                    this.fields.password = null;
                    this.serverResponse.error = true;
                    this.serverResponse.message = "Woops ! Something went wrong.";
                    this.loading = false;
                });
            }
            
            window.scrollTo(0,0)
        },

        validEmail: function (email) {
            var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
    }
}
</script>