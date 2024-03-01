@extends("web.{$configuracoes->template}.master.master")

@section('content')
    <section class="page_breadcrumbs ds section_padding_40 background_cover section_overlay"
        style="background-image: url({{ $configuracoes->gettopodosite() }});">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3 class="breadcrumbs-title">
                        Academias
                    </h3>
                    <ol class="breadcrumb">
                        <li class="first-item">
                            <a href="{{ route('web.home') }}">Início</a>
                        </li>
                        <li class="last-item">Academias</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="ds page_content section_padding_top_40 section_padding_bottom_130 columns_padding_30">
        <div class="container">
            <div class="row">
                <div class="col-12 fw-column">

                    <div id="mc4wp_form_widget-5" class="widget-odd widget-last widget-first widget-1 text-center special-title widget widget_mc4wp_form_widget">
                        <h3 class="widget-title">
                            <span class="first-word">Receba</span> 
                            <span class="last-word">Novidades</span>
                        </h3>
                        <form class="mc4wp-form mc4wp-form-445" method="post" autocomplete="off">
                            <div class="mc4wp-form-fields">
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
    </section>
@endsection
