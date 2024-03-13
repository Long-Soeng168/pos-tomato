@extends('admin.layouts.admin')

@section('content')
<div class="p-4">
    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            Create Product
        </h3>
    </div>
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

        <div class="grid md:grid-cols-3 md:gap-6 mt-4">
            <!-- Name Address -->
            <div>
                <x-input-label for="price" :value="__('Price')" />
                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autofocus placeholder="Price" />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="size" :value="__('Size')" />
                <x-text-input id="size" class="block mt-1 w-full" type="text" name="size" :value="old('size')" required autofocus placeholder="Size" />
                <x-input-error :messages="$errors->get('size')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="discount" :value="__('Discount % ')" />
                <x-text-input id="discount" class="block mt-1 w-full" type="number" name="discount" :value="old('discount')" required autofocus placeholder="Discount" />
                <x-input-error :messages="$errors->get('discount')" class="mt-2" />
            </div>
        </div>

        <div class="grid md:grid-cols-2 md:gap-6 mt-4">
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="categories" :value="__('Categories')" />
                <x-select-option id="categories">
                    <option>United States</option>
                    <option>Canada</option>
                    <option>France</option>
                    <option>Germany</option>
                </x-select-option>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-input-label for="types" :value="__('Types')" />
                <x-select-option id="types">
                    <option>Khmer</option>
                    <option>Canada</option>
                    <option>France</option>
                    <option>Germany</option>
                </x-select-option>
            </div>
        </div>

        <div class="mb-5">
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

        <div class="mb-5">
            <x-input-label for="details" :value="__('Details')" />
            <textarea id="details" ></textarea>
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
