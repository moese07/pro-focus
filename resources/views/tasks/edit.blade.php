<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <h2 class="text-2xl mb-4">Edit Task</h2>

                <div class="">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="name" class="">Name</label>
                            <input type="text" name="name" id="name" class="form-input w-full text-black p-2"
                                value="{{ $task->name }}" />
                            @error('name')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="description" class="">Description</label>
                            <textarea name="description" id="description" class="form-input w-full text-black p-2">{{ $task->description }}</textarea>
                            @error('description')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="due_date" class="">Due Date</label>
                            <input type="date" name="due_date" id="due_date" class="form-input w-full text-black p-2"
                                value="{{ $task->due_date->format('Y-m-d') }}" />
                            @error('due_date')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4">Update
                                Task</button>
                            <a href="{{ route('tasks.index') }}">
                                <button type="button"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                            </a>
                        </div>
                    </form>

                    {{-- Subtasks --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
