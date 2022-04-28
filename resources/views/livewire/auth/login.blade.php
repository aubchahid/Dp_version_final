<div class="container h-p100 ">
    <div class="row align-items-center justify-content-md-center h-p100">
        <div class="col-12">
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="bg-white rounded10 shadow-lg">
                        <div class="content-top-agile p-20 pb-0">
                            <img src="{{ asset('assets/images/logo_login.png') }}" class="h-120" alt=""
                                srcset="">
                            <p class="mb-0"> {{ __('lang.Welcome') }}</p>
                        </div>
                        <div class="p-40">
                            <form wire:submit.prevent="submit">
                                <div class="form-group">
                                    <label>{{ __('lang.Email') }}</label>
                                    <input type="email" class="form-control h-50" wire:model="email" required
                                        placeholder="{{ __('lang.EmailPlaceHolder') }}">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('lang.Password') }}</label>
                                    <input type="password" class="form-control h-50" wire:model="password" required
                                        placeholder="{{ __('lang.PasswordPlaceHolder') }}">
                                </div>
                                <div class="row">

                                    <div class="col-12">
                                        <div class="fog-pwd text-right">
                                            <a href="javascript:void(0)" class="hover-primary"><i
                                                    class="ion ion-locked"></i>{{ __('lang.ForgetPassword') }}</a><br>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 text-center">
                                        <button type="submit"
                                            class="btn btn-primary btn-lg mt-10">{{ __('lang.SignIn') }}</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                            <div class="text-center">
                                <p class="mt-15 mb-0"><a href="/register"
                                        class="text-primary ml-5">{{ __('lang.Register') }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
