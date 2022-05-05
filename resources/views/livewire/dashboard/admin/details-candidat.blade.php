<section class="content">
    <div class="row">
        <div class="col-12 col-lg-12 col-xl-12">
            <div class="box box-widget widget-user">
                <div class="widget-user-header bg-black"
                    style="background: url('{{ asset('assets/images/gallery/full/10.jpg') }}') center center;">
                </div>
                <div class="widget-user-image">
                    <img class="rounded-circle h-90" src="{{ asset('assets/img/candidat/' . $candidat->photo) }}"
                        alt="User Avatar" style="object-fit:cover">
                </div>
                <div class="box-footer">
                    <div class="row justify-content-center">
                        <div class="col-sm-4 br-1 bl-1 align-self-center">
                            <div class="description-block">
                                <h5 class="description-header">{{ $candidat->user->name }}</h5>
                                <span class="description-text">{{ $candidat->cni }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="box">
                <div class="box-body box-profile">
                    <div class="flexbox align-items-baseline border-bottom mb-5">
                        <h4 class="text-uppercase ls-2 font-wieght-bold">{{ __('lang.InformationGeneral') }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <p class="dark-text">{{ __('lang.Email') }} <br> <span
                                        class="dark-text">{{ $candidat->user->email }}</span> </p>
                                <p class="dark-text">{{ __('lang.PhoneNo') }} <br> <span
                                        class="text-gray">{{ $candidat->phoneNumber($candidat->phoneNo) }}</span>
                                </p>
                                <p class="dark-text">{{ __('lang.School') }} <br> <span
                                        class="text-gray">{{ $candidat->school->name }}</span>
                                </p>
                                <p class="dark-text">{{ __('lang.Tarifs') }} <br> <span
                                        class="text-gray">{{ $candidat->tarifs . ' ' . __('lang.Currancy') }}</span>
                                </p>
                                <p class="dark-text">{{ __('lang.Paid') }} <br> <span
                                        class="text-gray">{{ $candidat->paid . ' ' . __('lang.Currancy') }}</span>
                                </p>
                                <p class="dark-text">{{ __('lang.DateStart') }} <br> <span
                                        class="text-gray">{{ \Carbon\Carbon::parse($candidat->created_at)->diffForHumans() }}
                                    </span></p>
                                <p class="dark-text">{{ __('lang.AccountStatus') }} <br> <span
                                        class="text-gray"><span
                                            class="badge badge-lg badge-{{ $candidat->status == 0 ? 'warning' : 'success' }}">{{ $candidat->status == 0 ? __('lang.Inactif') : __('lang.Actif') }}</span></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title">{{ __('lang.Files') }}</h4>
                </div>
                <div class="box-body p-0">
                    <div class="table-responsive">
                        <table class="table no-border table-vertical-center">
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="{{ asset('assets/img/candidat/' . $candidat->cniRecto) }}"
                                            target="_blank"
                                            class="dark-text font-weight-600 hover-primary font-size-14">{{ __('lang.CopieCNIRecto') }}</a>
                                    </td>
                                    <td class="text-left">
                                        <a href="{{ asset('assets/img/candidat/' . $candidat->cniRecto) }}"
                                            target="_blank" class="btn btn-primary-light btn-sm"><span
                                                class="iconly-Show font-size-18"><span
                                                    class="path1"></span><span
                                                    class="path2"></span></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{ asset('assets/img/candidat/' . $candidat->cniVerso) }}"
                                            target="_blank"
                                            class="dark-text font-weight-600 hover-primary font-size-14">{{ __('lang.CopieCNIVerso') }}</a>
                                    </td>
                                    <td class="text-left">
                                        <a href="{{ asset('assets/img/candidat/' . $candidat->cniVerso) }}"
                                            target="_blank" class="btn btn-primary-light btn-sm"><span
                                                class="iconly-Show font-size-18"><span
                                                    class="path1"></span><span
                                                    class="path2"></span></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{ asset('assets/img/candidat/' . $candidat->certificat) }}"
                                            target="_blank"
                                            class="dark-text font-weight-600 hover-primary font-size-14">{{ __('lang.CopyOfCertif') }}</a>
                                    </td>
                                    <td class="text-left">
                                        <a href="{{ asset('assets/img/candidat/' . $candidat->certificat) }}"
                                            target="_blank" class="btn btn-primary-light btn-sm"><span
                                                class="iconly-Show font-size-18"><span
                                                    class="path1"></span><span
                                                    class="path2"></span></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{ asset('assets/img/candidat/' . $candidat->contrat) }}"
                                            target="_blank"
                                            class="dark-text font-weight-600 hover-primary font-size-14">{{ __('lang.CopieCNIRecto') }}</a>
                                    </td>
                                    <td class="text-left">
                                        <a href="{{ asset('assets/img/candidat/' . $candidat->contrat) }}"
                                            target="_blank" class="btn btn-primary-light btn-sm"><span
                                                class="iconly-Show font-size-18"><span
                                                    class="path1"></span><span
                                                    class="path2"></span></span></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-8 col-xl-8">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">{{ __('lang.Session') }}</h4>
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('lang.Fullname') }}</th>
                                    <th>{{ __('lang.School') }}</th>
                                    <th>{{ __('lang.PhoneNo') }}</th>
                                    <th>{{ __('lang.Created_At') }}</th>
                                    <th>{{ __('lang.AccountStatus') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">

                    </div>
                </div>
            </div>
        </div>
</section>
