# simple-shop

Solução para o [desafio](challenge.md).

## Requisitos

- [PHP](https://www.php.net/) 7.3

## Configuração

1. Ajustar as variáveis de conexão no arquivo `lib/connection.php`
1. Executar os scripts da pasta `database` no console da base de dados

## Execução

1. Servir a aplicação

```
$ php -S localhost:8000
```

2. Abrir o endereço http://localhost:8000 no navegador

Observação: Substituir a porta (8000) caso já esteja sendo utilizada.

## Comentários

1. O código foi refatorado mantendo a orientação procedural (original.zip)
1. Os testes unitários não foram implementados por conta da orientação procedural
1. Diversas vulnerabilidades de SQL Injection foram propositalmente mantidas e adicionadas no código para expor a fragilidade da abordagem "não terceirizada" (readme.txt)
1. Os textos da interface não foram traduzidos, mas poderiam ser facilmente caso fosse utilizado um template engine terceiro (Blade, Twig, ...)
1. Para considerar a troca de banco de dados com baixo custo, bastaria utilizar um ORM terceiro (Eloquent, Doctrine, ...)
1. Para considerar a resiliência aos "acessos massivos", bastaria utilizar um framework terceiro (Laravel, Laminas, ...) e adequar a infraestrutura

## Autor

| [<img src="https://avatars2.githubusercontent.com/u/1824706?s=120&v=4" width=120><br><sub>@willystadnick</sub>](https://github.com/willystadnick) |
| :---: |
