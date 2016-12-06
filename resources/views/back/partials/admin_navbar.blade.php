<nav class="navbar navbar-default" xmlns="http://www.w3.org/1999/html">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{--{!! link_to_route('product.index', 'Inicio', [], ['class' => 'navbar-brand']) !!}--}}
            {{--<a href="" class="navbar-brand">Home</a>--}}
            <a href="/admin" class="navbar-brand">Home</a>
{{--            {{ link_to_route('backhome', 'Home', null, ['class' => 'navbar-brand']) }}--}}
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Markets<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>{!! link_to_route('markets', 'Panel de Markets') !!}</li>
                        <li role="separator" class="divider"></li>
                        <li>{!! link_to_route('market.create', 'Crear Market') !!}</li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Productos<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>{!! link_to_route('product.index', 'Panel de Productos') !!}</li>
                        <li role="separator" class="divider"></li>
                        <li>{!! link_to_route('product.create', 'Crear Producto') !!}</li>
                    </ul>
                </li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        {{--<li><a href="#">Action</a></li>--}}
                        {{--<li><a href="#">Another action</a></li>--}}
                        {{--<li><a href="#">Something else here</a></li>--}}
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="{{route('logout')}}">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav> {{--fin de la navbar de bootstrap--}}
