
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="alternate" type="application/rss+xml" title="Youko &raquo; Feed" href="http://webdesign-finder.com/youko/feed/" />
    <meta name="language" content="{{ str_replace('_', '-', app()->getLocale()) }}" />        
    <meta name="author" content="Renato Montanari"/>
    <meta name="copyright" content="{{ $configuracoes->ano_de_inicio }} {{ $configuracoes->nomedosite }}">        

    {!! $head ?? '' !!}
		
    <link rel='stylesheet' id='booked-icons-css'  href='http://webdesign-finder.com/youko/wp-content/plugins/booked/assets/css/icons.css?ver=2.0.6' type='text/css' media='all' />
    <link rel='stylesheet' id='booked-tooltipster-css'  href='http://webdesign-finder.com/youko/wp-content/plugins/booked/assets/js/tooltipster/css/tooltipster.css?ver=3.3.0' type='text/css' media='all' />
    <link rel='stylesheet' id='booked-tooltipster-theme-css'  href='http://webdesign-finder.com/youko/wp-content/plugins/booked/assets/js/tooltipster/css/themes/tooltipster-light.css?ver=3.3.0' type='text/css' media='all' />
    <link rel='stylesheet' id='booked-animations-css'  href='http://webdesign-finder.com/youko/wp-content/plugins/booked/assets/css/animations.css?ver=2.0.6' type='text/css' media='all' />
    <link rel='stylesheet' id='sb_instagram_styles-css'  href='http://webdesign-finder.com/youko/wp-content/plugins/instagram-feed/css/sb-instagram.min.css?ver=1.9.1' type='text/css' media='all' />
    <link rel='stylesheet' id='sb-font-awesome-css'  href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-css'  href='http://webdesign-finder.com/youko/wp-content/plugins/unyson/framework/static/libs/font-awesome/css/font-awesome.min.css?ver=2.7.19' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url(asset('frontend/'.$configuracoes->template.'/css/fonts.css'))}}' type='text/css' media='all' />
    <link rel='stylesheet' id='youko-font-css'  href='//fonts.googleapis.com/css?family=Poppins%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%7COswald%3A200%2C300%2C400%2C500%2C600%2C700&#038;subset=latin-ext&#038;ver=1.1.0' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url(asset('frontend/'.$configuracoes->template.'/css/woo.css'))}}' type='text/css' media='all' />
    <link rel='stylesheet' id='youko-booked-css'  href='http://webdesign-finder.com/youko/wp-content/themes/youko/css/booked.css?ver=1.1.0' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url(asset('frontend/'.$configuracoes->template.'/css/accesspress.css'))}}' type='text/css' media='all' />
    <link rel='stylesheet' id='youko-css-style-css'  href='http://webdesign-finder.com/youko/wp-content/themes/youko-child/style.css?ver=1.1.0' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url(asset('frontend/'.$configuracoes->template.'/css/bootstrap.min.css'))}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url(asset('frontend/'.$configuracoes->template.'/css/animations.css'))}}' type='text/css' media='all' />
    <link rel='stylesheet' id='youko-main-css'  href='http://webdesign-finder.com/youko/wp-content/themes/youko/css/main.css?ver=1.1.0' type='text/css' media='all' />
    <link rel='stylesheet' id='fw-shortcode-divider-css'  href='http://webdesign-finder.com/youko/wp-content/plugins/unyson/framework/extensions/shortcodes/shortcodes/divider/static/css/styles.css?ver=4.9.22' type='text/css' media='all' />
    <link rel='stylesheet' id='fw-shortcode-map-css'  href='http://webdesign-finder.com/youko/wp-content/plugins/unyson/framework/extensions/shortcodes/shortcodes/map/static/css/styles.css?ver=4.9.22' type='text/css' media='all' />
    <link rel='stylesheet' id='youkot-child-woo-css'  href='http://webdesign-finder.com/youko/wp-content/themes/youko/css/woo.css?ver=1.1.0' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url(asset('frontend/'.$configuracoes->template.'/css/booked.css'))}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{url(asset('frontend/'.$configuracoes->template.'/css/main.css'))}}' type='text/css' media='all' />
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
    
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/plugins/snazzy-maps/snazzymaps.js?ver=1.1.5'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/vendor/modernizr-2.6.2.min.js')}}'></script>
    
    <link rel="icon" href="{{$configuracoes->getfaveicon()}}" sizes="32x32" />
    <link rel="icon" href="{{$configuracoes->getfaveicon()}}" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="{{$configuracoes->getfaveicon()}}" />
    <meta name="msapplication-TileImage" content="{{$configuracoes->getfaveicon()}}" />
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('css')
        @yield('css')
    @endif
</head>

<body class="home page-template page-template-page-templates page-template-full-width page-template-page-templatesfull-width-php page page-id-7 woocommerce-no-js masthead-fixed full-width with-slider grid dark-body">
	
    <!-- search modal -->
    <div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
                <i class="rt-icon2-cross2"></i>
            </span>
        </button>
        <div class="widget widget_search">            
            <form role="search" method="get" class="search-form form-inline" action="http://webdesign-finder.com/youko/">
                <div class="form-group">
                    <label>
                        <input type="search" class="search-field form-control"
                            placeholder="Search"
                            value="" name="s"
                            title="Search for:"/>
                    </label>
                </div>
                <button type="submit" class="search-submit theme_button">
                    <span class="screen-reader-text">Pesquisar</span>
                </button>
            </form>
        </div>
    </div>
	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls with_padding"></div>
	</div><!-- eof .modal -->

    <!-- wrappers for visual page editor and boxed version of template -->
    <div id="canvas" class="wide">
        <div id="box_wrapper">
            <!-- template sections -->
            <header id="header" class="main-header-wrap">
                <div class="page_header ds toggler_xs_right affix-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 display_table">
                                <div class="header_left_logo display_table_cell">
                                    <a href="{{route('web.home')}}" rel="home" class="logo logo_image_only">
                                        <img src="{{url('frontend/'.$configuracoes->template.'/img/logomarca.png')}}" alt="{{$configuracoes->name}}">
                                    </a>					
                                </div>
                                <div class="header_mainmenu display_table_cell text-center">
                                    <nav class="mainmenu_wrapper primary-navigation">
                                        <ul id="menu-main-menu" class="sf-menu nav-menu nav">
                                            <li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-7 current_page_item menu-item">
                                                <a href="#" >Institucional</a>
                                            </li>
                                            <li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page-item-7">
                                                <a href="{{route('web.login')}}" >Filiados</a>
                                            </li>
                                            <li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page-item-7">
                                                <a href="{{route('web.academias')}}" >Academias</a>
                                            </li>
                                            <li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page-item-7">
                                                <a href="#" >Calendário</a>
                                            </li>
                                            <li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page-item-7">
                                                <a href="#" >Ranking</a>
                                            </li>
                                            {{--
                                            <li id="menu-item-212" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-212"><a href="#" >Pages</a>
                                                <ul class="sub-menu">
                                                    <li id="menu-item-2765" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2765"><a href="http://webdesign-finder.com/youko/about/" >About</a></li>
                                                    <li id="menu-item-213" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-213"><a href="http://webdesign-finder.com/youko/faq/" >FAQ</a></li>
                                                    <li id="menu-item-3264" class="menu-item menu-item-type-taxonomy menu-item-object-fw-team-category menu-item-has-children menu-item-3264"><a href="http://webdesign-finder.com/youko/team/instructors/" >Instructors</a>
                                                        <ul class="sub-menu">
                                                            <li id="menu-item-5438" class="menu-item menu-item-type-post_type menu-item-object-fw-team menu-item-5438"><a href="http://webdesign-finder.com/youko/member/garrett-farmer/" >Team member</a></li>
                                                        </ul>
                                                    </li>
                                                    <li id="menu-item-294" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-294"><a href="http://webdesign-finder.com/youko/elements/" >Elements</a></li>
                                                    <li id="menu-item-421" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-421"><a href="http://webdesign-finder.com/youko/typography/" >Typography</a></li>
                                                    <li id="menu-item-5742" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5742"><a href="http://webdesign-finder.com/youko/appointment/" >Appointment</a></li>
                                                    <li id="menu-item-430" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-430"><a href="http://webdesign-finder.com/youko/404" >404</a></li>
                                                </ul>
                                            </li>--}}
                                        </ul>							
                                    </nav>
                                    <span class="toggle_menu"><span></span></span>
                                </div><!--	eof .col-sm-* -->
                                <div class="header_right_buttons display_table_cell text-right hidden-xs">
                                    @guest
                                        @if (Route::has('login'))
                                            <a href="{{ route('login') }}" class="theme_button inverse color1 wide_button">Associado</a>                                            
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="theme_button inverse color1 wide_button">Minha Conta</a>                                       
                                    @endguest                                    
                                </div><!-- eof .header_button -->
                            </div><!--	eof .col-sm-* -->
                        </div><!--	eof .row-->
                    </div> <!--	eof .container-->
                </div><!-- eof .page_header -->
            </header>	

            @yield('content')            

            <footer id="footer" class="page_footer parallax section_overlay section_padding_top_110 section_padding_bottom_140 columns_padding_25 ds"  
            style="background-image: url({{url('frontend/'.$configuracoes->template.'/img/bg/footer_bg.jpg')}})">
                <div class="container">
                    <div class="row">                        
                        <div class="col-xs-12 col-md-6 text-left to_animate" data-animation="fadeInUp">
                            <div id="youko_banner-3" class="widget-odd widget-first widget-1 text-center widget widget_banner">	
                                <img src="{{url($configuracoes->getlogomarca())}}" alt="{{$configuracoes->name}}">
                            </div>
                            <div id="text-5" class="widget-even widget-2 text-center widget widget_text">
                                <div class="textwidget">
                                    {{$configuracoes->descricao}}
                                </div>
                            </div>
                            <div id="youko_icons_list-2" class="widget-odd widget-3 text-center widget widget_icons_list">		
                                <div class="widget-icons-list no-bullets no-top-border no-bottom-border">
                                    @if ($configuracoes->rua)
                                        <div class="media small-teaser inline-block margin_0">
                                            <div class="media-left">
                                                <i class="fa fa-map-marker highlight"></i>
                                            </div>
                                            <div class="media-body darklinks">
                                                {{$configuracoes->rua}}
                                                @if ($configuracoes->num)
                                                    , {{$configuracoes->num}}
                                                @endif	
                                                @if ($configuracoes->bairro)
                                                    , {{$configuracoes->bairro}}
                                                @endif		
                                                @if($configuracoes->cidade)  
                                                    <br> {{\App\Helpers\Cidade::getCidadeNome($configuracoes->cidade, 'cidades')}}
                                                @endif			
                                            </div>
                                        </div>
                                    @endif                                    
                                    @if ($configuracoes->telefone)
                                        <div class="media small-teaser inline-block margin_0">
                                            <div class="media-left">
                                                <i class="fa fa-phone highlight"></i>
                                            </div>
                                            <div class="media-body darklinks">
                                                {{$configuracoes->telefone}}						
                                            </div>
                                        </div>
                                    @endif
                                    @if ($configuracoes->email)
                                        <div class="media small-teaser inline-block margin_0">
                                            <div class="media-left">
                                                <i class="fa fa-envelope highlight"></i>
                                            </div>
                                            <div class="media-body darklinks">
                                                <a href="mailto:{{$configuracoes->email}}">{{$configuracoes->email}}</a>						
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div id="youko_socials-2" class="widget-even widget-last widget-4 text-center widget widget_socials">		
                                <div class="widget-socials no-bullets no-top-border no-bottom-border topmargin_20 bottommargin_5">
                                    @if ($configuracoes->facebook)
                                        <a target="_blank" href="{{$configuracoes->facebook}}" title="Facebook" class="social-icon color-icon border-icon rounded-icon  social-icon soc-facebook"></a>
                                    @endif
                                    @if ($configuracoes->instagram)
                                        <a target="_blank" href="{{$configuracoes->instagram}}" title="Instagram" class="social-icon color-icon border-icon rounded-icon  social-icon soc-instagram"></a>
                                    @endif
                                    @if ($configuracoes->twitter)
                                        <a target="_blank" href="{{$configuracoes->twitter}}" title="Twitter" class="social-icon color-icon border-icon rounded-icon  social-icon soc-twitter"></a>
                                    @endif
                                    @if ($configuracoes->linkedin)
                                        <a target="_blank" href="{{$configuracoes->linkedin}}" title="Linkedin" class="social-icon color-icon border-icon rounded-icon  social-icon soc-linkedin"></a>
                                    @endif
                                    @if ($configuracoes->youtube)
                                        <a target="_blank" href="{{$configuracoes->youtube}}" title="Youtube" class="social-icon color-icon border-icon rounded-icon  social-icon soc-youtube"></a>
                                    @endif
                                </div>
                            </div>                  
                        </div>
                        <div class="col-xs-12 col-md-6 text-left to_animate" data-animation="fadeInUp">
                            <div id="mc4wp_form_widget-5" class="widget-odd widget-last widget-first widget-1 text-center special-title widget widget_mc4wp_form_widget">
                                <h3 class="widget-title">
                                    <span class="first-word">Receba</span> 
                                    <span class="last-word">Novidades</span>
                                </h3>
                                <form class="mc4wp-form mc4wp-form-445" method="post" autocomplete="off">
                                    <div class="mc4wp-form-fields">
                                        <p class="text_for_footer">
                                            Receba em seu email informações sobre nossos eventos!
                                        </p>
                                        <p class="mc4wp-form-inner">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" placeholder="Email" />
                                            <button type="submit" class="theme_button color1" value="Cadastrar"></button>
                                        </p>
                                    </div>
                                </form>
                            </div>                
                        </div>
                    </div>
                </div>
            </footer>

            <section class="ds page_copyright section_padding_15 with_top_border_container">
                <h3 class="hidden">Page Copyright</h3>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <p class="grey">® {{ $configuracoes->ano_de_inicio }} - {{$configuracoes->nomedosite}} - Todos os direitos reservados. Desenvolvido por <a href="https://informaticalivre.com.br" target="_blank">Informática Livre</a></p>
                        </div>
                    </div>
                </div>
            </section>	
        </div><!-- eof #box_wrapper -->
    </div><!-- eof #canvas -->
    
	
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/plugins/booked/assets/js/spin.min.js?ver=2.0.1'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/plugins/booked/assets/js/spin.jquery.js?ver=2.0.1'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/plugins/booked/assets/js/tooltipster/js/jquery.tooltipster.min.js?ver=3.3.0'></script>
    
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/plugins/booked/assets/js/functions.js?ver=2.0.6'></script>
   
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/plugins/instagram-feed/js/sb-instagram.min.js?ver=1.9.1'></script>
    
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/plugins/mwt-addons//static/js/mod-post-likes.js?ver=1.0.0'></script>
   
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=3.4.8'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.70'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4'></script>
   
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=3.4.8'></script>
   
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=3.4.8'></script>
    <script  src='{{url('frontend/'.$configuracoes->template.'/js/vendor/bootstrap.min.js')}}'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/vendor/jquery.appear.js')}}'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-includes/js/hoverIntent.min.js?ver=1.8.1'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/vendor/superfish.js')}}'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/vendor/jquery.easing.1.3.js')}}'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/vendor/jquery.ui.totop.js')}}'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/vendor/jquery.localscroll.min.js')}}'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/vendor/jquery.scrollTo.min.js')}}'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/vendor/jquery.scrollbar.min.js')}}'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/vendor/jquery.parallax-1.1.3.js')}}'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/vendor/jquery.easypiechart.min.js')}}'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/vendor/bootstrap-progressbar.min.js')}}'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/vendor/jquery.countTo.js')}}'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/plugins/woocommerce/assets/js/prettyPhoto/jquery.prettyPhoto.min.js?ver=3.1.6'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/vendor/jquery.countdown.min.js')}}'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/vendor/isotope.pkgd.min.js')}}'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/vendor/owl.carousel.min.js')}}'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/plugins/woocommerce/assets/js/flexslider/jquery.flexslider.min.js?ver=2.7.1'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/themes/youko/js/vendor/price-slider.min.js?ver=1.1.0'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/vendor/jquery.cookie.js')}}'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/plugins.js')}}'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/woo.js')}}'></script>
    <script src='{{url('frontend/'.$configuracoes->template.'/js/main.js')}}'></script>
    <script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?v=3.25&#038;language=en&#038;libraries=places&#038;key=AIzaSyC0pr5xCHpaTGv12l73IExOHDJisBP2FK4&#038;ver=3.25'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-includes/js/underscore.min.js?ver=1.8.3'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/themes/youko/framework-customizations/extensions/shortcodes/shortcodes//map/static/js/scripts.js?ver=2.7.19'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-includes/js/wp-embed.min.js?ver=4.9.22'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/themes/youko/framework-customizations/extensions/forms/includes/builder-items/date-time/static/js/moment-with-locales.min.js?ver=1.1.0'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/youko/wp-content/themes/youko/framework-customizations/extensions/forms/includes/builder-items/date-time/static/js/bootstrap-datetimepicker.min.js?ver=1.1.0'></script>
    
    @hasSection('js')
        @yield('js')
    @endif

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{$configuracoes->tagmanager_id}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{$configuracoes->tagmanager_id}}');
    </script>
</body>
</html>