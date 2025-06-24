<x-layout>
     <x-breadcrumbs  class="mb-4"
        :links="['Jobs' => route('jobs.index')]"/>
    {{-- Фильтр заимствующий компонент с карточкой для работы --}}
    <x-card class="mb-4 text-sm">
        <form id="filteringForm" action="{{route('jobs.index')}}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Поиск</div>
                    {{-- : используется перед параметром если мы хотим передать функцию --}}
                    <x-text-input name='search' value="{{request('search')}}" form-id='filteringForm' placeholder='по названию'></x-text-input>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Зарплата</div>
                    <div class="flex space-x-2">
                        {{-- value хранит значение с пред request --}}
                        <x-text-input name='min_salary' value="{{request('min_salary')}}"  form-id='filteringForm' placeholder='От'></x-text-input>
                        <x-text-input name='max_salary' value="{{request('max_salary')}}"  form-id='filteringForm' placeholder='До'></x-text-input>
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Опыт</div>
                    <x-radio-group name='expirience'
                        :options='array_combine(array_map("ucfirst",  \App\Models\Work::$expirience), \App\Models\Work::$expirience)'/>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Тэги</div>
                    <x-radio-group name='category' 
                        :options='array_combine(array_map("ucfirst",  \App\Models\Work::$category), \App\Models\Work::$category)'/>
                </div>
            </div>
            {{-- в query подставятся значение из инпутов--}}
            <x-button class="w-full">Показать</x-button>
        </form>
    </x-card>

    {{-- Цикл с работами --}}
    @foreach($jobs as $job)
        <x-job-card class="mb-4" :job='$job'>
            <div>
                <x-link-button :href="route('jobs.show', $job)">
                    Подробнее
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
