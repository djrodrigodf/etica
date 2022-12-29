@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.exam.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.exams.update", [$exam->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="id_group">{{ trans('cruds.exam.fields.id_group') }}</label>
                <input class="form-control {{ $errors->has('id_group') ? 'is-invalid' : '' }}" type="number" name="id_group" id="id_group" value="{{ old('id_group', $exam->id_group) }}" step="1" required>
                @if($errors->has('id_group'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_group') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exam.fields.id_group_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="exame">{{ trans('cruds.exam.fields.exame') }}</label>
                <input class="form-control {{ $errors->has('exame') ? 'is-invalid' : '' }}" type="text" name="exame" id="exame" value="{{ old('exame', $exam->exame) }}" required>
                @if($errors->has('exame'))
                    <div class="invalid-feedback">
                        {{ $errors->first('exame') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.exam.fields.exame_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection