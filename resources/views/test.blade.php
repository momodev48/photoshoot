@foreach($gallery->media as $media)
    <img src="{{ asset('storage/'.$media->link) }}" alt=""/>
@endforeach
