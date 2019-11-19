@foreach ($blogs as $blog)
  <div>
    <p> <a href="{{$blog->url}}"> {{$blog->title}} </a> </p>
    <p>by:{{$blog->by}} Type: {{$blog->type}}</p>
  </div>
@endforeach