<x-layout>
    <x-breadcrumbs :links="['My jobs' => route('my-jobs.index'), 'Create' => '#']" class="mb-4"/>
    <x-card class="mb-4">
        <form action="{{route('my-jobs.store')}}" method="POST">
            @csrf
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for='title' :required='true'>Название работы</x-label>
                    <x-text-input name='title'/>
                </div>

                <div>
                    <x-label for='location' :required='true'>Местоположение</x-label>
                    <x-text-input name='location'/>
                </div>

                <div class="col-span-2">
                    <x-label for='salary' :required='true'>Зарплата</x-label>
                    <x-text-input name='salary'/>
                </div>

                <div class="col-span-2">
                    <x-label for='description' :required='true'>Описание</x-label>
                    <x-text-input name='description' type='textarea'/>
                </div>

                <div>
                    <x-label for='expirience' :required='true'>Опыт</x-label>
                    <x-radio-group name='expirience' :value="old('expirience')"
                    :checked="false"
                    :options="array_combine(array_map('ucfirst',  \App\Models\Work::$expirience), \App\Models\Work::$expirience)"/>
                </div>

                <div>
                    <x-label for='experience' :required='true' :value="old('category')">Категория</x-label>
                    <x-radio-group name='category' 
                        :checked="false"
                        :options="array_combine(array_map('ucfirst',  \App\Models\Work::$category), \App\Models\Work::$category)"/>
                </div>
                
                <div class="col-span-2">
                    <x-button class="w-full">Create</x-button>
                </div> 
            </div> 
        </form>
    </x-card>
</x-layout>