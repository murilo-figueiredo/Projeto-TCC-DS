var opcoesLogado = document.querySelectorAll(".opcoes-alternativas-logado");

var containerLogado = document.querySelector('.container-logado');
var sobreposicaoLogado = document.querySelector('.sobreposicao-logado');

var btnAbrirInfo = document.querySelector('#btnAbrirInfo');
var btnFecharInfo = document.querySelector('#btnFecharInfo');
var btnPronto = document.querySelector('#btnPronto');

opcoesLogado.forEach((li) => {
    li.addEventListener('mouseenter', () => {
        li.classList.remove('text-info');
        li.classList.add('text-primary');
    });
    li.addEventListener('mouseleave', () => {
        li.classList.remove('text-primary');
        li.classList.add('text-info');
    });
});


btnAbrirInfo.addEventListener('click', () => {
    containerLogado.style.userSelect = 'none';
    containerLogado.style.pointerEvents = 'none';
    sobreposicaoLogado.style.display = 'block';
});
btnFecharInfo.addEventListener('click', () => {
    containerLogado.style.userSelect = 'auto';
    containerLogado.style.pointerEvents = 'all';
    sobreposicaoLogado.style.display = 'none';
});
btnPronto.addEventListener('click', () => {
    containerLogado.style.userSelect = 'auto';
    containerLogado.style.pointerEvents = 'all';
    sobreposicaoLogado.style.display = 'none';
});