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
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus placeholder="Item Name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus placeholder="Item Name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus placeholder="Item Name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
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
                    <x-input-label for="types" :value="__('Upload File')" />
                    <input class="w-full bg-gray-50 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="dropzone-file" type="file" onchange="displaySelectedImage(event)" accept="image/png, image/jpeg, image/gif" name="image" />
                </div>
            </div>
        </div>

        <div class="mb-5">
            <label for="details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Details</label>
            <textarea id="details" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
        </div>

        <div>
            <a href="./items.html" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                Go back
            </a>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
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
