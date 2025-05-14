document.addEventListener('DOMContentLoaded', () => {
  // Elementos
  const painel = document.getElementById('painel-acessibilidade');
  const btnAcessibilidade = document.getElementById('btn-acessibilidade');
  const btnAumentar = document.getElementById('btn-aumentar-texto');
  const btnDiminuir = document.getElementById('btn-diminuir-texto');
  const btnModoEscuro = document.getElementById('btn-modo-escuro');

  // Estado inicial baseado no localStorage
  let modoEscuroAtivo = localStorage.getItem('modoEscuro') === 'true';
  let textoMaior = localStorage.getItem('textoMaior') === 'true';
  let mostrarAcessibilidade = localStorage.getItem('mostrarAcessibilidade') === 'true';

  // Aplicar estilos se necessário
  if (modoEscuroAtivo) document.body.classList.add('modo-escuro');
  if (textoMaior) document.body.classList.add('texto-maior');
  painel.style.display = mostrarAcessibilidade ? 'block' : 'none';

  // Funções
  function toggleAcessibilidade() {
    mostrarAcessibilidade = !mostrarAcessibilidade;
    painel.style.display = mostrarAcessibilidade ? 'block' : 'none';
    localStorage.setItem('mostrarAcessibilidade', mostrarAcessibilidade);
  }

  function aumentarTexto() {
    textoMaior = true;
    document.body.classList.add('texto-maior');
    localStorage.setItem('textoMaior', 'true');
  }

  function diminuirTexto() {
    textoMaior = false;
    document.body.classList.remove('texto-maior');
    localStorage.setItem('textoMaior', 'false');
  }

  function toggleModoEscuro() {
    modoEscuroAtivo = !modoEscuroAtivo;
    document.body.classList.toggle('modo-escuro', modoEscuroAtivo);
    localStorage.setItem('modoEscuro', modoEscuroAtivo);
  }

  // Eventos
  btnAcessibilidade.addEventListener('click', toggleAcessibilidade);
  btnAumentar.addEventListener('click', aumentarTexto);
  btnDiminuir.addEventListener('click', diminuirTexto);
  btnModoEscuro.addEventListener('click', toggleModoEscuro);
});
