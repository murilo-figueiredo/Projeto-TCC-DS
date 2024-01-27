const regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

var nomeCad = document.querySelector('#txtNomeCad');
var nomeEsqSen = document.querySelector('#txtNomeEsqSen');
var emailLog = document.querySelector('#txtEmailLog');
var emailCad = document.querySelector('#txtEmailCad');
var emailEsqSen = document.querySelector('#txtEmailEsqSen');

var senhaCad = document.querySelector('#txtSenhaCad');
var confSenhaCad = document.querySelector('#txtConfSenhaCad');
var senhaLog = document.querySelector('#txtSenhaLog');

var avisoEmail, avisoSenha, botao;

function verEmail(situacao)
{
    if(situacao === 'login')
    {
        avisoEmail = document.querySelector('#avisoEmailLog');

        if(regexEmail.test(emailLog.value) || emailLog.value == '')
        {
            avisoEmail.style.display = 'none';
        }
        else
        {
            avisoEmail.style.display = 'flex';
        }
    }
    else if(situacao === 'cadastro')
    {
        avisoEmail = document.querySelector('#avisoEmailCad');
        
        if(regexEmail.test(emailCad.value) || emailCad.value == '')
        {
            avisoEmail.style.display = 'none';
        }
        else
        {
            avisoEmail.style.display = 'flex';
        }
    }
    else if(situacao === 'esqueceu senha')
    {
        avisoEmail = document.querySelector('#avisoEmailEsqSen');

        if(regexEmail.test(emailEsqSen.value) || emailEsqSen.value == '')
        {
            avisoEmail.style.display = 'none';
        }
        else
        {
            avisoEmail.style.display = 'flex';
        }
    }
}


function verSenha(situacao)
{
    if(situacao === 'cadastro')
    {
        avisoSenha = document.querySelector('#avisoSenhaCad');

        if(confSenhaCad.value != '' && senhaCad.value != confSenhaCad.value)
        {
            avisoSenha.classList.remove('text-success');
            avisoSenha.classList.add('text-danger');
            avisoSenha.innerHTML = 'As senhas não correspondem!!';
            avisoSenha.style.display = 'flex';
        }
        else
        {
            if(confSenhaCad.value != '')
            {
                avisoSenha.classList.remove('text-danger');
                avisoSenha.classList.add('text-success');
                avisoSenha.innerHTML = 'As senhas correspondem!!';
                avisoSenha.style.display = 'flex';
            }
            else
            {
                avisoSenha.style.display = 'none';
            }
        }
    }
    /*else if(situacao === 'esqueceu senha')
    {

    }*/
}


function verLogin()
{
    avisoEmail = document.querySelector('#avisoEmailLog');

    if(emailLog.value == '' || senhaLog.value == '')
    {
        alert('É necessário preencher todos os campos para efetuar login.');

        return false;
    }
    else if(avisoEmail.style.display == 'flex')
    {
        emailLog.value = '';
        emailLog.focus();
        avisoEmail.style.display = 'none';
        
        alert('O e-mail digitado não é válido. Tente novamente.');

        return false;
    }
    else
    {
        return true;
    }
}

function verCadastro()
{
    avisoEmail = document.querySelector('#avisoEmailCad');
    avisoSenha = document.querySelector('#avisoSenhaCad');

    if(nomeCad.value == '' || emailCad.value == '' || senhaCad.value == '' || confSenhaCad.value == '')
    {
        alert('É necessário preencher todos os campos obrigatórios para enviar.');

        return false;
    }
    else if(avisoEmail.style.display === 'flex')
    {
        emailCad.value = '';
        emailCad.focus();
        avisoEmail.style.display = 'none';
        
        alert('O e-mail digitado não é válido. Tente novamente.');

        return false;
    }
    else if(avisoSenha.style.display === 'flex' && avisoSenha.classList.contains('text-danger'))
    {
        senhaCad.value = '';
        confSenhaCad.value = '';
        senhaCad.focus();
        avisoSenha.style.display = 'none';
        
        alert('Suas senhas não correspondem. Tente novamente.');

        return false;
    }
    else if(senhaCad.value.length < 5)
    {
        senhaCad.value = '';
        confSenhaCad.value = '';
        senhaCad.focus();

        alert('Sua senha deve conter entre 5 e 20 caracteres. Tente novamente.');

        return false;
    }
    else
    {
        return true;
    }
}

function verEsqueceuSenha()
{
    avisoEmail = document.querySelector('#avisoEmailEsqSen');

    if(document.querySelector('#opcaoNome').checked == true && document.querySelector('#opcaoEmail').checked == false)
    {
        if(nomeEsqSen.value == '')
        {
            alert('É necessário preencher todos os campos para enviar.');
            
            return false;
        }
        else
        {
            return true;
        }
    }
    if(document.querySelector('#opcaoEmail').checked == true && document.querySelector('#opcaoNome').checked == false)
    {
        if(emailEsqSen.value == '')
        {
            alert('É necessário preencher todos os campos para enviar.');

            return false;
        }
        else if(avisoEmail.style.display == 'flex')
        {
            alert('O e-mail digitado não é válido. Tente novamente.');

            return false;
        }
        else
        {
            return true;
        }
    }
}

function verAlterarSenha()
{
    // blá blá blá
}