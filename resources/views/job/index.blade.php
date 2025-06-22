<x-layout>
     <x-breadcrumbs  class="mb-4"
        :links="['Jobs' => route('jobs.index')]"/>
    {{-- Фильтр заимствующий компонент с карточкой для работы --}}
    <x-card class="mb-4 text-sm">
        <form action="{{route('jobs.index')}}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Поиск</div>
                    {{-- : используется перед параметром если мы хотим передать функцию --}}
                    <x-text-input name='search' value='' placeholder='по названию'></x-text-input>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Зарплата</div>
                    <div class="flex space-x-2">
                        <x-text-input name='min_salary' value='' placeholder='От'></x-text-input>
                        <x-text-input name='max_salary' value='' placeholder='До'></x-text-input>
                    </div>
                </div>
            </div>
            {{-- в query подставятся значение из инпутов--}}
            <button class="w-full">Показать</button>
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
