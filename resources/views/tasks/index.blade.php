<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="">
                    <div class="">
                        {{ __('Tasks') }}
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <a href="{{ route('tasks.create') }}" class="">Create Task</a>
                    </div>
                </div>

                {{-- Tasks --}}
                @foreach ($tasks as $task)
                    @auth
                        @if (Auth::user()->id == $task->user_id)
                            @if ($task->status == 0)
                                <a href="{{ route('tasks.edit', $task->id) }}" class="">
                                    <div class="">
                                        <table class="">
                                            <thead>
                                                <tr>
                                                    <th class="">Name</th>
                                                    <th class="">Description</th>
                                                    <th class="">Date</th>
                                                    <th class="">Status</th>
                                                    <th class="">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border px-4 py-2 ">{{ $task->name }}</td>
                                                    <td class="border px-4 py-2 ">{{ $task->description }}</td>
                                                    <td class="border px-4 py-2 ">{{ $task->due_date->format('d.m.Y') }}
                                                    </td>
                                                    {{-- Form with Selection which shows and updates the Status of an Task and sends the value to the database live. --}}
                                                    <td class="border px-4 py-2 ">
                                                        <form action="{{ route('tasks.status', $task->id) }}"
                                                            method="POST">
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

                                                    <td class="border px-4 py-2 ">
                                                        <form action="{{ route('tasks.destroy', $task->id) }}"
                                                            method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </a>
                            @endif
                        @endif
                    @endauth
                @endforeach

                <hr class="mt-4 mb-4">

                {{-- Done Tasks --}}
                <div class="">
                    <div class="">
                        {{ __('Done Tasks') }}
                    </div>
                </div>
                @foreach ($tasks as $task)
                    @auth
                        @if (Auth::user()->id == $task->user_id)
                            @if ($task->status == 1)
                                <a href="{{ route('tasks.edit', $task->id) }}" class="">
                                    <div class="">
                                        <table class="">
                                            <thead>
                                                <tr>
                                                    <th class="">Name</th>
                                                    <th class="">Description</th>
                                                    <th class="">Date</th>
                                                    <th class="">Status</th>
                                                    <th class="">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border px-4 py-2 ">{{ $task->name }}</td>
                                                    <td class="border px-4 py-2 ">{{ $task->description }}</td>
                                                    <td class="border px-4 py-2 ">{{ $task->due_date->format('d.m.Y') }}
                                                    </td>
                                                    {{-- Form with Selection which shows and updates the Status of an Task and sends the value to the database live. --}}
                                                    <td class="border px-4 py-2 ">
                                                        <form action="{{ route('tasks.status', $task->id) }}"
                                                            method="POST">
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

                                                    <td class="border px-4 py-2 ">
                                                        <form action="{{ route('tasks.destroy', $task->id) }}"
                                                            method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </a>
                            @endif
                        @endif
                    @endauth
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
