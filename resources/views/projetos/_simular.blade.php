<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Simular investimento</h4>
        <div class="row">
            <form action="javascript:void(0)" class="col s12" id="projeto_form">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="projeto_valor" name="valor" type="number" class="validate" required step=any min=1
                            max="500000" value="">
                        <label for="projeto_valor">Valor</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="projeto_investimento" name="investimento" type="number" class="validate" required
                            step=any min=1 max="500000" value="">
                        <label for="projeto_investimento">Investimento</label>
                    </div>
                    <input type="hidden" name="id" value="" id="projeto_id">
                    @csrf
                    @method('POST')
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="projeto_risco" name="risco" type="text" class="validate" required disabled>
                        <label for="projeto_risco">Risco</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="projeto_roi" name="risco" type="text" class="validate" required disabled>
                        <label for="projeto_roi">ROI</label>
                    </div>
                </div>
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light orange darken-4" type="submit" name="action"
                        id="simular_btn">Simular</button>
                </div>
            </form>
        </div>
        <div class="row">
            <span class="helper-text red-text text-darken-4" id="resp_erro"></span>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Feclar</a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        var elems = document.querySelectorAll('.modal');
        var modals = M.Modal.init(elems, {
            dismissible: false,            
            onCloseEnd: () => {
                document.getElementById('projeto_form').reset()
                document.getElementById('resp_erro').innerHTML = ''
            }
        });

    })

    document.getElementById('simular_btn').addEventListener('click', (evt) => {
        httpRequest = new XMLHttpRequest();
        p_id = document.getElementById('projeto_id')
        p_valor = document.getElementById('projeto_valor')
        p_invest = document.getElementById('projeto_investimento')
        p_risco = document.getElementById('projeto_risco')
        dados = new FormData()

        dados.append('id', p_id.value)
        dados.append('valor', p_valor.value)
        dados.append('invest', p_invest.value)
        dados.append('risco', p_risco.value)

        httpRequest.onreadystatechange = () => {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                resp = JSON.parse(httpRequest.response)
                document.getElementById('projeto_roi').value = resp.roi
                document.getElementById('resp_erro').innerHTML = resp.mensagem
                M.updateTextFields();
            }
        }

        httpRequest.open('POST', 'api/projetos/simular', false)
        httpRequest.send(dados)
    })

</script>
