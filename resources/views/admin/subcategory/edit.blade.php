@extends('layouts.admin')

@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Sub Category Update</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Sub Category Update
                </h6>

                <div class="table-wrapper">
                    <form method="post" action="{{ route('subcategory.update', [$subcategory->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="modal-body pd-20">

                            <div class="mb-3">
                                <label for="inputSubCategory" class="form-label">Sub Category Name</label>
                                <input type="text" class="form-control {{ $errors->has('subcategory_name') ? 'error' : '' }}"
                                    id="inputSubCategory" value="{{ $subcategory->subcategory_name }}" placeholder="Sub Category" name="subcategory_name">
    
                                <!-- Error -->
                                @if ($errors->has('subcategory_name'))
                                    <div class="error" style="color: red;">
                                        {{ $errors->first('subcategory_name') }}
                                    </div>
                                @endif
                            </div>
    
                            <div class="mb-3">
                                <label for="inputCategory" class="form-label">Category Name</label>
                                <select class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            <?php if ($category->id == $subcategory->category_id) {
                                                echo "selected";
                                            }
                                            ?>
                                            >{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
    
                                <!-- Error -->
                                @if ($errors->has('category_id'))
                                    <div class="error" style="color: red;">
                                        {{ $errors->first('category_id') }}
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
