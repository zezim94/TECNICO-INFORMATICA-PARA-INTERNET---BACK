CREATE table funcionário(
    idFuncionario int PRIMARY KEY AUTO_INCREMENT,
    nomeFuncionario varchar(50) not null,
    cpf char(11) not NULL unique,
    celular char(11) not null
);
 
CREATE TABLE Cliente(
idCliente INT PRIMARY KEY AUTO_INCREMENT,
nomeCliente VARCHAR(50) NOT NULL,
cpf CHAR(11) NOT NULL unique
);
 
CREATE TABLE Equipamento(
idEquipamento INT PRIMARY KEY AUTO_INCREMENT,
nomeEquipamento VARCHAR(50) NOT NULL UNIQUE,  
qtd INT NOT NULL,
valorHora DECIMAL(10,2) NOT NULL
);
 
CREATE TABLE Aluguel (
idAluguel INT AUTO_INCREMENT PRIMARY KEY,
idCliente INT NOT NULL,
idFuncionario INT NOT NULL,
dataHoraRetirada DATETIME DEFAULT NOW(),
dataHoraDevolucao DATETIME,
valorApagar DECIMAL(10,2),
valorPago DECIMAL(10,2),
pago BIT,
formaPagamento VARCHAR(50),
qtVezes INT DEFAULT 1,
CONSTRAINT FK_Aluguel_Cliente 
FOREIGN KEY (idCliente) REFERENCES Cliente(idCliente),
CONSTRAINT FK_Aluguel_Funcionario 
FOREIGN KEY (idFuncionario) REFERENCES funcionario
(idFuncionario) 
);
 
CREATE TABLE AluguelEquipamento(
idAluguelEquipamento INT PRIMARY KEY AUTO_INCREMENT,
idEquipamento INT NOT NULL,
idAluguel INT NOT NULL,
valorItem DECIMAL(10,2) NOT NULL,
valorUnitario DECIMAL(10,2) NOT NULL,
qtd INT DEFAULT 1,
FOREIGN KEY (idEquipamento) 
REFERENCES equipamento(idEquipamento),
FOREIGN KEY (idAluguel) 
REFERENCES aluguel(idAluguel)
);