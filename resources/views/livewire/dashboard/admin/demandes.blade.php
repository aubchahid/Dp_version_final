<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box no-shadow mb-0 bg-transparent">
                <div class="box-header no-border px-0">
                    <h4 class="box-title">{{ __('lang.DemandesMenu') }}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-Notification h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.Demandes') }}</h5>
                        <a class="dark-text">{{ $inscriptions->count() . ' ' . __('lang.Demande') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-Notification h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.DemandeInHold') }}</h5>
                        <a class="dark-text">{{ $inscriptionInHold->count() . ' ' . __('lang.Demande') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-Notification h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.DemandeRejected') }}</h5>
                        <a class="dark-text">{{ $inscriptionRefused->count() . ' ' . __('lang.Demande') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">{{ __('lang.DemandesMenu') }}</h4>
                    <div class="box-controls pull-right">
                        <input type="text" class="form-control" placeholder="{{ __('lang.SearchPlaceHolder') }}"
                            wire:model="search">
                    </div>
                </div>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('lang.Fullname') }}</th>
                                    <th>{{ __('lang.PhoneNo') }}</th>
                                    <th>{{ __('lang.SchoolNameTable') }}</th>
                                    <th>{{ __('lang.DemandeStatus') }}</th>
                                    <th>{{ __('lang.DateOfDemande') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inscriptions as $in)
                                    <tr>
                                        <td>{{ $in->fullname }}</td>
                                        <td>{{ $in->phoneNo }}</td>
                                        <td> {{ __('lang.School') . ' ' . $in->schoolName }}</td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i>
                                                {{ \Carbon\Carbon::parse($in->created_at)->diffForHumans() }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge badge-lg badge-{{ $in->status == 0 ? 'warning' : ($in->status == 1 ? 'success' : 'danger') }}">{{ $in->status == 0 ? __('lang.Waiting') : ($in->status == 1 ? __('lang.Successfully') : __('lang.Rejected')) }}</span>
                                        </td>
                                        <td>
                                            <button type="button" wire:click="setValueToModal({{ $in->id }})"
                                                data-toggle="modal" data-target="#detailsRequest"
                                                class=" btn btn-primary btn-flat mb-5">{{ __('lang.Open') }}</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $inscriptions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Details Request -->
    <div wire:ignore.self class="modal fade" id="detailsRequest" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title dark-text" id="exampleModalLongTitle">{{ __('lang.DetailsOfRequest') }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div wire:loading class="text-center">
                    <img src="{{ asset('assets/images/loading.gif') }}" class="h-80 w-80 text-center" alt=""
                        srcset="">
                </div>
                <div wire:loading.remove>>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Email') }}</label>
                                    <input type="email" class="form-control h-50" wire:model.lazy="email" disabled
                                        placeholder="{{ __('lang.EmailPlaceHolder') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Fullname') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="fullname" disabled
                                        placeholder="{{ __('lang.FullnamePlaceHolder') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.PhoneNo') }}</label>
                                    <input
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        type="number" maxlength="10" class="form-control h-50" disabled
                                        wire:model.lazy="phoneNo" placeholder="{{ __('lang.PhoneNoPlaceHolder') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.SchoolName') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="schoolName" disabled
                                        placeholder="{{ __('lang.SchoolNamePlaceHolder') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.City') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="city" disabled
                                        placeholder="{{ __('lang.CityPlaceHolder') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="dark-text">{{ __('lang.Address') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="address" disabled
                                        placeholder="{{ __('lang.AddressPlaceHolder') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        @if ($status == 0)
                            <button type="button" wire:click="refuseRequest"
                                class="btn btn-danger">{{ __('lang.Refuser') }}</button>
                            <button type="button" wire:click="acceptRequest"
                                class="btn btn-success">{{ __('lang.Accept') }}</button>
                        @endif
                        @if ($status == 1)
                            <label for="">{{ __('lang.Demande') . ' ' . __('lang.Successfully') }}</label>
                        @endif
                        @if ($status == 100)
                            <label for="">{{ __('lang.Demande') . ' ' . __('lang.Rejected') }}</label>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
