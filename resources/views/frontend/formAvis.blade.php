@extends('layouts.menu')

@section('content')
<br><br><br><br><br><br><br><br><br><br>
    <div class="container">
    <h2>Donner votre avis sur {{ $produit->nom }}</h2>
    <form action="{{ route('submit_avis') }}" method="POST">
        @csrf
        <input type="hidden" name="produit_id" value="{{ $produit->id }}">
        <input type="hidden" name="commande_id" value="{{ $commande->id }}">
        <div class="form-group">
            <label for="note">Note (1 à 5):</label>
            <select name="note" id="note" class="form-control" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="avis">Avis:</label>
            <textarea name="avis" id="avis" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
</div>
@endsection
