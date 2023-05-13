@extends("web.{$configuracoes->template}.master.master")

@section('content')
    <section class="page_breadcrumbs ds section_padding_40 background_cover section_overlay"
        style="background-image: url({{ $configuracoes->gettopodosite() }});">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3 class="breadcrumbs-title">
                        {{ $academia->name }} </h3>
                    <ol class="breadcrumb">
                        <li class="first-item">
                            <a href="{{ route('web.home') }}">Início</a>
                        </li>
                        <li class="0-item">
                            <a href="{{ route('web.academias') }}">Academias</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="ds page_content section_padding_top_40 section_padding_bottom_40 columns_padding_30">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="vertical-item topmargin_20 with_background  content-padding overflow-hidden text-center">
                        <img src="{{ $academia->cover() }}"
                            class="attachment-youko-team-member size-youko-team-member wp-post-image" alt="">
                        <div class="item-content">
                            <h5 class="bottommargin_5 item-title text-transform-none">Brett Hawkins</h5>
                            <p class="position margin_0">
                                @if ($academia->rua)
                                    {{ $academia->rua }}
                                    @if ($academia->rua && $academia->num)
                                        , {{ $academia->num }}
                                    @endif
                                @endif
                                @if ($academia->rua && $academia->bairro)
                                    , {{ $academia->bairro }}
                                @else
                                    {{ $academia->bairro }}
                                @endif
                                @if ($academia->bairro && $academia->cidade)
                                    <br>{{ $academia->cidade }}
                                    @if ($academia->uf && $academia->bairro)
                                        /{{ $academia->uf }}
                                    @else
                                        - {{ $academia->uf }}
                                    @endif
                                @endif

                                <a target="_blank" href="{{ $academia->dominio }}">{{ $academia->dominio }}</a>
                            </p>

                            <div class="team-social-icons">
                                <span class="social-icons">
                                    @if ($academia->facebook)
                                        <a href="{{ $academia->facebook }}" class="social-icon soc-facebook"
                                            target="_blank"></a>
                                    @endif
                                    @if ($academia->twitter)
                                        <a href="{{ $academia->twitter }}" class="social-icon soc-twitter"
                                            target="_blank"></a>
                                    @endif
                                    @if ($academia->instagram)
                                        <a href="{{ $academia->instagram }}" class="social-icon soc-instagram"
                                            target="_blank"></a>
                                    @endif
                                    @if ($academia->youtube)
                                        <a href="{{ $academia->youtube }}" class="social-icon soc-youtube"
                                            target="_blank"></a>
                                    @endif
                                    @if ($academia->linkedin)
                                        <a href="{{ $academia->linkedin }}" class="social-icon soc-linkedin"
                                            target="_blank"></a>
                                    @endif
                                    @if ($academia->vimeo)
                                        <a href="{{ $academia->vimeo }}" class="social-icon soc-vimeo" target="_blank"></a>
                                    @endif
                                    @if ($academia->fliccr)
                                        <a href="{{ $academia->fliccr }}" class="social-icon soc-flickr"
                                            target="_blank"></a>
                                    @endif
                                </span>
                            </div>

                        </div>
                    </div><!-- .vertical-item -->
                </div><!-- .col-md-5 -->
                <div class="col-md-7">
                    <div class="item-content topmargin_20 bottommargin_10 entry-content">
                        {!! $academia->content !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div id="content" class="services-grid col-xs-12 col-sm-12">
                    <div class="isotope_container isotope row masonry-layout columns_margin_bottom_20">
                        @if ($academia->images() && $academia->images()->count() > 0)
                            @foreach ($academia->images()->get() as $img)
                                <div class="isotope-item topmargin_10 col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                    <div
                                        class="service_item vertical-item content-padding big-padding with_background text-center overflow-hidden">
                                        <div class="item-media">
                                            <img src="{{ $img->url_image }}" alt="{{ $academia->name }}">
                                            <div class="media-links">
                                                <a class="abs-link" href="#"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-6 fw-column">                    
                    <div class="form-wrapper  columns_padding_10">
                        <form>                            
                            <div class="wrap-forms">
                                <div class="row"></div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6 form-builder-item">
                                        <div class="form-group has-placeholder">
                                            <label for="id-1">Full Name <sup>*</sup> </label>
                                            <input class="form-control" type="text" name="text_cca5d1a"
                                                placeholder="Full Name*" required="required">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 form-builder-item">
                                        <div class="form-group has-placeholder">
                                            <label for="id-2">Subject <sup>*</sup> </label>
                                            <input class="form-control" type="text" name="text_dafa6b7"
                                                placeholder="Subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6 form-builder-item">
                                        <div class="form-group has-placeholder">
                                            <label for="id-3">Email Address <sup>*</sup> </label>
                                            <input class="form-control" type="text" name="email_dbac577"
                                                placeholder="Email Address*" value="" id="id-3"
                                                required="required">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6 form-builder-item">
                                        <div class="form-group has-placeholder">
                                            <label for="id-4">Phone Number <sup>*</sup> </label>
                                            <input class="form-control" type="text" name="text_2e4368a"
                                                placeholder="Phone Number*" value="" id="id-4"
                                                required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 form-builder-item">
                                        <div class="form-group has-placeholder">
                                            <label for="id-5">Your Message <sup>*</sup> </label>
                                            <textarea class="form-control" rows="6" name="textarea_b135db1" placeholder="Your Message*" id="id-5"
                                                required="required"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"></div>
                            </div>
                            <div class="wrap-forms wrap-forms-buttons topmargin_0">
                                <div class="row">
                                    <div class="col-sm-12 wrap-buttons text-left">
                                        <input class="theme_button color1 wide_button" type="submit" value="Send now">
                                        <input class="theme_button color1 wide_button" type="reset" value="Clear">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="fw-divider-space " style="margin-top: 5px;"></div>

                </div>
                <div class="col-xs-12 col-md-6 fw-column">
                    {!! $academia->mapa_google !!}
                </div>
            </div>
           
        </div>
    </section>
@endsection
