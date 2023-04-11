<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
  </head>
  <body class="antialiased">
    <main>
      <div class="hero">
        <h1 class="hero__heading">Todo list</h1>
        
        <form class="hero__form form" method="post" action="{{ route('saveItem') }}">{{ csrf_field() }}
          <div class="form__input-wrapper">
            <label for="listItem">New Todo Item</label>
            <input type="text" id="listItem" name="listItem" />
          </div>
          <button type="submit">Submit</button>
        </form>
        <ul class="todos">
          @foreach ($listItems as $listItem)
            <li class="todos__item">
              <p>Todo: {{ $listItem->name }}</p>
              <form class="todos__item-form" method="post" action="{{ route('markComplete', $listItem->id) }}" >{{ csrf_field() }}
                <button type="submit">Mark completed</button>
              </form>
              <form class="todos__item-form" method="post" action="{{ route('deleteItem', $listItem->id) }}">{{ csrf_field() }}
                <button type="submit" >Delete</button>
              </form>
            </li>
          @endforeach
        </ul>
      </div>
    </main>
  </body>
</html>
