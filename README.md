# Gerador-de-Assinatura
Para utilizar basta, ativar o modulo GD do PHP e criar uma pasta "imgs" e dentro dela adicionar a sua assinatura modelo com o nome "empty.png", ela que será usada como base para a assinatura gerada e outra imagem "example.png", que será exibida inicialmente como exemplo da assinatura.

## PHP GD
Versões mais recentes do PHP vem com a extensão gd2, você precisa remover o '2' e descomentar essa extensão. Exemplo abaixo:

--Original--
;extension=gd2

--Como deve ficar--
extension=gd
