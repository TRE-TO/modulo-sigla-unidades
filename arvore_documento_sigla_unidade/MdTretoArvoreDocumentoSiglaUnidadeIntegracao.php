<?
/**
 * TRIBUNAL REGIONAL ELEITORAL DO TOCANTINS
 *
 * 27/03/2017 - criado por alexandre.oliveira@tre-to.jus.br
 *
 */
class MdTretoArvoreDocumentoSiglaUnidadeIntegracao extends SeiIntegracao{

  public function getNome(){
    return 'Módulo que mostra a Sigla das unidades na árvore de documentos do SEI ';
  }

  public function getVersao() {
    return '1.0.0';
  }

  public function getInstituicao(){
    return 'TRE-TO - Tribunal Regional Eleitoral do Tocantins';
  }


  public function montarIconeDocumento(ProcedimentoAPI $objProcedimentoAPI, $arrObjDocumentoAPI){
    $arrIcones = array();

        $diretorio=dirname(__FILE__);
        $nome_sessao="md_treto_arvore_documento_sigla_unidade_lista_arquivos";
        $listaArquivos= isset($_SESSION[$nome_sessao]) ? $_SESSION[$nome_sessao] :  scandir($diretorio."/unidades");


     if ($objProcedimentoAPI->getCodigoAcesso() > 0) {
        foreach ($arrObjDocumentoAPI as $objDocumentoAPI) {


        $dblIdDocumento = $objDocumentoAPI->getIdDocumento();
        $objArvoreAcaoItemAPI = new ArvoreAcaoItemAPI();
        $objArvoreAcaoItemAPI->setIdPai($dblIdDocumento);
        $objArvoreAcaoItemAPI->setIcone('modulos/treto/arvore_documento_sigla_unidade/unidades/'.$objDocumentoAPI->getIdUnidadeGeradora().".svg");


        $iconeProcurado=$objDocumentoAPI->getIdUnidadeGeradora().".svg";
        if(!array_search($iconeProcurado,$listaArquivos)){

            $objUnidadeDTO=new UnidadeDTO();
            $objUnidadeDTO->setNumIdUnidade($objDocumentoAPI->getIdUnidadeGeradora());
            $objUnidadeDTO->retStrSigla();

            $objUnidadeRN = new UnidadeRN();
            $objUnidade=$objUnidadeRN->consultarRN0125($objUnidadeDTO);
            if($objUnidade!=NULL){
                $file=file($diretorio."/unidades/modelo.svg");
                $svg=$file[0];
                $svg=str_replace('SIGLA_DA_UNIDADE',utf8_encode($objUnidade->getStrSigla()),($svg));
                $fp=fopen($diretorio."/unidades/".$objDocumentoAPI->getIdUnidadeGeradora().".svg","w+");
                fwrite($fp,$svg);
                fclose($fp);

            }

        }

        $objArvoreAcaoItemAPI->setHref('javascript:void(0);');
        $objArvoreAcaoItemAPI->setSinHabilitado('N');

        $arrIcones[$dblIdDocumento][] = $objArvoreAcaoItemAPI;
        }
     }
     return $arrIcones;
  }

}

?>