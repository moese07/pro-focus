<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="">
                    <div class="">
                        {{ __('Edit Task') }}
                    </div>
                </div>
                <div class="">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="name" class="">Name</label>
                            <input type="text" name="name" id="name" class="form-input w-full"
                                value="{{ $task->name }}" />
                        </div>
                        <div class="mb-4">
                            <label for="description" class="">Description</label>
                            <textarea name="description" id="description" class="form-input w-full">{{ $task->description }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="due_date" class="">Due Date</label>
                            <input type="date" name="due_date" id="due_date" class="form-input w-full"
                                value="{{ $task->due_date->format('Y-m-d') }}" />
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="">Update Task</button>
                        </div>
                    </form>

                    <div class="">
                        <div class="">
                            {{ __('Create Subtask') }}
                        </div>
                    </div>
                    <form action="{{ route('subtasks.store', $task->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-4">
                            <label for="name" class="">Name</label>
                            <input type="text" name="name" id="name" class="form-input w-full" />
                        </div>
                        <div class="mb-4">
                            <label for="description" class="">Description</label>
                            <textarea name="description" id="description" class="form-input w-full"></textarea>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="">Create Subtask</button>
                        </div>
                    </form>

                    {{-- Subtasks List --}}
                    {{-- Tasks --}}
                    @foreach ($subtasks as $subtask)
                        @auth
                            @if (Auth::user()->id == $subtask->user_id)
                                @if ($subtask->status == 0)
                                    <a href="{{ route('subtasks.edit', $subtask->id) }}" class="">
                                        <div class="">
                                            <table class="">
                                                <thead>
                                                    <tr>
                                                        <th class="">Name</th>
                                                        <th class="">Description</th>
                                                        <th class="">Status</th>
                                                        <th class="">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="border px-4 py-2 ">{{ $subtask->name }}</td>
                                                        <td class="border px-4 py-2 ">{{ $subtask->description }}</td>
                                                        {{-- Form with Selection which shows and updates the Status of an Task and sends the value to the database live. --}}
                                                        <td class="border px-4 py-2 ">
                                                            <form action="{{ route('subtasks.status', $subtask->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                @if ($subtask->status == 0)
                                                                    <input type="checkbox" name="status" id="status"
                                                                        class="border" onchange="this.form.submit()">
                                                                @else
                                                                    <input type="checkbox" name="status" id="status"
                                                                        class="border" onchange="this.form.submit()"
                                                                        checked>
                                                                @endif
                                                            </form>
                                                        </td>

                                                        <td class="border px-4 py-2 ">
                                                            <form action="{{ route('subtasks.destroy', $subtask->id) }}"
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
                    @foreach ($subtasks as $subtask)
                        @auth
                            @if (Auth::user()->id == $subtask->user_id)
                                @if ($subtask->status == 1)
                                    <a href="{{ route('subtasks.edit', $subtask->id) }}" class="">
                                        <div class="">
                                            <table class="">
                                                <thead>
                                                    <tr>
                                                        <th class="">Name</th>
                                                        <th class="">Description</th>
                                                        <th class="">Status</th>
                                                        <th class="">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="border px-4 py-2 ">{{ $subtask->name }}</td>
                                                        <td class="border px-4 py-2 ">{{ $subtask->description }}</td>
                                                        {{-- Form with Selection which shows and updates the Status of an Task and sends the value to the database live. --}}
                                                        <td class="border px-4 py-2 ">
                                                            <form action="{{ route('subtasks.status', $subtask->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                @if ($subtask->status == 0)
                                                                    <input type="checkbox" name="status" id="status"
                                                                        class="border" onchange="this.form.submit()">
                                                                @else
                                                                    <input type="checkbox" name="status" id="status"
                                                                        class="border" onchange="this.form.submit()"
                                                                        checked>
                                                                @endif
                                                            </form>
                                                        </td>

                                                        <td class="border px-4 py-2 ">
                                                            <form action="{{ route('subtasks.destroy', $subtask->id) }}"
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
    </div>
</x-app-layout>
