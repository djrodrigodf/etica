@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.construction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.constructions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="project_mega">{{ trans('cruds.construction.fields.project_mega') }}</label>
                        <input class="form-control {{ $errors->has('project_mega') ? 'is-invalid' : '' }}" type="text" name="project_mega" id="project_mega" value="{{ old('project_mega', '') }}">
                        @if($errors->has('project_mega'))
                            <div class="invalid-feedback">
                                {{ $errors->first('project_mega') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.project_mega_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label class="required" for="name">{{ trans('cruds.construction.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.name_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{ trans('cruds.construction.fields.public_agency') }}</label>
                        <select class="form-control {{ $errors->has('public_agency') ? 'is-invalid' : '' }}" name="public_agency" id="public_agency">
                            <option value disabled {{ old('public_agency', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\Construction::PUBLIC_AGENCY_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('public_agency', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('public_agency'))
                            <div class="invalid-feedback">
                                {{ $errors->first('public_agency') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.public_agency_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{ trans('cruds.construction.fields.situation') }}</label>
                        <select class="form-control {{ $errors->has('situation') ? 'is-invalid' : '' }}" name="situation" id="situation">
                            <option value disabled {{ old('situation', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\Construction::SITUATION_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('situation', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('situation'))
                            <div class="invalid-feedback">
                                {{ $errors->first('situation') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.situation_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="work_group">{{ trans('cruds.construction.fields.work_group') }}</label>
                        <input class="form-control {{ $errors->has('work_group') ? 'is-invalid' : '' }}" type="text" name="work_group" id="work_group" value="{{ old('work_group', '') }}">
                        @if($errors->has('work_group'))
                            <div class="invalid-feedback">
                                {{ $errors->first('work_group') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.work_group_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="copartner">{{ trans('cruds.construction.fields.copartner') }}</label>
                        <input class="form-control {{ $errors->has('copartner') ? 'is-invalid' : '' }}" type="text" name="copartner" id="copartner" value="{{ old('copartner', '') }}">
                        @if($errors->has('copartner'))
                            <div class="invalid-feedback">
                                {{ $errors->first('copartner') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.copartner_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="teams">{{ trans('cruds.construction.fields.team') }}</label>
                        <div style="padding-bottom: 4px">
                            <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                            <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                        </div>
                        <select class="form-control select2 {{ $errors->has('teams') ? 'is-invalid' : '' }}" name="teams[]" id="teams" multiple>
                            @foreach($teams as $id => $team)
                                <option value="{{ $id }}" {{ in_array($id, old('teams', [])) ? 'selected' : '' }}>{{ $team }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('teams'))
                            <div class="invalid-feedback">
                                {{ $errors->first('teams') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.team_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="iss">{{ trans('cruds.construction.fields.iss') }}</label>
                        <input class="percent form-control {{ $errors->has('iss') ? 'is-invalid' : '' }}" type="text" name="iss" id="iss" value="{{ old('iss', '') }}">
                        @if($errors->has('iss'))
                            <div class="invalid-feedback">
                                {{ $errors->first('iss') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.iss_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tax">{{ trans('cruds.construction.fields.tax') }}</label>
                        <input class="percent form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" type="text" name="tax" id="tax" value="{{ old('tax', '') }}" >
                        @if($errors->has('tax'))
                            <div class="invalid-feedback">
                                {{ $errors->first('tax') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.tax_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="partner_percentage">{{ trans('cruds.construction.fields.partner_percentage') }}</label>
                        <input class="percent form-control {{ $errors->has('partner_percentage') ? 'is-invalid' : '' }}" type="text" name="partner_percentage" id="partner_percentage" value="{{ old('partner_percentage', '') }}">
                        @if($errors->has('partner_percentage'))
                            <div class="invalid-feedback">
                                {{ $errors->first('partner_percentage') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.partner_percentage_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="role">{{ trans('cruds.construction.fields.role') }}</label>
                        <input class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" type="text" name="role" id="role" value="{{ old('role', '') }}">
                        @if($errors->has('role'))
                            <div class="invalid-feedback">
                                {{ $errors->first('role') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.role_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="administration_fee">{{ trans('cruds.construction.fields.administration_fee') }}</label>
                        <input class="percent form-control {{ $errors->has('administration_fee') ? 'is-invalid' : '' }}" type="text" name="administration_fee" id="administration_fee" value="{{ old('administration_fee', '') }}">
                        @if($errors->has('administration_fee'))
                            <div class="invalid-feedback">
                                {{ $errors->first('administration_fee') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.administration_fee_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="reserve_fund">{{ trans('cruds.construction.fields.reserve_fund') }}</label>
                        <input class="money form-control {{ $errors->has('reserve_fund') ? 'is-invalid' : '' }}" type="text" name="reserve_fund" id="reserve_fund" value="{{ old('reserve_fund', '') }}">
                        @if($errors->has('reserve_fund'))
                            <div class="invalid-feedback">
                                {{ $errors->first('reserve_fund') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.reserve_fund_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="public_notice_number">{{ trans('cruds.construction.fields.public_notice_number') }}</label>
                        <input class="form-control {{ $errors->has('public_notice_number') ? 'is-invalid' : '' }}" type="text" name="public_notice_number" id="public_notice_number" value="{{ old('public_notice_number', '') }}">
                        @if($errors->has('public_notice_number'))
                            <div class="invalid-feedback">
                                {{ $errors->first('public_notice_number') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.public_notice_number_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="average_discount">{{ trans('cruds.construction.fields.average_discount') }}</label>
                        <input class="percent form-control {{ $errors->has('average_discount') ? 'is-invalid' : '' }}" type="text" name="average_discount" id="average_discount" value="{{ old('average_discount', '') }}">
                        @if($errors->has('average_discount'))
                            <div class="invalid-feedback">
                                {{ $errors->first('average_discount') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.average_discount_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="budget_base_date">{{ trans('cruds.construction.fields.budget_base_date') }}</label>
                        <input class="form-control date {{ $errors->has('budget_base_date') ? 'is-invalid' : '' }}" type="text" name="budget_base_date" id="budget_base_date" value="{{ old('budget_base_date') }}">
                        @if($errors->has('budget_base_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('budget_base_date') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.budget_base_date_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="proposal_base_date">{{ trans('cruds.construction.fields.proposal_base_date') }}</label>
                        <input class="form-control date {{ $errors->has('proposal_base_date') ? 'is-invalid' : '' }}" type="text" name="proposal_base_date" id="proposal_base_date" value="{{ old('proposal_base_date') }}">
                        @if($errors->has('proposal_base_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('proposal_base_date') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.proposal_base_date_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="use_base_date">{{ trans('cruds.construction.fields.use_base_date') }}</label>
                        <input class="form-control date {{ $errors->has('use_base_date') ? 'is-invalid' : '' }}" type="text" name="use_base_date" id="use_base_date" value="{{ old('use_base_date') }}">
                        @if($errors->has('use_base_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('use_base_date') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.use_base_date_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="contract_value">{{ trans('cruds.construction.fields.contract_value') }}</label>
                        <input class="money form-control {{ $errors->has('contract_value') ? 'is-invalid' : '' }}" type="text" name="contract_value" id="contract_value" value="{{ old('contract_value', '') }}">
                        @if($errors->has('contract_value'))
                            <div class="invalid-feedback">
                                {{ $errors->first('contract_value') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.contract_value_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ trans('cruds.construction.fields.type') }}</label>
                        <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type">
                            <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\Construction::TYPE_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('type'))
                            <div class="invalid-feedback">
                                {{ $errors->first('type') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.type_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="contract_number">{{ trans('cruds.construction.fields.contract_number') }}</label>
                        <input class="form-control {{ $errors->has('contract_number') ? 'is-invalid' : '' }}" type="text" name="contract_number" id="contract_number" value="{{ old('contract_number', '') }}">
                        @if($errors->has('contract_number'))
                            <div class="invalid-feedback">
                                {{ $errors->first('contract_number') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.contract_number_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="contract_publication_date">{{ trans('cruds.construction.fields.contract_publication_date') }}</label>
                        <input class="form-control date {{ $errors->has('contract_publication_date') ? 'is-invalid' : '' }}" type="text" name="contract_publication_date" id="contract_publication_date" value="{{ old('contract_publication_date') }}">
                        @if($errors->has('contract_publication_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('contract_publication_date') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.contract_publication_date_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="deadline_contract">{{ trans('cruds.construction.fields.deadline_contract') }}</label>
                        <input class="form-control {{ $errors->has('deadline_contract') ? 'is-invalid' : '' }}" type="text" name="deadline_contract" id="deadline_contract" value="{{ old('deadline_contract', '') }}">
                        @if($errors->has('deadline_contract'))
                            <div class="invalid-feedback">
                                {{ $errors->first('deadline_contract') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.deadline_contract_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="start_order_date">{{ trans('cruds.construction.fields.start_order_date') }}</label>
                        <input class="form-control date {{ $errors->has('start_order_date') ? 'is-invalid' : '' }}" type="text" name="start_order_date" id="start_order_date" value="{{ old('start_order_date') }}">
                        @if($errors->has('start_order_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('start_order_date') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.start_order_date_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cei_registration">{{ trans('cruds.construction.fields.cei_registration') }}</label>
                        <input class="form-control {{ $errors->has('cei_registration') ? 'is-invalid' : '' }}" type="text" name="cei_registration" id="cei_registration" value="{{ old('cei_registration', '') }}">
                        @if($errors->has('cei_registration'))
                            <div class="invalid-feedback">
                                {{ $errors->first('cei_registration') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.cei_registration_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cnpj_branch">{{ trans('cruds.construction.fields.cnpj_branch') }}</label>
                        <input class="cnpj form-control {{ $errors->has('cnpj_branch') ? 'is-invalid' : '' }}" type="text" name="cnpj_branch" id="cnpj_branch" value="{{ old('cnpj_branch', '') }}">
                        @if($errors->has('cnpj_branch'))
                            <div class="invalid-feedback">
                                {{ $errors->first('cnpj_branch') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.cnpj_branch_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="policy_value">{{ trans('cruds.construction.fields.policy_value') }}</label>
                        <input class="money form-control {{ $errors->has('policy_value') ? 'is-invalid' : '' }}" type="text" name="policy_value" id="policy_value" value="{{ old('policy_value', '') }}">
                        @if($errors->has('policy_value'))
                            <div class="invalid-feedback">
                                {{ $errors->first('policy_value') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.policy_value_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="construction_site_city">{{ trans('cruds.construction.fields.construction_site_city') }}</label>
                        <input class="form-control {{ $errors->has('construction_site_city') ? 'is-invalid' : '' }}" type="text" name="construction_site_city" id="construction_site_city" value="{{ old('construction_site_city', '') }}">
                        @if($errors->has('construction_site_city'))
                            <div class="invalid-feedback">
                                {{ $errors->first('construction_site_city') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.construction_site_city_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="site_address">{{ trans('cruds.construction.fields.site_address') }}</label>
                        <input class="form-control {{ $errors->has('site_address') ? 'is-invalid' : '' }}" type="text" name="site_address" id="site_address" value="{{ old('site_address', '') }}">
                        @if($errors->has('site_address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('site_address') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.construction.fields.site_address_helper') }}</span>
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
            $('.cpfOuCnpj').val().length > 14 ? $('.cpfOuCnpj').mask('00.000.000/0000-00', options) : $('.cpfOuCnpj').mask('000.000.000-00#', options);
        });

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
