<div>
    @if ($checked)
      <label for='{{$name}}' class="mb-1 flex items-center">
        <input type="radio" name="{{$name}}" value=""
            @checked(!request('{{$name}}'))/>
        <span class="ml-2">Любой</span>
       </label>  
    @endif
    

    @foreach ($optionsLabels as $label => $option)
        <label for='{{$name}}' class="mb-1 flex items-center">
            <input type="radio" name="{{$name}}" value="{{$option}}"
                @checked($option == ($value ?? request($name)))/>
            <span class="ml-2">{{$label}}</span>
        </label>       
    @endforeach

    @error($name)
    <div class="mt-1 text-sm text-red-500">
        {{ $message }}
    </div>
    @enderror
</div>