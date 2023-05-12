@extends("web.{$configuracoes->template}.master.master")

@section('content')
  <section class="intro_section page_mainslider">
    <div class="flexslider"  data-slideshow="true" data-slideshowspeed="3000">
        <ul class="slides">
            <li class="ds text-left">
                <img src="http://webdesign-finder.com/youko/wp-content/uploads/2017/06/slide_01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="slide_description_wrapper">
                                <div class="slide_description">
                                    <div class="intro-layer" data-animation="slideRight">
                                        <h2	class=" light regular text-uppercase">FEBRAMEC</h2>
                                    </div>
                                    <div class="intro-layer " data-animation="fadeIn">
                                        <div class="  extra-light text-transform-none">
                                            <hr class="short_line">										
                                        </div>
                                    </div>
                                    <div class="intro-layer short" data-animation="fadeIn">
                                        <p	class="small light light-weight text-transform-none">
                                        Federação Brasileira de Artes Marciais e Esportes de Combate
                                        </p>
                                    </div>
                                    
                                </div> <!-- eof .slide_description -->
                            </div> <!-- eof .slide_description_wrapper -->
                        </div> <!-- eof .col-* -->
                    </div><!-- eof .row -->
                </div><!-- eof .container -->
            </li>
        </ul>
    </div> <!-- eof flexslider -->
  </section> <!-- eof intro_section -->

  <div class="fw-page-builder-content">    

    <section class="fw-main-row  ds dark section_padding_top_130 section_padding_bottom_130 columns_padding_15 section_overlay background_cover mobile-overlay" 
    style="background-image:url({{url('frontend/'.$configuracoes->template.'/img/bg/bg_img1.jpg')}});">
        <h3 class="hidden"> About</h3>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 fw-column"></div>
                <div class="col-xs-12 col-md-6 to_animate fw-column"  data-animation="slideRight">

                    <div class="fw-divider-space " style="margin-top: 17px;"></div>

                    <div class="special-heading text-left">
                        <h3 class="section_header margin_0  ">
                        <span class="lightfont regular text-uppercase">
                            História da <span class="highlight">Febramec</span></span>
                        </h3>
                    </div>

                    <div class="fw-divider-short-line">
                        <hr class="short_line divider_left"/>
                    </div>
                    <div class="fw-divider-space " style="margin-top: 20px;"></div>

                    <div class="text-block shortcode ">
                        <p>A Febramec desde 2020 é a entidade oficial que representa 
                          Artes Marciais e Esporte de Combate. Tendo como missão, devolver ao 
                          povo brasileiro, os grandes tempos dos esportes de combate no Brasil 
                          ao mesmo tempo em que promovendo de forma merecida os grandes mestres 
                          que se unam a nossa causa.
                        </p>
                    </div>

                    <div class="fw-divider-space " style="margin-top: 60px;"></div>

                    <div class="fw-theme-signature">
                        <div class="fw-signature-left-part">
                            <h4 class="section_header">Mestre Durval Netto</h4>
                            <div class="small-text highlight">Diretor / Instrutor</div>
                        </div>                        
                    </div>
                    <div class="fw-divider-space " style="margin-top: 10px;"></div>
                </div>
            </div>
        </div>
    </section>
    {{--
    <section class="fw-main-row  ds section_padding_top_130 section_padding_bottom_100 columns_padding_15 parallax section_overlay" style="background-image:url(http://webdesign-finder.com/youko/wp-content/uploads/2017/06/img_26.jpg);">
        <h3 class="hidden"> Services</h3>
                <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center fw-column"  >
        
        <div class="fw-divider-space " style="margin-top: 17px;"></div>

    <div class="special-heading text-center">
        <h3 class="section_header margin_0  ">
        <span class="lightfont regular text-uppercase">
            Our programs	</span>
        </h3>
    </div>


        <div class="fw-divider-short-line"><hr class="short_line divider_center"/></div>

        <div class="fw-divider-space " style="margin-top: 30px;"></div>

    <div
        class="owl-carousel shortcode-service"
        data-autoplay="1"
        data-autoplaytimeout="3000"
        data-loop="true"
        data-nav="true"
        data-margin="30"
        data-responsive-xs="1"
        data-responsive-sm="2"
        data-responsive-md="3"
        data-responsive-lg="3"
        >
            <div class="owl-carousel-item our-programs ">
            <div class="service_item vertical-item content-padding big-padding with_background text-center overflow-hidden">
                <div class="item-media">
                <img width="600" height="390" src="http://webdesign-finder.com/youko/wp-content/uploads/2018/02/img_11-600x390.jpg" class="attachment-youko-services size-youko-services wp-post-image" alt="" />            <div class="media-links">
                    <a class="abs-link" href="http://webdesign-finder.com/youko/programs/kids-karate-groups/"></a>
                </div>
            </div>
            <div class="service_icon round">
            <i class="fa fa-calendar"></i>
        </div>
        <div class="item-content">
            <h5 class="entry-title">
                <a href="http://webdesign-finder.com/youko/programs/kids-karate-groups/">
                    Kids Karate Groups			</a>
            </h5>
            <p class="info highlight">10:00-11:00 am / Lizzie Meyer</p>
            <div class="excerpt">
                <p>Ribeye kevin shank bacon bris fatback. Sirloin frankfurter brisket, tri-tip pork chicken.</p>
            </div>
            <a href="http://webdesign-finder.com/youko/programs/kids-karate-groups/" class="read-more"></a>
        </div><!-- eof .item-content -->
    </div><!-- eof .teaser -->
        </div>
            <div class="owl-carousel-item our-programs ">
            <div class="service_item vertical-item content-padding big-padding with_background text-center overflow-hidden">
                <div class="item-media">
                <img width="600" height="390" src="http://webdesign-finder.com/youko/wp-content/uploads/2018/02/img_25-600x390.jpg" class="attachment-youko-services size-youko-services wp-post-image" alt="" />            <div class="media-links">
                    <a class="abs-link" href="http://webdesign-finder.com/youko/programs/teen-adult-karate/"></a>
                </div>
            </div>
            <div class="service_icon round">
            <i class="fa fa-calendar"></i>
        </div>
        <div class="item-content">
            <h5 class="entry-title">
                <a href="http://webdesign-finder.com/youko/programs/teen-adult-karate/">
                    Teen &#038; Adult Karate			</a>
            </h5>
            <p class="info highlight">5:00-6:00 am / Alejandro Diaz</p>
            <div class="excerpt">
                <p>Tenderloin jerky ground round landjaeger pork ham pancetta pastrami turkey.</p>
            </div>
            <a href="http://webdesign-finder.com/youko/programs/teen-adult-karate/" class="read-more"></a>
        </div><!-- eof .item-content -->
    </div><!-- eof .teaser -->
        </div>
            <div class="owl-carousel-item our-programs ">
            <div class="service_item vertical-item content-padding big-padding with_background text-center overflow-hidden">
                <div class="item-media">
                <img width="600" height="390" src="http://webdesign-finder.com/youko/wp-content/uploads/2018/02/img_9-600x390.jpg" class="attachment-youko-services size-youko-services wp-post-image" alt="" />            <div class="media-links">
                    <a class="abs-link" href="http://webdesign-finder.com/youko/programs/traditional-martial-arts/"></a>
                </div>
            </div>
            <div class="service_icon round">
            <i class="fa fa-calendar"></i>
        </div>
        <div class="item-content">
            <h5 class="entry-title">
                <a href="http://webdesign-finder.com/youko/programs/traditional-martial-arts/">
                    Traditional Martial Arts			</a>
            </h5>
            <p class="info highlight">6:00-7:00 pm / Cole Butler</p>
            <div class="excerpt">
                <p>Filet mignon bresaola doner, buffalo pork belly meatball meatl swine sirloin.</p>
            </div>
            <a href="http://webdesign-finder.com/youko/programs/traditional-martial-arts/" class="read-more"></a>
        </div><!-- eof .item-content -->
    </div><!-- eof .teaser -->
        </div>
            <div class="owl-carousel-item our-programs ">
            <div class="service_item vertical-item content-padding big-padding with_background text-center overflow-hidden">
                <div class="item-media">
                <img width="600" height="390" src="http://webdesign-finder.com/youko/wp-content/uploads/2018/02/img_23-600x390.jpg" class="attachment-youko-services size-youko-services wp-post-image" alt="" />            <div class="media-links">
                    <a class="abs-link" href="http://webdesign-finder.com/youko/programs/kick-boxing-group/"></a>
                </div>
            </div>
            <div class="service_icon round">
            <i class="fa fa-calendar"></i>
        </div>
        <div class="item-content">
            <h5 class="entry-title">
                <a href="http://webdesign-finder.com/youko/programs/kick-boxing-group/">
                    Kick Boxing Group			</a>
            </h5>
            <p class="info highlight">11:00-12:00 am / Jared Henry</p>
            <div class="excerpt">
                <p>Short loin andouille bresaola, swine jowl beef ribs venison capicola jerky ham pig.</p>
            </div>
            <a href="http://webdesign-finder.com/youko/programs/kick-boxing-group/" class="read-more"></a>
        </div><!-- eof .item-content -->
    </div><!-- eof .teaser -->
        </div>
            <div class="owl-carousel-item our-programs ">
            <div class="service_item vertical-item content-padding big-padding with_background text-center overflow-hidden">
                <div class="item-media">
                <img width="600" height="390" src="http://webdesign-finder.com/youko/wp-content/uploads/2018/02/img_24-600x390.jpg" class="attachment-youko-services size-youko-services wp-post-image" alt="" />            <div class="media-links">
                    <a class="abs-link" href="http://webdesign-finder.com/youko/programs/jiu-jitsu-group/"></a>
                </div>
            </div>
            <div class="service_icon round">
            <i class="fa fa-calendar"></i>
        </div>
        <div class="item-content">
            <h5 class="entry-title">
                <a href="http://webdesign-finder.com/youko/programs/jiu-jitsu-group/">
                    Jiu Jitsu Group			</a>
            </h5>
            <p class="info highlight">7:00-8:00 am / Vincent Osborne</p>
            <div class="excerpt">
                <p>Salami turkey beef ribs hamburger. Pork loin capicola tri-tip pork chop strip.</p>
            </div>
            <a href="http://webdesign-finder.com/youko/programs/jiu-jitsu-group/" class="read-more"></a>
        </div><!-- eof .item-content -->
    </div><!-- eof .teaser -->
        </div>
            <div class="owl-carousel-item our-programs ">
            <div class="service_item vertical-item content-padding big-padding with_background text-center overflow-hidden">
                <div class="item-media">
                <img width="600" height="390" src="http://webdesign-finder.com/youko/wp-content/uploads/2018/02/img_7-600x390.jpg" class="attachment-youko-services size-youko-services wp-post-image" alt="" />            <div class="media-links">
                    <a class="abs-link" href="http://webdesign-finder.com/youko/programs/kung-fu-group/"></a>
                </div>
            </div>
            <div class="service_icon round">
            <i class="fa fa-calendar"></i>
        </div>
        <div class="item-content">
            <h5 class="entry-title">
                <a href="http://webdesign-finder.com/youko/programs/kung-fu-group/">
                    Kung-Fu Group			</a>
            </h5>
            <p class="info highlight">9:00-10:00 pm / Ryan Munoz</p>
            <div class="excerpt">
                <p>Corned beef fatback beef kevin pork belly ribeye tongue porchetta spare ribs sausage. </p>
            </div>
            <a href="http://webdesign-finder.com/youko/programs/kung-fu-group/" class="read-more"></a>
        </div><!-- eof .item-content -->
    </div><!-- eof .teaser -->
        </div>
            </div>
        <div class="fw-divider-space " style="margin-top: 50px;"></div>

    </div>
            </div>
        </div>
    </section>
    
    <section class="fw-main-row  ds dark section_padding_top_130 section_padding_bottom_130 columns_padding_15 section_overlay background_cover" style="background-image:url(http://webdesign-finder.com/youko/wp-content/uploads/2018/02/img_15.jpg);">
        <h3 class="hidden"> Team memebers</h3>
                <div class="container">
            <div class="row">
                <div class="col-xs-12 fw-column"  >
        
        <div class="fw-divider-space " style="margin-top: 17px;"></div>

    <div class="special-heading text-center">
        <h3 class="section_header margin_0  ">
        <span class="lightfont regular text-uppercase">
            Our Instructors	</span>
        </h3>
    </div>


        <div class="fw-divider-short-line"><hr class="short_line divider_center"/></div>

        <div class="fw-divider-space " style="margin-top: 30px;"></div>

    <div
        class="shortcode-team owl-carousel hide-excerpt "
        data-autoplay="true"
        data-autoplaytimeout="3000"
        data-margin="30"
        data-responsive-xs="1"
        data-responsive-sm="2"
        data-responsive-md="3"
        data-responsive-lg="3"
        data-nav="true"
        data-loop="true"
        >
                <div class="owl-carousel-item instructors ">
                <div class="vertical-item text-center content-padding big-padding with_background overflow-hidden ">

                <div class="item-media">
                <img width="370" height="358" src="http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_1.jpg" class="attachment-youko-team-member size-youko-team-member wp-post-image" alt="" srcset="http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_1.jpg 370w, http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_1-300x290.jpg 300w" sizes="(max-width: 370px) 100vw, 370px" />            <div class="media-links">
                    <a class="abs-link" href="http://webdesign-finder.com/youko/member/randall-schwartz/"></a>
                </div>
            </div>
            <div class="item-content">

            <h5 class="item-title">
                <a href="http://webdesign-finder.com/youko/member/randall-schwartz/">
                    Randall Schwartz			</a>
            </h5>

                        <p class="position highlight text-uppercase">kids Instructor</p>
            
            <div class="desc">
                <p>Strip steak meatball beef ribs lion hamburger landjaeger beef magna tip pignon pork.</p>
            </div>

                        <div class="team-social-icons">
                    <span class="social-icons">
                    <a href="https://www.facebook.com/#"
                class="social-icon soc-facebook "  target="_blank"></a>
                            <a href="https://twitter.com/#"
                class="social-icon soc-twitter "  target="_blank"></a>
                            <a href="https://plus.google.com/#"
                class="social-icon soc-google "  target="_blank"></a>
                </span>

                </div><!-- eof social icons -->
                </div>
    </div><!-- eof .vertical-item -->
            </div>
                <div class="owl-carousel-item instructors ">
                <div class="vertical-item text-center content-padding big-padding with_background overflow-hidden ">

                <div class="item-media">
                <img width="370" height="358" src="http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_2.jpg" class="attachment-youko-team-member size-youko-team-member wp-post-image" alt="" srcset="http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_2.jpg 370w, http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_2-300x290.jpg 300w" sizes="(max-width: 370px) 100vw, 370px" />            <div class="media-links">
                    <a class="abs-link" href="http://webdesign-finder.com/youko/member/mark-lawrence/"></a>
                </div>
            </div>
            <div class="item-content">

            <h5 class="item-title">
                <a href="http://webdesign-finder.com/youko/member/mark-lawrence/">
                    Mark Lawrence			</a>
            </h5>

                        <p class="position highlight text-uppercase">Teen Instructor</p>
            
            <div class="desc">
                <p>Pork belly shankle turkey strip steak drumstick, jowl frankfurter. Sirloin picanha andouille short loin.</p>
            </div>

                        <div class="team-social-icons">
                    <span class="social-icons">
                    <a href="https://www.facebook.com/#"
                class="social-icon soc-facebook "  target="_blank"></a>
                            <a href="https://twitter.com/#"
                class="social-icon soc-twitter "  target="_blank"></a>
                            <a href="https://plus.google.com/#"
                class="social-icon soc-google "  target="_blank"></a>
                </span>

                </div><!-- eof social icons -->
                </div>
    </div><!-- eof .vertical-item -->
            </div>
                <div class="owl-carousel-item instructors ">
                <div class="vertical-item text-center content-padding big-padding with_background overflow-hidden ">

                <div class="item-media">
                <img width="370" height="358" src="http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_3.jpg" class="attachment-youko-team-member size-youko-team-member wp-post-image" alt="" srcset="http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_3.jpg 370w, http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_3-300x290.jpg 300w" sizes="(max-width: 370px) 100vw, 370px" />            <div class="media-links">
                    <a class="abs-link" href="http://webdesign-finder.com/youko/member/ralph-lawson/"></a>
                </div>
            </div>
            <div class="item-content">

            <h5 class="item-title">
                <a href="http://webdesign-finder.com/youko/member/ralph-lawson/">
                    Ralph Lawson			</a>
            </h5>

                        <p class="position highlight text-uppercase">Adult Instructor</p>
            
            <div class="desc">
                <p>Chuck pancetta salami swine tri-tip burgdoggen kielbasa beef cupim  pork belly cupim rump brisket.</p>
            </div>

                        <div class="team-social-icons">
                    <span class="social-icons">
                    <a href="https://www.facebook.com/#"
                class="social-icon soc-facebook "  target="_blank"></a>
                            <a href="https://twitter.com/#"
                class="social-icon soc-twitter "  target="_blank"></a>
                            <a href="https://plus.google.com/#"
                class="social-icon soc-google "  target="_blank"></a>
                </span>

                </div><!-- eof social icons -->
                </div>
    </div><!-- eof .vertical-item -->
            </div>
                <div class="owl-carousel-item instructors ">
                <div class="vertical-item text-center content-padding big-padding with_background overflow-hidden ">

                <div class="item-media">
                <img width="370" height="358" src="http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_4.jpg" class="attachment-youko-team-member size-youko-team-member wp-post-image" alt="" srcset="http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_4.jpg 370w, http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_4-300x290.jpg 300w" sizes="(max-width: 370px) 100vw, 370px" />            <div class="media-links">
                    <a class="abs-link" href="http://webdesign-finder.com/youko/member/erik-warner/"></a>
                </div>
            </div>
            <div class="item-content">

            <h5 class="item-title">
                <a href="http://webdesign-finder.com/youko/member/erik-warner/">
                    Erik Warner			</a>
            </h5>

                        <p class="position highlight text-uppercase">jiu-jitsu Instructor</p>
            
            <div class="desc">
                <p>Corned beef pork chop filet mignon prosciutto shankle burgdoggen pig shoulder biltong pork loin.</p>
            </div>

                        <div class="team-social-icons">
                    <span class="social-icons">
                    <a href="https://www.facebook.com/#"
                class="social-icon soc-facebook "  target="_blank"></a>
                            <a href="https://twitter.com/#"
                class="social-icon soc-twitter "  target="_blank"></a>
                            <a href="https://plus.google.com/#"
                class="social-icon soc-google "  target="_blank"></a>
                </span>

                </div><!-- eof social icons -->
                </div>
    </div><!-- eof .vertical-item -->
            </div>
                <div class="owl-carousel-item instructors ">
                <div class="vertical-item text-center content-padding big-padding with_background overflow-hidden ">

                <div class="item-media">
                <img width="370" height="358" src="http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_5.jpg" class="attachment-youko-team-member size-youko-team-member wp-post-image" alt="" srcset="http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_5.jpg 370w, http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_5-300x290.jpg 300w" sizes="(max-width: 370px) 100vw, 370px" />            <div class="media-links">
                    <a class="abs-link" href="http://webdesign-finder.com/youko/member/brett-hawkins/"></a>
                </div>
            </div>
            <div class="item-content">

            <h5 class="item-title">
                <a href="http://webdesign-finder.com/youko/member/brett-hawkins/">
                    Brett Hawkins			</a>
            </h5>

                        <p class="position highlight text-uppercase">kick boxing Instructor</p>
            
            <div class="desc">
                <p>Ball tip frankfurter beef ribs, brisket cupim kielbasa filet mignon ribs shank shoulder ham pork.</p>
            </div>

                        <div class="team-social-icons">
                    <span class="social-icons">
                    <a href="https://www.facebook.com/#"
                class="social-icon soc-facebook "  target="_blank"></a>
                            <a href="https://twitter.com/#"
                class="social-icon soc-twitter "  target="_blank"></a>
                            <a href="https://plus.google.com/#"
                class="social-icon soc-google "  target="_blank"></a>
                </span>

                </div><!-- eof social icons -->
                </div>
    </div><!-- eof .vertical-item -->
            </div>
                <div class="owl-carousel-item instructors ">
                <div class="vertical-item text-center content-padding big-padding with_background overflow-hidden ">

                <div class="item-media">
                <img width="370" height="358" src="http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_6.jpg" class="attachment-youko-team-member size-youko-team-member wp-post-image" alt="" srcset="http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_6.jpg 370w, http://webdesign-finder.com/youko/wp-content/uploads/2018/01/team_6-300x290.jpg 300w" sizes="(max-width: 370px) 100vw, 370px" />            <div class="media-links">
                    <a class="abs-link" href="http://webdesign-finder.com/youko/member/garrett-farmer/"></a>
                </div>
            </div>
            <div class="item-content">

            <h5 class="item-title">
                <a href="http://webdesign-finder.com/youko/member/garrett-farmer/">
                    Garrett Farmer			</a>
            </h5>

                        <p class="position highlight text-uppercase">kung-fu Instructor</p>
            
            <div class="desc">
                <p>Picanha turkey meatball pork cow rump leberkas swine pork loin tenderloin t-bone boudin.</p>
            </div>

                        <div class="team-social-icons">
                    <span class="social-icons">
                    <a href="https://www.facebook.com/#"
                class="social-icon soc-facebook "  target="_blank"></a>
                            <a href="https://twitter.com/#"
                class="social-icon soc-twitter "  target="_blank"></a>
                            <a href="https://plus.google.com/#"
                class="social-icon soc-google "  target="_blank"></a>
                </span>

                </div><!-- eof social icons -->
                </div>
    </div><!-- eof .vertical-item -->
            </div>
            </div></div>
            </div>
        </div>
    </section>--}}
   
    
    
    
    
  </div>

@endsection