@extends('adminlte::page')

@section('title', 'Gerenciar Academias')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1><i class="fas fa-search mr-2"></i> Academias</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Painel de Controle</a></li>
                <li class="breadcrumb-item active">Academias</li>
            </ol>
        </div>
    </div>
@stop

@section('content')   
        <div class="card card-solid">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 col-sm-6 my-2">
                        <div class="card-tools">
                            <div style="width: 250px;">
                                <form class="input-group input-group-sm" action="{{route('tenant.search')}}" method="post">
                                    @csrf   
                                    <input type="text" name="filter" value="{{ $filters['filter'] ?? '' }}" class="form-control float-right" placeholder="Pesquisar">
                    
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-sm-6 my-2 text-right">
                        <a href="{{route('tenant.create')}}" class="btn btn-sm btn-default"><i class="fas fa-plus mr-2"></i> Cadastrar Academia</a>
                    </div>
                </div>
            </div>
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-12">
                        @if (session()->exists('message'))
                            @message(['color' => session()->get('color')])
                                {{ session()->get('message') }}
                            @endmessage
                        @endif
                    </div>
                </div>
                @if (!empty($academias) && $academias->count() > 0)
                    <div class="row d-flex align-items-stretch">
                        @foreach ($academias as $academia)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                <div class="card bg-light"
                                    style="{{ $academia->status == '1' ? '' : 'background: #fffed8 !important;' }}">
                                    <div class="card-header text-muted border-bottom-0">
                                        ssssssss
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b>{{ $academia->name }}</b></h2>
                                                <p class="text-muted text-sm">ssssss</p>
                                                <p class="text-muted text-sm"><b>Data de Entrada: </b><br>
                                                    {{ $academia->created_at }}</p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small">
                                                        @if ($academia->rua != '')
                                                            <span class="fa-li">
                                                                <i class="fas fa-lg fa-home"></i>
                                                            </span> {{ $academia->rua }}
                                                        @endif
                                                        @if ($academia->rua != '' && $academia->num != '')
                                                            , {{ $academia->num }}
                                                        @endif
                                                        @if ($academia->rua != '' || $academia->num != '')
                                                            , {{ $academia->bairro }}
                                                        @endif
                                                        @if ($academia->rua != '' || $academia->num != '' || $academia->bairro != '')
                                                            -
                                                            {{ $academia->cidade }}
                                                        @endif
                                                    </li>
                                                    @if ($academia->telefone)
                                                        <li class="small">
                                                            <span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                                            {{ $academia->telefone }}
                                                            @if ($academia->celular)
                                                                - {{ $academia->celular }}
                                                            @endif
                                                        </li>
                                                    @endif

                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="{{$academia->getlogo()}}" alt="{{ $academia->name }}" class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <input type="checkbox" data-onstyle="success" data-offstyle="warning"
                                                data-size="mini" class="toggle-class" data-id="{{ $academia->id }}"
                                                data-toggle="toggle" data-style="slow"
                                                data-on="<i class='fas fa-check'></i>"
                                                data-off="<i style='color:#fff !important;' class='fas fa-exclamation-triangle'></i>"
                                                {{ $academia->status == true ? 'checked' : '' }}>

                                                @if ($academia->whatsapp)
                                                    <a target="_blank"
                                                        href="{{ \App\Helpers\WhatsApp::getNumZap($academia->whatsapp) }}"
                                                        class="btn btn-xs btn-success text-white"><i
                                                            class="fab fa-whatsapp"></i></a>
                                                @endif

                                                <form class="btn btn-xs" action="{{ route('email.send') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="nome" value="{{ $academia->name }}">
                                                    <input type="hidden" name="email" value="{{ $academia->email }}">
                                                    <button title="Enviar Email" type="submit" class="btn btn-xs text-white bg-teal"><i class="fas fa-envelope"></i></button>
                                                </form>
                                            
                                            <a target="_blank" href="{{ route('web.tenant', ['slug' => $academia->slug]) }}" class="btn btn-xs btn-primary"><i class="fas fa-search"></i></a>
                                            <a href="{{ route('tenant.edit', ['id' => $academia->id]) }}" class="btn btn-xs btn-default"><i class="fas fa-pen"></i></a>


                                            <button type="button" class="btn btn-xs btn-danger text-white j_modal_btn"
                                                data-campo="{{ $academia->name }}" data-id="{{ $academia->id }}"
                                                data-toggle="modal" data-target="#modal-default">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="alert alert-info p-3">
                                Não foram encontrados registros!
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="card-footer paginacao">
                @if (isset($filters))
                    {{ $academias->appends($filters)->links() }}
                @else
                    {{ $academias->links() }}
                @endif
            </div>

        </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frm" action="" method="post">
                    @csrf
                    @method('DELETE')
                    <input id="id_academia" name="academia_id" type="hidden" value="" />
                    <div class="modal-header">
                        <h4 class="modal-title">Remover Academia!</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span class="j_param_data"></span>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                        <button type="submit" class="btn btn-primary">Excluir Agora</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('plugins.Toastr', true)

@section('css')
    <link rel="stylesheet" href="{{ url(asset('backend/plugins/ekko-lightbox/ekko-lightbox.css')) }}">
    <link href="{{ url(asset('backend/plugins/bootstrap-toggle/bootstrap-toggle.min.css')) }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ url(asset('backend/plugins/ekko-lightbox/ekko-lightbox.min.js')) }}"></script>
    <script src="{{ url(asset('backend/plugins/bootstrap-toggle/bootstrap-toggle.min.js')) }}"></script>
    <script>
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.j_modal_btn').click(function() {
                var academia_id = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    dataType: 'JSON',
                    url: "{{ route('tenant.delete') }}",
                    data: {
                        'id': academia_id
                    },
                    success: function(data) {
                        if (data.error) {
                            $('.j_param_data').html(data.error);
                            $('#id_academia').val(data.id);
                            $('#frm').prop('action', '{{ route('tenant.deleteon') }}');
                        } else {
                            $('#frm').prop('action', '{{ route('tenant.deleteon') }}');
                        }
                    }
                });
            });

            $('#toggle-two').bootstrapToggle({
                on: 'Enabled',
                off: 'Disabled'
            });

            $('.toggle-class').on('change', function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var academia_id = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    dataType: 'JSON',
                    url: "{{ route('tenant.setStatus') }}",
                    data: {
                        'status': status,
                        'id': academia_id
                    },
                    success: function(data) {}
                });
            });
        });
    </script>
@endsection
