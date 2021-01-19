@extends('layouts.admin')

@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Subscriber Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Subscriber List

                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">ID</th>
                                <th class="wd-15p">Email</th>
                                <th class="wd-15p">Subscribed_at</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newslaters as $newslater)
                                <tr>
                                    <td>{{ $newslater->id }}</td>
                                    <td>{{ $newslater->email }}</td>
                                    <td>{{ \Carbon\Carbon::parse($newslater->created_at)->diffForhumans()  }}</td>
                                    <td>

                                        <form method="POST" action="{{ route('newslater.destroy', [$newslater->id]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <a href="#" onclick="event.preventDefault();" class="btn btn-sm btn-danger"
                                                id="delete">Delete</a>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- sl-pagebody -->
    </div>

@endsection
