<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    Add Home
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('home_store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">Price
                                :</label>
                            <input id="Name" type="text" name="Price" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">Size
                                :</label>
                            <input type="text" class="form-control" name="Size">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">City
                                :</label>
                            <input id="Name" type="text" name="City" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">Bedrooms_count
                                :</label>
                            <input type="text" class="form-control" name="Bedrooms_count">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">Bathrooms_Count
                                :</label>
                            <input id="Name" type="text" name="Bathrooms_Count" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">Sales_agent_name
                                :</label>
                            <input type="text" class="form-control" name="Sales_agent_name">
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="">Image:</label>
                            <div class="mb-2">
                                <img src="#" height="200" alt="">
                            </div>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <!-- gallery -->
                        <div class="form-group mb-3">
                            <label for="">Gallery:</label>
                            <div class="row">
                              {{--  @foreach ($product->images as $image)
                                <div class="col-md-2">
                                    <img src="{{ $image->image_url }}" height="80" class="d-block img-fit m-1 border p-1">
                                    <button class="btn btn-sm btn-danger" onclick="deleteImage('{{ $image->id }}')">Delete</button>
                                </div>
                                @endforeach --}}
                            </div>
                            <input type="file" name="gallery[]" multiple class="form-control">
                            
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description
                            :</label>
                        <textarea class="form-control" name="Description" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">submit</button>
            </div>
            </form>

        </div>
    </div>
</div>