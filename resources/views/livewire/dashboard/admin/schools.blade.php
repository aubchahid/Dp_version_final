<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box no-shadow mb-0 bg-transparent">
                <div class="box-header no-border px-0">
                    <h4 class="box-title">{{ __('lang.Schools') }}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-Bookmark h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.Schools') }}</h5>
                        <a>{{ $schools->count() . ' ' . __('lang.School') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title"><button type="button" data-toggle="modal" data-target="#addSchool"
                            class="waves-effect waves-light btn btn-primary mb-5">{{ __('lang.AddSchool') }}</button>
                    </h4>
                    <div class="box-controls pull-right">
                        <input type="text" class="form-control"
                            placeholder="{{ __('lang.SearchSchoolPlaceHolder') }}" wire:model="search">
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('lang.SchoolNameTable') }}</th>
                                    <th>{{ __('lang.AdminOf') }}</th>
                                    <th>{{ __('lang.PhoneNo') }}</th>
                                    <th>{{ __('lang.AccountStatus') }}</th>
                                    <th>{{ __('lang.Created_At') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schools as $sc)
                                    <tr>
                                        <td>{{ $sc->id }}</td>
                                        <td><a href="">{{ __('lang.School') . ' ' . $sc->name }}</a></td>
                                        <td>{{ $sc->admin->name }}</td>
                                        <td>{{ $sc->phoneNumber($sc->phoneNo) }}</td>
                                        <td>
                                            <span
                                                class="badge badge-lg badge-{{ $sc->status == 0 ? 'warning' : 'success' }}">{{ $sc->status == 0 ? __('lang.Inactif') : __('lang.Actif') }}</span>
                                        </td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i>
                                                {{ \Carbon\Carbon::parse($sc->created_at)->diffForHumans() }}</span>
                                        </td>
                                        <td>
                                            <button type="button"
                                                class="waves-effect waves-circle btn btn-circle btn-info btn-xs mb-5"><i
                                                    class="iconly-Show"></i></button><button type="button"
                                                class="waves-effect waves-circle btn btn-circle btn-warning btn-xs mb-5"><i
                                                    class="iconly-Edit"></i></button><button type="button"
                                                class="waves-effect waves-circle btn btn-circle btn-danger btn-xs mb-5"><i
                                                    class="iconly-Delete"></i></button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Details Request -->
    <div wire:ignore.self class="modal fade" id="addSchool" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">{{ __('lang.AddingNewSchool') }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer text-center">

                </div>
            </div>
        </div>
    </div>

</section>
