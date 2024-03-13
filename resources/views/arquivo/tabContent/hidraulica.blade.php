@if ($arquivos->where('categoria', 'hidraulica')->isEmpty())
  <div class="alert alert-success text-center" role="alert">
    <p class="card-text fw-bold">Nenhum arquivo de hidraulica.</p>
  </div>
@else
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
    @foreach ($arquivos as $arquivo)
      @if ($arquivo->categoria == 'hidraulica')
        <div class="col mb-4">
          <div class="card">
            <div class="card-header text-uppercase fw-bolder d-flex justify-content-between align-items-center">
              <span>{{ $arquivo->user->name }}</span>
              <div class="d-flex">
                <a class="btn btn-dark me-2" href="{{ asset('storage/' . $arquivo->files) }}"
                  download="{{ $arquivo->nome . '.' . pathinfo($arquivo->files, PATHINFO_EXTENSION) }}">
                  <i class="bi bi-download"></i>
                </a>
                @if (auth()->user()->chefe || auth()->user()->id == $arquivo->id_user)
                  <form id="deleteForm" action="{{ route('arquivo.destroy', $arquivo) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"
                      onclick="return confirm('Tem certeza que deseja deletar este arquivo?');"><i
                        class="bi bi-file-earmark-x-fill"></i></button>
                  </form>
                @endif
              </div>
            </div>
            <div class="card-body text-uppercase text-center">
              <p class="card-text bg-secondary text-light fw-bolder">{{ $arquivo->nome }}</p>
              <p class="card-text fw-bolder mb-0">POSTADO</p>
              <p class="card-text">{{ $arquivo->created_at->format('d/m/Y H:i:s') }}</p>
              <p class="card-text fw-bolder mb-0">descrição</p>
              <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                data-bs-target="#showModalArquivo" data-descricao="{{ $arquivo->descricao }}"
                data-titulo="{{ $arquivo->nome }}">
                Visualizar
              </button>
            </div>
          </div>
        </div>
      @endif
    @endforeach
  </div>
@endif
@foreach ($arquivos as $arquivo)
  @if ($arquivo->categoria == 'hidraulica')
    @include('arquivo.show')
  @endif
@endforeach
