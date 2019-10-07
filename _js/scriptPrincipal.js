// Função expressa ao seleccionar elementos

const selecionarElementos = (s) => document.querySelector(s);

// Abrir o menu ao clicar

selecionarElementos('.abrir').addEventListener('click', () => {
    selecionarElementos('.lista-nav').classList.add('activar');
});

selecionarElementos('.fechar').addEventListener('click', () => {
    selecionarElementos('.lista-nav').classList.remove('activar');
});