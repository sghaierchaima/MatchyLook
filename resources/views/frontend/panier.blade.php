@extends('layouts.menu')

@section('content')
    <hr><hr><hr><hr><hr><hr>
    <div class="container">
        <h1>Votre Panier</h1>
        <p>Bonjour, {{ session('nom') }}</p>
        {{-- Vérifier si un utilisateur est connecté --}}
        @if(session()->has('nom'))
            {{-- Vérifier si le panier est vide --}}
            @if(empty($panier))
                {{-- Afficher le message si le panier est vide --}}
                <p>Bonjour, {{ session('prenom') }}, votre panier est vide !</p>
            @else
                {{-- Afficher le panier --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix Unitaire</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($panier as $item)
                            <tr>
                                <td>{{ $item['produit']->nom }}</td>
                                <td>{{ $item['quantite'] }}</td>
                                <td>{{ $item['produit']->prix }} DT</td>
                                <td>{{ $item['quantite'] * $item['produit']->prix }} DT</td>
                                <td>
                                    <form action="{{ route('retirer-du-panier', $item['produit']->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Retirer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-right"><strong>Total :</strong></td>
                            <td>{{ $total }} DT</td>
                            <td><a href="" class="btn btn-success">Passer la commande</a></td>
                            <form action="{{ route('passer-commande') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Passer la commande</button>
                            </form>
                        </tr>
                    </tbody>
                </table>
            @endif
        @endif
    </div>
@endsection
