<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">
        Войдите в аккаунт
    </h1>

    <x-card class="py-8 px-16">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            <div class="mb-8">
                <x-label for='email' :required='true'>Почта</x-label>
                <x-text-input name='email'/>
            </div>
            <div class="mb-8">
                <x-label for='password' :required='true'>Пароль</x-label>
                <x-text-input name='password' type='password' />
            </div>

            <div class="mb-8 flex justify-between text-sm font-medium">
                <div> 
                    <div class="flex items-center space-x-2">
                        <input type='checkbox' name='remember' class="rounded-sm border-slate-400">
                        <x-label for='remember' :required='true'>Запомнить меня</x-label>
                    </div>
                </div>
                <div>
                    <a href="#" class="text-indigo-600 hover:underline">
                        Забыл пароль
                    </a>
                </div>
            </div>

            <x-button class="w-full bg-green-50">Войти</x-button>
        </form>
    </x-card>
</x-layout>