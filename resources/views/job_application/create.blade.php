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
        <form action="{{route('job.application.store', $job)}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for='expected_salary'
                class="mb-2 block text-sm font-medium text-slate-900">Ожидаемая зарплата</label>
                <x-text-input type='number' name='expected_salary' />
            </div>
            <x-button class="w-full">Сохранить</x-button>
        </form>
    </x-card>
</x-layout>