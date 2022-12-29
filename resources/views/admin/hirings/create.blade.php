@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.hiring.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.hirings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="construction_id">{{ trans('cruds.hiring.fields.construction') }}</label>
                        <select class="form-control select2 {{ $errors->has('construction') ? 'is-invalid' : '' }}" name="construction_id" id="construction_id">
                            @foreach($constructions as $id => $entry)
                                <option value="{{ $id }}" {{ (old('construction_id') ? old('construction_id') : '' ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('construction'))
                            <div class="invalid-feedback">
                                {{ $errors->first('construction') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.hiring.fields.construction_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="required" for="partner_id">{{ trans('cruds.hiring.fields.partner') }}</label>
                        <select class="form-control select2 {{ $errors->has('partner') ? 'is-invalid' : '' }}" name="partner_id" id="partner_id" required>
                            @foreach($partners as $id => $entry)
                                <option value="{{ $id }}" {{ (old('partner_id') ? old('partner_id') : '' ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('partner'))
                            <div class="invalid-feedback">
                                {{ $errors->first('partner') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.hiring.fields.partner_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date_birth">{{ trans('cruds.hiring.fields.date_birth') }}</label>
                        <input class="form-control date {{ $errors->has('date_birth') ? 'is-invalid' : '' }}" type="text" name="date_birth" id="date_birth" value="{{ old('date_birth', '') }}">
                        @if($errors->has('date_birth'))
                            <div class="invalid-feedback">
                                {{ $errors->first('date_birth') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.hiring.fields.date_birth_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="required" for="occupation_id">{{ trans('cruds.hiring.fields.occupation') }}</label>
                        <select class="form-control select2 {{ $errors->has('occupation') ? 'is-invalid' : '' }}" name="occupation_id" id="occupation_id" required>
                            @foreach($occupations as $id => $entry)
                                <option value="{{ $id }}" {{ (old('occupation_id') ? old('occupation_id') : '' ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('occupation'))
                            <div class="invalid-feedback">
                                {{ $errors->first('occupation') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.hiring.fields.occupation_helper') }}</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="company_id">{{ trans('cruds.hiring.fields.company') }}</label>
                        <select class="form-control select2 {{ $errors->has('company') ? 'is-invalid' : '' }}" name="company_id" id="company_id">
                            @foreach($companies as $id => $entry)
                                <option value="{{ $id }}" {{ (old('company_id') ? old('company_id') : ''->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('company'))
                            <div class="invalid-feedback">
                                {{ $errors->first('company') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.hiring.fields.company_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ trans('cruds.hiring.fields.capacity') }}</label>
                        <select class="form-control {{ $errors->has('capacity') ? 'is-invalid' : '' }}" name="capacity" id="capacity">
                            <option value disabled {{ old('capacity', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\Hiring::CAPACITY_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('capacity', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('capacity'))
                            <div class="invalid-feedback">
                                {{ $errors->first('capacity') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.hiring.fields.capacity_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="required" for="salary">{{ trans('cruds.hiring.fields.salary') }}</label>
                        <input class="money form-control {{ $errors->has('salary') ? 'is-invalid' : '' }}" type="text" name="salary" id="salary" value="{{ old('salary', '') }}"  required>
                        @if($errors->has('salary'))
                            <div class="invalid-feedback">
                                {{ $errors->first('salary') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.hiring.fields.salary_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="beginning">{{ trans('cruds.hiring.fields.beginning') }}</label>
                        <input class="form-control date {{ $errors->has('beginning') ? 'is-invalid' : '' }}" type="text" name="beginning" id="beginning" value="{{ old('beginning', '') }}">
                        @if($errors->has('beginning'))
                            <div class="invalid-feedback">
                                {{ $errors->first('beginning') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.hiring.fields.beginning_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="finish">{{ trans('cruds.hiring.fields.finish') }}</label>
                        <input class="form-control date {{ $errors->has('finish') ? 'is-invalid' : '' }}" type="text" name="finish" id="finish" value="{{ old('finish', '') }}">
                        @if($errors->has('finish'))
                            <div class="invalid-feedback">
                                {{ $errors->first('finish') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.hiring.fields.finish_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>{{ trans('cruds.hiring.fields.clt') }}</label>
                        @foreach(App\Models\Hiring::CLT_RADIO as $key => $label)
                            <div class="form-check {{ $errors->has('clt') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="clt_{{ $key }}" name="clt" value="{{ $key }}" {{ old('clt', '') === (string) $key ? 'checked' : '' }}>
                                <label class="form-check-label" for="clt_{{ $key }}">{{ $label }}</label>
                            </div>
                        @endforeach
                        @if($errors->has('clt'))
                            <div class="invalid-feedback">
                                {{ $errors->first('clt') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.hiring.fields.clt_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group show_registration">
                        <label for="registration">{{ trans('cruds.hiring.fields.registration') }}</label>
                        <input class="form-control {{ $errors->has('registration') ? 'is-invalid' : '' }}" type="text" name="registration" id="registration" value="{{ old('registration', '') }}">
                        @if($errors->has('registration'))
                            <div class="invalid-feedback">
                                {{ $errors->first('registration') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.hiring.fields.registration_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="health_plan">{{ trans('cruds.hiring.fields.health_plan') }}</label>
                        <input class="money form-control {{ $errors->has('health_plan') ? 'is-invalid' : '' }}" type="text" name="health_plan" id="health_plan" value="{{ old('health_plan', '') }}" >
                        @if($errors->has('health_plan'))
                            <div class="invalid-feedback">
                                {{ $errors->first('health_plan') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.hiring.fields.health_plan_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="vehicle_rental">{{ trans('cruds.hiring.fields.vehicle_rental') }}</label>
                        <input class="money form-control {{ $errors->has('vehicle_rental') ? 'is-invalid' : '' }}" type="text" name="vehicle_rental" id="vehicle_rental" value="{{ old('vehicle_rental', '') }}" >
                        @if($errors->has('vehicle_rental'))
                            <div class="invalid-feedback">
                                {{ $errors->first('vehicle_rental') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.hiring.fields.vehicle_rental_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="laptop_rental">{{ trans('cruds.hiring.fields.laptop_rental') }}</label>
                        <input class="money form-control {{ $errors->has('laptop_rental') ? 'is-invalid' : '' }}" type="text" name="laptop_rental" id="laptop_rental" value="{{ old('laptop_rental', '') }}" >
                        @if($errors->has('laptop_rental'))
                            <div class="invalid-feedback">
                                {{ $errors->first('laptop_rental') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.hiring.fields.laptop_rental_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="phone_plan">{{ trans('cruds.hiring.fields.phone_plan') }}</label>
                        <input class="money form-control {{ $errors->has('phone_plan') ? 'is-invalid' : '' }}" type="text" name="phone_plan" id="phone_plan" value="{{ old('phone_plan', '') }}" >
                        @if($errors->has('phone_plan'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone_plan') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.hiring.fields.phone_plan_helper') }}</span>
                    </div>
                </div>
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

@push('scripts')


    <script>

        $( document ).ready(function() {
            $('.show_registration').hide();


            if($('input[name="clt"]:checked').val() === 'Sim') {
                $('.show_registration').show();
            } else {
                $('.show_registration').hide();
            }

        });


        $('input[name="clt"]').change(function (e) {
            if($(e.currentTarget).val() === 'Sim') {
                $('.show_registration').show();
            } else {
                $('.show_registration').hide();
                $('#registration').val('');
            }
        })



        var options = {
            onKeyPress: function (cpf, ev, el, op) {
                var masks = ['000.000.000-000', '00.000.000/0000-00'];
                $('.cpfOuCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
            }
        }

        $('.cpfOuCnpj').length > 14 ? $('.cpfOuCnpj').mask('00.000.000/0000-00', options) : $('.cpfOuCnpj').mask('000.000.000-00#', options);
        $('.cpfOuCnpj').blur(function () {

            if ($('.cpfOuCnpj').val().length == 14) {
                $('.pj').hide();
                $('.pf').show();
            } else if($('.cpfOuCnpj').val().length == 18) {
                $('.pj').show();
                $('.pf').hide();
            } else {
                $('.pf').hide();
                $('.pj').hide();
            }
        })

        var SPMaskBehavior = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };

        $('.sp_celphones').mask(SPMaskBehavior, spOptions);

        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('.cep').mask('00000-000');
        $('.phone').mask('0000-0000');
        $('.phone_with_ddd').mask('(00) 0000-0000');
        $('.phone_us').mask('(000) 000-0000');
        $('.mixed').mask('AAA 000-S0S');
        $('.cpf').mask('000.000.000-00', {reverse: true});
        $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
        $('.money2').mask("#.##0,00", {reverse: true});
        $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/, optional: true
                }
            }
        });
        $('.ip_address').mask('099.099.099.099');
        $('.percent').mask('990,00', {reverse: true});

    </script>

    <script>

        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('address').value=("");
            document.getElementById('district').value=("");
            document.getElementById('city').value=("");
            document.getElementById('state').value=("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('address').value=(conteudo.logradouro);
                document.getElementById('district').value=(conteudo.bairro);
                document.getElementById('city').value=(conteudo.localidade);
                document.getElementById('state').value=(conteudo.uf);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('address').value="...";
                    document.getElementById('district').value="...";
                    document.getElementById('city').value="...";
                    document.getElementById('state').value="...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };

    </script>

@endpush
