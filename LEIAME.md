Módulo Sigla Unidades Árvore SEI
================================

0. Versão do SEI

Este módulo é para o SEI 3.0 ou superior.

1. Motivação

A árvore de documentos do SEI mostra as Unidades somente quando os documentos não possuem numeração, por conta disto, em alguns casos, os usuários tinham dificuldade de localizar um documento. Com o presente módulo um ícone é gerado, com a sigla da Unidade que criou o documento, permitindo sua fácil identificação

2. Instalação

2.1 copiar o diretório arvore_documento_sigla_unidade para /opt/sei/web/modulos/treto/;
2.2 acrescentar a seguinte linha no arquivo ConfiguracaoSEI.php, dentro do Array('SEI'):
    'Modulos' => array( 'MdTretoArvoreDocumentoSiglaUnidadeIntegracao' => 'treto/arvore_documento_sigla_unidade' ),
Caso você já tenha módulos instalados acrescetne apenas a seguinte linha no Array Modulos:
    'MdTretoArvoreDocumentoSiglaUnidadeIntegracao' => 'treto/arvore_documento_sigla_unidade'
2.3 verificar se a permissão do subdiretório unidades está com escrita:
$ chmod -R 0474 /opt/sei/web/modulos/treto/arvore_documento_sigla_unidade/unidades
2.4 testar o módulo

3. Customizações

O ícone padrão tem o tamanho de 70 x 16, caso você precise aumentar ou diminuir a largura, faça alteração no arquivo modelo.svg.

Qualquer alteração no arquivo modelo.svg deverá ser seguido da exclusão dos demais arquivos .svg, para que a alteração tenha efeito.

4. Dúvidas e Sugestões

Entrar em contato com o TRE-TO, no email cds@tre-to.jus.br
