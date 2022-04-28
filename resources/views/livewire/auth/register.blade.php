<div class="container h-p100 ">
    <div class="row align-items-center justify-content-md-center h-p100">
        <div class="col-12">
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="bg-white rounded10 shadow-lg">
                        <div class="content-top-agile p-20 pb-0">
                            <img src="{{ asset('assets/images/logo_login.png') }}" class="h-120" alt=""
                                srcset="">
                            <p class="mb-0"> {{ __('lang.RegisterText') }}</p>
                        </div>
                        <div class="p-40">
                            <form wire:submit.prevent="register">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>{{ __('lang.Email') }}</label>
                                            <input type="email" class="form-control h-50" wire:model.lazy="email"
                                                required placeholder="{{ __('lang.EmailPlaceHolder') }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>{{ __('lang.Fullname') }}</label>
                                            <input type="text" class="form-control h-50" wire:model.lazy="fullname"
                                                required placeholder="{{ __('lang.FullnamePlaceHolder') }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>{{ __('lang.PhoneNo') }}</label>
                                            <input
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                type="number" maxlength="10" class="form-control h-50" required
                                                wire:model.lazy="phoneNo"
                                                placeholder="{{ __('lang.PhoneNoPlaceHolder') }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>{{ __('lang.SchoolName') }}</label>
                                            <input type="text" class="form-control h-50" wire:model.lazy="schoolName"
                                                required placeholder="{{ __('lang.SchoolNamePlaceHolder') }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>{{ __('lang.City') }}</label>
                                            <input type="text" class="form-control h-50" wire:model.lazy="city" required
                                                placeholder="{{ __('lang.CityPlaceHolder') }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>{{ __('lang.Address') }}</label>
                                            <input type="text" class="form-control h-50" wire:model.lazy="address"
                                                required placeholder="{{ __('lang.AddressPlaceHolder') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button type="submit"
                                            class="btn btn-primary btn-lg mt-10">{{ __('lang.Send') }}</button>
                                    </div>
                                </div>
                            </form>
                            <div class="text-center">
                                <p class="mt-15 mb-0"><a href="/login"
                                        class="text-primary ml-5">{{ __('lang.LogIn') }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
