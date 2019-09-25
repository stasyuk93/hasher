@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-3">
            <a class="btn btn-primary" href="{{route('vocabulary.create')}}">Хэш конвертер</a>
        </div>
        <table class="table">
            <thead>
            <tr class="d-flex">
                <th class="col-4">Слово</th>
                <th class="col-2">Алгоритм хэширования</th>
                <th class="col-6">Хэш</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vocabulary as $item)
                <tr class="d-flex" style="word-break: break-all">
                    <td class="col-4">{{$item->word->word}}</td>
                    <td class="col-2">{{$item->getRelation('hash')->name}}</td>
                    <td class="col-6">{{$item->hash}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
