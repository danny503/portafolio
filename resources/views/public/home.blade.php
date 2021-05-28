@extends('layouts.plantilla')
@section('content')

    <section id="top" class="one dark cover">
        <div class="container">

            <header>
                <h2 class="alt">Hola! Soy <strong>Daniel Ayala</strong>, soy Desarrollador web Laravel<br />
                donde he desarrollado preyectos interesantes</a>.</h2>
                <p>Ligula scelerisque justo sem accumsan diam quis<br />
                vitae natoque dictum sollicitudin elementum.</p>
            </header>

            <footer>
                <a href="pdf/CVDaniel.pdf" target="_blank"  class="button scrolly">Daniel Ayala</a>
            </footer>
        </div>
    </section>

    <!-- Portfolio -->
    <section id="portfolio" class="two">
        <div class="container">

            <header>
                <h2>Portfolio</h2>
            </header>

            <p>Estos son los preoyectos desarrollados, puedes ver código en github si gustas, la mayoría de proyectos estan realizados con laravel a que es el framework que más domino.</p>

            <div class="row">
               @foreach ($projects as $p)
                <div class="col-4 col-12-mobile">
                        <article class="item">
                            <a href="{{$p->link}}" target="_blank" class="image fit"><img src="/storage/{{$p->image}}" alt="{{$p->title}}" /></a>
                            <header>
                                <h3>{{$p->title}}</h3>
                                <p>{{$p->description}}</p>
                                <a href="{{$p->link}}" class="link" target="_blank">Ver Repositorio</a>
                            </header>
                        </article>
                    </div>
               @endforeach
            </div>

        </div>
    </section>

    <!-- About Me -->
    <section id="about" class="three">
        <div class="container">

            <header>
                <h2>Acerca de mi</h2>
            </header>

            <a href="#" class="image featured"><img src="images/pic08.jpg" alt="" /></a>

            <p>Tincidunt eu elit diam magnis pretium accumsan etiam id urna. Ridiculus
            ultricies curae quis et rhoncus velit. Lobortis elementum aliquet nec vitae
            laoreet eget cubilia quam non etiam odio tincidunt montes. Elementum sem
            parturient nulla quam placerat viverra mauris non cum elit tempus ullamcorper
            dolor. Libero rutrum ut lacinia donec curae mus vel quisque sociis nec
            ornare iaculis.</p>

        </div>
    </section>

@endsection
