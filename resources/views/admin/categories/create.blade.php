@extends('admin.layouts.admin')

@section('content')
<div class="p-4">
    <x-form-header :value="__('Create Category')" />
    <form class="w-full">
        <div class="grid md:grid-cols-2 md:gap-6">
            <!-- Name Address -->
            <div>
                <x-input-label for="name" :value="__('Name')" /><span class="text-red-500">*</span>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus placeholder="Item Name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="code" :value="__('Code or Barcode')" />
                <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus placeholder="Item Code" />
                <x-input-error :messages="$errors->get('code')" class="mt-2" />
            </div>
        </div>

        <div class="my-4 mb-6">
            <div class="flex items-center space-4">
                <div class="max-w-40">
                    <img id="selected-image" src="#" alt="Selected Image" class="hidden max-w-full max-h-40 pr-4" />
                </div>
                <div class="flex-1">
                    <x-input-label for="types" :value="__('Upload Image (max : 2MB)')" />
                    <x-file-input id="dropzone-file" name="image" accept="image/png, image/jpeg, image/gif" onchange="displaySelectedImage(event)" />
                </div>
            </div>
        </div>

        <div>
            <x-outline-button href="{{ URL::previous() }}">
                Go back
            </x-outline-button>
            <x-submit-button>
                Submit
            </x-submit-button>
        </div>
    </form>


</div>

<script>
    function displaySelectedImage(event) {
        const fileInput = event.target;
        const file = fileInput.files[0];
        const imgElement = document.getElementById('selected-image');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgElement.src = e.target.result;
                imgElement.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            imgElement.src = "#";
            imgElement.classList.add('hidden');
        }
    }

</script>
@endsection
