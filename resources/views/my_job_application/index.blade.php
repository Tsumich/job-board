<x-layout>
    <x-breadcrumbs class="mb-4"
        :links="[
            'my works' => '#'
        ]"/>
    @forelse($applications as $application)
        <x-job-card :job='$application->work'>
            <div class="flex items-center justify-between text-xs text-slate-500">
                <div>
                    <div>
                        Назначена {{ $application->created_at->diffForHumans()}}
                    </div>
                    <div>
                        Other {{ Str::plural('applicant', $application->work->job_application_count - 1)}}
                        {{$application->work->job_application_count - 1}}
                    </div>
                    <div>
                        Вы ожидаете ЗП ${{ number_format($application->expected_salary)}}
                    </div>
                    <div>
                        Средняя запрашиваемая ЗП ${{ number_format($application->work->job_application_avg_expected_salary)}}
                    </div>
                </div> 
                <div>
                    <form action='{{ route('my-job-applications.destroy', $application)}}' method="POST">
                        @csrf
                        @method("DELETE")
                        <x-button>Удалить</x-button>
                    </form>
                </div> 
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                нет вакансий
            </div>
            <div class="text-center">
                <a class="text-indigo-500 hover:underline"
                href="{{route('jobs.index')}}">here</a>
            </div>
        </div>
    @endforelse

</x-layout>