@extends('layouts.master')

@section('title', 'Transaction History')

@section('container__content')
    <div class="container">
        @if (count($transactions) == 0)
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
                        @for ($j = 0; $j < count($transactions[$i]->detailTransactions); $j++)
                            <tr>
                                <td>{{ $transactions[$i]->detailTransactions[$j]->products->name }}</td>
                                <td>Rp{{ $transactions[$i]->detailTransactions[$j]->products->price }},00</td>
                                <td>Quantity: {{ $transactions[$i]->detailTransactions[$j]->qty }}</td>
                                <td>Sub Total:
                                    Rp{{ (($transactions[$i]->detailTransactions[$j]->qty) * ($transactions[$i]->detailTransactions[$j]->products->price)) }}
                                </td>
                            </tr>

                        @endfor
                    </tbody>
                </table>
            @endfor
        @endif
    </div>
@endsection
