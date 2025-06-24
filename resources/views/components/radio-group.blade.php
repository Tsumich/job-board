<div>
    <label for='{{$name}}' class="mb-1 flex items-center">
        <input type="radio" name="{{$name}}" value=""
            @checked(!request('{{$name}}'))/>
        <span class="ml-2">Любой</span>
    </label>

    @foreach ($optionsLabels as $label => $option)
        <label for='{{$name}}' class="mb-1 flex items-center">
            <input type="radio" name="{{$name}}" value="{{$option}}"
            @php
                error_log('dfgdfg');
                error_log( request($name));
            @endphp
                @checked($option == request($name))/>
            <span class="ml-2">{{$label}}</span>
        </label>       
    @endforeach

    
</div>