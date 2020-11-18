function mostrar_abas(obj) {

    document.getElementById('div_aba1').style.display="none";
    document.getElementById('div_aba2').style.display="none";
    document.getElementById('div_aba3').style.display="none";
    document.getElementById('div_aba4').style.display="none";
    document.getElementById('registraUsuario').style.display="none";
    document.getElementById('userList').style.display="none";
    document.getElementById('cadastrarlojas').style.display="none";

  switch (obj.id) {
     case 'mostra_aba1':
     document.getElementById('div_aba1').style.display="block";
     break
     case 'mostra_aba2':
     document.getElementById('div_aba2').style.display="block";
     break
     case 'mostra_aba3':
     document.getElementById('div_aba3').style.display="block";
     break
     case 'mostra_aba4':
     document.getElementById('div_aba4').style.display="block";
     break
     case 'mostra_registraUsuario':
     document.getElementById('registraUsuario').style.display="block";
     break
     case 'mostra_userList':
     document.getElementById('userList').style.display="block";
     break
     case 'mostra_cadastrarlojas':
     document.getElementById('cadastrarlojas').style.display="block";
     break
  }
}