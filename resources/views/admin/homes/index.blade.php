<x-master >

@push('css')

@endpush

<!-- page-header -->
<x-page-header pageHeader="empty" />
<!-- page-header -->


<!-- page-content -->
<x-page-content>
    <!-- <p><strong>Page content goes here!</strong><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></p> -->

    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
            Add Home
        </button>
        <br><br>

        @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">

                     

                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered p-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Price </th>
                                        <th>Size </th>
                                        <th>City </th>
                                        <th>description </th>
                                        <th>operation</th>

                                    </tr>
                                </thead>
                                <tbody>
                                   foreach ($homes as home) 
                                    <tr>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>

                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $home->id }}" title="Edit"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#" title="Delete"><i class="fa fa-trash"></i></button>
                                        
                                        </td>
                                    </tr>

                                    <x-edit-home :home="$home"/>
                                   @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>


          <!-- add_modal_Grade -->
          <x-add-home />

        </div>

</x-page-content>
<!-- page-content -->


@push('js')

@endpush
</x-master>