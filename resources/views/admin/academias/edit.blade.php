@extends('adminlte::page')

@section('title', 'Editar Academia')

@php
$config = [
    "height" => "300",
    "fontSizes" => ['8', '9', '10', '11', '12', '14', '18'],
    "lang" => 'pt-BR',
    "toolbar" => [
        // [groupName, [list of button]]
        ['style', ['style']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['style', ['bold', 'italic', 'underline', 'clear']],
        //['font', ['strikethrough', 'superscript', 'subscript']],        
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video','hr']],
        ['view', ['fullscreen', 'codeview']],
    ],
]
@endphp

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1><i class="fas fa-search mr-2"></i>Editar Academia</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Painel de Controle</a></li>
            <li class="breadcrumb-item"><a href="{{route('tenant.index')}}">Academias</a></li>
            <li class="breadcrumb-item active">Editar Academia</li>
        </ol>
    </div>
</div> 
@stop

@section('content')
<div class="row">
    <div class="col-12">
        @if($errors->all())
             @foreach($errors->all() as $error)
                 @message(['color' => 'danger'])
                 {{ $error }}
                 @endmessage
             @endforeach
         @endif   
         
         @if(session()->exists('message'))
             @message(['color' => session()->get('color')])
                 {{ session()->get('message') }}
             @endmessage
         @endif
     </div>            
</div>   
                    
            
<form action="{{ route('tenant.update',['id' => $academia->id]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
@csrf
@method('PUT')      
<div class="row">            
<div class="col-12">
<div class="card card-teal card-outline card-outline-tabs">                            
<div class="card-header p-0 border-bottom-0">
<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">INFORMAÇÕES</a>
    </li>  
    <li class="nav-item">
        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">REDES SOCIAIS</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="custom-tabs-four-imagens-tab" data-toggle="pill" href="#custom-tabs-four-imagens" role="tab" aria-controls="custom-tabs-four-imagens" aria-selected="false">LOGOMARCAS</a>
    </li>     
    <li class="nav-item">
        <a class="nav-link" id="custom-tabs-four-fotos-tab" data-toggle="pill" href="#custom-tabs-four-fotos" role="tab" aria-controls="custom-tabs-four-fotos" aria-selected="false">IMAGENS</a>
    </li>     
    <li class="nav-item">
        <a class="nav-link" id="custom-tabs-four-seo-tab" data-toggle="pill" href="#custom-tabs-four-seo" role="tab" aria-controls="custom-tabs-four-mapas" aria-selected="false">SEO</a>
    </li> 
</ul>
</div>
<div class="card-body">
<div class="tab-content" id="custom-tabs-four-tabContent">
    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
        <div class="row mb-4 text-muted">
            <div class="col-12 col-md-4 col-lg-4"> 
                <div class="form-group">
                    <label class="labelforms"><b>*Plano:</b> </label>
                    <select name="plan_id" class="form-control">
                        @if ($plans && $plans->count() > 0)
                            @foreach ($plans as $plan)
                                <option value=""> Selecione </option>
                                <option value="{{$plan->id}}" {{ (old('plan_id') == $plan->id ? 'selected' : ($plan->id == $academia->plan_id ? 'selected' : '')) }}>{{$plan->name}} - {{$plan->value_monthly ?? 'R$0,00'}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-4 text-muted">            
            <div class="col-12 col-md-6 col-lg-4"> 
                <div class="form-group">
                    <label class="labelforms"><b>*Nome da Academia:</b> </label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') ?? $academia->name }}">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4"> 
                <div class="form-group">
                    <label class="labelforms"><b>Razão Social:</b></label>
                    <input type="text" class="form-control" placeholder="Razão Social" name="social_name" value="{{ old('social_name') ?? $academia->social_name }}">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4"> 
                <div class="form-group">
                    <label class="labelforms"><b>Nome Fantasia:</b></label>
                    <input type="text" class="form-control" placeholder="Nome Fantasia" name="alias_name" value="{{ old('alias_name') ?? $academia->alias_name }}">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4"> 
                <div class="form-group">
                    <label class="labelforms"><b>CNPJ:</b> </label>
                    <input type="text" class="form-control cnpjmask" name="cnpj" value="{{ old('cnpj') ?? $academia->cnpj }}">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4"> 
                <div class="form-group">
                    <label class="labelforms"><b>Inscrição Estadual:</b></label>
                    <input type="text" class="form-control" placeholder="Inscrição Estadual" name="ie" value="{{old('ie') ?? $academia->ie}}">
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-2"> 
                <div class="form-group">
                    <label class="labelforms"><b>Ano de ínicio</b></label>
                    <input type="text" class="form-control" placeholder="Ano de ínicio" name="init_date" value="{{old('init_date') ?? $academia->init_date}}">
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-2"> 
                <div class="form-group">
                    <label class="labelforms"><b>Status:</b></label>
                    <select name="status" class="form-control">
                        <option value="1" {{ (old('status') == '1' ? 'selected' : ($academia->status == '1' ? 'selected' : '')) }}>Ativo</option>
                        <option value="0" {{ (old('status') == '0' ? 'selected' : ($academia->status == '0' ? 'selected' : '')) }}>Inativo</option>
                    </select>
                </div>
            </div>             
            <div class="col-12 col-md-6 col-lg-6"> 
                <div class="form-group">
                    <label class="labelforms"><b>Domínio:</b> </label>
                    <input type="text" class="form-control" name="domain" value="{{ old('domain') ?? $academia->domain }}">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6"> 
                <div class="form-group">
                    <label class="labelforms"><b>Sub-Domínio:</b> </label>
                    <input type="text" class="form-control" name="subdomain" value="{{ old('subdomain') ?? $academia->subdomain }}" {{(\Illuminate\Support\Facades\Auth::user()->superadmin == true ? '' : 'disabled')}}>
                </div>
            </div>                        
        </div>
        

        <div id="accordion">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <a style="border:none;color: #555;" data-toggle="collapse" data-parent="#accordion" href="#collapseContato">
                            <i class="nav-icon fas fa-plus mr-2"></i> Contato
                        </a>
                    </h4>
                </div>
                <div id="collapseContato" class="panel-collapse collapse show">
                    <div class="card-body">
                        <div class="row mb-2 text-muted">  
                            <div class="col-12 col-md-6 col-lg-4"> 
                                <div class="form-group">
                                    <label class="labelforms"><b>*Email:</b></label>
                                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{old('email') ?? $academia->email}}">
                                </div>
                            </div>                          
                            <div class="col-12 col-md-6 col-lg-4"> 
                                <div class="form-group">
                                    <label class="labelforms"><b>Email Adicional:</b></label>
                                    <input type="text" class="form-control" placeholder="Email Adicional" name="additional_email" value="{{old('additional_email') ?? $academia->additional_email}}">
                                </div>
                            </div>   
                            <div class="col-12 col-md-6 col-lg-4"> 
                                <div class="form-group">
                                    <label class="labelforms text-muted"><b>Telegram:</b></label>
                                    <input type="text" class="form-control" placeholder="Telegram" name="telegram" value="{{old('telegram') ?? $academia->telegram}}">
                                </div>
                            </div>                       
                            <div class="col-12 col-md-6 col-lg-4"> 
                                <div class="form-group">
                                    <label class="labelforms"><b>Telefone Fixo:</b></label>
                                    <input type="text" class="form-control telefonemask" placeholder="Número do Telefone com DDD" name="phone" value="{{old('phone') ?? $academia->phone}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4"> 
                                <div class="form-group">
                                    <label class="labelforms"><b>*Celular:</b></label>
                                    <input type="text" class="form-control celularmask" placeholder="Número do Celular com DDD" name="cell_phone" value="{{old('cell_phone') ?? $academia->cell_phone}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4"> 
                                <div class="form-group">
                                    <label class="labelforms"><b>WhatsApp:</b></label>
                                    <input type="text" class="form-control whatsappmask" placeholder="Número do Celular com DDD" name="whatsapp" value="{{old('whatsapp') ?? $academia->whatsapp}}">
                                </div>
                            </div>                                                                               
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>
                        <a style="border:none;color: #555;" data-toggle="collapse" data-parent="#accordion" href="#collapseEndereco">
                            <i class="nav-icon fas fa-plus mr-2"></i> Endereço
                        </a>
                    </h4>
                </div>
                <div id="collapseEndereco" class="panel-collapse collapse show">
                    <div class="card-body text-muted">
                        <div class="row mb-2">
                            <div class="col-12 col-md-3 col-lg-2"> 
                                <div class="form-group">
                                    <label class="labelforms"><b>*CEP:</b></label>
                                    <input type="text" class="form-control mask-zipcode" id="cep" placeholder="Digite o CEP" name="postcode" value="{{old('postcode') ?? $academia->postcode}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3"> 
                                <div class="form-group">
                                    <label class="labelforms"><b>Estado:</b></label>
                                    <input type="text" class="form-control" name="state" id="uf" value="{{old('state') ?? $academia->state}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3"> 
                                <div class="form-group">
                                    <label class="labelforms"><b>Cidade:</b></label>
                                    <input type="text" class="form-control" name="city" id="cidade" value="{{old('city') ?? $academia->city}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4"> 
                                <div class="form-group">
                                    <label class="labelforms"><b>Bairro:</b></label>
                                    <input type="text" class="form-control" name="neighborhood" id="bairro" value="{{old('neighborhood') ?? $academia->neighborhood}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6"> 
                                <div class="form-group">
                                    <label class="labelforms"><b>Rua:</b></label>
                                    <input type="text" class="form-control" name="street" id="rua" value="{{old('street') ?? $academia->street}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-2"> 
                                <div class="form-group">
                                    <label class="labelforms"><b>Número:</b></label>
                                    <input type="text" class="form-control" placeholder="Número do Endereço" name="number" value="{{old('number') ?? $academia->number}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4"> 
                                <div class="form-group">
                                    <label class="labelforms"><b>Complemento:</b></label>
                                    <input type="text" class="form-control" placeholder="Complemento (Opcional)" name="complement" value="{{old('complement') ?? $academia->complement}}">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
                
    </div>
    
    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">                                    
        <div class="row mb-2 text-muted">
            <div class="col-sm-12 text-muted">
                <div class="form-group">
                    <h5><b>Redes Sociais</b></h5>                                    
                </div>
            </div>
            <hr>
            <div class="col-12 col-md-6 col-lg-6"> 
                <div class="form-group">
                    <label class="labelforms"><b>Facebook:</b></label>
                    <input type="text" class="form-control text-muted" placeholder="Facebook" name="facebook" value="{{old('facebook') ?? $academia->facebook}}">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6"> 
                <div class="form-group">
                    <label class="labelforms"><b>Twitter:</b></label>
                    <input type="text" class="form-control text-muted" placeholder="Twitter" name="twitter" value="{{old('twitter') ?? $academia->twitter}}">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6"> 
                <div class="form-group">
                    <label class="labelforms"><b>Youtube:</b></label>
                    <input type="text" class="form-control text-muted" placeholder="Youtube" name="youtube" value="{{old('youtube') ?? $academia->youtube}}">
                </div>
            </div>            
            <div class="col-12 col-md-6 col-lg-6"> 
                <div class="form-group">
                    <label class="labelforms"><b>Instagram:</b></label>
                    <input type="text" class="form-control text-muted" placeholder="Instagram" name="instagram" value="{{old('instagram') ?? $academia->instagram}}">
                </div>
            </div>           
            <div class="col-12 col-md-6 col-lg-6"> 
                <div class="form-group">
                    <label class="labelforms"><b>Linkedin:</b></label>
                    <input type="text" class="form-control text-muted" placeholder="Linkedin" name="linkedin" value="{{old('linkedin') ?? $academia->linkedin}}">
                </div>
            </div>            
        </div>
    </div>
    
    <div class="tab-pane fade" id="custom-tabs-four-fotos" role="tabpanel" aria-labelledby="custom-tabs-four-fotos-tab">
        <div class="row mb-2 text-muted">
            <div class="col-sm-12">
                <div class="form-group">
                    <h5><b>Fotos da Academia</b></h5>  
                    <p>Aqui você adicionar as fotos da academia, fique atento ao tamanho das fotos para uma melhor experiência da sua aplicação.</p>                                          
                </div>
            </div>
            <hr>
            <div class="col-sm-12">                                        
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="files[]" multiple>
                        <label class="custom-file-label" for="exampleInputFile">Escolher Fotos</label>
                    </div>
                </div>
                
                <div class="content_image"></div> 
                
                <div class="property_image">
                    @foreach($academia->images()->get() as $image)
                    <div class="property_image_item">
                        <a href="{{ $image->url_image }}" data-toggle="lightbox" data-gallery="property-gallery" data-type="image">
                            <img src="{{ $image->url_image }}" alt="">
                        </a>
                        <div class="property_image_actions">
                            <a href="javascript:void(0)" class="btn btn-xs {{ ($image->cover == true ? 'btn-success' : 'btn-default') }} icon-notext image-set-cover px-2" data-action="{{ route('tenant.imageSetCover', ['image' => $image->id]) }}"><i class="nav-icon fas fa-check"></i> </a>
                            <a href="javascript:void(0)" class="btn btn-danger btn-xs image-remove px-2" data-action="{{ route('tenant.imageRemove', ['image' => $image->id]) }}"><i class="nav-icon fas fa-times"></i> </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>  
    </div>

    <div class="tab-pane fade" id="custom-tabs-four-imagens" role="tabpanel" aria-labelledby="custom-tabs-four-imagens-tab">
        <div class="row mb-2 text-muted">
            <div class="col-sm-12">
                <div class="form-group">
                    <h5><b>Imagens do site</b></h5>  
                    <p>Aqui você configurar as imagens do site, fique atento ao tamanho das imagens para uma melhor experiência da sua aplicação.</p>                                          
                </div>
            </div>
            <hr>
            <div class="col-12 col-md-6 col-sm-6 col-lg-6"> 
                <div class="form-group">
                    <label class="labelforms"><b>Logomarca do site</b> - {{env('LOGOMARCA_WIDTH')}}x{{env('LOGOMARCA_HEIGHT')}} pixels</label>
                    <div class="thumb_user_admin">                                                    
                        <img id="preview2" width="{{env('LOGOMARCA_WIDTH')}}" height="{{env('LOGOMARCA_HEIGHT')}}" src="{{$academia->getlogo()}}" alt="{{ old('domain') ?? $academia->domain }}" title="{{ old('domain') ?? $academia->domain }}"/>
                        <input id="img-logomarca" type="file" name="logo">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-sm-6 col-lg-6"> 
                <div class="form-group">
                    <label class="labelforms"><b>Logomarca do Gerenciador</b> - {{env('LOGOMARCA_GERENCIADOR_WIDTH')}}x{{env('LOGOMARCA_GERENCIADOR_HEIGHT')}} pixels</label>
                    <div class="thumb_user_admin">                                                    
                        <img id="preview3" width="{{env('LOGOMARCA_GERENCIADOR_WIDTH')}}" height="{{env('LOGOMARCA_GERENCIADOR_HEIGHT')}}" src="{{$academia->getlogoadmin()}}" alt="{{ old('domain') ?? $academia->domain }}" title="{{ old('domain') ?? $academia->domain }}"/>
                        <input id="img-logomarcaadmin" type="file" name="logo_admin">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-sm-6 col-lg-6"> 
                <div class="form-group">
                    <label class="labelforms"><b>Favicon</b> - {{env('FAVEICON_WIDTH')}}x{{env('FAVEICON_HEIGHT')}} pixels</label>
                    <div class="thumb_user_admin">                                                    
                        <img id="preview4" width="{{env('FAVEICON_WIDTH')}}" height="{{env('FAVEICON_HEIGHT')}}" src="{{$academia->getfaveicon()}}" alt="{{ old('domain') ?? $academia->domain }}" title="{{ old('domain') ?? $academia->domain }}"/>
                        <input id="img-favicon" type="file" name="favicon">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-sm-6 col-lg-6"> 
                <div class="form-group">
                    <label class="labelforms"><b>Marca D´agua</b> - {{env('MARCADAGUA_WIDTH')}}x{{env('MARCADAGUA_HEIGHT')}} pixels</label>
                    <div class="thumb_user_admin">                                                    
                        <img id="preview5" width="{{env('MARCADAGUA_WIDTH')}}" height="{{env('MARCADAGUA_HEIGHT')}}" src="{{$academia->getwatermark()}}" alt="{{ old('domain') ?? $academia->domain }}" title="{{ old('domain') ?? $academia->domain }}"/>
                        <input id="img-marcadagua" type="file" name="watermark">
                    </div>
                </div>
            </div>
            <div class="col-12"> 
                <div class="form-group">
                    <label class="labelforms"><b>Topo do site</b> - {{env('IMGHEADER_WIDTH')}}x{{env('IMGHEADER_HEIGHT')}} pixels</label>
                    <div class="thumb_user_admin">
                        <img id="preview6" width="{{env('IMGHEADER_WIDTH')}}" height="{{env('IMGHEADER_HEIGHT')}}" src="{{$academia->getimgheader()}}" alt="{{ old('domain') ?? $academia->domain }}" title="{{ old('domain') ?? $academia->domain }}"/>
                        <input id="img-imgheader" type="file" name="imgheader">
                    </div>
                </div>
            </div>
        </div>  
    </div>
    
    <div class="tab-pane fade" id="custom-tabs-four-seo" role="tabpanel" aria-labelledby="custom-tabs-four-seo-tab">
        <div class="row mb-2 text-muted">
            <div class="col-sm-12">
                <div class="form-group">
                    <h5><b>Configurações SEO</b></h5>  
                    <p>Aqui você pode configurar a otimização para as aplicações de Buscas</p>                                          
                </div>
            </div>
            <div class="col-12">   
                <label class="labelforms"><b>Descrição</b></label>
                <x-adminlte-text-editor name="information" v placeholder="Descrição..." :config="$config">{{ old('information') ?? $academia->information }}</x-adminlte-text-editor>                                                                                     
            </div>
            <div class="col-12 mb-1"> 
                <div class="form-group">
                    <label class="labelforms"><b>MetaTags</b></label>
                    <input id="tags_1" class="tags" rows="5" name="metatags" value="{{ old('metatags') ?? $academia->metatags }}">
                </div>
            </div>
            <div class="col-12 mb-1">   
                <div class="form-group">
                    <label class="labelforms"><b>Mapa do Google</b> <small class="text-info">(Copie o código de incorporação do Google Maps e cole abaixo)</small></label>
                    <textarea id="inputDescription" class="form-control" rows="5" name="maps_google">{{ old('maps_google') ?? $academia->maps_google }}</textarea> 
                </div>                                                     
            </div>
            <div class="col-12 mb-1"> 
                <div class="form-group">
                    <label class="labelforms"><b>Meta Imagem: </b>(800X418) pixels</label>
                    <div class="thumb_user_admin">                                                    
                        <img id="preview1" src="{{$academia->getmetaimg()}}" alt="{{ old('domain') ?? $academia->domain }}" title="{{ old('domain') ?? $academia->domain }}"/>
                        <input id="img-input" type="file" name="metaimg">
                    </div>
                </div>
            </div>
            <div class="col-12">   
                <label class="labelforms"><b>Política de Privacidade</b></label>
                <x-adminlte-text-editor name="politicas_de_privacidade" v placeholder="Política de Privacidade..." :config="$config">{{ old('privacy_policy') ?? $academia->privacy_policy }}</x-adminlte-text-editor>                                                                                     
            </div>
        </div> 
    </div>
    

</div>
<div class="row text-right">
    <div class="col-12 my-3">
        <button type="submit" class="btn btn-lg btn-success"><i class="nav-icon fas fa-check mr-2"></i> Atualizar Agora</button>
    </div>
</div> 
                        
</form>                 
            
@stop

@section('css')
    <!--tags input-->
    <link rel="stylesheet" href="{{url(asset('backend/plugins/jquery-tags-input/jquery.tagsinput.css'))}}" />
    <style type="text/css">
        div.tagsinput span.tag {
            background: #65CEA7 !important;
            border-color: #65CEA7;
            color: #fff;
            border-radius: 15px;
            -webkit-border-radius: 15px;
            padding: 3px 10px;
        }
        div.tagsinput span.tag a {
            color: #43886e;    
        }
        /* Foto User Admin */
        .thumb_user_admin{
        border: 1px solid #ddd;
        border-radius: 4px; 
        text-align: center;
        }
        .thumb_user_admin input[type=file]{
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }
        .thumb_user_admin img{
            max-width: 100%;          
        }

        img {
            max-width: 100%;
        }
        .realty_list_item  {    
            border: 1px solid #F3F3F3;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }

        .border-item-imovel{
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            border: 1px solid #F3F3F3;  
            background-color: #F3F3F3;
        }
       
        .property_image, .content_image {
            width: 100%;
            flex-basis: 100%;
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap;
        }
        .property_image .property_image_item, .content_image .property_image_item {
            flex-basis: calc(25% - 20px) !important;
            margin-bottom: 20px;
            margin-right: 20px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            position: relative;
        }

        .property_image .property_image_item img, .content_image .property_image_item img {
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }
        .property_image .property_image_item .property_image_actions, .content_image .property_image_item .property_image_actions {
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .embed {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            max-width: 100%;
        }
    </style>
    @stop

@section('js')
<!--tags input-->
<script src="{{url(asset('backend/plugins/jquery-tags-input/jquery.tagsinput.js'))}}"></script>
<script src="{{url(asset('backend/assets/js/jquery.mask.js'))}}"></script>
<script>
    $(document).ready(function () { 
        var $Cnpj = $(".cnpjmask");
        $Cnpj.mask('00.000.000/0000-00', {reverse: true});
        var $whatsapp = $(".whatsappmask");
        $whatsapp.mask('(99) 99999-9999', {reverse: false});
        var $telefone = $(".telefonemask");
        $telefone.mask('(99) 9999-9999', {reverse: false});
        var $celularmask = $(".celularmask");
        $celularmask.mask('(99) 99999-9999', {reverse: false});
        var $zipcode = $(".mask-zipcode");
        $zipcode.mask('00.000-000', {reverse: true});
    });
</script> 

<script>
    $(function () { 
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 

        $('input[name="files[]"]').change(function (files) {

            $('.content_image').text('');

            $.each(files.target.files, function (key, value) {
                var reader = new FileReader();
                reader.onload = function (value) {
                    $('.content_image').append(
                        '<div id="list" class="property_image_item">' +
                        '<div class="embed radius" style="background-image: url(' + value.target.result + '); background-size: cover; background-position: center center;"></div>' +
                        '<div class="property_image_actions">' +
                            '<a href="javascript:void(0)" class="btn btn-danger btn-xs image-remove1 px-2"><i class="nav-icon fas fa-times"></i> </a>' +
                        '</div>' +
                        '</div>');
                        
                    $('.image-remove1').click(function(){
                        $(this).closest('#list').remove()
                    });
                };
                reader.readAsDataURL(value);
            });
        });            


        $('.image-set-cover').click(function (event) {
            event.preventDefault();
            var button = $(this);
            $.post(button.data('action'), {}, function (response) {
                if (response.success === true) {
                    $('.property_image').find('a.btn-success').removeClass('btn-success');
                    button.addClass('btn-success');
                }
                if(response.success === false){
                    button.addClass('btn-default');
                }
            }, 'json');
        });

        $('.image-remove').click(function(event){
            event.preventDefault();
            var button = $(this);
            $.ajax({
                url: button.data('action'),
                type: 'DELETE',
                dataType: 'json',
                success: function(response){
                    if(response.success === true) {
                        button.closest('.property_image_item').fadeOut(function(){
                            $(this).remove();
                        });
                    }
                }
            });
        });        

        //tag input
        function onAddTag(tag) {
            alert("Adicionar uma Tag: " + tag);
        }
        function onRemoveTag(tag) {
            alert("Remover Tag: " + tag);
        }
        function onChangeTag(input,tag) {
            alert("Changed a tag: " + tag);
        }
        $(function() {
            $('#tags_1').tagsInput({
                width:'auto',
                height:200
            });
        });   
       
    });
</script>

<script>
    $(document).ready(function() {

        function limpa_formulário_cep() {
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
        }
        
        $("#cep").blur(function() {

            var cep = $(this).val().replace(/\D/g, '');

            if (cep != "") {
                
                var validacep = /^[0-9]{8}$/;

                if(validacep.test(cep)) {
                    
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                        } else {
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } else {
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } else {
                limpa_formulário_cep();
            }
        });
    });

</script>
@stop