<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="mb-12">
                    <h2 class="text-3xl mb-2">Welcome, {{ Auth::user()->name }}!</h2>
                    <h3 class="text-xl">Here you can see all your tasks.</h3>
                </div>

                <a href="{{ route('tasks.create') }}">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create
                        Task</button>
                </a>

                <hr class="mt-8 mb-8">

                {{-- Tasks --}}
                <h2 class="text-2xl mb-4">Tasks</h2>

                @foreach ($tasks as $task)
                    @auth
                        @if (Auth::user()->id == $task->user_id)
                            @if ($task->status == 0)
                                <div class="overflow-scroll md:overflow-hidden">
                                    <table class="w-full">
                                        <thead class="w-full">
                                            <tr class="w-full">
                                                <th class="text-left w-[20vw]">Name</th>
                                                <th class="text-left w-[20vw]">Description</th>
                                                <th class="text-left w-[20vw]">Date</th>
                                                <th class="text-left w-auto">Status</th>
                                                <th class="text-left w-[20vw]">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="w-full">
                                            <tr class="w-full">
                                                <td class="border px-4 py-2 w-[20vw]">{{ $task->name }}</td>
                                                <td class="border px-4 py-2 w-[20vw]">{{ $task->description }}</td>
                                                <td class="border px-4 py-2 w-[20vw]">{{ $task->due_date->format('d.m.Y') }}
                                                </td>
                                                {{-- Form with Selection which shows and updates the Status of an Task and sends the value to the database live. --}}
                                                <td class="border px-4 py-2 w-auto">
                                                    <form action="{{ route('tasks.status', $task->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        @if ($task->status == 0)
                                                            <input type="checkbox" name="status" id="status"
                                                                class="border" onchange="this.form.submit()">
                                                        @else
                                                            <input type="checkbox" name="status" id="status"
                                                                class="border" onchange="this.form.submit()" checked>
                                                        @endif
                                                    </form>
                                                </td>

                                                <td class="border px-4 py-2 w-[20vw]">
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                        class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div>
                                                            <a href="{{ route('tasks.edit', $task->id) }}"
                                                                class="text-blue-500 font-bold">Edit</a> |
                                                            <button type="submit"
                                                                class="text-red-500 font-bold">Delete</button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        @endif
                    @endauth
                @endforeach

                <hr class="mt-8 mb-8">

                {{-- Done Tasks --}}
                <h2 class="text-2xl mb-4">Done Tasks</h2>
                @foreach ($tasks as $task)
                    @auth
                        @if (Auth::user()->id == $task->user_id)
                            @if ($task->status == 1)
                                <div class="overflow-scroll md:overflow-hidden">
                                    <table class="w-full">
                                        <thead class="w-full">
                                            <tr class="w-full">
                                                <th class="text-left w-[20vw]">Name</th>
                                                <th class="text-left w-[20vw]">Description</th>
                                                <th class="text-left w-[20vw]">Date</th>
                                                <th class="text-left w-auto">Status</th>
                                                <th class="text-left w-[20vw]">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="w-full">
                                            <tr class="w-full">
                                                <td class="border px-4 py-2 w-[20vw]">{{ $task->name }}</td>
                                                <td class="border px-4 py-2 w-[20vw]">{{ $task->description }}</td>
                                                <td class="border px-4 py-2 w-[20vw]">
                                                    {{ $task->due_date->format('d.m.Y') }}
                                                </td>
                                                {{-- Form with Selection which shows and updates the Status of an Task and sends the value to the database live. --}}
                                                <td class="border px-4 py-2 w-auto">
                                                    <form action="{{ route('tasks.status', $task->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        @if ($task->status == 0)
                                                            <input type="checkbox" name="status" id="status"
                                                                class="border" onchange="this.form.submit()">
                                                        @else
                                                            <input type="checkbox" name="status" id="status"
                                                                class="border" onchange="this.form.submit()" checked>
                                                        @endif
                                                    </form>
                                                </td>

                                                <td class="border px-4 py-2 w-[20vw]">
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                        class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div>
                                                            <a href="{{ route('tasks.edit', $task->id) }}"
                                                                class="text-blue-500 font-bold">Edit</a> |
                                                            <button type="submit"
                                                                class="text-red-500 font-bold">Delete</button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        @endif
                    @endauth
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
