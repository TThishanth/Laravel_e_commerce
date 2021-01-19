@extends('layouts.admin')

@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Sub Category Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Sub Category List
                    <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal"
                        data-target="#addNewSubCategory">Add New</a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">ID</th>
                                <th class="wd-15p">Sub Category name</th>
                                <th class="wd-15p">Category name</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcategories as $subcategory)
                                <tr>
                                    <td>{{ $subcategory->id }}</td>
                                    <td>{{ $subcategory->subcategory_name }}</td>
                                    <td>{{ $subcategory->category_name }}</td>
                                    <td>
                                        <div class="row">
                                            <div>
                                                <a href="{{ route('subcategory.edit', [$subcategory->id]) }}"
                                                    class="btn btn-sm btn-info">
                                                    Edit </a>
                                            </div>
                                            <div style="margin-left: 10px;">
                                                <form method="POST"
                                                    action="{{ route('subcategory.destroy', [$subcategory->id]) }}">
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


    <div id="addNewSubCategory" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Sub Category</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('subcategory.store') }}">
                    @csrf

                    <div class="modal-body pd-20">

                        <div class="mb-3">
                            <label for="inputSubCategory" class="form-label">Sub Category Name</label>
                            <input type="text" class="form-control {{ $errors->has('subcategory_name') ? 'error' : '' }}"
                                id="inputSubCategory" placeholder="Sub Category" name="subcategory_name">

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
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
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
                        <button type="submit" class="btn btn-info pd-x-20">Create</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- modal-dialog -->
    </div>
@endsection
