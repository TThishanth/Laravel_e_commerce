@extends('layouts.admin')

@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Blog Category Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Blog Category List
                    <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal"
                        data-target="#addNewCategory">Add New</a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">ID</th>
                                <th class="wd-15p">Category Name En</th>
                                <th class="wd-15p">Category Name In</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogCategories as $blogCategory)
                                <tr>
                                    <td>{{ $blogCategory->id }}</td>
                                    <td>{{ $blogCategory->category_name_en }}</td>
                                    <td>{{ $blogCategory->category_name_in }}</td>
                                    <td>
                                        <div class="row">
                                            <div>
                                                <a href="{{ route('post_category.edit', [$blogCategory->id]) }}"
                                                    class="btn btn-sm btn-info">
                                                    Edit </a>
                                            </div>
                                            <div style="margin-left: 10px;">
                                                <form method="POST"
                                                    action="{{ route('post_category.destroy', [$blogCategory->id]) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <a href="#" onclick="event.preventDefault();"
                                                        class="btn btn-sm btn-danger" id="delete">Delete</a>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- sl-pagebody -->
    </div>


    <div id="addNewCategory" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Category</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('post_category.store') }}">
                    @csrf

                    <div class="modal-body pd-20">

                        <div class="mb-3">
                            <label for="inputCategoryEn" class="form-label">Category Name En</label>
                            <input type="text" class="form-control {{ $errors->has('category_name_en') ? 'error' : '' }}"
                                id="inputCategoryEn" placeholder="Category Name In English" name="category_name_en">

                            <!-- Error -->
                            @if ($errors->has('category_name_en'))
                                <div class="error" style="color: red;">
                                    {{ $errors->first('category_name_en') }}
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="inputCategoryIn" class="form-label">Category Name In</label>
                            <input type="text" class="form-control {{ $errors->has('category_name_in') ? 'error' : '' }}"
                                id="inputCategoryIn" placeholder="Category Name In Hindi" name="category_name_in">

                            <!-- Error -->
                            @if ($errors->has('category_name_in'))
                                <div class="error" style="color: red;">
                                    {{ $errors->first('category_name_in') }}
                                </div>
                            @endif
                        </div>

                    </div><!-- modal-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Create</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- modal-dialog -->
    </div>
@endsection
