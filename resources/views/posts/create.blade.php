@extends('layouts.app')

@section('content')
 <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">

     @csrf

    <div class="form-group">
        <label>Titulo</label>
        <input type="text" name="title" class="form-control" @error('title') is-invalid @enderror" value="{{old('title')}}">

        @error('title')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}">
            @error('description')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
    </div>

    <div class="form-group">
        <label>Conteúdo</label>
        <textarea name="content" id="" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror">{{old('content')}}</textarea>
        @error('content')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" class="form-control" value="{{old('slug')}}">
    </div>


    <!-- Campo Tipo File -->

    <div class="form-group">
        <label>Foto de Capa</label>
        <input type="file" name="thumb" class="form-control @error('thumb') is-invalid @enderror">
        @error('thumb')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
    </div>

    <!-- Campo Tipo File -->

    <div class="form-group">
        <label>Categorias</label>
        <div class="form-group">
            @foreach($categories as $c)
                <div class="col-2 custom-control custom-checkbox">
                    <input type="checkbox" id="checkbox{{$c->id}}" class="custom-control-input @error('categories') is-invalid @enderror" name="categories[]" value="{{$c->id}}">
                    <label class="custom-control-label" for="checkbox{{$c->id}}">
                        {{$c->name}}
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-lg btn-success">Criar Postagem</button>
    </div>
</form>
 @endsection
