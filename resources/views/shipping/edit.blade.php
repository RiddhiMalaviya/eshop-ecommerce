@extends('layouts.base')

@section('content')

    <div class="card">
        <h5 class="card-header">@lang('partials.edit')</h5>
        <div class="card-body">
            <form method="post" action="{{route('shipping.update',$shipping->id)}}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">@lang('partials.type') <span
                                class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="type" placeholder="Enter type" value="{{$shipping->type}}"
                           class="form-control">

                </div>
                <div class="form-group">
                    <label for="price" class="col-form-label">@lang('partials.price') <span class="text-danger">*</span></label>
                    <input id="price" type="number" name="price" placeholder="Enter price" value="{{$shipping->price}}"
                           class="form-control">

                </div>
                <div class="form-group">
                    <label for="status" class="col-form-label">@lang('partials.status') <span
                                class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                        <option value="active" {{(($shipping->status=='active') ? 'selected' : '')}}>@lang('partials.active')
                        </option>
                        <option value="inactive" {{(($shipping->status=='inactive') ? 'selected' : '')}}>@lang('partials.inactive')
                        </option>
                    </select>

                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-success" type="submit">@lang('partials.update')</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
    <script>
        $('#lfm').filemanager('image');

        $(document).ready(function () {
            $('#description').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 150
            });
        });
    </script>
@endpush