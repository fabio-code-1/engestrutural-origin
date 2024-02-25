@if ($tarefas->where('status', 'executando')->isEmpty())
  <div class="alert alert-success text-center" role="alert">
    <p class="card-text fw-bold">Nenhuma tarefa executando</p>
  </div>
@else
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
    @foreach ($tarefas as $tarefa)
      @if ($tarefa->status == 'executando')
        <div class="col mb-4">
          <div class="card">
            @php
              $bgColor = match ($tarefa->prioridade) {
                  'baixa' => 'bg-info',
                  'media' => 'bg-warning',
                  'alta' => 'bg-danger',
                  default => '',
              };
            @endphp
            <div
              class="card-header text-uppercase fw-bolder {{ $bgColor }} d-flex justify-content-between align-items-center">
              <span>{{ $tarefa->titulo }}</span>
              @if (auth()->user()->chefe)
                <form method="POST" action="{{ route('tarefa.destroy', ['tarefa' => $tarefa->id]) }}"
                  id="deleteFormTarefa{{ $tarefa->id }}">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-dark delete-button-tarefa"><i
                      class="bi bi-trash3-fill"></i></button>
                </form>
              @endif
            </div>

            <div class="card-body text-uppercase text-center">
              @if (auth()->user()->chefe)
                <p class="card-text bg-secondary text-light fw-bolder">{{ $tarefa->funcionario->user->name }}</p>
              @endif
              <p class="card-text fw-bolder mb-0">descrição</p>
              <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#showModal"
                data-descricao="{{ $tarefa->descricao }}" data-titulo="{{ $tarefa->titulo }}">
                Visualizar
              </button>

              <p class="card-text"><span class="fw-bolder">Prazo:</span>
                {{ \Carbon\Carbon::parse($tarefa->prazo)->format('d/m/Y') }}
              </p>
              <p class="card-text"><span class="fw-bolder">Prioridade:</span> {{ $tarefa->prioridade }}</p>
              <p class="card-text"><span class="fw-bolder">Status: </span>
              <form id="updateFormTarefa" method="POST"
                action="{{ route('tarefa.updatestatus', ['tarefa' => $tarefa->id]) }}">
                @csrf
                @method('PUT')
                <select name="status" onchange="this.form.submit()">
                  <option value="executar">Executar</option>
                  <option value="executando" selected disabled>Executando</option>
                  <option value="pendente">Pendente</option>
                  <option value="finalizado">Finalizado</option>
                  <option value="correcao">Correção</option>
                </select>
              </form>

              </p>
            </div>
          </div>
        </div>
      @endif
    @endforeach
  </div>
@endif

@if (session('active_tab_tarefa') === 'executando')
  @include('tarefa.show')
@endif
