<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use App\Models\CatPost;
use App\Models\Cidades;
use App\Models\Imovel;
use App\Models\Parceiro;
use App\Models\Post;
use App\Models\Slide;
use App\Tenant\ManangerTenant;
use Carbon\Carbon;
use App\Support\Seo;
use Illuminate\Http\Request;

use App\Services\EstadoService;

class SiteController extends Controller
{
    protected $tenant, $estadoService;
    protected $seo;
    protected $filter;

    public function __construct(
        ManangerTenant $tenant, 
        FilterController $filter, 
        EstadoService $estadoService)
    {
        $this->estadoService = $estadoService;
        $this->tenant = $tenant->tenant();
        $this->seo = new Seo();
        $this->filter = $filter;
    }
    
    public function home()
    {
        $imoveisParaVenda = Imovel::orderBy('created_at', 'DESC')
                            ->venda()
                            ->where('tenant_id', $this->tenant->id)
                            ->available()
                            ->limit(24)
                            ->get();

        $imoveisParaLocacao = Imovel::orderBy('created_at', 'DESC')
                            ->locacao()
                            ->where('tenant_id', $this->tenant->id)
                            ->available()
                            ->limit(24)
                            ->get(); 
                            
        $slides = Slide::orderBy('created_at', 'DESC')
                            ->available()
                            ->where('tenant_id', $this->tenant->id)
                            ->where('expira', '>=', Carbon::now())
                            ->get();

        $destaque = Imovel::where('destaque', 1)->available()->first();

        $artigos = Post::orderBy('created_at', 'DESC')
                            ->where('tipo', 'artigo')
                            ->where('tenant_id', $this->tenant->id)
                            ->postson()
                            ->limit(6)
                            ->get();

        $experienceCobertura = Imovel::where('experience', 'Cobertura')->inRandomOrder()->where('tenant_id', $this->tenant->id)->available()->get();
        $experienceCondominioFechado = Imovel::where('experience', 'Condom??nio Fechado')->inRandomOrder()->where('tenant_id', $this->tenant->id)->available()->get();
        $experienceDeFrenteParaMar = Imovel::where('experience', 'De Frente para o Mar')->inRandomOrder()->where('tenant_id', $this->tenant->id)->available()->get();
        $experienceAltoPadrao = Imovel::where('experience', 'Alto Padr??o')->inRandomOrder()->where('tenant_id', $this->tenant->id)->available()->get();
        $experienceLojasSalas = Imovel::where('experience', 'Lojas e Salas')->inRandomOrder()->where('tenant_id', $this->tenant->id)->available()->get();
        $experienceCompacto = Imovel::where('experience', 'Compacto')->inRandomOrder()->where('tenant_id', $this->tenant->id)->available()->get();
        
        $head = $this->seo->render($this->tenant->name ?? 'Super Im??veis',
            $this->tenant->descricao ?? 'Super Im??veis Sistema Imobili??rio',
            route('web.home'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.home',[
            'tenant' => $this->tenant,
            'imoveisParaVenda' => $imoveisParaVenda,
            'imoveisParaLocacao' => $imoveisParaLocacao,
            'destaque' => $destaque,
            'artigos' => $artigos,
            'head' => $head,
            'slides' => $slides,
            'experienceCobertura' => $experienceCobertura,
            'experienceCondominioFechado' => $experienceCondominioFechado,
            'experienceAltoPadrao' => $experienceAltoPadrao,
            'experienceLojasSalas' => $experienceLojasSalas,
            'experienceCompacto' => $experienceCompacto,
            'experienceDeFrenteParaMar' => $experienceDeFrenteParaMar,
            'estados' => $this->estadoService->getEstados()
        ]);
    }

    public function politica()
    {
        $head = $this->seo->render('Pol??tica de Privacidade - ' . $this->tenant->name ?? 'Super Im??veis',
            'Pol??tica de Privacidade - ' . $this->tenant->name,
            route('web.politica'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.politica',[
            'tenant' => $this->tenant,
            'head' => $head
        ]);
    }

    public function financiamento()
    {
        $head = $this->seo->render('Simulador de Financiamento de Im??vel - ' . $this->tenant->name ?? 'Super Im??veis',
            'Simule aqui os valores do financiamento para lhe auxiliar na decis??o de comprar o im??vel dos seus sonhos.',
            route('web.financiamento'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.financiamento',[
            'tenant' => $this->tenant,
            'head' => $head
        ]);
    }

    public function atendimento()
    {
        $head = $this->seo->render('Atendimento - '.$this->tenant->name ?? 'Super Im??veis Sistema Imobili??rio',
        'Atendimento ao cliente - '.$this->tenant->name ?? 'Super Im??veis Sistema Imobili??rio',
            route('web.atendimento'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.atendimento.fale',[
            'tenant' => $this->tenant,
            'head' => $head
        ]);
    }

    public function lancamento()
    {
        $imovel = Imovel::where('destaque', 1)->available()->first();

        if(empty($imovel)){
            $head = $this->seo->render('P??gina n??o encontrada' ?? 'Super Im??veis Sistema Imobili??rio',
                'P??gina n??o encontrada',
                route('web.home'),
                $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
            );

            return view('web.sites.'.$this->tenant->template.'.404',[
                'head' => $head,
                'tenant' => $this->tenant
            ]);
        }

        $head = $this->seo->render($imovel->titulo ?? 'Super Im??veis Sistema Imobili??rio',
            $imovel->headline ?? $imovel->titulo,
            route('web.lancamento'),
            $imovel->nocover() ?? $this->tenant->getMetaImg()
        );

        return view('web.sites.'.$this->tenant->template.'.imoveis.lancamento', [
            'tenant' => $this->tenant,
            'head' => $head,
            'imovel' => $imovel
        ]);        
    }

    public function buyProperty($slug)
    {
        $imovel = Imovel::where('slug', $slug)
                            ->where('tenant_id', $this->tenant->id)
                            ->available()
                            ->venda()
                            ->first();
        $imoveis = Imovel::where('id', '!=', $imovel->id)
                            ->where('tenant_id', $this->tenant->id)
                            ->available()
                            ->venda()
                            ->limit(4)
                            ->get();

        if(!empty($imovel)){
            $imovel->views = $imovel->views + 1;
            $imovel->save();

            $head = $this->seo->render($imovel->titulo ?? 'Super Im??veis Sistema Imobili??rio',
                $imovel->headline ?? $imovel->titulo,
                route('web.buyProperty', ['slug' => $imovel->slug]),
                $imovel->nocover() ?? $this->tenant->getMetaImg()
            );

            return view('web.sites.'.$this->tenant->template.'.imoveis.imovel', [
                'tenant' => $this->tenant,
                'head' => $head,
                'imovel' => $imovel,
                'imoveis' => $imoveis,
                'type' => 'venda',
            ]);
        }else{
            $head = $this->seo->render($this->tenant->name ?? 'Super Im??veis Sistema Imobili??rio',
                'Im??vel n??o encontrado!',
                route('web.home') ?? 'https://superimoveis.info',
                $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
            );
            return view('web.sites.'.$this->tenant->template.'.imoveis.imovel', [
                'tenant' => $this->tenant,
                'head' => $head,
                'imovel' => false,
                'type' => 'venda',
            ]);
        }
        
    }

    public function rentProperty($slug)
    {
        $imovel = Imovel::where('slug', $slug)
                            ->where('tenant_id', $this->tenant->id)
                            ->available()
                            ->locacao()
                            ->first();
        $imoveis = Imovel::where('id', '!=', $imovel->id)
                            ->where('tenant_id', $this->tenant->id)
                            ->available()
                            ->locacao()
                            ->limit(4)
                            ->get();

        if(!empty($imovel)){
            $imovel->views = $imovel->views + 1;
            $imovel->save();

            $head = $this->seo->render($imovel->titulo ?? 'Super Im??veis Sistema Imobili??rio',
                $imovel->headline ?? $imovel->titulo,
                route('web.rentProperty', ['slug' => $imovel->slug]),
                $imovel->nocover() ?? $this->tenant->getMetaImg()
            );

            return view('web.sites.'.$this->tenant->template.'.imoveis.imovel', [
                'tenant' => $this->tenant,
                'head' => $head,
                'imovel' => $imovel,
                'imoveis' => $imoveis,
                'type' => 'locacao',
            ]);
        }else{
            $head = $this->seo->render($this->tenant->name ?? 'Super Im??veis Sistema Imobili??rio',
                'Im??vel n??o encontrado!',
                route('web.home') ?? 'https://superimoveis.info',
                $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
            );
            return view('web.sites.'.$this->tenant->template.'.imoveis.imovel', [
                'tenant' => $this->tenant,
                'head' => $head,
                'imovel' => false,
                'type' => 'locacao',
            ]);
        }
        
    }

    public function imoveisList($type)
    {
        if($type == 'venda'){
            $imoveis = Imovel::orderBy('created_at', 'DESC')
                                ->where('tenant_id', $this->tenant->id)
                                ->available()
                                ->venda()
                                ->paginate(15);
        }else{
            $imoveis = Imovel::orderBy('created_at', 'DESC')
                                ->where('tenant_id', $this->tenant->id)
                                ->available()
                                ->locacao()
                                ->paginate(15);
        }        

        $head = $this->seo->render('Im??veis para ' . $type ?? 'Super Im??veis Sistema Imobili??rio',
            'Confira os im??veis para '.$type.' temos ??timas oportunidades de neg??cio.',
            route('web.imoveisList', $type),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.imoveis.index',[
            'tenant' => $this->tenant,
            'head' => $head,
            'imoveis' => $imoveis,
            'type' => $type
        ]);
    }

    public function pesquisaImoveis(Request $request)
    {
        $search = $request->search;

        $imoveis = Imovel::orderBy('created_at', 'DESC')
                    ->where('tenant_id', $this->tenant->id)
                    ->where('titulo', 'LIKE', '%'.$search.'%')
                    ->orWhere('referencia', 'LIKE', '%'.$search.'%')
                    ->orWhere('rua', 'LIKE', '%'.$search.'%')
                    ->orWhere('bairro', 'LIKE', '%'.$search.'%')
                    ->orWhere('experience', 'LIKE', '%'.$search.'%')
                    ->orWhere('headline', 'LIKE', '%'.$search.'%')
                    ->orWhere('categoria', 'LIKE', '%'.$search.'%')
                    ->paginate(18);

        $head = $this->seo->render('Pesquisa de Im??veis',
            'Pesquisar Im??veis, encontre aqui o im??vel dos seus sonhos.',
            route('web.pesquisar-imoveis'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.imoveis.busca-referencia', [
            'tenant' => $this->tenant,
            'head' => $head,
            'search' => $search,
            'imoveis' => $imoveis
        ]);        
    }

    public function imoveisCategoria($categoria)
    {
        $imoveis = Imovel::orderBy('created_at', 'DESC')
                            ->where('tipo', $categoria)
                            ->where('tenant_id', $this->tenant->id)
                            ->available()
                            ->venda()
                            ->paginate(15);    
                            
        $head = $this->seo->render('Im??veis categoria ' . $categoria ?? 'Super Im??veis Sistema Imobili??rio',
            'Confira os im??veis da categoria '.$categoria.' temos ??timas oportunidades de neg??cio.',
            route('web.noticias'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.imoveis.categoria',[
            'tenant' => $this->tenant,
            'head' => $head,
            'imoveis' => $imoveis,
            'categoria' => $categoria
        ]);
    }

    public function filter()
    {
        $head = $this->seo->render('Pesquisa de im??veis - ' . $this->tenant->name ?? 'Super Im??veis Sistema Imobili??rio',
            $this->tenant->descricao ?? 'Inform??tica Livre desenvolvimento de sistemas web desde 2005',
            route('web.filter'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        $filter = $this->filter;
        $itemImoveis = $filter->createQuery('id');

        foreach ($itemImoveis as $imovel) {
            $imoveis[] = $imovel->id;
        }

        if (!empty($imoveis)) {
            $imoveis = Imovel::orderBy('created_at', 'DESC')
                                ->where('tenant_id', $this->tenant->id)
                                ->whereIn('id', $imoveis)
                                ->available()
                                ->paginate(18);
        } else {
            $imoveis = Imovel::orderBy('created_at', 'DESC')
                                ->where('tenant_id', $this->tenant->id)
                                ->available()
                                ->paginate(18);
        }

        return view('web.sites.'.$this->tenant->template.'.imoveis.filtro', [
            'tenant' => $this->tenant,
            'head' => $head,
            'imoveis' => $imoveis,
        ]);
    }

    public function categoria(Request $request)
    {
        $categoria = CatPost::where('slug', $request->slug)
                            ->where('tenant_id', $this->tenant->id)
                            ->available()
                            ->first();

        $posts = Post::orderBy('created_at', 'DESC')
                            ->where('tenant_id', $this->tenant->id)
                            ->where('categoria', $categoria->id)
                            ->postson()
                            ->paginate(18);
        
        $head = $this->seo->render($categoria->titulo ?? 'Super Im??veis Sistema Imobili??rio',
            $this->tenant->name . '-' . $categoria->content,
            route(($categoria->tipo == 'artigo' ? 'web.blog.categoria' : 'web.noticia.categoria'), ['slug' => $request->slug]),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.blog.categoria', [
            'tenant' => $this->tenant,
            'head' => $head,
            'posts' => $posts,
            'categoria' => $categoria,
        ]);
    }

    public function artigos()
    {
        $posts = Post::orderBy('created_at', 'DESC')
                        ->where('tipo', '=', 'artigo')
                        ->where('tenant_id', $this->tenant->id)
                        ->postson()
                        ->paginate(18);

        $type = 'artigo';

        $head = $this->seo->render('Blog - Artigos' ?? 'Super Im??veis Sistema Imobili??rio',
            'Confira nossos artigos sobre o mercado imobili??rio e atualidades',
            route('web.blog.artigos'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.blog.artigos', [
            'tenant' => $this->tenant,
            'type' => $type,
            'head' => $head,
            'posts' => $posts,
        ]);
    }

    public function noticias()
    {
        $posts = Post::orderBy('created_at', 'DESC')
                        ->where('tipo', '=', 'noticia')
                        ->where('tenant_id', $this->tenant->id)
                        ->postson()
                        ->paginate(18);

        $type = 'noticia';

        $head = $this->seo->render('Not??cias' ?? 'Super Im??veis Sistema Imobili??rio',
            'Confira as not??cias sobre o mercado imobili??rio e atualidades',
            route('web.noticias'),
            $this->tenant->getMetaImg() ?? 'https://superimoveis.info/media/metaimg.jpg'
        );

        return view('web.sites.'.$this->tenant->template.'.blog.artigos', [
            'tenant' => $this->tenant,
            'type' => $type,
            'head' => $head,
            'posts' => $posts,
        ]);
    }

    public function artigo(Request $request)
    {
        $post = Post::where('slug', $request->slug)
                            ->where('tipo', 'artigo')
                            ->where('tenant_id', $this->tenant->id)
                            ->postson()
                            ->first();

        $postsTags = Post::where('tipo', 'artigo')
                            ->where('id', '!=', $post->id)
                            ->where('tenant_id', $this->tenant->id)
                            ->postson()
                            ->limit(3)
                            ->get();

        $categorias = CatPost::orderBy('titulo', 'ASC')
                            ->where('tipo', 'artigo')
                            ->whereNotNull('id_pai')
                            ->where('tenant_id', $this->tenant->id)
                            ->get();

        $postsMais = Post::orderBy('views', 'DESC')
                            ->where('tenant_id', $this->tenant->id)
                            ->where('id', '!=', $post->id)
                            ->where('tipo', 'artigo')
                            ->limit(3)
                            ->postson()
                            ->get();
        
        $post->views = $post->views + 1;
        $post->save();

        $head = $this->seo->render($post->titulo ?? 'Super Im??veis Sistema Imobili??rio',
            'Blog - ' . $post->titulo,
            route('web.blog.artigo', ['slug' => $post->slug]),
            $post->cover() ?? $this->tenant->getMetaImg()
        );

        return view('web.sites.'.$this->tenant->template.'.blog.artigo', [
            'tenant' => $this->tenant,
            'head' => $head,
            'post' => $post,
            'postsMais' => $postsMais,
            'categorias' => $categorias,
            'postsTags' => $postsTags,
        ]);
    }

    public function noticia(Request $request)
    {
        $post = Post::where('slug', $request->slug)
                            ->where('tenant_id', $this->tenant->id)
                            ->where('tipo', 'noticia')
                            ->postson()
                            ->first();

        $postsTags = Post::where('tipo', 'noticia')
                            ->where('id', '!=', $post->id)
                            ->where('tenant_id', $this->tenant->id)
                            ->postson()
                            ->limit(3)
                            ->get();

        $categorias = CatPost::orderBy('titulo', 'ASC')
                            ->where('tipo', 'noticia')
                            ->where('tenant_id', $this->tenant->id)
                            ->get();

        $postsMais = Post::orderBy('views', 'DESC')
                            ->where('id', '!=', $post->id)
                            ->where('tenant_id', $this->tenant->id)
                            ->where('tipo', 'noticia')
                            ->limit(3)
                            ->postson()
                            ->get();
        
        $post->views = $post->views + 1;
        $post->save();

        $head = $this->seo->render($post->titulo ?? 'Super Im??veis Sistema Imobili??rio',
            'Not??cia - ' . $post->titulo,
            route('web.noticia', ['slug' => $post->slug]),
            $post->cover() ?? $this->tenant->getMetaImg()
        );

        return view('web.sites.'.$this->tenant->template.'.blog.artigo', [
            'tenant' => $this->tenant,
            'head' => $head,
            'post' => $post,
            'postsMais' => $postsMais,
            'categorias' => $categorias,
            'postsTags' => $postsTags,
        ]);
    }

    public function pagina(Request $request)
    {
        $post = Post::where('slug', $request->slug)
                            ->where('tipo', 'pagina')
                            ->postson()
                            ->first();

        $postsTags = Post::where('tipo', 'pagina')
                            ->where('id', '!=', $post->id)
                            ->postson()
                            ->limit(3)
                            ->get();        

        $postsMais = Post::orderBy('views', 'DESC')
                            ->where('id', '!=', $post->id)
                            ->where('tipo', 'pagina')
                            ->limit(3)
                            ->postson()
                            ->get();
        
        $post->views = $post->views + 1;
        $post->save();

        $parceiros = Parceiro::orderBy('created_at', 'DESC')->available()->get();

        $head = $this->seo->render($post->titulo ?? 'Super Im??veis Sistema Imobili??rio',
            'P??gina - ' . $post->titulo,
            route('web.pagina', ['slug' => $post->slug]),
            $post->cover() ?? $this->tenant->getMetaImg()
        );
        
        return view('web.sites.'.$this->tenant->template.'.pagina', [
            'tenant' => $this->tenant,
            'head' => $head,
            'post' => $post,
            'postsMais' => $postsMais,
            'postsTags' => $postsTags,
            'parceiros' => $parceiros
        ]);
    }

    public function parceiro($slug)
    {
        $parceiro = Parceiro::where('slug', $slug)->available()->first();
        $parceiro->views = $parceiro->views + 1;
        $parceiro->save();
        
        $head = $this->seo->render($parceiro->name . ' - ' . $this->tenant->name ?? 'Inform??tica Livre',
            $parceiro->name . ' - ' . $this->tenant->name,
            route('web.parceiro',['slug' => $parceiro->slug]),
            $parceiro->metaimg() ?? $this->tenant->getMetaImg()
        );

        return view('web.sites.'.$this->tenant->template.'.parceiro',[
            'tenant' => $this->tenant,
            'head' => $head,
            'parceiro' => $parceiro
        ]);
    }

    public function reservar(Request $request)
    {
        $dadosForm = $request->all();
        $imoveis = Imovel::where('tenant_id', $this->tenant->id)
                            ->available()
                            ->locacao()->get();

        $head = $this->seo->render('Pr??-reserva - ' . $this->tenant->name,
            'Pr??-reserva - ' . $this->tenant->name,
            route('web.reservar'),
            $this->tenant->getMetaImg() ?? 'https://informaticalivre.com/media/metaimg.jpg'
        );
        
        return view('web.sites.'.$this->tenant->template.'.imoveis.reservar',[
            'tenant' => $this->tenant,
            'dadosForm' => $dadosForm,
            'head' => $head,
            'imoveis' => $imoveis,
            'estados' => $this->estadoService->getEstados()
        ]);
    }

    public function fetchCity(Request $request)
    {
        $data['cidades'] = Cidades::where("estado_id",$request->estado_id)->get(["cidade_nome", "cidade_id"]);
        return response()->json($data);
    }
    
}
