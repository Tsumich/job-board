<x-layout>
    <x-breadcrumbs :links="['My jobs' => route('my-jobs.index'), 'Edit' => '#']" class="mb-4"/>
    <x-card class="mb-4">
        <form action="{{route('my-jobs.update', $work)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for='title' :required='true'>Название работы</x-label>
                    <x-text-input name='title' :value="$work->title"/>
                </div>

                <div>
                    <x-label for='location' :required='true'>Местоположение</x-label>
                    <x-text-input name='location' :value="$work->location"/>
                </div>

                <div class="col-span-2">
                    <x-label for='salary' :required='true'>Зарплата</x-label>
                    <x-text-input name='salary' :value="$work->salary"/>
                </div>

                <div class="col-span-2">
                    <x-label for='description' :required='true'>Описание</x-label>
                    <x-text-input name='description' type='textarea' :value="$work->description"/>
                </div>

                <div>
                    <x-label for='expirience' :required='true'>Опыт</x-label>
                    <x-radio-group name='expirience' :value="$work->expirience"
                    :checked="false"
                    :options="array_combine(array_map('ucfirst',  \App\Models\Work::$expirience), \App\Models\Work::$expirience)"/>
                </div>

                <div>
                    <x-label for='category' :required='true' :value="$work->category">Категория</x-label>
                    <x-radio-group name='category' 
                        :checked="false"
                        :options="array_combine(array_map('ucfirst',  \App\Models\Work::$category), \App\Models\Work::$category)"/>
                </div>
                
                <div class="col-span-2">
                    <x-button class="w-full">Edit Job</x-button>
                </div> 
            </div> 
        </form>
    </x-card>
</x-layout>