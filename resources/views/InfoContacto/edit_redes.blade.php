@extends('layoutGeneral')
@section('content')
    <head>
        {{--<script src="{{asset('\ckeditor\ckeditor.js')}}"></script>--}}
    </head>
    <div>
        <h2>{{$texto1->nombre}}</h2>
        <form action="/redesEdit" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <input type="hidden" name="id" value={{$texto1->id}}>
            <textarea style="width:80%; height: 15%" name="texto" id="text">{{$texto1->texto}}</textarea>
            <input type="submit" value="Aplicar">
        </form>
    </div>
    <div>
        <h2>{{$texto2->nombre}}</h2>
        <form action="/redesEdit" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <input type="hidden" name="id" value={{$texto2->id}}>
            <textarea style="width:80%; height: 15%" name="texto" id="text">{{$texto2->texto}}</textarea>
            <input type="submit" value="Aplicar">
        </form>
    </div>
    <div>
        <h2>{{$texto3->nombre}}</h2>
        <form action="/redesEdit" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <input type="hidden" name="id" value={{$texto3->id}}>
            <textarea style="width:80%; height: 15%" name="texto" id="text">{{$texto3->texto}}</textarea>
            <input type="submit" value="Aplicar">
        </form>
    </div>
    <div>
        <h2>{{$texto4->nombre}}</h2>
        <form action="/redesEdit" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <input type="hidden" name="id" value={{$texto4->id}}>
            <textarea style="width:80%; height: 15%" name="texto" id="text">{{$texto4->texto}}</textarea>
            <input type="submit" value="Aplicar">
        </form>
    </div>
    <div>
        <h2>{{$texto5->nombre}}</h2>
        <form action="/redesEdit" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <input type="hidden" name="id" value={{$texto5->id}}>
            <textarea style="width:80%; height: 15%" name="texto" id="text">{{$texto5->texto}}</textarea>
            <input type="submit" value="Aplicar">
        </form>
    </div>
    <div>
        <h2>{{$texto13->nombre}}</h2>
        <form action="/redesEdit" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <input type="hidden" name="id" value={{$texto13->id}}>
            <textarea style="width:80%; height: 15%" name="texto" id="text">{{$texto13->texto}}</textarea>
            <input type="submit" value="Aplicar">
        </form>
    </div>
    <div>
        <h2>{{$texto6->nombre}}</h2>
        <form action="/redesEdit" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <input type="hidden" name="id" value={{$texto6->id}}>
            <textarea style="width:80%; height: 15%" name="texto" id="text">{{$texto6->texto}}</textarea>
            <input type="submit" value="Aplicar">
        </form>
    </div>
    <div>
        <h2>{{$texto7->nombre}}</h2>
        <form action="/redesEdit" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <input type="hidden" name="id" value={{$texto7->id}}>
            <textarea style="width:80%; height: 15%" name="texto" id="text">{{$texto7->texto}}</textarea>
            <input type="submit" value="Aplicar">
        </form>
    </div>
    <div>
        <h2>{{$texto8->nombre}}</h2>
        <form action="/redesEdit" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <input type="hidden" name="id" value={{$texto8->id}}>
            <textarea style="width:80%; height: 15%" name="texto" id="text">{{$texto8->texto}}</textarea>
            <input type="submit" value="Aplicar">
        </form>
    </div>
    <div>
        <h2>{{$texto9->nombre}}</h2>
        <form action="/redesEdit" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <input type="hidden" name="id" value={{$texto9->id}}>
            <textarea style="width:80%; height: 15%" name="texto" id="text">{{$texto9->texto}}</textarea>
            <input type="submit" value="Aplicar">
        </form>
    </div>
    <div>
        <h2>{{$texto10->nombre}}</h2>
        <form action="/redesEdit" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <input type="hidden" name="id" value={{$texto10->id}}>
            <textarea style="width:80%; height: 15%" name="texto" id="text">{{$texto10->texto}}</textarea>
            <input type="submit" value="Aplicar">
        </form>
    </div>
    <div>
        <h2>{{$texto11->nombre}}</h2>
        <form action="/redesEdit" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <input type="hidden" name="id" value={{$texto11->id}}>
            <textarea style="width:80%; height: 15%" name="texto" id="text">{{$texto11->texto}}</textarea>
            <input type="submit" value="Aplicar">
        </form>
    </div>
    <div>
        <h2>{{$texto12->nombre}}</h2>
        <form action="/redesEdit" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <input type="hidden" name="id" value={{$texto12->id}}>
            <textarea style="width:80%; height: 15%" name="texto" id="text">{{$texto12->texto}}</textarea>
            <input type="submit" value="Aplicar">
        </form>
    </div>
    <div>
        <h2>{{$texto14->nombre}}</h2>
        <form action="/redesEdit" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <input type="hidden" name="id" value={{$texto14->id}}>
            <textarea style="width:80%; height: 15%" name="texto" id="text">{{$texto14->texto}}</textarea>
            <input type="submit" value="Aplicar">
        </form>
    </div>
    <div>
        <h2>{{$texto15->nombre}}</h2>
        <form action="/redesEdit" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <input type="hidden" name="id" value={{$texto15->id}}>
            <textarea style="width:80%; height: 15%" name="texto" id="text">{{$texto15->texto}}</textarea>
            <input type="submit" value="Aplicar">
        </form>
    </div>
    <script>

    </script>





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>

@endsection