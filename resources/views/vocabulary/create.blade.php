@extends('layouts.app')

@section('content')
    <div class="container">
        <form id="form-vocabulary" action="{{route('vocabulary.store')}}" method="post">
            @csrf()
            <table width="100%">
                <tr class="text-center">
                    <th>Слово</th>
                    <th style="width:200px">Алгоритм хэширования</th>
                    <th>Хэш</th>
                </tr>
                <tr class="vocabulary">
                    <td><input class="word" type="text" name="vocabulary[0][word]" style="width: 100%"></td>
                    <td style="text-align:center">
                        <select name="vocabulary[0][algorithm]">
                            @foreach($algorithms as $algorithm)
                                <option value="{{$algorithm}}">{{$algorithm}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input class="hash" type="text" readonly name="vocabulary[0][hash]" style="width: 100%"></td>
                </tr>
            </table>
            <div style="margin-top: 20px">
                <button type="button" id="addVocabulary">Добавить строку</button>
            </div>
            <div style="margin-top: 20px">
                <button type="button" id="getHash">Хэшировать</button>
            </div>
            <div style="margin-top: 20px">
                <button type="submit">Сохранить в словарь</button>
            </div>
        </form>
    </div>

@endsection
@section('script')
    <script>
        $('#form-vocabulary select').prop('selectedIndex',-1);

        $('#getHash').click(function () {
            $.post("{{route('vocabulary.hasher')}}", $('#form-vocabulary').serialize())
                .done(function (data) {
                    $('tr.vocabulary').each(function (index) {
                        var hash = $(this).find('input.hash');
                        hash.val(data[index].hash);
                        if($(this).find('input.word').val().trim() === '') hash.val('');
                    });
                });
        });

        $('#addVocabulary').click(function () {
            var count = $('tr.vocabulary').length;
            var vocabulary = $('tr.vocabulary').first().clone();
            $(vocabulary).find('[name]').each(function () {
                this.name = this.name.replace(/\d+/g, count);
                this.value = null;
            });
            $('#form-vocabulary table').append(vocabulary);
        });
    </script>
@endsection