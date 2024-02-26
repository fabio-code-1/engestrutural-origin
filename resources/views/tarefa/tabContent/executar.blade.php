@if ($tarefas->where('status', 'executar')->isEmpty())
  <div class="alert alert-success text-center" role="alert">
    <p class="card-text fw-bold">Nenhuma tarefa para executar</p>
  </div>
@else
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
    @foreach ($tarefas as $tarefa)
      @if ($tarefa->status == 'executar')
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
                <div class="d-flex">
                  <button class="btn btn-dark fw-bolder me-2" aria-current="page" data-bs-toggle="modal"
                    data-bs-target="#tarefaedit" data-tarefa-id="{{ $tarefa->id }}"
                    data-tarefa-titulo="{{ $tarefa->titulo }}" data-tarefa-descricao="{{ $tarefa->descricao }}"
                    data-tarefa-prazo="{{ $tarefa->prazo }}" data-tarefa-prioridade="{{ $tarefa->prioridade }}"
                    data-tarefa-status="{{ $tarefa->status }}">
                    <i class="bi bi-pencil-square"></i>
                  </button>

                  <form method="POST" action="{{ route('tarefa.destroy', ['tarefa' => $tarefa->id]) }}"
                    id="deleteFormTarefa{{ $tarefa->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-dark delete-button-tarefa"><i
                        class="bi bi-trash3-fill"></i></button>
                  </form>
                </div>
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
              <p class="card-text mb-0"><span class="fw-bolder">Status: </span>
              <form id="updateFormTarefa" method="POST"
                action="{{ route('tarefa.updatestatus', ['tarefa' => $tarefa->id]) }}">
                @csrf
                @method('PUT')
                <select name="status" onchange="this.form.submit()">
                  <option value="executar" selected disabled>Executar</option>
                  <option value="executando">Executando</option>
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

@if (session('active_tab_tarefa') === 'executar')
  @include('tarefa.show')
  @if (auth()->user()->chefe)
    @include('tarefa.edit')
  @endif
@endif
