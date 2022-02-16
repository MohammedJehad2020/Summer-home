<x-dashboard-layout title="Import Products">


    @if (session()->has('success'))
    <div class="alert alert-success">
        <?= session()->get('success') ?>
    </div>
    @endif

    <form action="{{ route('admin.products.import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="form-group mb-3">
                <label for="">Excel File:</label>
                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                @error('file')
                <p class="invalid-feedback d-block">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form-group mb-3">
    <button class="btn btn-primary" type="submit">Import</button>
</div>

    </form>
</x-dashboard-layout>