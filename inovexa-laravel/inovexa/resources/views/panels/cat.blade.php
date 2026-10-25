<h2>Katalog</h2>
<div class="g3" style="margin-top:14px">
    @foreach($lib->books as $b)
        @include('partials.book-card')
    @endforeach
</div>
