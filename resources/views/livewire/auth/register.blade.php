 <main>
     <title>Register</title>
     <!-- Section -->
     <div>
         <!-- Section: Design Block -->
         <section class="background-radial-gradient overflow-hidden">
             <style>
                 .background-radial-gradient {
                     background-color: hsl(218, 41%, 15%);
                     background-image: radial-gradient(650px circle at 0% 0%,
                             hsl(218, 41%, 35%) 15%,
                             hsl(218, 41%, 30%) 35%,
                             hsl(218, 41%, 20%) 75%,
                             hsl(218, 41%, 19%) 80%,
                             transparent 100%),
                         radial-gradient(1250px circle at 100% 100%,
                             hsl(218, 41%, 45%) 15%,
                             hsl(218, 41%, 30%) 35%,
                             hsl(218, 41%, 20%) 75%,
                             hsl(218, 41%, 19%) 80%,
                             transparent 100%);
                 }

                 #radius-shape-1 {
                     height: 220px;
                     width: 220px;
                     top: -60px;
                     left: -130px;
                     background: radial-gradient(#44006b, #ad1fff);
                     overflow: hidden;
                 }

                 #radius-shape-2 {
                     border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
                     bottom: -60px;
                     right: -110px;
                     width: 300px;
                     height: 300px;
                     background: radial-gradient(#44006b, #ad1fff);
                     overflow: hidden;
                 }

                 .bg-glass {
                     background-color: hsla(0, 0%, 100%, 0.9) !important;
                     backdrop-filter: saturate(200%) blur(25px);
                 }
             </style>
             <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
                 <div class="row gx-lg-5 align-items-center mb-5">
                     <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                         <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                             The best offer <br />
                             <span style="color: hsl(218, 81%, 75%)">for your business</span>
                         </h1>
                         <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                             Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                             Temporibus, expedita iusto veniam atque, magni tempora mollitia
                             dolorum consequatur nulla, neque debitis eos reprehenderit quasi
                             ab ipsum nisi dolorem modi. Quos?
                         </p>
                     </div>


                     <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                         <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                         <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                         <div class="card bg-glass">
                             <div class="card-body px-4 py-5 px-md-5">
                                 <div class="card bg-glass">
                                     <div class="card-body px-4 py-5 px-md-5">
                                         <form wire:submit.prevent="register">
                                             <!-- Full name input -->
                                             <div class="form-outline mb-4">
                                                 <label class="form-label" for="form3Example1">Enter Your Full Name</label>
                                                 <input wire:model="name" type="text" id="form3Example1" class="form-control" />
                                             </div>
                                             @error('name') <span class="text-danger">{{ $message }}</span> @enderror

                                             <!-- Email input -->
                                             <div class="form-outline mb-4">
                                                 <label class="form-label" for="form3Example3">Enter Your Email address</label>
                                                 <input wire:model="email" type="email" id="form3Example3" class="form-control" />
                                             </div>
                                             @error('email') <span class="text-danger">{{ $message }}</span> @enderror

                                             <!-- Password input -->
                                             <div class="form-outline mb-4">
                                                 <label class="form-label" for="form3Example4">Enter Your Password</label>
                                                 <input wire:model="password" type="password" id="form3Example4" class="form-control" />
                                             </div>
                                             @error('password') <span class="text-danger">{{ $message }}</span> @enderror

                                             <!-- Confirm Password input -->
                                             <div class="form-outline mb-4">
                                                 <label class="form-label" for="form3Example5">Confirm Your Password</label>
                                                 <input wire:model="password_confirmation" type="password" id="form3Example5" class="form-control" />
                                             </div>
                                             @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror

                                             <!-- Submit button -->
                                             <button type="submit" class="btn btn-primary btn-block mb-4">
                                                 Sign up
                                             </button>

                                             <!-- Login button for users with an existing account -->
                                             <div class="text-center">
                                                 <p>Already have an account?</p>
                                                 <a href="{{ route('login') }}" class="">Login</a>
                                             </div>

                                             <!-- Register buttons -->
                                             <div class="text-center">
                                                 <p>or sign up with:</p>
                                                 <button type="button" class="btn btn-link btn-floating mx-1">
                                                     <i class="fab fa-facebook-f"></i>
                                                 </button>

                                                 <button type="button" class="btn btn-link btn-floating mx-1">
                                                     <i class="fab fa-google"></i>
                                                 </button>

                                                 <button type="button" class="btn btn-link btn-floating mx-1">
                                                     <i class="fab fa-twitter"></i>
                                                 </button>

                                                 <button type="button" class="btn btn-link btn-floating mx-1">
                                                     <i class="fab fa-github"></i>
                                                 </button>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
         </section>
     </div>
 </main>