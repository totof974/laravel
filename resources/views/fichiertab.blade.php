

       {{dump($bladeproduct)}}


       <ul>
           @foreach ($bladeproduct as $prod)
               <li>Titre : {{ $prod['title'] }}</li>
               <li>Description : {{ $prod['description'] }}</li>
               <li>Prix : {{ $prod['prix'] }}</li>
               <li>Date :  {{ $prod['date_created']->format('d m Y') }}</li>
           @endforeach
       </ul>