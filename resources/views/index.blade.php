<!DOCTYPE html>
<html lang="en">

<head>
    @include('gabarits.header')

    <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
    <section id="container">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        @include('gabarits.sidebar')
        <!--sidebar end-->
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Gestion des Infos </h3>
                        <h3><i class="fa fa-angle-right"></i> Activer ou desactiver la baniere <a class="btn btn-success btn-sm"
                            href="{{route("news.activerbaniere")}}"> <i
                                class="fa fa-edit"></i></a> <a class="btn btn-danger btn-sm"
                                href="{{route("news.desactivban")}}"> <i
                                    class="fa fa-trash"></i></a> </h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="content-panel">
                                    <table class="table table-striped table-advance table-hover">
                                        <h4><i class="fa fa-angle-right"></i> Liste des Infos
                                            <hr>
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nom</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">logo</th>
                                                    <th scope="col">actif</th>
                                                    <th scope="col">catégorie</th>
                                                    <th scope="col">créé le</th>
                                                    <th scope="col">action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($new as $news)
                                                    <tr>
                                                        <th>{{ $news->name }}</th>
                                                        <th>{{ $news->body }}</th>
                                                        <td><img src="{{ asset("$news->logo") }}" alt="img"
                                                                style="height: 50px;width:50px;"></td>

                                                        <td>
                                                            @if ($news->active == 1)
                                                                oui
                                                            @else
                                                                non
                                                            @endif
                                                        </td>
                                                        <td>{{ $news->categorie_id }}</td>
                                                        <td>{{ $news->created_at }}
                                                            {{-- <td><img src="{{ asset($specialites->logo) }}" alt="img"  style="height: 50px;width:50px;"></td> --}}
                                                        <td>
                                                            <a class="btn btn-success btn-sm"
                                                                href="{{ route('news.updatescreen', $news->id) }}"> <i
                                                                    class="fa fa-edit"></i></a>
                                                                    <a class="btn btn-danger btn-sm"
                                                                    href="{{ route("news.delete", $news->id) }}"> <i
                                                                        class="fa fa-trash"></i></a>
                                                            {{-- <button type="button" class="btn btn-danger btn-sm"
                                                                data-nom="{{ $news->name }}"
                                                                data-id="{{ $news->id }}" data-toggle="modal"
                                                                data-target="#exampleModal1" onclick="DeleteData()"> <i
                                                                    class="fa fa-trash"></i></button> --}}

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                    </table>
                                </div>
                                <!-- /content-panel -->
                            </div>


                            {{-- Modal Create --}}
                            <div class="col-md-5">

                                <form method="POST" action="{{ route('news.create') }}" enctype="multipart/form-data">
                                    @csrf()
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Créer Info</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="name">
                                                {{ __('nom') }}
                                            </label>
                                            <input type="text" name="body" class="form-control md-6"> <br>
                                            <label for="body">
                                                {{ __('Description') }}
                                            </label>
                                            <input type="text" name="name" class="form-control md-6"> <br>

                                            <label for="logo">
                                                {{ __('logo') }}
                                            </label>
                                            <input type="file" name="logo" class="form-control"> <br>
                                            <label for="categorie">
                                                {{ __('Categorie') }}
                                            </label>

                                            <select name="categorie_id" class="form-control">
                                                @foreach ($category as $categories)
                                                    <option value={{ $categories->id }}>{{ $categories->name }}
                                                    </option>
                                                @endforeach
                                            </select>



                                            <label for="active">
                                                {{ __('active') }}
                                            </label>
                                            <select name="active" class="form-control">
                                                <option value="1">actif</option>
                                                <option value="0">inactif</option>
                                            </select>
                                            <br>
                                        </div><br>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        {{-- </div> --}}
                                    </div>
                                </form>

                            </div>
                        </div>


                        {{-- Modal delete data --}}


                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">

                                <form method="POST" action="{{ route('news.delete', Crypt::encrypt(123)) }}">
                                    @csrf()
                                    @method('DELETE')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Examen</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Voulez vous vraiment supprimer L'examen?
                                            <input type="hidden" name="id" class="form-control" id="id"> <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">non</button>
                                            <button type="submit" class="btn btn-primary">Oui</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="py-12">
                            <script>
                                function DeleteData() {
                                    $('#exampleModal1').on('show.bs.modal', function(event) {
                                        var button = $(event.relatedTarget);
                                        var nom = button.data('nom');
                                        var id = button.data('id');

                                        var modal = $(this);
                                        modal.find('.modal-body #nom').val(nom);
                                        modal.find('.modal-body #id').val(id);
                                    })
                                };
                            </script>
                            <section class="newsletter">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="content">
                                                <h2>Change Banner color</h2>
                                                <form method="POST" action="{{ route('news.updatebanner') }}">
                                                    {{ csrf_field() }}
                                                    <div class="input-group">

                                                        <input type="color" value="{{$banner->couleur}}" name="couleur" class="form-control"
                                                            placeholder="Choose your color">
                                                        <span class="input-group-btn">
                                                            <button class="btn" type="submit">Change</button>
                                                        </span>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <br>

                            <section class="newsletter">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="content">
                                                <h2>Change Banner Text color</h2>
                                                <form method="POST" action="{{ route('news.updatebannertext') }}">
                                                    {{ csrf_field() }}
                                                    <div class="input-group">

                                                        <input type="color" value="{{$banner->couleur_texte}}" name="couleur_texte" class="form-control"
                                                            placeholder="Choose your color">
                                                        <span class="input-group-btn">
                                                            <button class="btn" type="submit">Change</button>
                                                        </span>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <br>
</body>

</html>
