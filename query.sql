SET @var1 = 'Software'; #tipo chamado
SET @var2 = 'titulo'; #palavra
SET @var3 = 1;
SELECT nome, titulo, setor 
FROM chamado 
WHERE tipoChamado = @var1 
    AND titulo = @var2 
    AND dataChamado BETWEEN '2023-01-01' AND '2023-12-31'

UNION 

SELECT nome, titulo, tipo 
FROM chamado
WHERE id = @var3
    AND dataChamado BETWEEN '2023-01-01' AND '2023-12-31';


---------------------------------------------------------------
SET @codChamado = 1;
SET @tipoChamado = 'Hardware';
SET @palavra = 'titulo';

SELECT titulo, tipo, prioridade, descricao, status, atendente, data, criadoDataHora
FROM chamado
WHERE (tipo = @tipoChamado AND titulo = 'titulo' AND data BETWEEN '2023-01-01' AND '2023-12-31') 
    	OR (id = @codChamado AND data BETWEEN '2023-01-01' AND '2023-12-31')
    	OR (data BETWEEN '2023-01-01' AND '2023-12-31');

