<section class="content">
   
    <div class="row">
         <div class="col-12">
            <div class="box no-shadow mb-0 bg-transparent">
                <div class="box-header no-border px-0">
                    <h4 class="box-title">{{ __('lang.UsersMenu') }}</h4>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="box">
                <div class="box-body d-flex align-items-center">
                    <i class="iconly-Notification h1 ml-2"></i>
                    <div class="d-flex flex-column flex-grow-1">
                        <h5 class="box-title font-size-16 font-weight-bold mb-2">{{ __('lang.Users') }}</h5>
                        <a>{{ $user->count() . ' ' . __('lang.Users') }}</a>
                    </div>
                </div>
            </div>
        </div>
        
            <div class="box">
              <div class="box-header with-border">
                    <h4 class="box-title">{{ __('lang.UsersMenu') }}</h4>
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
                                    <th>#</th>
                                    <th>{{ __('lang.Fullname') }}</th>
                                    <th>{{ __('lang.Email') }}</th>
                                    <th>{{ __('lang.RoleUser') }}</th>
                                    <th>{{__('lang.Created_At')}}</th>
                                
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $u)
                                    <tr>
                                        <td>{{$u->id}}</td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{$u->role}}</td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i>
                                                {{ \Carbon\Carbon::parse($u->created_at)->diffForHumans() }}</span>
                                        </td>
                                      
                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $user->links() }}
                    </div>
                </div>
</div>
</section>