@extends('layouts.admin')

@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Blog Category Update</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Blog  Category Update
                </h6>

                <div class="table-wrapper">
                    <form method="post" action="{{ route('post_category.update', [$blogCategory->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="modal-body pd-20">

                            <div class="mb-3">
                                <label for="inputCategoryEn" class="form-label">Category Name En</label>
                                <input type="text" class="form-control {{ $errors->has('category_name_en') ? 'error' : '' }}"
                                    id="inputCategoryEn" value="{{ $blogCategory->category_name_en }}"
                                    name="category_name_en">

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
                                    id="inputCategoryIn" value="{{ $blogCategory->category_name_in }}"
                                    name="category_name_in">

                                <!-- Error -->
                                @if ($errors->has('category_name_in'))
                                    <div class="error" style="color: red;">
                                        {{ $errors->first('category_name_in') }}
                                    </div>
                                @endif
                            </div>

                        </div><!-- modal-body -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Update</button>
                        </div>
                    </form>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- sl-pagebody -->
    </div>

@endsection
