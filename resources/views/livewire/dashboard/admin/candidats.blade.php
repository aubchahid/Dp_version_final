<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box no-shadow mb-0 bg-transparent">
                <div class="box-header no-border px-0">
                    <h4 class="box-title">{{ __('lang.Candidates') }}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-User2 h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.Candidates') }}</h5>
                        <a class="dark-text">{{ $candidates->count() . ' ' . __('lang.Candidate') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title"><button type="button" data-toggle="modal" data-target="#addCandidat"
                            class="waves-effect waves-light btn btn-primary mb-5">{{ __('lang.AddCandidat') }}</button>
                    </h4>
                    <div class="box-controls pull-right">
                        <input type="text" class="form-control" placeholder="{{ __('lang.SearchByCandidatName') }}"
                            wire:model="search">
                    </div>
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
                                @foreach ($candidates as $item)
                                    <tr>
                                        <td>{{ $item->cni }}</td>
                                        <td><a
                                                href="/details-candidat/{{ $item->id }}">{{ $item->user->name }}</a>
                                        </td>
                                        <td><a
                                                href="/details-school/{{ $item->school->id }}">{{ __('lang.School') . ' ' . $item->school->name }}</a>
                                        </td>
                                        <td>{{ $item->phoneNumber($item->phoneNo) }}</td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i>
                                                {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge badge-lg badge-{{ $item->status == 0 ? 'warning' : ($item->status == 1 ? 'success' : 'danger') }}">{{ $item->status == 0? __('lang.Waiting'): ($item->status == 1? __('lang.Successfully'): __('lang.Rejected')) }}</span>
                                        </td>
                                        <td>
                                            <a href="/details-candidat/{{ $item->id }}"
                                                class="waves-effect waves-circle btn btn-circle btn-info btn-xs mb-5"><i
                                                    class="iconly-Show"></i></a>
                                            <button type="button" data-toggle="modal" data-target="#editCandidat"
                                                wire:click="setEdit({{ $item->id }})"
                                                class="waves-effect waves-circle btn btn-circle btn-warning btn-xs mb-5"><i
                                                    class="iconly-Edit"></i></button>
                                            <button type="button" data-toggle="modal" data-target="#deleteCandidat"
                                                wire:click="$set('idCandidat',{{ $item->id }})"
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

    <!-- Modal Add Candidat -->
    <div wire:ignore.self class="modal fade" id="addCandidat" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="submit">
                    <div class="modal-header">
                        <h4 class="modal-title dark-text" id="exampleModalLongTitle">{{ __('lang.AddCandidat') }}
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
                                        placeholder="{{ __('lang.Email') }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Fullname') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="fullname"
                                        placeholder="{{ __('lang.Fullname') }}" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.PhoneNo') }}</label>
                                    <input
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        type="number" maxlength="10" class="form-control h-50" wire:model.lazy="phoneNo"
                                        placeholder="{{ __('lang.PhoneNo') }}" required>
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
                                    <label class="dark-text">{{ __('lang.Birthdate') }}</label>
                                    <input type="date" class="form-control h-50" data-inputmask="'alias': 'dd/mm/yyyy'"
                                        data-mask="" wire:model.lazy="birthdate" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Sexe') }}</label>
                                    <select class="form-control h-50" style="width: 100%;" tabindex="-1"
                                        aria-hidden="true" wire:model.lazy="sexe" required>
                                        <option value="--">{{ __('lang.SelectHolder') }}</option>
                                        <option value="1">{{ __('lang.Male') }}</option>
                                        <option value="2">{{ __('lang.Female') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Cni') }}</label>
                                    <input type="text" class="form-control h-50" placeholder="{{ __('lang.Cni') }}"
                                        wire:model.lazy="cni" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.CopieCNIRecto') }}</label>
                                    <input type="file" class="form-control h-50"
                                        placeholder="{{ __('lang.AddressPlaceHolder') }}" wire:model.lazy="cniRecto"
                                        required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.CopieCNIVerso') }}</label>
                                    <input type="file" class="form-control h-50"
                                        placeholder="{{ __('lang.AddressPlaceHolder') }}" wire:model.lazy="cniVerso"
                                        required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.CopyOfContract') }}</label>
                                    <input type="file" class="form-control h-50"
                                        placeholder="{{ __('lang.AddressPlaceHolder') }}" wire:model.lazy="contrat"
                                        required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.CopyOfCertif') }}</label>
                                    <input type="file" class="form-control h-50" wire:model.lazy="certifcat"
                                        placeholder="{{ __('lang.AddressPlaceHolder') }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Tarifs') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="tarif"
                                        placeholder="{{ __('lang.Tarifs') }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Paid') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="paid"
                                        placeholder="{{ __('lang.Paid') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" data-dismiss="modal"
                            class="btn btn-danger">{{ __('lang.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('lang.AddCandidat') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Candidat -->
    <div wire:ignore.self class="modal fade" id="editCandidat" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="edit">
                    <div class="modal-header">
                        <h4 class="modal-title dark-text" id="exampleModalLongTitle">{{ __('lang.AddCandidat') }}
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
                                        placeholder="{{ __('lang.Email') }}" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Fullname') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="fullname"
                                        placeholder="{{ __('lang.Fullname') }}" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.PhoneNo') }}</label>
                                    <input
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        type="number" maxlength="10" class="form-control h-50"
                                        wire:model.lazy="phoneNo" placeholder="{{ __('lang.PhoneNo') }}" required>
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
                                    <label class="dark-text">{{ __('lang.Birthdate') }}</label>
                                    <input type="date" class="form-control h-50" data-inputmask="'alias': 'dd/mm/yyyy'"
                                        data-mask="" wire:model.lazy="birthdate" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Sexe') }}</label>
                                    <select class="form-control h-50" style="width: 100%;" tabindex="-1"
                                        aria-hidden="true" wire:model.lazy="sexe" required>
                                        <option value="--">{{ __('lang.SelectHolder') }}</option>
                                        <option value="1">{{ __('lang.Male') }}</option>
                                        <option value="2">{{ __('lang.Female') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Cni') }}</label>
                                    <input type="text" class="form-control h-50" placeholder="{{ __('lang.Cni') }}"
                                        wire:model.lazy="cni" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Tarifs') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="tarif"
                                        placeholder="{{ __('lang.Tarifs') }}" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Paid') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="paid"
                                        placeholder="{{ __('lang.Paid') }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" data-dismiss="modal"
                            class="btn btn-danger">{{ __('lang.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('lang.EditCandidate') }}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Modal Delete Candidat -->
    <div wire:ignore.self class="modal fade" id="deleteCandidat" tabindex="-1" role="dialog"
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
                            <h5 class="dark-text">{{ __('lang.DeleteCandidatMessage') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" data-dismiss="modal" class="btn btn-light">{{ __('lang.No') }}</button>
                    <button type="button" wire:click="deleteCandidat"
                        class="btn btn-danger">{{ __('lang.Yes') }}</button>
                </div>
            </div>
        </div>
    </div>

</section>
