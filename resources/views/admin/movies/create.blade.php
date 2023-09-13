@extends('admin.back')
@section('page_title', 'movie add')
@section('content')
<div class="">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{route('admin.movies.store')}}">
                        @csrf
                        <div class="card-body">
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Film adı {{$lang}} dilində</label>
                                <input name="name[{{ $lang }}]" value="{{ old('name.' . $lang) }}" type="text" class="form-control" placeholder="Filmin adını daxil edin">
                            </div>
                            @endforeach
                            @error("name.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Film slug {{$lang}} dilində</label>
                                <input name="slug[{{ $lang }}]" value="{{ old('slug.' . $lang) }}" type="text" class="form-control" placeholder="Filmin adını daxil edin">
                            </div>
                            @endforeach
                            @error("slug.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputFile">Movie Poster</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="poster" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            @error("poster")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputFile">Movie Banner</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="banner" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            @error("banner")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Movie length (min):</label>
                                <input name="length" value="{{ old('length') }}" type="text" class="form-control" placeholder="Filmin uzunluğunu daxil edin">
                            </div>
                            @error("length")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Movie Link:</label>
                                <input name="link" value="{{ old('link') }}" type="text" class="form-control" placeholder="Filmin uzunluğunu daxil edin">
                            </div>
                            @error("link")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Movie Youtube Trailer Link:</label>
                                <input name="ytrailer" value="{{ old('ytrailer') }}" type="text" class="form-control" placeholder="Filmin uzunluğunu daxil edin">
                            </div>
                            @error("ytrailer")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Movie quality:</label>
                                <select name="quality" id="" class="form-control">
                                    <option value="HD">HD</option>
                                </select>
                            </div>
                            @error("quality")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Movie category:</label>
                                <select name="movie__categories" id="" class="form-control category-movie">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error("movie__categories")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Movie home category:</label>
                                <select name="home__categories" id="" class="form-control">
                                    @foreach($homeCategories as $homeCategory)
                                    <option value="{{$homeCategory->id}}">{{$homeCategory->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error("home__categories")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror



                            <div class="form-group">
                                <label for="exampleInputPassword1">Movie countries:</label>
                                <select style="width: 100%;" class="js-example-basic-multiple" name="countries[]" multiple="multiple" data-url="{{ route('admin.get-more-options') }}">
                                </select>
                            </div>
                            @error("countries")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Movie directors:</label>
                                <select style="width: 100%;" class="js-example-basic-multiple" name="directors[]" multiple="multiple" data-url="{{ route('admin.get-more-directors') }}">
                                </select>
                            </div>
                            @error("directors")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Movie scriptwriters:</label>
                                <select style="width: 100%;" class="js-example-basic-multiple" name="scriptwriters[]" multiple="multiple" data-url="{{ route('admin.get-more-scriptwriters') }}">
                                </select>
                            </div>
                            @error("scriptwriters")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Movie actors:</label>
                                <select style="width: 100%;" class="js-example-basic-multiple" name="actors[]" multiple="multiple" data-url="{{ route('admin.get-more-actors') }}">
                                </select>
                            </div>
                            @error("actors")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Movie Release date::</label>
                                <textarea name="release" style="height: 500px;" id="editor"></textarea>
                            </div>
                            @error("release")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-check">
                                <input name='status' type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">film statusu</label>
                            </div>
                            @error('status')
                            <div class="alert alert-danger mt-2" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Film əlavə et</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection