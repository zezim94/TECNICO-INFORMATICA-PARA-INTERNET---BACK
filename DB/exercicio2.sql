/* Exercicio 1 */

insert into aluguel(idCliente, idFuncionario, dataHoraRetirada) values(9, 3, now());
insert into aluguel(idCliente, idFuncionario, dataHoraRetirada) values(1, 3, now());

insert into aluguelEquipamento(idEquipamento, idAluguel, valorItem, valorUnitario, qtd) values(5, 12, 1.50, 1.50, 1);
insert into aluguelEquipamento(idEquipamento, idAluguel, valorItem, valorUnitario, qtd) values(5, 13, 1.50, 1.50, 1);


update equipamento set qtd = qtd-1 where idEquipamento = 5;
update equipamento set qtd = qtd-1 where idEquipamento = 5;



/* Exercicio 2 */

insert into aluguel(idCliente, idFuncionario, dataHoraRetirada) values(7, 2, '2025-11-20');

insert into aluguelEquipamento(idEquipamento, idAluguel, valorItem, valorUnitario, qtd) values(5, 12, 1.50, 1.50, 1);


update equipamento set qtd = qtd-1 where idEquipamento = 5;



/* Exercicio 3 */

insert into aluguel(idCliente, idFuncionario, dataHoraRetirada) values(8, 2, '2025-12-29');

insert into aluguelEquipamento(idEquipamento, idAluguel, valorItem, valorUnitario, qtd) values(3, 14, 2.00, 2.00, 1);
insert into aluguelEquipamento(idEquipamento, idAluguel, valorItem, valorUnitario, qtd) values(1, 14, 4.00, 2.00, 2);
insert into aluguelEquipamento(idEquipamento, idAluguel, valorItem, valorUnitario, qtd) values(5, 14, 1.50, 1.50, 1);


update equipamento set qtd = (qtd-1) where idEquipamento = 3;
update equipamento set qtd = (qtd-2) where idEquipamento = 1;
update equipamento set qtd = (qtd-1) where idEquipamento = 5;



/* atualizando valor a pagar */
UPDATE aluguel a
JOIN (
    SELECT idAluguel, SUM(valorItem) AS total
    FROM aluguelEquipamento
    GROUP BY
        idAluguel
) ae ON a.idAluguel = ae.idAluguel
SET
    a.valorAPagar = ae.total;



/* Exercicio 4 */
select nomeCliente, email from cliente where cidade = 'Santos'
order by nomeCliente;



/* Exercicio 5 */
select  * from cliente where estado in('SP', 'RJ', 'ES', 'MG');