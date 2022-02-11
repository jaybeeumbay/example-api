<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-3">
                <a href="{{ route('post.create'); }}" class="btn btn-sm btn-success mb-3">Create</a>

                <table class="table table-bordered">
                    <thead>
                        <th>Title</th>
                        <th>Body</th>
                        <th>User</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->body }}</td>
                                <td>{{ $post->name }}</td>
                                <td>
                                    @if($post->user_id == $userId)
                                        <a href="{{ route('post.edit', ['id' => $post->post_id]); }}" class="btn btn-sm btn-primary">Edit</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
