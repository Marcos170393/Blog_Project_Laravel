<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>HomePage Posts</title>
</head>
<body>
        
        <nav class="navbar navbar-light bg-main">
        <div class="container p-4">
            <a class="navbar-brand m-auto" href="#">
                <img src="{{asset('images/logo.png')}}" width="120" alt="" loading="lazy">
            </a>
            <a href="{{route('admin.categories')}}"class="navbar-brand m-right">Admin</a>

        </div>
    </nav>
  <section class="container-fluid content">
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
                    @foreach ($posts as $post)
                    <div class="col-md-4 col-12 justify-content-center mb-5">
                            <div class="card m-auto" style="width: 18rem;">
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

    <!-- Footer -->
    <footer class="container-fluid bg-main">
        <div class="row text-center p-4">
            <div class="mb-3">
                <img src="{{asset('images/logo.png')}}" alt="YouDevs logo" width="120" id="logofooter">
            </div>
            <div id="col-md-10">
                <a href="https://www.facebook.com/youdevs">
                    <img src="{{asset('images/facebook.png')}}" class="img-fluid" width="40px" alt="facebook youdevs">
                </a>
                <a href="https://www.instagram.com/youdevs">
                    <img src="{{asset('images/instagram.png')}}" class="img-fluid" width="40px" alt="instagram youdevs">
                </a>
                <a href="https://www.youtube.com/c/YouDevsOficial">
                    <img src="{{asset('images/youtube.png')}}" class="img-fluid" width="40px" alt="youtube youdevs">
                </a>
                <p class="mt-3">Copyright © 2020 YouDevs, Blog. <br> Todos los derechos reservados.</p>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>