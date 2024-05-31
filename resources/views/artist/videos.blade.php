@extends('layouts.app')

<h1>Vidéos de {{ $artist->name }}</h1>

<ul>
    @foreach ($videos as $video)
        <li>
            <h2>{{ $video->title }}</h2>
            <iframe width="560" height="315" src="{{ $video->video_url }}" frameborder="0" allowfullscreen></iframe>
        </li>
    @endforeach
</ul>
