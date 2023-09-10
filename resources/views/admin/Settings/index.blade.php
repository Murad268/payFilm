@extends('admin.back')
@section('page_title', 'categories')
@section('content')

<div class="">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{route('admin.categories.create')}}" class="btn btn-primary">yeni kategoriya əlavə et</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Icon</th>
                                        <th>Logo</th>
                                        <th>title</th>
                                        <th>phone</th>
                                        <th>desc</th>
                                        <th>copywrite</th>
                                        <th>facebook</th>
                                        <th>instagram</th>
                                        <th>linkedin</th>
                                        <th>twitter</th>
                                        <th>keywords</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($settings as $setting)
                                    <tr>
                                        <td>
                                            <img src="" alt="">
                                        </td>
                                        <td>
                                            <img src="" alt="">
                                        </td>
                                        <td>{{$setting->title}}</td>
                                        <td>{{$setting->phone}}</td>
                                        <td>{{$setting->desc}}</td>
                                        <td>{{$setting->copywrite}}</td>
                                        <td>{{$setting->facebook}}</td>
                                        <td>{{$setting->instagram}}</td>
                                        <td>{{$setting->linkedin}}</td>
                                        <td>{{$setting->twitter}}</td>
                                        <td>{{$setting->keywords}}</td>
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
