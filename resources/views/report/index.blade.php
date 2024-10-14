@extends('layouts.main')
@section('content')
<script>
    function openModal(){
        document.getElementById('modal').style.display = 'block';
    }
    function closeModal(){
        document.getElementById('modal').style.display = 'none';
    }
</script>
<div class="container__report">
    @foreach($reports as $report)
        <div class="wrapper__report">
            <p>{{ $report['number'] }}</p>
            <p>{{ $report['description'] }}</p>
            <p class="created_at__report">{{ $report['updated_at'] }}</p>
            <form method="POST" action="{{route('reports.destroy', $report->id)}}">
                @method('delete')
                @csrf
                <input type="submit" value="Удалить">
            </form>
            {{-- <a class="" href="{{route('report.show')}}">обновить</a> --}}
        </div>
    @endforeach
</div>
    <div class="container__btn-create_reports">
        <button class="btn-create_reports" onclick="openModal()">+</button>
    </div>
    <div class="wrapper__form" id="modal">
        <form method="POST" action="{{route('reports.store')}}" class="form_reports">
            @csrf
            <button class="close-modal__reports" onclick="closeModal()">X</button>
            <div class="wrapper__content_form">
                <input name="number" type="text" placeholder="number" required class="number__create_reports" />
                <textarea name="description" placeholder="description" cols="30" rows="10" required class="description__create_reports"></textarea>
                <button type="submit" class="btn__create_reports">Создать</button>
            </div>
        </form>
    </div>
@endsection()