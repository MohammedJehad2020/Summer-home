

<x-dashboard-layout title="Add homes">


@if (session()->has('success'))
    <div class="alert alert-success">
        <?= session()->get('success') ?>
    </div>
@endif 

<form action="{{ route('admin.homes.store') }}" method="post" enctype="multipart/form-data">
    @csrf   
   {{-- @include('admin.homes._form', [
           'button_lable' => 'Add',
        ])--}}

</form>
</x-dashboard-layout>