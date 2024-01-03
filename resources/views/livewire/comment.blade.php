<div>
    <div class="shadow bg-white p-5 mb-4">
        @auth
            <p class="text-xl font-bold text-center mb-4">New Comment</p>

            @if (session('message'))
                <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                    {{ session('message') }}
                </div>
            @endif
            <form wire:submit="onSubmit" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="comment" class="mb-2 block uppercase text-gray-500 font-bold">Comment</label>
                    <textarea wire:model="comment" name="comment" id="comment" placeholder="Comment here"
                        class="border p-3 w-full rounded-lg 
        @error('comment')
            border-red-500
        @enderror"></textarea>

                    @error('comment')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center font-bold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <button type="submit"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">Comment</button>


            </form>
        @endauth

        <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
            @if ($post->comments->count())
                @foreach ($post->comments as $comment)
                    <div class="p-5 border-gray-300 border-b">
                        <a href="{{ route('posts.index', $comment->user->username) }}" class="font-bold">
                            {{ $comment->user->username }}
                        </a>
                        <p>{{ $comment->comment }}</p>
                        <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>

                    </div>
                @endforeach
            @else
                <p class="p-10 uppercase font-bold text-gray-600 text-center">No comments in this post</p>
            @endif
        </div>

    </div>


</div>
<script>
    Livewire.on('commentAdded', function() {
        Livewire.emit('refreshComments');
    });

    Livewire.on('refreshComments', function() {
        Livewire.hook('message.processed', (message, component) => {
            component.set('comments', @this.get('post') - > comments);
        });
    });
</script>
