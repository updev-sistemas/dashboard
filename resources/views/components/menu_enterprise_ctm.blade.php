<ul>
    <li class="navigation-divider d-flex align-items-center">
        <img src="{{ url('assets/media/image/user/timer.png') }}">
        <i  id="ultimoUpdate1" title="Ultima atualizacao em {{ $demonstrative->updated_at->format('d/m/Y H:i') }}" class="mr-2">{{ $demonstrative->updated_at->format('d/m/Y H:i') }}</i>
    </li>
    <li><a href="{{ route('env_ctm') }}">Filiais</a></li>
    <li><a @if(!request()->segment(4) || request()->segment(4) == 'visao_geral') class="active" @endif href="{{ route('view_enterprise', ['id' => $enterprise->id]) }}">Visao Geral</a></li>
    <li><a @if(!request()->segment(4) || request()->segment(4) == 'contas_a_pagar') class="active" @endif  href="{{ route('view_enterprise_cpv', ['id' => $enterprise->id]) }}">Contas á pagar</a></li>
    <li><a @if(!request()->segment(4) || request()->segment(4) == 'contas_a_receber') class="active" @endif  href="{{ route('view_enterprise_arv', ['id' => $enterprise->id]) }}">Contas á receber</a></li>
    <li><a @if(!request()->segment(4) || request()->segment(4) == 'caixas_abertos') class="active" @endif  href="{{ route('view_enterprise_cxa', ['id' => $enterprise->id]) }}">Caixas Abertos</a></li>
    <li><a @if(!request()->segment(4) || request()->segment(4) == 'minhas_vendas') class="active" @endif href="{{ route('view_enterprise_vds', ['id' => $enterprise->id]) }}">Minhas vendas</a></li>
    <li><a @if(!request()->segment(4) || request()->segment(4) == 'vendedores') class="active" @endif href="{{ route('view_enterprise_vdd', ['id' => $enterprise->id]) }}">Vendedores</a></li>


    <li><a  style="display: none;" class="active"  href="#"></a></li>

    <li class="navigation-divider"></li>
    <li>
        <a  class="d-flex align-items-start">
            <div>
                <figure  class="avatar mr-3">
                    <img src="{{ url('assets/media/image/user/cliente.png') }}">
                </figure>
            </div>
            <div>
                <h6>Clientes</h6>
                <h4 id="numeroClientes" class="mb-0 font-weight-bold">{{ $payload->cadastros->clientes ?? 0 }}</h4>
            </div>
        </a>
    </li>
    <li>
        <a  class="d-flex align-items-start">
            <div>
                <figure  class="avatar mr-3">
                    <img src="{{ url('assets/media/image/user/produtos.png') }}">
                </figure>
            </div>
            <div>
                <h6>Produtos</h6>
                <h4 id="numeroProdutos" class="mb-0">{{ $payload->cadastros->produtos ?? 0 }}</h4>
            </div>
        </a>
    </li>
    <li>
        <a  class="d-flex align-items-start">
            <div>
                <figure  class="avatar mr-3">
                    <img src="{{ url('assets/media/image/user/fornecedor.png') }}">
                </figure>
            </div>
            <div>
                <h6>Fornecedores</h6>
                <h4 id="numeroFornecedores" class="mb-0">{{ $payload->cadastros->fornecedores ?? 0 }}</h4>
            </div>
        </a>
    </li>
    <li>
        <a  class="d-flex align-items-start">
            <div>
                <figure  class="avatar mr-3">
                    <img src="{{ url('assets/media/image/user/usuarios.png') }}">
                </figure>
            </div>
            <div>
                <h6>Usuários</h6>
                <h4 id="numeroUsuarios" class="mb-0">{{ $payload->cadastros->usuarios ?? 0 }}</h4>
            </div>
        </a>
    </li>

</ul>
