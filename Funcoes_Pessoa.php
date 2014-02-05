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

require_once('CONSTANTES.php');

error_reporting(E_PARSE | E_ERROR);

/**
 * Esta função é responsável por realizar a autenticação da pessoa. Ela será
 * invocada no momento do login, e deve certificar que o usuário informado é
 * válido e sua senha está correta. O valor de retorno deverá ser booleano
 * igual a TRUE caso a autenticação seja bem sucedida e FALSE em caso contrário.
 * @param string $Usuario
 * @param string $Senha
 * @return boolean
 */
function AutenticaPessoa($Usuario, $Senha) {
        return true;
	#$Usuario = str_pad($Usuario, 8, '0', STR_PAD_LEFT);
        ldap_set_option(NULL, LDAP_OPT_DEBUG_LEVEL, 7);
	$ldapconn = ldap_connect(SERVIDOR_LDAP, PORTA_LDAP)or die("Não foi possível conectar com a redechesf(LDAP).<br>");
        
	if (!$ldapconn) {
	//return "Erro ao estabelecer conexão com o LDAP";
            echo 'Erro ao conectar ao servidor de domínio<br>';
	return FALSE;
	}
        
        $retorno = ldap_bind($ldapconn, "$Usuario".SUFIXO_RDN_LOGIN, $Senha);
         echo("Mensagem de erro do servidor de domínio:'".ldap_error($retorno)."'</br>");

	return $retorno;
}

/**
 * Esta função realiza a homologação dos dados de uma pessoa no sistema. Ela
 * receberá todos os dados da pessoa armazenados no sistema (Nome, CPF, Registro
 * geral, E-Mail, etc.) em um vetor, e deverá verificar se esses dados estão
 * corretos de acordo com a base institucional. O valor de retorno será um
 * string, e deverá ser NULL quando a homologação for bem sucedida; em caso
 * contrário, a função deverá retornar a mensagem de erro que será exibida
 * para o gerente de sistemas no momento da homologação. Não há restrições
 * para a mensagem, porém recomenda-se que ela seja explícita e auto-explicativa.
 * O vetor $DadosPessoa tem, por default, os seguintes índices:
 *  codpessoaeleicao: o código de uso interno do sistema
 *  identificacaousuario: um código de identificação definido pela instituição
 *  nomepessoa: o nome da pessoa, como registrado no sistema
 *  cpf: o cpf, armazenado como número - isto é, sem zeros à esquerda, pontos e traços
 *  nrregistrogeral: o número da carteira de identidade
 *  localtrabalho: o nome do local de trabalho do usuário; pode ser vazio
 *  pessoaautenticada: um caracter S ou N, que diz que a pessoa está homologada
 *  gerentesistema: um caracter S ou N que indica se a pessoa é gerente do sistema
 *  solicitante: um caracter S ou N que indica se a pessoa pode solicitar eleições
 * @param array $DadosPessoa
 * @return string
 */
function HomologaPessoa($DadosPessoa) {
	return null;
} ?>