@extends('layoutGeneral')
@section('content')
    <head>
        {{--<script src="{{asset('\ckeditor\ckeditor.js')}}"></script>--}}
    </head>
    <form action="/redesEdit" method="POST">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div>
            <h2>{{$texto1->nombre}}</h2>
            <input type="hidden" name="id" value={{$texto1->id}}>
            <textarea style="width:80%; height: 15%" name="texto[]" id="text">{{$texto1->texto}}</textarea>
            <h2>{{$texto2->nombre}}</h2>
            <textarea style="width:80%; height: 15%" name="texto[]" id="text">{{$texto2->texto}}</textarea>
            <h2>{{$texto3->nombre}}</h2>
            <textarea style="width:80%; height: 15%" name="texto[]" id="text">{{$texto3->texto}}</textarea>
            <h2>{{$texto4->nombre}}</h2>
            <textarea style="width:80%; height: 15%" name="texto[]" id="text">{{$texto4->texto}}</textarea>
            <h2>{{$texto5->nombre}}</h2>
            <textarea style="width:80%; height: 15%" name="texto[]" id="text">{{$texto5->texto}}</textarea>
            <h2>{{$texto6->nombre}}</h2>
            <textarea style="width:80%; height: 15%" name="texto[]" id="text">{{$texto6->texto}}</textarea>
            <h2>{{$texto7->nombre}}</h2>
            <textarea style="width:80%; height: 15%" name="texto[]" id="text">{{$texto7->texto}}</textarea>
            <h2>{{$texto8->nombre}}</h2>
            <textarea style="width:80%; height: 15%" name="texto[]" id="text">{{$texto8->texto}}</textarea>
            <h2>{{$texto9->nombre}}</h2>
            <textarea style="width:80%; height: 15%" name="texto[]" id="text">{{$texto9->texto}}</textarea>
            <h2>{{$texto10->nombre}}</h2>
            <textarea style="width:80%; height: 15%" name="texto[]" id="text">{{$texto10->texto}}</textarea>
            <h2>{{$texto11->nombre}}</h2>
            <textarea style="width:80%; height: 15%" name="texto[]" id="text">{{$texto11->texto}}</textarea>
            <h2>{{$texto12->nombre}}</h2>
            <textarea style="width:80%; height: 15%" name="texto[]" id="text">{{$texto12->texto}}</textarea>
            <h2>{{$texto13->nombre}}</h2>
            <textarea style="width:80%; height: 15%" name="texto[]" id="text">{{$texto13->texto}}</textarea>
            <h2>{{$texto14->nombre}}</h2>
            <textarea style="width:80%; height: 15%" name="texto[]" id="text">{{$texto14->texto}}</textarea>
            <h2>{{$texto15->nombre}}</h2>
            <textarea style="width:80%; height: 15%" name="texto[]" id="text">{{$texto15->texto}}</textarea>
            <br>
            <div align="center">
                <input class="btn btn-primary" style="margin-top: 3%;margin-bottom: 3%;" type="submit" value="Aplicar">
            </div>
        </div>
    </form>
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