OBJETIVO DO TESTE

Este aplicativo web mostra produtos à venda em uma loja.

Um produto tem um nome, um preço, um período de inicio e fim para uma promoção e um preço para quando estiver em promoção.

O produto pode ser vendido em vários países, por isso, seu nome e preço variam de acordo com a nacionalidade / língua do browser do cliente.

Atualmente o aplicativo web é exibido em português com preços em reais, em inglês com preço em dólar e em francês com preço em euro.

O aplicativo mostra todos os produtos que estão cadastrados com seus respectivos preços para uma determinada nacionalidade / língua.

Para os produtos em promoção, ele mostra quanto o usuário esta ganhando (precoAntigo - preçoNovo) e indica que o produto está em promoção.

Existe também uma API que mostra o produto mais vendido em uma determinada nacionalidade / língua.

Desenvolver as seguintes funcionalidades no aplicativo web:

a) Precisamos adicionar duas novas linguas: Espanhol e Russo

b) Atualmente os dados são inseridos via query em banco de dados, precisamos criar uma forma de adicionar novos produtos e alterar os produtos já existentes.

c) Para uma possível manutenção futura, precisamos que sejam criados testes unitários automatizados para garantir as funcionalidades existentes.

PRE-REQUISITO

1) Reformular a aplicação da melhor forma usando as melhores práticas.

2) Considere que o banco de dados pode ser trocado no futuro.

3) E caso a aplicação tenha muitos acessos simultâneos, precisamos prever uma arquitetura escalável para esta aplicação.

OBSERVAÇÃO

* Não utilizar ferramentas de terceiros a não ser para a escrita dos testes unitários.
