@extends('layoutGeneral')
@section('content')
    <div class="container m-2">
        <div class="row">
            <div class="col-12 text-center mt-4 mb-4">
                <h1>Noticias y Artículos</h1>
            </div>
            @component('components.paged_index', ['noticias' => $noticias, 'imagenes_noticia' => $imagenes_noticia])
            @endcomponent
            <div class="col-12 text-center">
                {{ $noticias->links()}}
            </div>
        </div>
    </div>

    <style>
        .carousel-inner img {
            object-fit: contain !important;
        }
        .pagination {
             display: flex;
             justify-content: center;
         }

        .pagination li {
            display: block;
        }
        #item-container .container {
            background-color: ghostwhite;
            border: 0.25rem solid #972329;
        }
        #item-container .container:hover {
            background-color: ghostwhite;
            border: 0.25rem solid #2980b9;
        }

    </style>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/js/web.js" type="text/javascript" charset="utf-8" async defer></script>

@endsection
