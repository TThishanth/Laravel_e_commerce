@extends('layouts.admin')


@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">eCommerce</a>
            <span class="breadcrumb-item active">Blog Section</span>
        </nav>

        <div class="sl-pagebody">

            <form method="post" action="{{ route('post_category.poststore') }}" enctype="multipart/form-data">
                @csrf

                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Add New Post</h6>
                    <p class="mg-b-20 mg-sm-b-30">New Post Add Form</p>

                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label"> Post Title (ENGLISH): <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="post_title_en"
                                        placeholder="Enter Post Title English">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Post Title (HINDI): <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="post_title_in"
                                        placeholder="Enter Post Title Hindi">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Blog Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose Category"
                                        name="category_id">
                                        <option label="Choose Category"></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Post Details (ENGLISH): <span
                                            class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote" name="details_en"></textarea>
                                </div>
                            </div><!-- col-12 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Post Details (Hindi): <span
                                            class="tx-danger">*</span></label>
                                    <textarea class="form-control" id="summernote1" name="details_in"></textarea>
                                </div>
                            </div><!-- col-12 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Post Image: <span
                                            class="tx-danger">*</span></label><br>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input" name="post_image"
                                            onchange="readURL1(this);" required>
                                        <span class="custom-file-control"></span>
                                    </label>
                                </div>
                                <img src="#" id="one" alt="">
                            </div><!-- col-4 -->
                        </div><!-- row -->

                        <hr>
                        <br><br>

                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5" type="submit">Submit Form</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </div><!-- card -->
            </form>

        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

    <script type="text/javascript">
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>


    


@endsection
