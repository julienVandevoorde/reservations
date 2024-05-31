@extends('layouts.app')

@section('title', 'Fiche d\'un spectacle')

@section('content')
    <style>
        .show-details-content {
            position: relative;
        }

        .poster-container {
            float: right;
            margin: 0 0 10px 10px;
        }

        .poster-image {
            width: 300px; 
        }

        .representation-item {
            display: flex;
            justify-content: flex-start; 
            align-items: center;
            margin-bottom: 10px; 
        }

        .representation-item span {
            margin-right: 10px; 
        }

        .reservation-form {
            margin-left: 0; 
        }

        .delete-form {
            margin-top: 20px;
        }
    </style>


        

    <div class="show-details-content">
        <article>
            <h1>{{ $show->title }}</h1>
                
            @if($show->poster_url)
            <div class="poster-container">
                <img src="{{ asset($show->poster_url) }}" alt="{{ $show->title }}" class="poster-image">
            </div>
            @else
            <canvas width="300" height="150" style="border:1px solid #000000;"></canvas>
            @endif
            
            @if($show->description)
            <p><strong>Description:</strong> {{ $show->description }}</p>
            @endif
            
            @if($show->location)
            <p><strong>Lieu de création:</strong> {{ $show->location->designation }}</p>
            @endif

            <p><strong>Prix:</strong> {{ $show->price }} €</p>
            
            @if($show->bookable)
            <p><em>Réservable</em></p>
            @else
            <p><em>Non réservable</em></p>
            @endif
            
            <h2>Liste des représentations</h2>
            @if($show->representations && $show->representations->count() >= 1)
            <ul>
                @foreach ($show->representations as $representation)
                    <li class="representation-item">
                        <span>{{ $representation->when }} 
                            @if($representation->location)
                            ({{ $representation->location->designation }})
                            @elseif($representation->show->location)
                            ({{ $representation->show->location->designation }})
                            @else
                            (lieu à déterminer)
                            @endif
                        </span>
                        <form class="reservation-form" action="{{ route('representation.reservation', ['id' => $representation->id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="representation_id" value="{{ $representation->id }}">

                            <button type="submit">Réserver</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            @else
                <p>Aucune représentation</p>
            @endif

            
            <h2>Liste des artistes</h2>
            @if($show->artistTypes->isNotEmpty())
                <ul>
                    @foreach ($show->artistTypes as $artistType)
                        @if ($artistType->artist)
                            <li>{{ $artistType->artist->firstname }} {{ $artistType->artist->lastname }}</li>
                        @endif
                    @endforeach
                </ul>
            @else
                <p>Aucun artiste n'est associé à ce spectacle.</p>
            @endif

        </article>
        
        <h2>Video</h2>

        @if($show->videos->isNotEmpty())
            <div>
                <p>Liste des vidéos :</p>
                <ul>
                    @foreach ($show->videos as $video)
                        <li>
                            <a href="{{ $video->video_url }}" target="_blank">{{ $video->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <p>Aucune vidéo disponible</p>
        @endif

        @auth
            @if (auth()->user()->isAdmin())
            <a href="{{ route('video.create', ['show_id' => $show->id]) }}">Ajouter une vidéo</a>
            @endif
        @endauth

        @if(auth()->check() && auth()->user()->isAdmin())
        <form class="delete-form" action="{{ route('show.destroy', $show->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce spectacle ?')">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer ce spectacle</button>
        </form>
        @endif

        

        <nav><a href="{{ route('show.index') }}">Retour aux shows</a></nav>
    </div>
@endsection
