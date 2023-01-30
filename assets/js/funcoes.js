var backend = $('script[data-backend]').attr('data-backend');
async function gerenciarCampanha(Args){
    let DarId = $('script[data-darid]').attr('data-darid');
    let Laapid = $('script[data-laapid]').attr('data-laapid');
    let link = $('script[data-link]').attr('data-link');
    if(Args.funcao == 'iniciar'){
       
        let iniciar = await executarRequest(`&funcao=iniciar&LaapId=${Laapid}&DarId=${DarId}&link=${encodeURIComponent(link)}`, null, backend, 15000);
        
        loader('hide');        
        $(`#trilha_${iniciar.trilha}`).fadeIn(100)
        if(iniciar.trilha == "simulacao"){
            $('.simulacao_valorLiberado').html(iniciar.simulacao.valorLiberado.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
            $('.simulacao_valorParcela').html(iniciar.simulacao.valorParcela.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
            $('.simulacao_prazo').html(iniciar.simulacao.prazo + 'x');
            $('.simulacao_financeira').html(iniciar.simulacao.financeira);
            $(`.financeira${iniciar.simulacao.FinId}`).show()

                
            $('#listaNomes').html('');
            iniciar.listaNomes.forEach(element => {
                $('#listaNomes').append(` <div class="form-check group-radio">
                <input class="form-check-input" type="radio" value="${element.id}" name="listaNomes" id="defaultCheck${element.id}">
                <label class="form-check-label " for="defaultCheck${element.id}">
                  ${element.nome}
                </label>
              </div>`);
            });
        }
    
    }else if (Args.funcao == 'reservar'){
        $(`#trilha_simulacao`).fadeOut(100)
        $(`#trilha_coletaNome`).fadeIn(300)
    }else if (Args.funcao == 'coletaNome'){

        let nome = $("input[name='listaNomes']:checked").val();
        if(nome != undefined){
            loader('show');    
            $('.warningNome').hide();
            let coletaNome = await executarRequest(`&funcao=coletaNome&DarId=${DarId}&nome=${nome}`, null, backend, 15000);
            loader('hide');    
            if(coletaNome.status){
                if(coletaNome.trilha == "aguardaLink"){
                    var data = new Date();
                    if(data.getHours() >= 7 && data.getHours() < 20){
                        let listaMensagens = ["Está quase pronto... Aguarde por favor..", "Não vai levar mais do que 1 minutinho! Por favor, aguarde.", "Falta pouco para garantir seu dinheiro para 2023!", "Já estamos quase finalizando! Por favor, aguarde.", "Estamos digitando sua proposta na financeira! Por favor, aguarde", "Só mais um minutinho! Por favor, aguarde.", "Estamos digitando sua proposta na financeira! Por favor, aguarde.", "Só mais um poquinho!  Por favor, aguarde."];
                        let aguardaLink = setInterval(() => {
                            $('.aguardaLink').html(listaMensagens[Math.floor(Math.random()*listaMensagens.length)]);
                        }, 5000);
                        setTimeout(() => {
                            gerenciarCampanha({funcao: 'aguardaLink'});
                        }, 90000);   
                    }else{
                        $(`#trilha_coletaNome`).fadeOut(100)
                        $(`#trilha_foraHorario`).fadeIn(100)
                        $('.foraHorario').html(`${data.getHours() > 20 ? 'Amanhã' : 'Hoje'} entre as 07:00 e 08:00h você receberá um link em seu Whatsapp ou SMS. Esse é o último passo para você formalizar seu contrato conosco e garantir dinheiro no bolso em 2023!`);
                        return;
                    }

                }else if (coletaNome.trilha == "formalizar"){
                    $('#btnFormalizacao').data('link', coletaNome.link);
                }
                $(`#trilha_coletaNome`).fadeOut(100)
                $(`#trilha_${coletaNome.trilha}`).fadeIn(100)
            }else{
                $(`#trilha_coletaNome`).fadeOut(100)
                $(`#trilha_coletaNomeErro`).fadeIn(300)
            }
        }else{
           $('.warningNome').show();
           // $(`#trilha_coletaNome`).fadeOut(100)
           // $(`#trilha_coletaNomeErro`).fadeIn(300)
        }

        /*let nome = $('#coletaNome').val().replace(/[^a-zà-ú ]/gi, '');  
        console.log(nome);
        if(nome.length > 5 && nome.includes(' ')){
            loader('show');    
            let coletaNome = await executarRequest(`&funcao=coletaNome&DarId=${DarId}&nome=${nome}`, null, backend, 15000);
            loader('hide');    
            if(coletaNome.status){
                if(coletaNome.trilha == "aguardaLink"){
                    let listaMensagens = ["Está quase pronto... Aguarde por favor..", "Estamos digitando sua proposta na financeira! Aguarde por favor", "Só mais um minutinho! Aguarde por favor"];
                    let aguardaLink = setInterval(() => {
                        $('.aguardaLink').html(listaMensagens[Math.floor(Math.random()*listaMensagens.length)]);
                    }, 5000);
                    setTimeout(() => {
                        gerenciarCampanha({funcao: 'aguardaLink'});
                    }, 30000);

                }else if (coletaNome.trilha == "formalizar"){
                    $('#btnFormalizacao').data('link', coletaNome.link);
                }
                $(`#trilha_coletaNome`).fadeOut(100)
                $(`#trilha_${coletaNome.trilha}`).fadeIn(100)
            }else{
                $(`#trilha_coletaNome`).fadeOut(100)
                $(`#trilha_coletaNomeErro`).fadeIn(300)
            }
        }else{
            $(`#trilha_coletaNome`).fadeOut(100)
            $(`#trilha_coletaNomeErro`).fadeIn(300)
        }*/
    }else if (Args.funcao == 'coletaNomeErro'){
        $(`#trilha_coletaNomeErro`).fadeOut(100)
        $(`#trilha_coletaNome`).fadeIn(300)
    }else if (Args.funcao == 'coletaCpfErro'){
        $(`#trilha_coletaCpfErro`).fadeOut(100)
        $(`#trilha_coletaCpf`).fadeIn(300)
    }else if (Args.funcao == 'aguardaLink'){
        let aguardaLink = await executarRequest(`&funcao=aguardaLink&DarId=${DarId}`, null, backend, 15000);
        $('#trilha_aguardaLink').fadeOut(100);
        $(`#trilha_${aguardaLink.trilha}`).fadeIn(100)
        if (aguardaLink.trilha == "formalizar"){
            $('#btnFormalizacao').data('link', aguardaLink.link);
        }
    }else if (Args.funcao == 'formalizar'){
        let element = $('#btnFormalizacao').data();
        if(element.link != undefined){
            window.open(element.link,'_blank');
        }else{
            $(`#trilha_formalizar`).fadeOut(100)
            $(`#trilha_erro`).fadeIn(300)
        }
    }else if (Args.funcao == 'coletaCpf'){
        let CliCpf = $('input[name="CliCpf"]').val();
        const url = new URL(window.location.href);
        console.log(url.search);
        let coletaCpf = await executarRequest(`&funcao=iniciar&LaapId=${Laapid}&CliCpf=${CliCpf}&link=${encodeURIComponent(link)}&${url.search.length > 3 ? url.search.replace('?', '&') : ''}`, null, backend, 15000);
        $(`#trilha_coletaCpf`).fadeOut(100)
        if(coletaCpf.trilha == "simulacao"){
            $('script[data-darid]').attr('data-darid', coletaCpf.DarId);
            gerenciarCampanha({funcao: 'iniciar'});
        }else{
            loader('hide');
            $(`#trilha_${coletaCpf.trilha}`).fadeIn(100)
        }
     
    }else if (Args.funcao == 'coletaTelefone'){
        let CliCpf = $('input[name="CliCpf"]').val();
        let telefone = $('input[name="telefone"]').val();

        if(!validarTelefone(telefone)){
            $('.warningTelefone').show()
            return;
        }
       
        loader('show');
        let coletaTelefone = await executarRequest(`&funcao=coletaTelefone&LaapId=${Laapid}&telefone=${telefone}&CliCpf=${CliCpf}&link=${link}`, null, backend, 15000);
        if(coletaTelefone.trilha == "simulacao"){
            $('script[data-darid]').attr('data-darid', coletaTelefone.DarId);
            gerenciarCampanha({funcao: 'iniciar'});
            $(`#trilha_coletaTelefone`).fadeOut(100)
            $(`#trilha_aguardaProcessamento`).fadeOut(100)
        }else{
            loader('hide');
            $(`#trilha_coletaTelefone`).fadeOut(100)
            $(`#trilha_${coletaTelefone.trilha}`).fadeIn(100)

            if(coletaTelefone.trilha == "aguardaProcessamento"){
                setTimeout(() => {
                    gerenciarCampanha({funcao: 'coletaTelefone'});
                }, 5000);
            }
        }

       
    }else if (Args.funcao == 'outroCpf'){
        $('#trilha_coletaNome').fadeOut(100)
        $(`#trilha_coletaCpf`).fadeIn(100)
        $('script[data-darid]').attr('data-darid', '');
    }
}

$("input[name='CliCpf']").on('keyup', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        gerenciarCampanha({funcao:'coletaCpf'})
    }
});
$("input[name='telefone']").on('keyup', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        gerenciarCampanha({funcao:'coletaTelefone'})
    }
});
$("#coletaNome").on('keyup', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        gerenciarCampanha({funcao:'coletaNome'})
    }
});