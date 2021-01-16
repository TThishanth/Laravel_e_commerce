<x-guest-layout>
    <!-- wrapper -->
    <div class="wrapper without_header_sidebar">
        <!-- contnet wrapper -->
        <div class="content_wrapper">
            <!-- page content -->
            <div class="login_page center_container">
                <div class="center_content">
                    <div class="logo">
                        <img src="panel/assets/images/logo.png" alt="" class="img-fluid">
                    </div>
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4 ml-2" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group icon_parent">
                            <label for="password" :value="__('Email')">Email</label>
                            <input id="email" type="email" class="form-control" name="email" :value="old('email')"
                                required autofocus>
                            <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>

                        </div>
                        <div class="form-group icon_parent">
                            <label for="password" :value="__('Password')">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required
                                autocomplete="current-password">

                            <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                        </div>
                        <div class="form-group">
                            <label class="chech_container">{{ __('Remember me') }}
                                <input type="checkbox" name="remember" id="remember_me">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group">
                            <a class="registration" href="{{ route('register') }} ">Create new account</a><br>
                            <a href="{{ route('password.request') }}" class="text-white">{{ __('Forgot your password?') }}</a>
                            <button type="submit" class="btn btn-blue">{{ __('Login') }}</button>
                        </div>
                    </form>
                    <div class="footer">
                        <p>Copyright &copy; 2020 <a href="https://easylearningbd.com/">easy Learning</a>. All rights
                            reserved.</p>
                    </div>

                </div>
            </div>
        </div>
        <!--/ content wrapper -->
    </div>
    <!--/ wrapper -->
</x-guest-layout>
