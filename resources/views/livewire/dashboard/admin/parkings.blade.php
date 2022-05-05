<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box no-shadow mb-0 bg-transparent">
                <div class="box-header no-border px-0">
                    <h4 class="box-title">{{ __('lang.Parking') }}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-Ticket h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.Cars') }}</h5>
                        <a>{{ $cars->count() . ' ' . __('lang.Car') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title"><button type="button" data-toggle="modal" data-target="#addCar"
                            class="waves-effect waves-light btn btn-primary mb-5">{{ __('lang.AddCar') }}</button>
                    </h4>
                    <div class="box-controls pull-right">
                        <input type="text" class="form-control" placeholder="{{ __('lang.SearchCarPlaceholder') }}"
                            wire:model="search">
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('lang.Brand') }}</th>
                                    <th>{{ __('lang.Engine') }}</th>
                                    <th>{{ __('lang.Color') }}</th>
                                    <th>{{ __('lang.School') }}</th>
                                    <th>{{ __('lang.Matricule') }}</th>
                                    <th>{{ __('lang.Status') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cars as $item)
                                    <tr>
                                        <td><a href="">{{ $item->brand . ' ' . $item->version }}</a></td>
                                        <td>{{ __('lang.' . $item->engine) }}</td>
                                        <td>{{ $item->color }}</td>
                                        <td><a
                                                href="/details-school/{{ $item->school->id }}">{{ __('lang.School') . ' ' . $item->school->name }}</a>
                                        </td>
                                        <td>{{ $item->matricule }}</td>
                                        <td>
                                            <span
                                                class="badge badge-lg badge-{{ $item->status == 0 ? 'warning' : ($item->status == 1 ? 'success' : 'danger') }}">{{ $item->status == 0 ? __('lang.Waiting') : ($item->status == 1 ? __('lang.Successfully') : __('lang.Rejected')) }}</span>
                                        </td>
                                        <td>
                                            <a href="/details-candidat/{{ $item->id }}"
                                                class="waves-effect waves-circle btn btn-circle btn-info btn-xs mb-5"><i
                                                    class="iconly-Show"></i></a>
                                            <button type="button" data-toggle="modal" data-target="#editCandidat"
                                                wire:click="setEdit({{ $item->id }})"
                                                class="waves-effect waves-circle btn btn-circle btn-warning btn-xs mb-5"><i
                                                    class="iconly-Edit"></i></button>
                                            <button type="button" data-toggle="modal" data-target="#deleteMoniteur"
                                                wire:click="$set('idMoniteur',{{ $item->id }})"
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

    <!-- Modal Add Car -->
    <div wire:ignore.self class="modal fade" id="addCar" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="submit">
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
                                    <label class="dark-text">{{ __('lang.Brand') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="brand" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Version') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="version" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Kilometrage') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="kilometrage" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Engine') }}</label>
                                    <select class="form-control h-50" style="width: 100%;" tabindex="-1"
                                        aria-hidden="true" wire:model.lazy="engine" required>
                                        <option value="--">{{ __('lang.SelectHolder') }}</option>
                                        <option value="Diesel">{{ __('lang.Diesel') }}</option>
                                        <option value="Essance">{{ __('lang.Essance') }}</option>
                                        <option value="Electro">{{ __('lang.Electro') }}</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Color') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="color" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Matricule') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="matricule" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.School') }}</label>
                                    <select class="form-control h-50" style="width: 100%;" tabindex="-1"
                                        aria-hidden="true" wire:model.lazy="school" required>
                                        <option value="--" selected>{{ __('lang.SelectHolder') }}</option>
                                        @foreach ($schools as $item)
                                            <option value="{{ $item->id }}">
                                                {{ __('lang.School') . ' ' . $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Photo') }}</label>
                                    <input type="file" class="form-control h-50" wire:model.lazy="photo" required>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" data-dismiss="modal"
                            class="btn btn-danger">{{ __('lang.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('lang.Create') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Car -->
    <div wire:ignore.self class="modal fade" id="editCar" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="addSchool">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('lang.EditSchool') }}
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('lang.Email') }}</label>
                                    <input type="email" class="form-control h-50" wire:model.lazy="email"
                                        placeholder="{{ __('lang.EmailPlaceHolder') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('lang.Fullname') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="fullname"
                                        placeholder="{{ __('lang.FullnamePlaceHolder') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('lang.PhoneNo') }}</label>
                                    <input
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        type="number" maxlength="10" class="form-control h-50" wire:model.lazy="phoneNo"
                                        placeholder="{{ __('lang.PhoneNoPlaceHolder') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('lang.SchoolName') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="schoolName"
                                        placeholder="{{ __('lang.SchoolNamePlaceHolder') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('lang.City') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="city"
                                        placeholder="{{ __('lang.CityPlaceHolder') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('lang.Address') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="address"
                                        placeholder="{{ __('lang.AddressPlaceHolder') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" data-dismiss="modal"
                            class="btn btn-danger">{{ __('lang.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('lang.Create') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Delete Car -->
    <div wire:ignore.self class="modal fade" id="deleteCar" tabindex="-1" role="dialog"
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
                    <button type="button" data-dismiss="modal"
                        class="btn btn-secondary">{{ __('lang.No') }}</button>
                    <button type="button" wire:click="deleteSchool"
                        class="btn btn-danger">{{ __('lang.Yes') }}</button>
                </div>
            </div>
        </div>
    </div>

</section>
