<?php
/*
Copyright 2011 da UFRGS - Universidade Federal do Rio Grande do Sul

Este arquivo é parte do programa SAELE - Sistema Aberto de Eleições Eletrônicas.

O SAELE é um software livre; você pode redistribuí-lo e/ou modificá-lo dentro dos
termos da Licença Pública Geral GNU como publicada pela Fundação do Software Livre
(FSF); na versão 2 da Licença.

Este programa é distribuído na esperança que possa ser útil, mas SEM NENHUMA GARANTIA;
sem uma garantia implícita de ADEQUAÇÃO a qualquer MERCADO ou APLICAÇÃO EM PARTICULAR.
Veja a Licença Pública Geral GNU/GPL em português para maiores detalhes.

Você deve ter recebido uma cópia da Licença Pública Geral GNU, sob o título "LICENCA.txt",
junto com este programa, se não, acesse o Portal do Software Público Brasileiro no
endereço www.softwarepublico.gov.br ou escreva para a Fundação do Software Livre(FSF)
Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301, USA
*/

class EleicaoSolicitacao extends Entidade {
    protected $NomeTabela = "eleicoes.eleicaosolicitacao";
    protected $VetorChaves = array(
        "nrseqsolicitacaoconcurso"  => array(Tipo => numero, Tamanho => 6, Foreign => true, Classe => "SolicitacaoConcurso"),
        "nrseqeleicao"              => array(Tipo => numero, Tamanho => 6, Foreign => false)
    );
    protected $VetorCampos = array(
        "descricao" => array(Nome => "Descrição", Tipo => texto, Tamanho => 120, Obrigatorio => true)
    );
}
?>
