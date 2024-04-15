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

                    {{-- Subtasks --}}
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
