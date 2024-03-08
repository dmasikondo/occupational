<div>
  <!-- session message -->
  @if(session()->has('message'))
    <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 "  x-data="{ show: true }" x-show="show" x-init="setTimeout(()=>show=false, 10000)">
            <div slot="avatar" class="mr-2">
                <x-icon name="check-circle" class="h-4 w-4 space-x-2 mr-2"/>
            </div>
            <div class="text-sm font-normal  max-w-full flex-initial">
                {{session('message')}}
            </div>
            <div class="flex flex-auto flex-row-reverse">
                <div @click="show = false">
                    <x-icon name="x" class="h-4 w-4 cursor-pointer"/>
                </div>
            </div>
        </div>
      @endif
  <!-- end of session message --> 
</div>