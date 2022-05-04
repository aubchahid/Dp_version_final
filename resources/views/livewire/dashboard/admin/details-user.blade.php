 <section class="content">
     <div class="row">
         <div class="col-12 col-lg-12 col-xl-12">
             <div class="box box-widget widget-user">
                 <!-- Add the bg color to the header using any of the bg-* classes -->
                 <div class="widget-user-header bg-black"
                     style="background: url('{{ asset('assets/images/gallery/full/10.jpg') }}') center center;">
                 </div>
                 <div class="widget-user-image">
                     <img class="rounded-circle" src="{{ asset('assets/images/user3-128x128.jpg') }}"
                         alt="User Avatar">
                 </div>
                 <div class="box-footer">
                     <div class="row justify-content-center">

                         <div class="col-sm-4 br-1 bl-1 align-self-center">
                             <div class="description-block">
                                 <h5 class="description-header">{{ __('lang.Fullname') . ' ' . $user->name }}</h5>
                                
                             </div>
                             <!-- /.description-block -->
                         </div>

                     </div>
                     <!-- /.row -->
                 </div>
             </div>
         </div>
         <div class="col-12">
             <div class="box">
                 <div class="box-body box-profile">
                     <div class="row">
                         <div class="col-12">
                             <div>
                                 <p>{{ __('lang.Fullname') }} <br> <span
                                         class="text-gray">{{ $user->name }}</span> </p>
                                 <p>{{ __('lang.Email') }} <br> <span
                                         class="text-gray">{{ $user->email }}</span>
                                 </p>
                                 <p>{{ __('lang.RoleUser') }} <br> <span
                                         class="text-gray">{{ $user->role }}</span>
                                 </p>
                               
                                
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- /.box-body -->
             </div>
             <div class="box">
                 <div class="box-body">
                    
                     <div class="gap-items-2 gap-y">
                         <a class="avatar" href="#"><img src="../images/avatar/1.jpg" alt="..."></a>
                         <a class="avatar" href="#"><img src="../images/avatar/3.jpg" alt="..."></a>
                         <a class="avatar" href="#"><img src="../images/avatar/4.jpg" alt="..."></a>
                         <a class="avatar" href="#"><img src="../images/avatar/5.jpg" alt="..."></a>
                         <a class="avatar" href="#"><img src="../images/avatar/6.jpg" alt="..."></a>
                         <a class="avatar" href="#"><img src="../images/avatar/7.jpg" alt="..."></a>
                         <a class="avatar" href="#"><img src="../images/avatar/8.jpg" alt="..."></a>
                         <a class="avatar avatar-more" href="#">+15</a>
                     </div>
                 </div>
                 <div class="box-footer">
                     <a class="text-uppercase d-blockls-1 text-fade" href="#">{{ __('lang.AddUser') }}</a>
                 </div>
             </div>
            
         <div class="col-12 col-lg-12 col-xl-12">

            <div class="nav-tabs-custom">

              <div class="tab-content">

               <div class="active tab-pane" id="usertimeline">
                  <div class="publisher publisher-multi bg-white b-1 mb-30">
                    <textarea class="publisher-input auto-expand" rows="4" placeholder="Write something"></textarea>
                    <div class="flexbox">
                      <div class="gap-items">
                        <span class="publisher-btn file-group">
                          <i class="fa fa-image file-browser"></i>
                          <input type="file">
                        </span>
                        <a class="publisher-btn" href="#"><i class="fa fa-map-marker"></i></a>
                        <a class="publisher-btn" href="#"><i class="fa fa-smile-o"></i></a>
                      </div>

                      <button class="btn btn-sm btn-bold btn-primary">Post</button>
                    </div>
                  </div>

                  <div class="box">
                    <div class="media bb-1 border-fade">
                      <img class="avatar avatar-lg" src="../images/avatar/3.jpg" alt="...">
                      <div class="media-body">
                        <p>
                          <strong>Denial Webar</strong>
                          <time class="float-right text-fade" datetime="2017">24 min ago</time>
                        </p>
                        <p><small>Designer</small></p>
                      </div>
                    </div>

                    <div class="box-body bb-1 border-fade">
                      <p class="lead">Authoritatively syndicate goal-oriented leadership skills for clicks-and-mortar outsourcing. Synergistically reconceptualize enabled catalysts for change.</p>

                      <div class="gap-items-4 mt-10">
                        <a class="text-fade hover-light" href="#">
                          <i class="fa fa-thumbs-up mr-1"></i> 1254
                        </a>
                        <a class="text-fade hover-light" href="#">
                          <i class="fa fa-comment mr-1"></i> 25
                        </a>
                        <a class="text-fade hover-light" href="#">
                          <i class="fa fa-share-alt mr-1"></i> 12
                        </a>
                      </div>
                    </div>


                    <div class="media-list media-list-divided bg-lighter">
                      <div class="media">
                        <a class="avatar" href="#">
                          <img src="../images/avatar/6.jpg" alt="...">
                        </a>
                        <div class="media-body">
                          <p>
                            <a href="#"><strong>Rock Tele</strong></a>
                            <time class="float-right text-fade" datetime="2017-07-14 20:00">Just now</time>
                          </p>
                          <p>Uniquely enhance world-class channels with just in time schemas.</p>

                          <div class="media px-0 mt-20">
                            <a class="avatar" href="#">
                              <img src="../images/avatar/8.jpg" alt="...">
                            </a>
                            <div class="media-body">
                              <p>
                                <a href="#"><strong>Brock Lensar</strong></a>
                                <time class="float-right text-fade" datetime="2017-07-14 20:00">26 mins ago</time>
                              </p>
                              <p>Thank you for your nice comment.</p>
                            </div>
                          </div>

                        </div>
                      </div>

                      <div class="media">
                        <a class="avatar" href="#">
                          <img src="../images/avatar/9.jpg" alt="...">
                        </a>
                        <div class="media-body">
                          <p>
                            <a href="#"><strong>Tony Stark</strong></a>
                            <time class="float-right text-fade" datetime="2017-07-14 20:00">2 hours ago</time>
                          </p>
                          <p>Continually drive user friendly solutions through performance based infomediaries.</p>
                        </div>
                      </div>
                    </div>

                    <form class="publisher bt-1 border-fade">
                      <img class="avatar avatar-sm" src="../images/avatar/4.jpg" alt="...">
                      <input class="publisher-input" type="text" placeholder="Add Your Comment">
                      <a class="publisher-btn" href="#"><i class="fa fa-smile-o"></i></a>
                      <span class="publisher-btn file-group">
                        <i class="fa fa-camera file-browser"></i>
                        <input type="file">
                      </span>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
     </div>
 </section>
