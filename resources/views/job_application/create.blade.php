<x-layout>
    <x-breadcrumbs class="mb-4"
        :links="[
            'Jobs' => route('jobs.index'), 
            $job->title => route('jobs.show', $job),
            'Apply' => '#'
        ]"/>
    
    <x-job-card :$job></x-job-card>

    <x-card>
        <h2 class="mb-4 text-lg font-medium">
            Ваша вакансия
        </h2>
        <form action="{{route('job.application.store', $job)}}" method="POST"
            enctype='multipart/form-data'>
            @csrf
            <div class="mb-4">
                <x-label for='expected_salary' :required='true'>Ожидаемая зарплата</x-label>
                <x-text-input type='number' name='expected_salary' />
            </div>

            <div class="mb-4">
                <x-label for='cv' :required='true'>Загрузить файл</x-label>
                <x-text-input type='file' name='cv'/>
            </div>

            <x-button class="w-full">Сохранить</x-button>
        </form>
    </x-card>
</x-layout>