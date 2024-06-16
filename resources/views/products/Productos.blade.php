@extends('layaout.master')
@section('content')
<!-- CRUD de Productos -->
<button type="button" class="btn btn-dark mb-2" data-bs-toggle="modal" data-bs-target="#createProductoModal">
    Nuevo Producto
</button>
<table class="table table-stripped table-responsive">
    <thead>
        <th>#</th>
        <th>NOMBRE</th>
        <th>CANTIDAD</th>
        <th>CATEGORIA</th>
        <th>ACCIONES</th>
    </thead>
    <tbody>
        @foreach($productos as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->nombre}}</td>
            <td>{{$row->cantidad}}</td>
            <td>{{$row->id_categoria}}</td>
            <td>
                <a href="{{ url('/productos') }}/{{$row->id}}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
                <form action="{{url('/productos',[$row])}}" method="post" style="display: inline-block;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger mx-2 delete-btn"><i class="fa-solid fa-trash-can"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Enlaces de paginación -->
{{ $productos->links() }}

<!-- Paginación -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
        {{-- Botón Anterior --}}
        @if ($productos->onFirstPage())
        <li class="page-item disabled">
            <span class="page-link page-link-black">Anterior</span>
        </li>
        @else
        <li class="page-item">
            <a class="page-link page-link-black" href="{{ $productos->previousPageUrl() }}" tabindex="-1">Anterior</a>
        </li>
        @endif

        {{-- Números de Página --}}
        @if ($productos->lastPage() > 1)
        @for ($i = max(1, $productos->currentPage() - 1); $i <= min($productos->lastPage(), $productos->currentPage() + 1); $i++)
            <li class="page-item {{ $i == $productos->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $productos->appends(['search' => $search])->url($i) }}">{{ $i }}</a>
            </li>
            @endfor
            @endif

            {{-- Botón Siguiente --}}
            @if ($productos->hasMorePages())
            <li class="page-item">
                <a class="page-link page-link-black" href="{{ $productos->nextPageUrl() }}" tabindex="-1">Siguiente</a>
            </li>
            @else
            <li class="page-item disabled">
                <span class="page-link page-link-black">Siguiente</span>
            </li>
            @endif
    </ul>
</nav>
<!-- End Paginación -->

<!-- Modal de Productos -->
<div class="modal fade" id="createProductoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Productos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createProductoForm" action="{{url('/productos')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                        <span class="error-msg">Campo requerido</span>
                        <input type="text" class="form-control" placeholder="Cantidad" name="cantidad">
                        <span class="error-msg">Campo requerido</span>
                        <select name="id_categoria" id="" class="form-control">
                            @foreach($categoria as $row)
                            <option value="{{$row->id}}"> {{ $row->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Find del modal -->
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#createProductoModal').on('hiden.bs.modal', function() {
            $('#createProductoForm')[0].reset();
        });
    });
</script>
@endpush