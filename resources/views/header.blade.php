        <header id="aa-header">  
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="aa-header-area">
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <div class="aa-header-left">
                        <div class="aa-telephone-no">
                        </div>
                        <div class="aa-email hidden-xs">
                          
                        </div>
                      </div>              
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <div class="aa-header-right">
                        <a href="register.html" class="aa-register">1-900-523-3564</a>
                        <a href="{{route('login')}}" class="aa-login btn btn-dark" id="advertise">To Advertise</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>
        <!-- End header section -->

        <!-- Start menu section -->
        <section id="aa-menu-area">
          <nav class="navbar navbar-default main-navbar" role="navigation">  
            <div class="container">
              <div class="navbar-header">
                <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <!-- LOGO -->                                               
                <!-- Text based logo -->
                 <a class="navbar-brand" href="index.html"> Rental<span> Apartment</span></a>
                 <!-- Image based logo -->
                 <!-- <a class="navbar-brand aa-logo-img" href="index.html"><img src="img/logo.png" alt="logo"></a> -->
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
                  <li><a href="home">@lang('home.home')</a></li>
                  <li><a href="{{route('apartment.index')}}">@lang('home.apartment')</a></li>


                  <li><a href="contact">@lang('home.contact')</a></li>
                  <li><a href="aboutus">@lang('home.aboutus')</a></li>

                </ul>                            
              </div><!--/.nav-collapse -->


               <!--For Myanmar and English Font  -->
              <div id="navbar" class="navbar-collapse collapse form-inline my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a href="locale/em" class="nav-link"><img src="{{asset('css/eng.png')}}" style="width: 15px;height: 15px;"> English</a>
                  </li>
                  <li class="nav-item">
                    <a href="locale/mm" class="nav-link"><img src="{{asset('css/myanmar.png')}}" style="width: 15px;height: 15px;"> Myanmar</a>
                  </li>
                </ul>
              </div>      
            </div>          
          </nav> 
        </section>