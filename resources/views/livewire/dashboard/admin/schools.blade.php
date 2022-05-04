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
                        <a class="dark-text">{{ $schools->count() . ' ' . __('lang.School') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-Bookmark h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.InactifSchool') }}</h5>
                        <a class="dark-text">{{ $inactifSchool->count() . ' ' . __('lang.School') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-Bookmark h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.ActifSchool') }}</h5>
                        <a class="dark-text">{{ $actifSchool->count() . ' ' . __('lang.School') }}</a>
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
                                        <td><a
                                                href="/details-school/{{ $sc->id }}">{{ __('lang.School') . ' ' . $sc->name }}</a>
                                        </td>
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
                                            <a href="/details-school/{{ $sc->id }}"
                                                class="waves-effect waves-circle btn btn-circle btn-info btn-xs mb-5"><i
                                                    class="iconly-Show"></i></a>
                                            @if ($sc->status)
                                                <button type="button" data-toggle="modal" data-target="#desactiveSchool"
                                                    wire:click="$set('idInscription',{{ $sc->id }})"
                                                    class="waves-effect waves-circle btn btn-circle btn-warning btn-xs mb-5"><i
                                                        class="iconly-Shield-Fail"></i></button>
                                            @else
                                                <button type="button" data-toggle="modal" data-target="#activeSchool"
                                                    wire:click="$set('idInscription',{{ $sc->id }})"
                                                    class="waves-effect waves-circle btn btn-circle btn-warning btn-xs mb-5"><i
                                                        class="iconly-Shield-Done"></i></button>
                                            @endif
                                            <button type="button" data-toggle="modal" data-target="#deleteSchool"
                                                wire:click="$set('idInscription',{{ $sc->id }})"
                                                class="waves-effect waves-circle btn btn-circle btn-danger btn-xs mb-5"><i
                                                    class="iconly-Delete"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $schools->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add School -->
    <div wire:ignore.self class="modal fade" id="addSchool" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="addSchool">
                    <div class="modal-header">
                        <h4 class="modal-title dark-text" id="exampleModalLongTitle">{{ __('lang.AddingNewSchool') }}
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Email') }}</label>
                                    <input type="email" class="form-control h-50" wire:model.lazy="email"
                                        placeholder="{{ __('lang.EmailPlaceHolder') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Fullname') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="fullname"
                                        placeholder="{{ __('lang.FullnamePlaceHolder') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.PhoneNo') }}</label>
                                    <input
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        type="number" maxlength="10" class="form-control h-50" wire:model.lazy="phoneNo"
                                        placeholder="{{ __('lang.PhoneNoPlaceHolder') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.SchoolName') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="schoolName"
                                        placeholder="{{ __('lang.SchoolNamePlaceHolder') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.City') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="city"
                                        placeholder="{{ __('lang.CityPlaceHolder') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Address') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="address"
                                        placeholder="{{ __('lang.AddressPlaceHolder') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal"
                            class="btn btn-danger">{{ __('lang.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('lang.Create') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Activer/Desactiver School -->
    <div wire:ignore.self class="modal fade" id="activeSchool" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger" id="exampleModalLongTitle">{{ __('lang.Confirmation') }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h5>{{ __('lang.ActiveConfirmation') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" data-dismiss="modal" class="btn btn-light">{{ __('lang.No') }}</button>
                    <button type="button" wire:click="activateSchool"
                        class="btn btn-danger">{{ __('lang.Yes') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="desactiveSchool" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger" id="exampleModalLongTitle">{{ __('lang.Confirmation') }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h5>{{ __('lang.DesactiveConfirmation') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" data-dismiss="modal" class="btn btn-light">{{ __('lang.No') }}</button>
                    <button type="button" wire:click="desactivateSchool"
                        class="btn btn-danger">{{ __('lang.Yes') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete School -->
    <div wire:ignore.self class="modal fade" id="deleteSchool" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger" id="exampleModalLongTitle">{{ __('lang.Confirmation') }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h5>{{ __('lang.DeleteConfirmationMessage') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" data-dismiss="modal" class="btn btn-light">{{ __('lang.No') }}</button>
                    <button type="button" wire:click="deleteSchool"
                        class="btn btn-danger">{{ __('lang.Yes') }}</button>
                </div>
            </div>
        </div>
    </div>

</section>
