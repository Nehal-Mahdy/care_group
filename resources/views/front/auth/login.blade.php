   @extends('front.layouts.app')

   @section('title', 'Profile')

   @section('content')
       <section>
           <div class="flex flex-col items-center justify-center h-[40vh] m-auto bg-center bg-cover"
               style="
          background-image: linear-gradient(
              rgba(0, 0, 0, 0.5),
              rgba(0, 0, 0, 0.5)
            ),
            url(./images/bird.jpg);
        ">
               <div class="container w-1/2 text-center text-white">
                   <h2 class="text-6xl font-bold mob:text-2xl mb-9">Profile</h2>

                   <div class="flex items-center justify-center gap-4">
                       <a class="text-white hover:text-primary transition-colors cursor-pointer" href="/">
                           Home
                       </a>
                       <i class="fa-solid fa-chevron-right"></i> <span> Profile </span>
                   </div>
               </div>
           </div>
       </section>

       <!--**************** end hero **************** -->

       <!--**************** start  **************** -->

       <section class="container py-12 md:py[70px]">
           <div class="grid items-center justify-center grid-cols-1  md:grid-cols-3">
               <div></div>
               <div class="pb-10">
                   <div class="p-10 rounded-lg shadow-xl">
                       <h3 class="text-[26px] mb-5 font-bold text-[#0B1C39]">Login</h3>

                       <div class="inputs">
                           <form class="flex flex-col items-start justify-start" method="POST"
                               action="{{ route('customer.login') }}">
                               @csrf
                               <div class="w-full mb-5">
                                   <label class="text-[#212529] text-sm" for="email">Username or Email
                                       <span>*</span></label>
                                   <input type="email" id="email" name="email" placeholder="Email"
                                       class="w-full p-2 border rounded-lg outline-none" required />
                               </div>

                               <div class="w-full mb-5">
                                   <label class="text-[#212529] text-sm pb-1" for="password">Password <span>*</span></label>
                                   <input type="password" id="password" name="password" placeholder="Password"
                                       class="w-full p-2 border rounded-lg outline-none" required />
                               </div>

                               <div class="mb-5">
                                   <input type="checkbox" name="remember" id="remember"
                                       {{ old('remember') ? 'checked' : '' }} />
                                   <label class="pl-1 text-[#666666] cursor-pointer" for="remember">Remember me</label>
                               </div>

                               <button
                                   class="w-full mb-5 py-3 font-semibold text-white transition-colors bg-teal-500 rounded-md hover:bg-[#442E66]">
                                   Login
                               </button>

                               @if ($errors->any())
                                   <div class="text-red-500">
                                       {{ $errors->first('email') }}
                                   </div>
                               @endif

                               <a href="{{ route('customer.password.request') }}" class="text-[#666666] cursor-pointer">
                                   Forgot your password?
                               </a>

                           </form>
                       </div>
                   </div>
               </div>
               <div></div>
               {{-- <div class="pb-10">
                   <div class="p-10 rounded-lg shadow-xl">
                       <h3 class="text-[26px] mb-5 font-bold text-[#0B1C39]">Register</h3>

                       <div class="inputs">
                           <form class="flex flex-col items-start justify-start">
                               <div class="w-full mb-5">
                                   <label class="text-[#212529] text-sm" for="register-email">Email address
                                       <span>*</span></label>
                                   <input type="email" id="register-email" placeholder="Email"
                                       class="w-full p-2 border rounded-lg outline-none" required />
                               </div>

                               <div class="w-full mb-5">
                                   <label class="text-[#212529] text-sm"
                                       for="register-username">Username<span>*</span></label>
                                   <input type="text" id="register-username" placeholder="Name"
                                       class="w-full p-2 border rounded-lg outline-none" required />
                               </div>

                               <div class="w-full mb-5">
                                   <label class="text-[#212529] text-sm pb-1" for="register-password">Password
                                       <span>*</span></label>
                                   <input type="password" id="register-password" placeholder="Password"
                                       class="w-full p-2 rounded-lg outline-none" required />
                               </div>

                               <div class="w-full mb-5">
                                   <label class="text-[#212529] text-sm pb-1" for="confirm-password">Confirm Password
                                       <span>*</span></label>
                                   <input type="password" id="confirm-password" placeholder="Password"
                                       class="w-full p-2 border rounded-lg outline-none" required />
                               </div>

                               <div class="mb-5">
                                   <input type="checkbox" name="be_instructor" id="be-instructor" />
                                   <label class="pl-1 text-[#666666] cursor-pointer" for="be-instructor">Want to become an
                                       instructor?</label>
                               </div>

                               <button
                                   class="w-full mb-5 py-3 font-semibold text-white transition-colors bg-teal-500 rounded-md hover:bg-[#442E66]">
                                   Register
                               </button>
                           </form>
                       </div>
                   </div>
               </div> --}}
           </div>
       </section>

       <!--**************** end  **************** -->
   @endsection
