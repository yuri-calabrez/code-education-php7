# Curso Arquitetando Aplicações com PHP7 - Code Education

## Fase 1 - Primeira aplicação
Nesta fase você deve realizar a criação de uma aplicação com o zend-expressive-skeleton com base no que foi passado no curso até aqui.
Você deve criar também uma rota /teste e mostrar o texto: "Minha primeira aplicação"
Use o Layout padrão do zend-expressive.

##Fase 2 - Integração do Doctrine
Nesta fase, você deve realizar a integração do Doctrine como foi mostrada no curso. Além disto, você deve criar duas entidades: 
* Cliente - Com dados: id, nome, email, cpf (não se preocupe com o tamanho dos campos).
*  Endereço - Com dados: id, cep, logradouro, cidade, estado (não se preocupe com o tamanho dos campos).

O Endereço deve se relacionar com o Cliente, ou seja, deve ter um relacionando de um para muitos entre Cliente e Endereço (um cliente pode ter vários endereços e um endereço faz parte de um cliente).

No middleware de rota "Teste" que já temos, crie alguns cadastros de Cliente e de Endereço, relacionando-os.
Mostre estes dados no template (organize os dados mostrados).

##Fase 3 - Implementando o CRUD
Nesta fase você deverá terminar de implementar todo o CRUD de contatos, portanto você deverá fazer também a parte de exclusão de contatos.
A rota de exclusão deverá ser: /admin/customer/{id}/delete.

Monte um formulário para mostrar os dados do contato e um botão para celebrar a exclusão do mesmo.

Dica: No método remove() do CustomerRepository, você não precisa retornar a entidade.
