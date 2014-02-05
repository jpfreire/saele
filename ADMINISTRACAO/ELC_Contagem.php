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

require_once('../CABECALHO.PHP');

$Controlador = Controlador::instancia();
$Pessoa = $Controlador->recuperaPessoaLogada();

if(!$Pessoa->eGerenteSistema()) {
  echo "<html><head><meta charset=\"utf-8\"></head><body>\n";
  echo "<div align=\"center\">\n";
  echo "<br><font size=\"2\" face=\"verdana\">Erro! O usuário não tem permissão para acessar esta página.<br><br>\n";
  echo "<a href=\"javascript: history.back();\">Voltar</a></font>\n";
  echo "</div>";
  echo "</body></html>";
  exit;
}

$Concurso = new ConcursoEleitoral($_GET['CodConcurso']);
$Concurso->realizaContagemVotos();

MostraCabecalho("Contagem dos Votos");
?>

<div align="center">
  <font size="2" face="verdana">
    A contagem dos votos foi concluída.<br /><br />

    <a href="ELC_Cadastro_Concursos.php">Voltar</a>
  </font>
</div>

</body>
</html>