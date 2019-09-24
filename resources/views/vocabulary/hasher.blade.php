@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('vocabulary.hasher')}}" method="post">
            @csrf()
            <table>
                <tr class="text-center">
                    <th>Слово</th>
                    <th>Алгоритм хэширования</th>
                </tr>
                <tr class="vocabulary">
                    <td><input type="text" name="vocabulary[0][word]"></td>
                    <td>
                        <select name="vocabulary[0][algorithm]">
                            <option>--</option>
                            @foreach($algorithms as $algorithm)
                                <option value="{{$algorithm}}">{{$algorithm}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="hash"><input type="text" readonly name="vocabulary[0][hash]"></td>
                </tr>
                <tr class="vocabulary">
                    <td><input type="text" name="vocabulary[1][word]"></td>
                    <td>
                        <select name="vocabulary[1][algorithm]">
                            <option>--</option>
                            @foreach($algorithms as $algorithm)
                                <option value="{{$algorithm}}">{{$algorithm}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit">Генерировать хэш</button>
        </form>
    </div>
@endsection
