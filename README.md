# Ambiente:

[x] Servidor
[x] PhpMyAdmin
[x] Mysql
[x] Criar banco
[x] Conectar o banco
[] Criar extrutura do projeto

# Entidades:

- Aluno
- Turma
- Matricula

# Requisitos funcionais:

[x] Deve ser possivel cadastrar um aluno (id, nome, data-nasc, cpf)
[x] Deve ser possivel cadastrar uma turma (id, descrição, ano, vagas)
[x] Deve ser possivel registar uma matricula (id_aluno, id_turma, data_matricula)
[x] Deve ser possivel gerar um relatorio de chamada, com filtro por turma, com uma tabela mostrando os dados.

# Regra de negocio:

[x] Ao registrar uma matricula deve verificar se existe vaga na turma.
[] Não deve ser possivel matricular um aluno que não esta cadastrado
[] Não deve ser possivel matricular um aluno que ja esta matriculado em outra turma
[] Não deve ser possivel matricular um aluno em uma turma que não exista
[] Não deve ser possivel cadastar uma turma com ano anterior ao atual
[] Não deve ser possivel cadastar uma turma com qtd de vagas inferior a zero
[] Validação de cpf
[] Tratamento de cpf

# Requisitos não funcionais:

PHP
Mysql
POO
JS se necessario.
