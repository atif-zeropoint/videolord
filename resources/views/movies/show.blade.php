<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <h2>{{ $movie->name }}</h2>
        <div class="title m-b-md">
            {{ $movie->image }}
        </div>
        <div class="title m-b-md">
            {{ $movie->cast }}
        </div>
        <div class="title m-b-md">
            {{ $movie->genere }}
        </div>
        <p>
            {{ $movie->description}}
        </p>

        <div><button type="button">Add to rent cart</button> </div>
    </div>
</div>
</body>
</html>
