<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box no-shadow mb-0 bg-transparent">
                <div class="box-header no-border px-0">
                    <h4 class="box-title">{{ __('lang.Users') }}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
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
        <div class="col-lg-3 col-md-6 col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-User2 h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.UsersAdmin') }}</h5>
                        <a>{{ $AdminUser->count() . ' ' . __('lang.UserAdmin') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-User2 h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.UsersSchool') }}</h5>
                        <a>{{ $SchoolUser->count() . ' ' . __('lang.UserSchool') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-User2 h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.UsersCandidat') }}</h5>
                        <a>{{ $CandidatUser->count() . ' ' . __('lang.UserCandidat') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title"><button type="button" data-toggle="modal" data-target="#addUser"
                            class="waves-effect waves-light btn btn-primary mb-5">{{ __('lang.AddCandidat') }}</button>
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
                                    <th>{{ __('lang.RoleUser') }}</th>

                                    <th>{{ __('lang.Created_At') }}</th>
                                  
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $u)
                                    <tr>
                                        <td>{{ $u->id }}</td>
                                        {{-- <td>{{ $u->name }}</td> --}}
                                        <td><a href="/details-user/{{$u->id}}">{{ $u->name }}</a></td>
                                        <td>{{ $u->email }}</td>
                                        <td>
                                            @if ( $u->role == "ROLE_ADMIN" )
                                                {{ __('lang.RoleAdmin') }}
                                            @elseif ( $u->role == "ROLE_SCHOOL" )
                                                {{ __('lang.RoleSchool') }}
                                            @else
                                                {{ __('lang.RoleCandidat') }}
                                            @endif
                                        </td>
                                                 <td><span class="text-muted"><i class="fa fa-clock-o"></i>
                                                {{ \Carbon\Carbon::parse($u->created_at)->diffForHumans() }}</span>
                                        </td>
                                        <td>
            

                                            <button type="button" href="#"
                                                class="waves-effect waves-circle btn btn-circle btn-info btn-xs mb-5"><i
                                                    class="iconly-Show"></i></button><button type="button" data-toggle="modal" data-target="#edituser" wire:click.prevent="editUser({{ $u->id }})" 
                                                class="waves-effect waves-circle btn btn-circle btn-warning btn-xs mb-5"><i
                                                    class="iconly-Edit" ></i></button><button type="button" wire:click.prevent="deleteUser({{ $u->id }})"
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
    <div wire:ignore.self class="modal fade" id="addUser" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="addUser">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('lang.AddUser') }}
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
                                    <input type="text" class="form-control h-50" wire:model.lazy="name"
                                        placeholder="{{ __('lang.Fullname') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('lang.Email') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="email"
                                        placeholder="{{ __('lang.Email') }}">
                                       
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>{{ __('lang.RoleUser') }}</label>
                                        {{-- <select>
                                            <option>{{ __('lang.SelectRole') }}</option>
                                            <option></option>
                                            <option></option>
                                            <option></option>
                                        </select> --}}
                                        <input type="text" class="form-control h-50" wire:model.lazy="role"
                                            placeholder="{{ __('lang.RoleUser') }}">
                                    </div>
                
                                    <div class="modal-footer text-center">
                                        <button type="button" data-dismiss="modal"
                                            class="btn btn-danger">{{ __('lang.Close') }}</button>
                                        <button type="submit" class="btn btn-success">{{ __('lang.AddUser') }}</button>
                                    </div>
                        
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Update-->
    <div wire:ignore.self class="modal fade" id="edituser" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="updateUser">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('lang.AddUser') }}
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
                                    <input type="text" class="form-control h-50" wire:model.lazy="name" name="name" id="name"
                                        placeholder="{{ __('lang.Fullname') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('lang.Email') }}</label>
                                    <input type="text" class="form-control h-50" wire:model.lazy="email" name="email" id="email"
                                        placeholder="{{ __('lang.Email') }}">
                                       
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>{{ __('lang.RoleUser') }}</label>
                                        <input type="text" class="form-control h-50" wire:model.lazy="role" name="role" id="role"
                                        placeholder="{{ __('lang.RoleUser') }}">
                                    </div>
            
                                    <div class="modal-footer text-center">
                        
                                        <button type="submit" class="btn btn-success">{{ __('lang.EditUser') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
