 <section class="content">
     <div class="row">
         <div class="col-12 col-lg-12 col-xl-12">
             <div class="box box-widget widget-user">
                 <div class="widget-user-header bg-black"
                     style="background: url('{{ asset('assets/images/gallery/full/10.jpg') }}') center center;">
                 </div>
                 <div class="widget-user-image">
                     <img class="rounded-circle h-90" src="{{ asset('assets/img/auto-ecole/' . $school->logo) }}"
                         alt="User Avatar" style="object-fit:cover">
                 </div>
                 <div class="box-footer">
                     <div class="row justify-content-center">
                         <div class="col-sm-4 br-1 bl-1 align-self-center">
                             <div class="description-block">
                                 <h5 class="description-header">{{ __('lang.School') . ' ' . $school->name }}</h5>
                                 <span class="description-text">{{ $school->city . ', Maroc' }}</span>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-4">
             <div class="box">
                 <div class="box-body box-profile">
                     <div class="flexbox align-items-baseline border-bottom mb-5">
                         <h4 class="text-uppercase ls-2 font-wieght-bold">{{ __('lang.InformationGeneral') }}</h4>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <div>
                                 <p>{{ __('lang.Email') }} <br> <span
                                         class="dark-text">{{ $school->admin->email }}</span> </p>
                                 <p>{{ __('lang.PhoneNo') }} <br> <span
                                         class="dark-text">{{ $school->phoneNumber($school->phoneNo) }}</span>
                                 </p>
                                 <p>{{ __('lang.Address') }} <br> <span
                                         class="dark-text">{{ $school->address . ', ' . $school->city }}</span>
                                 </p>
                                 <p>{{ __('lang.Founded') }} <br> <span
                                         class="dark-text">{{ $school->founded }}</span></p>
                                 <p>{{ __('lang.WorkingTime') }} <br> <span
                                         class="dark-text">{{ $school->wrokingTime }}</span></p>
                                 <p>{{ __('lang.Experience') }} <br> <span
                                         class="dark-text">{{ $school->experience . ' ' . __('lang.Years') }}</span>
                                 </p>
                                 <p>{{ __('lang.AccountStatus') }} <br> <span class="text-gray"><span
                                             class="badge badge-lg badge-{{ $school->status == 0 ? 'warning' : 'success' }}">{{ $school->status == 0 ? __('lang.Inactif') : __('lang.Actif') }}</span></span>
                                 </p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="box">
                 <div class="box-body">
                     <div class="flexbox align-items-baseline border-bottom  mb-20">
                         <h4 class="text-uppercase ls-2">{{ __('lang.Candidates') }}</h4>
                         <h4>{{ $school->candidats->count() }}</h4>
                     </div>
                     <div class="gap-items-2 gap-y">
                         @foreach ($school->candidats as $item)
                             <a class="avatar" href="/candidat/{{ $item->id }}"><img
                                     src="{{ asset('assets/img/candidat/' . $item->photo) }}" alt="..."></a>
                         @endforeach
                     </div>
                 </div>
             </div>
             <div class="box">
                 <div class="box-body">
                     <div class="flexbox align-items-baseline border-bottom  mb-20">
                         <h4 class="text-uppercase ls-2">{{ __('lang.Moniteurs') }}</h4>
                         <h4>{{ $school->moniteurs->count() }}</h4>
                     </div>
                     <div class="gap-items-2 gap-y">
                         @foreach ($school->moniteurs as $item)
                             <a class="avatar" href="#"><img
                                     src="{{ asset('assets/img/candidat/' . $item->photo) }}" alt="..."></a>
                         @endforeach
                     </div>
                 </div>
             </div>
             <div class="box">
                 <div class="box-body">
                     <div class="flexbox align-items-baseline border-bottom  mb-20">
                         <h4 class="text-uppercase ls-2">{{ __('lang.Cars') }}</h4>
                         <h4>{{ $school->cars->count() }}</h4>
                     </div>
                     <div class="gap-items-2 gap-y">
                         @foreach ($school->cars as $item)
                             <a class="avatar" href="#"><img
                                     src="{{ asset('assets/img/candidat/' . $item->photo) }}" alt="..."></a>
                         @endforeach
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-12 col-lg-8 col-xl-8">
             <div class="box">
                 <div class="box-body">
                     <div class="flexbox align-items-baseline border-bottom mb-5">
                         <h4 class="text-uppercase ls-2 font-wieght-bold">{{ __('lang.Description') }}</h4>
                     </div>
                     <p class="dark-text">{!! html_entity_decode(nl2br(e($school->description))) !!}
                     </p>
                 </div>
             </div>
             <div class="box">
                 <div class="box-body">
                     <form wire:submit.prevent="submitFeedback">
                         <div class="publisher publisher-multi bg-white b-1 mb-30">
                             <textarea class="publisher-input auto-expand" rows="4" placeholder="{{ __('lang.GiveUsYourFeedback') }}"
                                 wire:model.lazy="content" required></textarea>
                             <div class="flexbox">
                                 <div class="gap-items">
                                 </div>
                                 <button class="btn btn-sm btn-bold btn-primary"
                                     type="submit">{{ __('lang.Post') }}</button>
                             </div>
                         </div>
                     </form>
                     <div class="box">
                         @foreach ($feedback->slice(0, $this->limiter) as $item)
                             <div class="media bb-1 border-fade">
                                 <div class="media-body">
                                     <p>
                                         <strong>{{ $item->user->name }}</strong>
                                         <time class="float-right text-fade" datetime="2017">
                                             {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</time>
                                     </p>
                                 </div>
                             </div>
                             <div class="box-body bb-1 border-fade">
                                 <p class="dark-text">{!! html_entity_decode(nl2br(e($item->content))) !!}
                                 </p>
                             </div>
                         @endforeach
                         @if ($feedback->count() > $this->limiter)
                             <button wire:click="loadMore" class="btn btn-link">{{ __('lang.ShowMore') }}</button>
                         @endif
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
