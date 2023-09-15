@extends('admin.back')
@section('page_title', 'movies')
@section('content')
<style>
    .content-wrapper {
        width: max-content;
    }
</style>
<div class="">
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{route('admin.movies.create')}}" class="btn btn-primary">yeni film əlavə et</a>
                            </h3>
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Movie Name</th>
                                        <th>Movie Slug</th>
                                        <th>Movie Poster</th>
                                        <th>Movie Banner</th>
                                        <th>Movie Length</th>
                                        <th>Movie Link</th>
                                        <th>Movie Youtube Trailer</th>
                                        <th>Movie Quality</th>
                                        <th>Movie Actors</th>
                                        <th>Movie Scriptwriters</th>
                                        <th>Movie Directors</th>
                                        <th>Movie Countries</th>
                                        <th>Movie Category</th>
                                        <th>Movie Home Category</th>
                                        <th>Movie Release Date</th>
                                        <th>Movie Description</th>
                                        <th>Movie Status</th>
                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($movies as $movie)
                                    <tr>
                                        <td>{{$movie->id}}</td>
                                        <td>{{ $movie->getTranslation('name', app()->getLocale()) }}</td>
                                        <td>{{ $movie->getTranslation('slug', app()->getLocale()) }}</td>
                                        <td> <a target="_blank" href="{{asset('assets/front/images/'.$movie->poster)}}"><img style="width: 60px; height: 80px" src="{{asset('assets/front/images/'.$movie->poster)}}" alt=""></a>
                                        </td>
                                        <td> <a target="_blank" href="{{asset('assets/front/images/'.$movie->banner)}}"><img style="width: 90px; height: 50px" src="{{asset('assets/front/images/'.$movie->banner)}}" alt=""></a>
                                        </td>
                                        <td>{{ $movie->length}}</td>
                                        <td>{{ $movie->link }}</td>
                                        <td>{{$movie->ytrailer}}</td>
                                        <td>{{$movie->quality}}</td>
                                        <td>{{ $movie->getTranslation('actors', app()->getLocale()) }}</td>
                                        <td>{{ $movie->getTranslation('scriptwriters', app()->getLocale()) }}</td>
                                        <td>{{ $movie->getTranslation('directors', app()->getLocale()) }}</td>
                                        <td>{{ $movie->getTranslation('countries', app()->getLocale()) }}</td>


                                        <td>{{ $movie->movie_categories->name }}</td>
                                        <td>{{ $movie->movie_home_categories->cat_name }}</td>

                                        <td>{{$movie->release}}</td>
                                        <td>{!! $movie->getTranslation('desc', app()->getLocale()) !!}</td>

                                        <td>{{$movie->status}}</td>
                                        <td>
                                            <a href="{{route('admin.movies.edit', $movie->id)}}" class="btn btn-warning text-light">Rejissoru dəyiş</a>
                                            <form onsubmit="return deleteConfirmation(event)" class="mt-2" method="post" action="{{route('admin.movies.destroy', $movie->id)}}">
                                                @csrf
                                                @method("delete")
                                                <input class="btn btn-danger" value="delete" type="submit">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
