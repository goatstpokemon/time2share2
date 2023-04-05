
<figure class="large-card">
    
    <img src="{{ asset('storage/images/' . $img) }}" alt="{{ $name }}" width="30px" height="30px">
    <h1>{{$name}}</h1>
    <section class="flex-row space-between">
    <span><strong>Start: </strong><p>{{date('d M', strtotime($rental));}}</p></span>
    
    <span><strong>End: </strong><p>{{date('d M', strtotime($return));}}</p></span>
    </section>
    <a class="link" href="/products/{{$id}}">Bekijk</a>
    
</figure>
