<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box no-shadow mb-0 bg-transparent">
                <div class="box-header no-border px-0">
                    <h4 class="box-title">{{ __('lang.Users') }}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-User2 h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.Users') }}</h5>
                        <a>{{ $users->count() . ' ' . __('lang.User') }}</a>
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
                            class="waves-effect waves-light btn btn-primary mb-5">{{ __('lang.AddUser') }}</button>
                    </h4>
                    <div class="box-controls pull-right">
                        <input type="text" class="form-control" placeholder="{{ __('lang.SearchPlaceHolderUser') }}"
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
                                    <th>{{ __('lang.Email') }}</th>
                                    <th>{{ __('lang.Role') }}</th>
                                    <th>{{ __('lang.Created_At') }}</th>
                                    <th>{{ __('lang.AccountStatus') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><a href="">{{ $item->name }}</a></td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->returnRole($item->role) }}</td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i>
                                                {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                        </td>
                                        <td><span
                                                class="badge badge-lg badge-{{ $item->status == 0 ? 'warning' : 'success' }}">{{ $item->status == 0 ? __('lang.Inactif') : __('lang.Actif') }}</span>
                                        </td>
                                        <td><button type="button"
                                                class="waves-effect waves-circle btn btn-circle btn-info btn-xs mb-5"><i
                                                    class="iconly-Show"></i></button><button type="button"
                                                class="waves-effect waves-circle btn btn-circle btn-warning btn-xs mb-5"><i
                                                    class="iconly-Edit"></i></button><button type="button"
                                                class="waves-effect waves-circle btn btn-circle btn-danger btn-xs mb-5"><i
                                                    class="iconly-Delete"></i></button></td>

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
</section>
