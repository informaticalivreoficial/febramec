@extends("web.{$configuracoes->template}.master.master")

@section('content')
    <section class="page_breadcrumbs ds section_padding_40 background_cover section_overlay"
        style="background-image: url({{$configuracoes->gettopodosite()}});">
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
    <section class="ds page_content section_padding_top_40 section_padding_bottom_40 columns_padding_30">
        <div class="container">
            <div class="row">
                <div id="content" class="team-list col-sm-12">
                    <div class="isotope_container topmargin_20 bottommargin_10 isotope row masonry-layout">
                        <div class="isotope-item bottommargin_20 col-lg-4 col-md-4 col-sm-12 instructors ">
                            @if (!empty($academias) && $academias->count() > 0)
                                @foreach($academias as $academia)
                                    <div class="vertical-item text-center content-padding big-padding with_background overflow-hidden ">
                                        <div class="item-media">
                                            <img src="{{$academia->cover()}}"
                                                class="attachment-youko-team-member size-youko-team-member wp-post-image"
                                                alt="{{$academia->name}}">
                                            <div class="media-links">
                                                <a class="abs-link" href="{{route('web.academia', [ 'slug' => $academia->slug ])}}"></a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <h5 class="item-title">
                                                <a href="{{route('web.academia', [ 'slug' => $academia->slug ])}}">{{$academia->name}} </a>
                                            </h5>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </section>
@endsection
