<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box no-shadow mb-0 bg-transparent">
                <div class="box-header no-border px-0">
                    <h4 class="box-title">{{ __('lang.Facturations') }}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-User2 h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.FacturationsSchool') }}</h5>
                        <a>{{ $factureSchool->count() . ' ' . __('lang.Facturation') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-User2 h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.FacturationsMoniteur') }}</h5>
                        <a>{{ $factureMoniteur->count() . ' ' . __('lang.Facturation') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-User2 h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.FacturationsCandidat') }}</h5>
                        <a>{{ $factureCandidat->count() . ' ' . __('lang.Facturation') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title"><button type="button" data-toggle="modal" data-target="#addfacturation"
                            class="waves-effect waves-light btn btn-primary mb-5">{{ __('lang.AddFacturation') }}</button>
                    </h4>
                    <div class="box-controls pull-right">
                        <input type="text" class="form-control" placeholder="{{ __('lang.SearchByUserName') }}"
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
                                    <th>{{ __('lang.Type') }}</th>
                                    <th>{{ __('lang.Montant') }}</th>
                                    <th>{{ __('lang.Payé') }}</th>
                                    <th>{{ __('lang.Reste') }}</th>
                                    <th>{{ __('lang.Created_At') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($factures as $f)
                                    <tr>
                                        <td>{{ $f->id }}</td>
                                        <td>{{ $f->user->name }}</td>
                                        <td>{{ $f->type }}</td>
                                        <td>{{ $f->montant .' '.  __('lang.Devise')}}</td>
                                        <td>{{ $f->payé .' '.  __('lang.Devise')}}</td>
                                        <td>{{ $f->reste .' '.  __('lang.Devise')}}</td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i>
                                                {{ \Carbon\Carbon::parse($f->created_at)->diffForHumans() }}</span>
                                        </td>
                                        <td>
                                            <button type="submit" data-toggle="modal" data-target="#editfacturation" wire:click.prevent="editFacturation({{ $f->id }})" 
                                                class="waves-effect waves-circle btn btn-circle btn-warning btn-xs mb-5"><i
                                                    class="iconly-Edit" ></i></button>
                                            <button type="button" wire:click.prevent="deleteFacturation({{ $f->id }})"
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
<!--Modal addUser-->
<div wire:ignore.self class="modal fade" id="addfacturation" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="addFacturation">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('lang.AddFacturation') }}
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('lang.Fullname') }}</label>
                                    {{-- <input type="text" class="form-control h-50" wire:model.lazy="fullname" name="fullname" id="fullname"
                                        placeholder="{{ __('lang.Fullname') }}"> --}}
                                    <select class="form-control h-50" wire:model.lazy="fullname" name="fullname" id="fullname">
                                        <option></option>
                                        @foreach ($users as $u)
                                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('lang.Type') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="type" name="type" id="type"
                                        placeholder="{{ __('lang.Type') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('lang.Montant') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="montant" name="montant" id="montant"
                                        placeholder="{{ __('lang.Montant') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('lang.Payé') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="payé" name="payé" id="payé"
                                        placeholder="{{ __('lang.Payé') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('lang.Reste') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="reste" name="reste" id="reste"
                                        placeholder="{{ __('lang.Reste') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="modal-footer text-center">
                                    <button type="button" data-dismiss="modal"
                                        class="btn btn-danger">{{ __('lang.Close') }}</button>
                                    <button type="submit" class="btn btn-success">{{ __('lang.AddFacturation') }}</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Update-->
    <div wire:ignore.self class="modal fade" id="editfacturation" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="updateFacturation">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('lang.EditFacturation') }}
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('lang.Fullname') }}</label>
                                    <select class="form-control h-50" wire:model.lazy="fullname" name="fullname" id="fullname">
                                        <option></option>
                                        @foreach ($users as $u)
                                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('lang.Type') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="type" name="type" id="type"
                                        placeholder="{{ __('lang.Type') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('lang.Montant') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="montant" name="montant" id="montant"
                                        placeholder="{{ __('lang.Montant') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('lang.Payé') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="payé" name="payé" id="payé"
                                        placeholder="{{ __('lang.Payé') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('lang.Reste') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="reste" name="reste" id="reste"
                                        placeholder="{{ __('lang.Reste') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="modal-footer text-center">
                                    <button type="submit" class="btn btn-success">{{ __('lang.EditUser') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</section>