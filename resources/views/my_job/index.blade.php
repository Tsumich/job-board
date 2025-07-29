<x-layout>
    <x-card>
        <x-breadcrumbs :links="['My jobs' => route('my-jobs.index'), 'Create' => '#']" class="mb-4"/>
    
        <div class="mb-8 text-right">
            <x-link-button href="{{route('my-jobs.create')}}">Добавить вакансию</x-link-button>
        </div> 

        @forelse($works as $work)
            <x-job-card :job=$work>
                <div class="text-xs text-slate-500">
                    @forelse($work->jobApplication as $application)
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                <div>{{$application->user->name}}</div>
                                <div>
                                    <div>{{$application->created_at->diffForHumans()}}</div>
                                </div>
                                <div>
                                    dowload cv
                                </div>
                            </div>

                            <div>
                                ${{number_format($application->expected_salary)}}
                            </div>
                        </div>
                    @empty
                       <div class="mb-4">no job application</div>
                    @endforelse

                    <div class="flex space-x-2">
                        <x-link-button href="{{route('my-jobs.edit', $work)}}">Edit</x-link-button>
                    </div>
                </div>
            </x-job-card>
        @empty
            <div class="rounded-mb border border-dashed border-slate-300 p-8">
                <div class="text-center font-medium">
                    no jobs yet
                </div>
                <div class="text-center">
                    post your job <a href="#">here</a>
                </div>
            </div>
        @endforelse
    </x-card>
</x-layout>
