@extends('layouts.layout')

@section('title','Home')

@section('css')
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
@endsection

@section('content')
  <section class="container-fluid bg-section">
        <!-- Categorías -->
        <div class="row justify-content-center">
            <div class="col-10 col-md-12">
                <nav class="text-center my-5">
                    <a href="{{route('home')}}" class="mx-3 pb-3 link-category d-block d-md-inline {{ isset($categorySelected)?'':'selected-category' }}" >Todas</a>
                    @foreach ($categories as $category)
                        <a href="{{route('post.category',$category->name)}}" class="mx-3 pb-3 link-category d-block d-md-inline {{ (isset($categorySelected) && $categorySelected==$category->id)?'selected-category':''}}" >{{$category->name}}</a>
                    @endforeach
                </nav>
            </div>
        </div>

        <!-- Posts -->
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row">
                    <!-- Posts -->
                    @if ($posts->count()==0)
                        <h3 class="text-center">Aún no existen posts de esta categoría!</h3>
                        <img class="img-fluid m-auto" src="{{asset('images\nodata.png')}}" alt="" srcset="" style="width: 30rem;">
                    @endif
                    @foreach ($posts as $post)
                    <div class="col-md-4 col-12 justify-content-center mb-5 ">
                            <div class="card m-auto anim" style="width: 18rem;">
                                <img class="card-img-top" src="{{asset($post->featured)}}" alt="{{$post->name}}">
                                <div class="card-body">
                                    <small class="card-txt-category">Categoria <b>{{$post->category->name}}</b></small>
                                    <h5 class="card-title my-2">{{$post->title}}</h5>
                                    <div class="d-card-text">
                                    {{$post->content}}
                                    </div>
                                    <a href="{{route('posts.article',$post->id)}}" class="post-link"><b>Leer más</b></a>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <span class="card-txt-author">{{$post->author}}</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="card-txt-date">{{$post->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Posts -->
                </div>
            </div>
            
            <div class="col-12">
                <!-- Paginador -->
                
            </div>
        </div>
    </section>
    @endsection