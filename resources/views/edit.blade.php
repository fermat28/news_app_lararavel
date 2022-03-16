<!DOCTYPE html>
<html lang="en">

<head>
  @include("gabarits.header")
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

      </section>
      <!-- /MAIN CONTENT -->
      <!--main content end-->
      <section id="main-content">
          <section class="wrapper">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Update Info') }}
      </h2>
      @if (session('status'))
          <div class="mb-4 font-medium text-sm text-green-600">
              {{ session('status') }}
          </div>
      @endif
    <form method="POST" action="{{route("news.edit",$newsId)}}"  enctype="multipart/form-data">
        @csrf()
        @method('PUT')
    <div class="container">
        {{-- {{$id}} --}}
        <label for="nom">
            {{ __('nom') }}
        </label>
        <input type="text" name="body" class="form-control md-6" value="{{$news->body}}"> <br>
        <label for="Description">
            {{ __('Description') }}
        </label>

        <input type="text" name="name" class="form-control md-6" value="{{$news->name}}"> <br>

        <label for="logo">
            {{ __('logo') }}
        </label>
        <input type="file" name="logo" class="form-control"> <br>
        <label for="active">
            {{ __('active') }}
        </label>

        <select name="categorie_id" class="form-control">
            @foreach ($category as $categories)
            <option value={{$categories->id}}>{{$categories->name}}</option>
            @endforeach
        </select>
        {{-- <label for="logo">
            {{ __('logo') }}
        </label>
        <input type="file" name="logo" class="form-control"> <br> --}}
        <label for="active">
            {{ __('active') }}
        </label>
        {{$news->active}}
        <select name="active" class="form-control">
            <option value="{{$news->active}}">@if ($news->active == 1)
                actif
            @else
                inactif
            @endif</option>
            <option value="1">actif</option>
            <option value="0">inactif</option>
        </select> <br>
    <button type="submit" class="btn btn-primary">Save changes</button>
    </div>

    </form>
    @include('gabarits.footer')
    <!--script for this page-->
  </body>
  </html>
