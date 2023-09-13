@extends('admin.back')
@section('page_title', 'movie add')
@section('content')
<div class="">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{route('admin.home-categories.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <select style="width: 100%;" class="js-example-basic-multiple countries_select" name="countries[]" multiple="multiple">
                                 
                                </select>
                            </div>
                            <div class="form-group">
                                <select style="width: 100%;" class="js-example-basic-multiple countries_select" name="countries[]" multiple="multiple">
                                    @forEach($directors as $director)
                                    <option value="{{$director->id}}">{{$director->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select style="width: 100%;" class="js-example-basic-multiple countries_select" name="countries[]" multiple="multiple">
                                    @forEach($sks as $sk)
                                    <option value="{{$sk->id}}">{{$sk->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Kateqoriyanı əlavə et</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
