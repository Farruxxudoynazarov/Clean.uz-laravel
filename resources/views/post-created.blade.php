<div>
    <h1>Hurmatli {{ $post->user->name }}</h1>
    <h4>Siz {{ $post->created_at }} da yangi post yaratdingiz.</h4>
    <p>Post id: {{ $post->id }}</p>
    <div>{{ $post->title }}</div>
    <div>{{ $post->short_content }}</div>
    <div>{{ $post->content }}</div>
    <strong>Raxmat</strong>
</div>