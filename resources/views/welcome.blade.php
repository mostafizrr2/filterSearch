<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-6 text-center">
                     <h3 class="alert alert-danger">Filter Search</h3>

                     <form action="/search" method="get">
                       <div class="row">
                           <div class="col-12">
                               <div class="form-group">
                                   <input class="form-control" type="text" name="cat" value="{{ request()->cat }}" placeholder="Category">
                               </div>
                           </div>
                           <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="tag" value="{{ request()->tag }}" placeholder="Tag">
                                </div>
                           </div>
                           <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="post" value="{{ request()->post }}" placeholder="Post">
                                </div>
                           </div>

                           <div class="col-12">
                               <input type="submit" class="btn btn-success btn-block" value="Search post">
                           </div>
                       </div>
                    </form>
                    <hr>

                </div>
                <div class="col-6 text-center">
                    <h3 class="alert alert-success">All posts</h3> 

                    {{-- All posts --}}

                    @foreach ($posts as $item)
                        <div class="card">
                            <div class="card-header">
                                {{ $item->title }}
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                <p>{{ $item->body }}</p>
                                <footer class="blockquote-footer text-left">
                                    <p>Tag: {{ $item->tag->tag_name }}</p>
                                    <hr>
                                    Categories:
                                    @foreach ($item->categories as $item)
                                        <p>{{ $item->cat_name }}</p>
                                    @endforeach
                                </footer>
                                </blockquote>
                            </div>
                        </div><br>
                    @endforeach
                    {{-- All posts --}}

                </div>
            </div>
        </div>
    </body>
</html>
