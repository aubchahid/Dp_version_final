<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box no-shadow mb-0 bg-transparent">
                <div class="box-header no-border px-0">
                    <h4 class="box-title">{{ __('lang.Seances') }}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-Calendar h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.Seances') }}</h5>
                        <a class="dark-text">{{ __('lang.Coach') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-Calendar h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.Seance') }}</h5>
                        <a class="dark-text">{{ __('lang.Coach') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title"><button type="button" data-toggle="modal" data-target="#addMoniteur"
                            class="waves-effect waves-light btn btn-primary mb-5">{{ __('lang.AddMoniteur') }}</button>
                    </h4>
                    <div class="box-controls pull-right">
                        <input type="text" class="form-control"
                            placeholder="{{ __('lang.SearchMoniteurPlaceHolder') }}" wire:model="search">
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('lang.Fullname') }}</th>
                                    <th>{{ __('lang.PhoneNo') }}</th>
                                    <th>{{ __('lang.School') }}</th>
                                    <th>{{ __('lang.Matricule') }}</th>
                                    <th>{{ __('lang.Created_At') }}</th>
                                    <th>{{ __('lang.AccountStatus') }}</th>
                                    <th></th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                    <div class="d-flex justify-content-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
