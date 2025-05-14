document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("form-produto");

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const nome = document.getElementById("nome").value;
    const preco = document.getElementById("preco").value;

    const produto = { nome, preco };

    let produtos = JSON.parse(localStorage.getItem("produtos")) || [];
    produtos.push(produto);
    localStorage.setItem("produtos", JSON.stringify(produtos));

    alert("Produto salvo!");
    form.reset();
  });
});
