@extends('layouts.master')

@section('title', 'Transaction History')

@section('container__content')
    <div class="container">
        @if (count($transactions)==0)
            <p>You don't have any Transaction</p>
        @else
            @for ($i = 0; $i < count($transactions); $i++)
                <table class="table m-0">
                    <thead class="bg-info">
                        <tr>
                            <th scope="col">{{ $transactions[$i]->date }}</th>
                            <th></th>
                            <th></th>
                            <th scope="col" class="text-right">Total: Rp{{ $totalPrice[$i] }},00</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($j = 0; $j < count($detailTransactions[$i]); $j++)
                            <tr>
                                <td>{{ $products[$i][$j]->name }}</td>
                                <td>Rp{{ $products[$i][$j]->price }},00</td>
                                <td>Quantity: {{ $detailTransactions[$i][$j]->qty }}</td>
                                <td>Sub Total:
                                    Rp{{ $detailTransactions[$i][$j]->qty * $products[$i][$j]->price }}</td>
                            </tr>

                        @endfor
                    </tbody>
                </table>
            @endfor
        @endif
    </div>
@endsection
