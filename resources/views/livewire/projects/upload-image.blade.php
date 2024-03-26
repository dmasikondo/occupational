<div>
  <x-modal wire:model="show">
        <!-- content -->

        {{-- <x-slot name="title">
          Add Image
        </x-slot> --}}
        <div class="mt-2">
            <div class="my-8">
                <x-forms.error-message>
                    <x-slot name="title">
                        Whoooooops!
                    </x-slot>
                    <x-slot name="body">
                Something is not right
                    </x-slot>
                    <x-slot name="footer">
                        check the file that you uploaded
                    </x-slot>
                </x-forms.error-message>
            </div>

            <div class="my-6">
                <x-forms.success-message/>
            </div>
            <form wire:submit="uploadFile">
                <div
                    x-data="{ uploading: false, progress: 0 }"
                    x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false"
                    x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                    <div class="my-6">
                        <x-forms.label for="title">Your Image Title</x-forms.label>
                        <x-forms.input type="text"  id="title" placeholder="Picture Title" wire:model.live='title' />
                        @error('title')
                        <p class="text-xs italic text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="my-6">
                        <x-forms.file ayd='dropzone' model='project_image'/>


                        @error('project_image')
                        <p class="text-xs italic text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                                <div class="flex items-center h-5">
                                    <x-forms.checkbox id="is_profile" aria-describedby="completed" wire:model='is_profile' :checked="$is_profile"/>
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="is_profile" class="text-gray-500 dark:text-gray-300">Is a Profile Picture?</label>
                                </div>
                        </div>
                    </div>
                    <div class="block w-full my-6">
                        @if ($project_image)
                            <img src="{{ $project_image->temporaryUrl() }}" class="size-24">
                        @endif
                    </div>
                    <!-- Progress Bar -->
                    <div x-show="uploading" class="block w-full" style="display: none">
                        <progress max="100" x-bind:value="progress"></progress>
                        <span>Image Uploading...</span>
                    </div>
                    <div class="">
                        <x-forms.submit-button type="submit">Upload File</x-forms.submit-button>
                    </div>
                </div>
            </form>
        </div>
    </x-modal>
</div>
