var opcoesLogin = document.querySelectorAll('.opcoes-alternativas');

var container = document.querySelector('.container');
var sobreposicao = document.querySelector('.sobreposicao');

var btnAbrirCad = document.querySelector('#btnAbrirCad');
var btnFecharCad = document.querySelector('#btnFecharCad');
var btnCadastrar = document.querySelector('#btnCadastrar');

var inputFoto = document.querySelectorAll('.btn-remover-foto');
var txtFoto = document.querySelector('#txtFoto');
var lblFoto = document.querySelector('#lblFoto');
var imgVisual = document.querySelector('#imgVisualizacao');
var btnRemFoto = document.querySelector('#btnRemFoto');

var btnAbrirEsqSen = document.querySelector('#btnAbrirEsqSen');
var btnFecharEsqSen = document.querySelector('#btnFecharEsqSen');

var nomeEsqSenha = document.querySelector('#nomeEsqSenha');
var emailEsqSenha = document.querySelector('#emailEsqSenha');
var opcaoNome = document.querySelector('#opcaoNome');
var opcaoEmail = document.querySelector('#opcaoEmail');
var txtEmailEsqSen = document.querySelector('#txtEmailEsqSen');
var txtNomeEsqSen = document.querySelector('#txtNomeEsqSen');


opcoesLogin.forEach((li) => {
    li.addEventListener('mouseenter', () => {
        li.classList.remove('text-info');
        li.classList.add('text-primary');
    });
    li.addEventListener('mouseleave', () => {
        li.classList.remove('text-primary');
        li.classList.add('text-info');
    });
});
inputFoto.forEach((small) => {
    small.addEventListener('mouseenter', () => {
        small.classList.remove('text-info');
        small.classList.add('text-primary');
    });
    small.addEventListener('mouseleave', () => {
        small.classList.remove('text-primary');
        small.classList.add('text-info');
    });
});


btnAbrirCad.addEventListener('click', () => {
    container.style.userSelect = 'none';
    container.style.pointerEvents = 'none';
    sobreposicao.style.display = 'block';
});
btnFecharCad.addEventListener('click', function() {
    container.style.userSelect = 'auto';
    container.style.pointerEvents = 'all';
    sobreposicao.style.display = 'none';
    
    imgVisual.src = 'upl/uploads/sem_foto_perfil.png';
    lblFoto.textContent = 'Escolha sua foto de perfil';
    lblFoto.style.marginTop = '30px';
    txtFoto.files[0] = null;
    btnRemFoto.style.display = 'none';
    document.querySelectorAll('.cadastro').forEach((input) => {
        input.value = null;
    });
    document.querySelector('#avisoEmailCad').style.display = 'none';
    document.querySelector('#avisoSenhaCad').style.display = 'none';
});


txtFoto.addEventListener('input', () => {
    if(txtFoto.value != '')
    {
        var imgSelec = txtFoto.files[0];
        
        if(imgSelec != null)
        {
            imgVisual.src = URL.createObjectURL(imgSelec);
            lblFoto.textContent = imgSelec.name;
            lblFoto.style.marginTop = '20px';
            
            btnRemFoto.style.display = 'block';
        }
    }
});
btnRemFoto.addEventListener('click', () => {
    imgVisual.src = 'upl/uploads/sem_foto_perfil.png';
    lblFoto.textContent = 'Escolha sua foto de perfil';
    lblFoto.style.marginTop = '30px';
    txtFoto.files[0] = null;
    
    btnRemFoto.style.display = 'none';
});


btnAbrirEsqSen.addEventListener('click', () => {
    container.style.userSelect = 'none';
    container.style.pointerEvents = 'none';
    sobreposicao.style.display = 'block';
});
btnFecharEsqSen.addEventListener('click', () => {
    container.style.userSelect = 'auto';
    container.style.pointerEvents = 'all';
    sobreposicao.style.display = 'none';
    
    opcaoEmail.checked = false;
    opcaoNome.checked = true;
    document.querySelectorAll('.esq-senha').forEach((input) => {
        input.value = null;
    });
    document.querySelector('#avisoEmailEsqSen').style.display = 'none';
});

opcaoNome.addEventListener('change', () => {
    if(opcaoNome.checked = true)
    {
        txtEmailEsqSen.value = ' ';
        document.querySelector('#avisoEmailEsqSen').style.display = 'none';
        
        emailEsqSenha.style.display = 'none';
        nomeEsqSenha.style.display = 'block';
    }
    else
    {
        nomeEsqSenha.style.display = 'none';
    }
});
opcaoEmail.addEventListener('change', () => {
    if(opcaoEmail.checked = true)
    {
        txtNomeEsqSen.value = ' ';
        nomeEsqSenha.style.display = 'none';

        emailEsqSenha.style.display = 'block';
    }
    else
    {
        emailEsqSenha.style.display = 'none';
    }
})
