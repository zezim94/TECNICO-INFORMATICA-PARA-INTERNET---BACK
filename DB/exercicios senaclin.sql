/* Inserir dados */
insert into paciente
(
nome, email, celular, cpf, cep, tipoLog, logradouro, numero, complemento, cidade, uf, dataNascimento
) 
values(
'João', 'joaonascimento@gmail.com', '13978190098', '11098717687', '11539000', 'Av', 'Ferroviaria', '90', 'caminho são gabriel', 'Santos', 'SP', '2009-02-13'
), (
'Pedro', 'pedronascimento@gmail.com', '11978190098', '11098717697', '11539000', 'Av', 'Ferroviaria', '60', 'caminho são gabriel', 'Santos', 'SP', '2009-02-13'
),(
'Maria', 'marianascimento@gmail.com', '14978190098', '11098717787', '11539000', 'Av', 'Ferroviaria', '9', 'caminho são gabriel', 'Guarujá', 'SP', '2015-02-13'
);

/* Consultas */
select nome, email, celular from paciente WHERE tipoLog = 'Av';

select nome, cidade, email from paciente where cidade like '%a%';

select nome from paciente where idPaciente between 2 and 5;



 