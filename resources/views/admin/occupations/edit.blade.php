@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.occupation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.occupations.update", [$occupation->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="id_group">{{ trans('cruds.occupation.fields.id_group') }}</label>
                <input class="form-control {{ $errors->has('id_group') ? 'is-invalid' : '' }}" type="number" name="id_group" id="id_group" value="{{ old('id_group', $occupation->id_group) }}" step="1" required>
                @if($errors->has('id_group'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_group') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.occupation.fields.id_group_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="office">{{ trans('cruds.occupation.fields.office') }}</label>
                <input class="form-control {{ $errors->has('office') ? 'is-invalid' : '' }}" type="text" name="office" id="office" value="{{ old('office', $occupation->office) }}" required>
                @if($errors->has('office'))
                    <div class="invalid-feedback">
                        {{ $errors->first('office') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.occupation.fields.office_helper') }}</span>
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