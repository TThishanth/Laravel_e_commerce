@extends('layouts.admin')

@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Category Update</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Category Update
                </h6>

                <div class="table-wrapper">
                    <form method="post" action="{{ route('category.update', [$category->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="modal-body pd-20">

                            <div class="mb-3">
                                <label for="inputCategory" class="form-label">Category Name</label>
                                <input type="text" class="form-control {{ $errors->has('category_name') ? 'error' : '' }}"
                                    id="inputCategory" placeholder="Category" value="{{ $category->category_name }}"
                                    name="category_name">

                                <!-- Error -->
                                @if ($errors->has('category_name'))
                                    <div class="error" style="color: red;">
                                        {{ $errors->first('category_name') }}
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
