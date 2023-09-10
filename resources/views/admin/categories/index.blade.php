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
                                        <th>id</th>
                                        <th>Category Name</th>
                                        <th>Category Slug</th>
                                        <th>Category Status</th>
                                        <th>Controlls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->getTranslation('name', app()->getLocale()) }}</td>
                                        <td>{{ $category->getTranslation('slug', app()->getLocale()) }}</td>
                                        <td>{{ $category->status }}</td>
                                        <td>
                                            <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-warning text-light">Kategoriyanı dəyiş</a>
                                            <form onsubmit="return deleteConfirmation(event)" class="mt-2" method="post" action="{{route('admin.categories.destroy', $category->id)}}">
                                                @csrf
                                                @method("delete")
                                                <input class="btn btn-danger" value="delete" type="submit">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div style="margin: 0 auto; width: max-content" class="pagination mt-2">
                                {{ $categories->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
