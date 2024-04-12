<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="">
                    <div class="">
                        {{ __('Create Task') }}
                    </div>
                </div>
                <div class="">
                    <form action="{{ route('tasks.store') }}" method="POST">
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
                            <label for="due_date" class="">Due Date</label>
                            <input type="date" name="due_date" id="due_date" class="form-input w-full" />
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="">Create Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
