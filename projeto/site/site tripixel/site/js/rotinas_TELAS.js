var container = document.querySelector('.container');
var sobreposicao = document.querySelector('.sobreposicao');

var btnAbrirFaleConosco = document.querySelector('#btnAbrirFaleConosco');
var btnFecharFaleConosco = document.querySelector('#btnFecharFaleConosco');

var btnAbrirFaq = document.querySelector('#btnAbrirFaq');
var btnFecharFaq = document.querySelector('#btnFecharFaq');
var btnPronto = document.querySelector('#btnPronto');

var txtMensagem = document.querySelector('#txtMensagem');
var btnEnviarMens = document.querySelector('#btnEnviarMens');

btnAbrirFaleConosco.addEventListener('click', () => {
    container.style.userSelect = 'none';
    container.style.pointerEvents = 'none';
    sobreposicao.style.display = 'block';
});
btnFecharFaleConosco.addEventListener('click', () => {
    container.style.userSelect = 'auto';
    container.style.pointerEvents = 'all';
    sobreposicao.style.display = 'none';
});
btnPronto.addEventListener('click', () => {
    container.style.userSelect = 'auto';
    container.style.pointerEvents = 'all';
    sobreposicao.style.display = 'none';
});


btnAbrirFaq.addEventListener('click', () => {
    container.style.userSelect = 'none';
    container.style.pointerEvents = 'none';
    sobreposicao.style.display = 'block';
});
btnFecharFaq.addEventListener('click', () => {
    container.style.userSelect = 'auto';
    container.style.pointerEvents = 'all';
    sobreposicao.style.display = 'none';
});
btnPronto.addEventListener('click', () => {
    container.style.userSelect = 'auto';
    container.style.pointerEvents = 'all';
    sobreposicao.style.display = 'none';
});


function verMensagem()
{
    if(txtMensagem.value != '')
    {
        return true;
    }
    else
    {
        alert('Escreva uma mensagem para enviar.');
        txtMensagem.focus();

        return false;
    }
}