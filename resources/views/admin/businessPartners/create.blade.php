@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.businessPartner.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.business-partners.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="cpfcnpj">{{ trans('cruds.businessPartner.fields.cnpj_cpf') }}</label>
                        <input class="cpfOuCnpj form-control {{ $errors->has('cnpj_cpf') ? 'is-invalid' : '' }}" type="text" name="cnpj_cpf" id="cpfcnpj" value="{{ old('cnpj_cpf', '') }}" required>
                        @if($errors->has('cnpj_cpf'))
                            <div class="invalid-feedback">
                                {{ $errors->first('cnpj_cpf') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.businessPartner.fields.cnpj_cpf_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-6 pj">
                    <div class="form-group">
                        <label class="required" for="ie">{{ trans('cruds.businessPartner.fields.ie') }}</label>
                        <input class="form-control {{ $errors->has('ie') ? 'is-invalid' : '' }}" type="text" name="ie" id="ie" value="{{ old('ie', '') }}">
                        @if($errors->has('ie'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ie') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.businessPartner.fields.ie_helper') }}</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="name">{{ trans('cruds.businessPartner.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.businessPartner.fields.name_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-6 pj">
                    <div class="form-group">
                        <label for="company_name">{{ trans('cruds.businessPartner.fields.company_name') }}</label>
                        <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', '') }}">
                        @if($errors->has('company_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('company_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.businessPartner.fields.company_name_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="phone">{{ trans('cruds.businessPartner.fields.phone') }}</label>
                        <input class="sp_celphones form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                        @if($errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.businessPartner.fields.phone_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="required" for="email">{{ trans('cruds.businessPartner.fields.email') }}</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.businessPartner.fields.email_helper') }}</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="required" for="zip_code">{{ trans('cruds.businessPartner.fields.zip_code') }}</label>
                        <input onblur="pesquisacep(this.value);" class="cep form-control {{ $errors->has('zip_code') ? 'is-invalid' : '' }}" type="text" name="zip_code" id="zip_code" value="{{ old('zip_code', '') }}" required>
                        @if($errors->has('zip_code'))
                            <div class="invalid-feedback">
                                {{ $errors->first('zip_code') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.businessPartner.fields.zip_code_helper') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="required" for="address">{{ trans('cruds.businessPartner.fields.address') }}</label>
                        <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}" required>
                        @if($errors->has('address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.businessPartner.fields.address_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="required" for="number">{{ trans('cruds.businessPartner.fields.number') }}</label>
                        <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="text" name="number" id="number" value="{{ old('number', '') }}" required>
                        @if($errors->has('number'))
                            <div class="invalid-feedback">
                                {{ $errors->first('number') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.businessPartner.fields.number_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="complement">{{ trans('cruds.businessPartner.fields.complement') }}</label>
                        <input class="form-control {{ $errors->has('complement') ? 'is-invalid' : '' }}" type="text" name="complement" id="complement" value="{{ old('complement', '') }}">
                        @if($errors->has('complement'))
                            <div class="invalid-feedback">
                                {{ $errors->first('complement') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.businessPartner.fields.complement_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="required" for="district">{{ trans('cruds.businessPartner.fields.district') }}</label>
                        <input class="form-control {{ $errors->has('district') ? 'is-invalid' : '' }}" type="text" name="district" id="district" value="{{ old('district', '') }}" required>
                        @if($errors->has('district'))
                            <div class="invalid-feedback">
                                {{ $errors->first('district') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.businessPartner.fields.district_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="required" for="city">{{ trans('cruds.businessPartner.fields.city') }}</label>
                        <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}" required>
                        @if($errors->has('city'))
                            <div class="invalid-feedback">
                                {{ $errors->first('city') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.businessPartner.fields.city_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="required" for="state">{{ trans('cruds.businessPartner.fields.state') }}</label>
                        <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', '') }}" required>
                        @if($errors->has('state'))
                            <div class="invalid-feedback">
                                {{ $errors->first('state') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.businessPartner.fields.state_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="country">{{ trans('cruds.businessPartner.fields.country') }}</label>
                        <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', '') }}">
                        @if($errors->has('country'))
                            <div class="invalid-feedback">
                                {{ $errors->first('country') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.businessPartner.fields.country_helper') }}</span>
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
            $('.pf').hide();
            $('.pj').hide();
        });

        var options = {
            onKeyPress: function (cpf, ev, el, op) {
                var masks = ['000.000.000-000', '00.000.000/0000-00'];
                $('.cpfOuCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
            }
        }

        $('.cpfOuCnpj').length > 11 ? $('.cpfOuCnpj').mask('00.000.000/0000-00', options) : $('.cpfOuCnpj').mask('000.000.000-00#', options);
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

        $('.cep').mask('00000-000');
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
