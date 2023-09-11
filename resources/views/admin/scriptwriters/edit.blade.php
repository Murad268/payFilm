@extends('admin.back')
@section('page_title', 'category edit')
@section('content')
<div class="">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{route('admin.scriptwriters.update', $scriptwriter->id)}}">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ssenaristin adı {{$lang}} dilində</label>
                                <input name="name[{{ $lang }}]" value="{{ old('name.' . $lang, $scriptwriter->getTranslation('name', $lang)) }}" type="text" class="form-control" placeholder="Kategoriyanı adını daxil edin">
                            </div>
                            @endforeach

                            @error("name.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @foreach(LaravelLocalization::getSupportedLanguagesKeys() as $lang)
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ssenarist slug {{$lang}} dilində</label>
                                <input name='slug[{{$lang}}]' value="{{ old('slug.' . $lang, $scriptwriter->getTranslation('slug', $lang)) }}" type="text" class="form-control" placeholder="Kategoriyanı adını daxil edin">
                            </div>
                            @error("slug.$lang")
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            @endforeach
                            <div class="form-check">
                                <input name='status' type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">ssenarist statusu</label>
                            </div>
                            @error('status')
                            <div class="alert alert-danger mt-2" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Ssenaristi yenilə</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
