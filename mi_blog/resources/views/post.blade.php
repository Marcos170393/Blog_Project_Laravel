@extends('layouts.layout')

@section('title','Post')

@section('content')
<!-- Contenido -->
<section class="container-fluid content py-5">
        <div class="row justify-content-center">
            <!-- Post -->
            <div class="col-12 col-md-7 text-center">
                <h1>{{$post->title}}</h1>
                <hr>
                <img src="{{asset($post->featured)}}" alt="{{$post->name}}" class="img-fluid">

                <p class="text-left mt-3 post-txt">
                    <span class="text-info">Autor:</span> <i>{{$post->author}}</i>
                    <span class="float-right text-info">Publicado:</span> <i>{{$post->created_at->diffForHumans()}}</i>
                </p>
                <p class="text-left" style="text-align: justify" >
                   {{$post->content}}
                </p>
                <p class="text-left post-txt"><i>Categoría: {{$post->category->name}}</i></p>
            </div>

            <!-- Entradas recientes -->
            <div class="col-md-3 offset-md-1">
                <p>Últimas entradas</p>
                @foreach ($latestPost as $latestp)
                    
                <div class="row mb-4">
                    <div class="col-4 p-0">
                        <a href="{{route('posts.article',$latestp->id)}}">
                            <img src="{{asset($latestp->featured)}}" class="img-fluid rounded" width="100" alt="{{$latestp->title}}">
                        </a>
                    </div>
                    <div class="col-7 pl-0">
                        <a href="{{route('posts.article',$latestp->id)}}" class="link-post">{{$latestp->title}}</a>
                    </div>
                </div>
                
                @endforeach
            </div>
            
        </div>
    </section>

    <!-- Posts relacionados -->
    <section class="container-fluid content py-5">
        <div class="row justify-content-center">
            <!-- Post -->
            <div class="col-12 text-center">
                <h2>Entradas relacionadas</h2>
                <hr class="post-hr">
            </div>
            <!-- Related Post -->
            @foreach ($relatedPost as $postRelated)
                
                <div class="col-md-4 col-12 justify-content-center mb-5">
                    <div class="card m-auto" style="width: 18rem;">
                        <img class="card-img-top" src="{{asset($postRelated->featured)}}" alt="{{$postRelated->title}}">
                        <div class="card-body">
                            <small class="card-txt-category">{{$postRelated->category->name}}</small>
                            <h5 class="card-title my-2">{{$postRelated->title}}</h5>
                            <div class="d-card-text">
                                {{$postRelated->content}}
                            </div>
                            <a href="{{asset('posts.article',$postRelated->id)}}" class="post-link"><b>Leer más</b></a>
                            <hr>
                            <div class="row">
                                <div class="col-6 text-left">
                                    <span class="card-txt-author">{{$postRelated->author}}</span>
                                </div>
                                <div class="col-6 text-right">
                                    <span class="card-txt-date">{{$postRelated->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach 
           
        </div>
    </section>
    
    @endsection