
<div class="container my-auto">
    <div class="row signin-margin">
        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column px-0">
            <div class="position-relative bg-gradient-primary h-100 d-flex flex-column justify-content-center"
                style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
            </div>
        </div>
        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <!-- <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                        <div class="row mt-3">
                            
                        </div>
                    </div>
                </div> -->
                <div class="card-header" style="padding-bottom:0">
                    <h4 class="font-weight-bolder">Sign In</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent='store'>
                        @if (Session::has('status'))
                        <div class="alert alert-success alert-dismissible text-white" role="alert">
                            <span class="text-sm">{{ Session::get('status') }}</span>
                            <button type="button" class="btn-close text-lg py-3 opacity-10"
                                data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="input-group input-group-outline mt-3 @if(strlen($email ?? '') > 0) is-filled @endif">
                            <label class="form-label">Email</label>
                            <input wire:model='email' type="email" class="form-control">
                        </div>
                        @error('email')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror

                        <div class="input-group input-group-outline mt-3 @if(strlen($password ?? '') > 0) is-filled @endif">
                            <label class="form-label">Password</label>
                            <input wire:model="password" type="password" class="form-control"
                                    >
                        </div>
                        @error('password')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                        <div class="form-check form-switch d-flex align-items-center my-3">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember
                                me</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign
                                in</button>
                        </div>
                        <p class="mt-4 text-sm text-center">
                            Don't have an account?
                            <a href="{{ route('register') }}"
                                class="text-primary text-gradient font-weight-bold">Sign up</a>
                        </p>
                        <p class="text-sm text-center">
                            Forgot your password? Reset your password
                            <a href="{{ route('password.forgot') }}"
                                class="text-primary text-gradient font-weight-bold">here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>