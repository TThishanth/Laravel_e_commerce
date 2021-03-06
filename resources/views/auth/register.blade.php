<x-guest-layout>
    <div class="wrapper without_header_sidebar">
        <!-- contnet wrapper -->
        <div class="content_wrapper">
            <!-- page content -->
            <div class="registration_page center_container">
                <div class="center_content">
                    <div class="logo">
                        <img src="panel/assets/images/logo.png" alt="" class="img-fluid">
                    </div>
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4 ml-2" :errors="$errors" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group icon_parent">
                            <label for="name" :value="__('Name')">Username</label>
                            <input id="name" type="text" class="form-control" name="name" :value="old('name')" required
                            autofocus>

                            <span class="icon_soon_bottom_right"><i class="fas fa-user"></i></span>
                        </div>
                        <div class="form-group icon_parent">
                            <label for="email" :value="__('Email')">E-mail</label>
                            <input id="email" type="email" class="form-control" name="email" :value="old('email')"
                            required>


                            <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>
                        </div>
                        <div class="form-group icon_parent">
                            <label for="password" :value="__('Password')">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required
                            autocomplete="new-password">


                            <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                        </div>
                        <div class="form-group icon_parent">
                            <label for="rtpassword" :value="__('Confirm Password')">Re-type Password</label>
                            <input id="password-confirm" type="password" class="form-control"
                            name="password_confirmation" required>
                            <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                        </div>
                        <div class="form-group">
                            <a class="registration" href="{{ route('login') }}">{{ __('Already registered?') }}</a><br>
                            <button type="submit" class="btn btn-blue">{{ __('Register') }}</button>
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
