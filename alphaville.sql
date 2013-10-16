-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 16-Out-2013 às 16:10
-- Versão do servidor: 5.1.66-0+squeeze1-log
-- versão do PHP: 5.3.3-7+squeeze17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `alphaville_brasilia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id`, `image`, `link`) VALUES
(1, '1377111428.jpg', 'http://www.google.com.br'),
(2, '1377111449.jpg', 'http://www.globo.com'),
(3, '1377111464.jpg', 'http://www.terra.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bibliotecas`
--

CREATE TABLE IF NOT EXISTS `bibliotecas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('documentos_ref','publicacoes') COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `archive` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `bibliotecas`
--

INSERT INTO `bibliotecas` (`id`, `type`, `title`, `image`, `archive`) VALUES
(3, 'publicacoes', 'Cartilha2', '1377199468.jpg', '1377199481.pdf'),
(6, 'publicacoes', 'Teste', '1377199658.jpg', '1377199658.pdf'),
(7, 'publicacoes', 'Teste', '1377203014.jpeg', '1377203014.pdf'),
(8, 'documentos_ref', 'Teste', '1379359911.jpg', '1379359990.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=49 ;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `parent_id`, `lft`, `rght`) VALUES
(1, 'Desenvolvimento Social', 'desenvolvimento-social', NULL, 1, 20),
(2, 'Infraestrutura Urbana', 'infraestrutura-urbana', NULL, 21, 42),
(3, 'Socioeconomia', 'socioeconomia', NULL, 43, 74),
(4, 'Meio Ambiente', 'meio-ambiente-conservacao-e-uso-dos-recursos-naturais', NULL, 75, 90),
(5, 'EducaÃ§Ã£o', '', 1, 2, 7),
(6, 'SaÃºde', '', 1, 8, 11),
(7, 'SeguranÃ§a', '', 1, 12, 19),
(8, 'Abastecimento de ÃÂgua', '', 2, 22, 23),
(9, 'Esgotamento SanitÃ¡rio', '', 2, 24, 25),
(10, 'ResÃ­duos SÃ³lidos', '', 2, 26, 27),
(11, 'Transporte e Mobilidade Urbana', '', 2, 28, 33),
(12, 'Energia ElÃ©trica', 'energia-eletrica', 2, 34, 39),
(13, 'HabitaÃ§Ã£o', 'habitacao', 2, 40, 41),
(14, 'Trabalho, emprego e renda', '', 3, 44, 51),
(15, 'FinanÃ§as PolÃ­ticas', '', 3, 52, 57),
(16, 'ComÃ©rcios e ServiÃ§os', '', 3, 58, 61),
(17, 'Economia local', '', 3, 62, 65),
(18, 'Cultura, esporte e lazer', '', 3, 66, 73),
(19, 'Uso e ocupaÃ§Ã£o do solo', '', 4, 76, 81),
(20, 'Fauna e Flora', '', 4, 82, 83),
(21, 'Ãgua', '', 4, 84, 85),
(22, 'Ar e clima', '', 4, 86, 87),
(23, 'ResÃ­duo e Esgoto', '', 4, 88, 89),
(24, 'Acesso Ã Â  educaÃ§Ã£o', '', 5, 3, 4),
(25, 'Qualidade do ensino', '', 5, 5, 6),
(26, 'SaÃºde da populaÃ§Ã£o', '', 6, 9, 10),
(27, 'Criminalidade', '', 7, 13, 14),
(28, 'Drogas', '', 7, 15, 16),
(29, 'TrÃ¢nsito', '', 7, 17, 18),
(33, 'Infraestrutura de Transporte', '', 11, 29, 30),
(34, 'Infraestrutura Urbana', '', 11, 31, 32),
(35, 'Acesso Ã  energia', '', 12, 35, 36),
(36, 'Qualidade da Energia', '', 12, 37, 38),
(37, 'Trabalho e emprego', '', 14, 45, 46),
(38, 'FormaÃ§Ã£o Profissional', '', 14, 47, 48),
(39, 'Renda', '', 14, 49, 50),
(40, 'Fontes de Usos de Recursos PÃºblicos', '', 15, 53, 54),
(41, 'TransparÃªncia nas contas pÃºblicas', '', 15, 55, 56),
(42, 'Empreendimentos', '', 16, 59, 60),
(43, 'Custo de Vida', '', 17, 63, 64),
(44, 'ManifestaÃ§Ãµes culturais', '', 18, 67, 68),
(45, 'Ãreas de lazer', '', 18, 69, 70),
(46, 'PatrimÃ´nio cultural', '', 18, 71, 72),
(47, 'Cobertura e Uso do Solo', '', 19, 77, 78),
(48, 'Conflitos Socioambientais', '', 19, 79, 80);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filters`
--

CREATE TABLE IF NOT EXISTS `filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `filters`
--

INSERT INTO `filters` (`id`, `title`) VALUES
(6, 'Computador'),
(4, 'Geladeira ou Freezer'),
(3, 'IluminaÃ§Ã£o ElÃ©trica'),
(2, 'Meta'),
(1, 'NÂº de CrianÃ§as'),
(5, 'TelevisÃ£o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `pages`
--

INSERT INTO `pages` (`id`, `slug`, `title`, `text`) VALUES
(1, 'project', 'O Projeto', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &lsquo;Content here, content here&rsquo;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &lsquo;lorem ipsum&rsquo; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>\r\n<p><img style="float: left; margin: 0px 20px 10px 0px;" src="http://192.168.0.1/0Desenv/indicadoresalphaville.com.br/cake/uploads/upload/1380043660.jpg" alt="" /></p>'),
(2, 'indicators', 'Os indicadores', '<p class="destaque">Sobre as Informa&ccedil;&otilde;es</p>\r\n<ul>\r\n<li>&bull; Sempre que poss&iacute;vel, coletamos informa&ccedil;&otilde;es desde o ano 2000. Quando n&atilde;o conseguimos, apresentamos os dados a partir do ano dispon&iacute;vel.</li>\r\n<li>&bull; Alguns dados apresentados s&atilde;o coletados apenas de dez em dez anos, como &eacute; o caso das informa&ccedil;&otilde;es do Censo Demogr&aacute;fico do Instituto Brasileiro de Geografia e Estat&iacute;stica (IBGE) e do Atlas de Desenvolvimento Humano do Brasil. Nesses casos, apresentamos os dados de 1991 e 2000 - datas dos &uacute;ltimos censos - para poder &ldquo;contar uma hist&oacute;ria&rdquo; daquela informa&ccedil;&atilde;o.</li>\r\n<li>&bull; Para os casos em que n&atilde;o conseguimos obter dados sistematizados, apresentamos as informa&ccedil;&otilde;es dispon&iacute;veis, com o objetivo de fomentar a discuss&atilde;o e incentivar a organiza&ccedil;&atilde;o e coleta de dados no futuro.</li>\r\n<li>&bull; Muitos dados &ldquo;oficiais&rdquo;, ou seja, coletados por institui&ccedil;&otilde;es ou &oacute;rg&atilde;os p&uacute;blicos nacionais, foram obtidos a partir de seus sites na internet. Algumas vezes, essas informa&ccedil;&otilde;es estavam desencontradas. Outras vezes, os dados sofrem cont&iacute;nuas altera&ccedil;&otilde;es e corre&ccedil;&otilde;es, e aqui apresentamos os dados obtidos at&eacute; o fechamento da publica&ccedil;&atilde;o.</li>\r\n<li>&bull; Quando tentamos obter uma informa&ccedil;&atilde;o junto a uma institui&ccedil;&atilde;o e n&atilde;o conseguimos, deixamos o dado como &ldquo;n/d&rdquo;, ou seja, &ldquo;n&atilde;o dispon&iacute;vel&rdquo;.</li>\r\n</ul>\r\n<p class="destaque">Como ler os gr&aacute;ficos</p>\r\n<p>Gr&aacute;ficos nos ajudam a enxergar quantidades ou acompanhar determinadas atividades ao longo do tempo. Conhe&ccedil;a os principais tipos de gr&aacute;ficos.</p>\r\n<p><strong>Barras</strong></p>\r\n<p>Gr&aacute;ficos de barras s&atilde;o bons para comparar quantidades. O comprimento da barra indica a quantidade, por isso uma barra maior indica maior quantidade.</p>\r\n<p><img src="http://192.168.0.1/0Desenv/indicadoresalphaville.com.br/cake/uploads/upload/1380043509.jpg" alt="" /></p>\r\n<p><strong>Linhas</strong></p>\r\n<p>Gr&aacute;ficos de linhas nos ajudam a ver como quantidades evoluem no tempo. Se a linha sobe, isso indica que a quantidade aumenta. Se a linha desce, &eacute; sinal de que a quantidade diminui naquele per&iacute;odo.</p>\r\n<p><img src="http://192.168.0.1/0Desenv/indicadoresalphaville.com.br/cake/uploads/upload/1380043581.jpg" alt="" /></p>\r\n<p><strong>Torta ou pizza</strong></p>\r\n<p>Gr&aacute;ficos de torta ou pizza s&atilde;o bons para mostrar partes de um todo, por isso usamos eles quando lidamos com n&uacute;meros de porcentagem.</p>\r\n<p><img src="http://192.168.0.1/0Desenv/indicadoresalphaville.com.br/cake/uploads/upload/1380043588.jpg" alt="" /></p>\r\n<p class="destaque">Como usar os Indicadores</p>\r\n<p>Todo o trabalho para a constru&ccedil;&atilde;o dos Indicadores de Juruti foi muito prazeroso, desafiante e enriquecedor para a equipe da Funda&ccedil;&atilde;o Getulio Vargas. Muita gente participou, aprendemos muito e conseguimos reunir informa&ccedil;&otilde;es ricas e interessantes sobre o munic&iacute;pio. Mas este trabalho s&oacute; ser&aacute; um sucesso se ele for &uacute;til para a popula&ccedil;&atilde;o de Juruti. Se estas informa&ccedil;&otilde;es ficarem guardadas, sem uso, o trabalho n&atilde;o foi t&atilde;o bom assim. Ele precisa ser como uma ferramenta, que a gente cuida, melhora, afia, para sempre nos servir!</p>\r\n<p><strong>Converse com o livro em m&atilde;os</strong></p>\r\n<ul>\r\n<li>&bull; Converse com seu vizinho, discuta com seu Agente Comunit&aacute;rio de Sa&uacute;de, re&uacute;na lideran&ccedil;as da sua comunidade!</li>\r\n<li>&bull; Participe dos conselhos municipais ou procure conselheiros e leve os assuntos que voc&ecirc; acha importante - para o desenvolvimento de seu munic&iacute;pio - para a discuss&atilde;o coletiva!</li>\r\n<li>&bull; Procure a prefeitura, os &oacute;rg&atilde;os do governo e as empresas para tratar dos assuntos que voc&ecirc; acha importante, para juntos enfrentarem os desafios e encontrarem solu&ccedil;&otilde;es!</li>\r\n</ul>\r\n<p><strong>Melhore os Indicadores de Juriti</strong></p>\r\n<ul>\r\n<li>&bull; Pense em como voc&ecirc; pode melhorar as informa&ccedil;&otilde;es que organizamos aqui, e tamb&eacute;m encontrar as que est&atilde;o faltando!</li>\r\n<li>&bull; Envolva-se com institui&ccedil;&otilde;es locais que forneceram informa&ccedil;&otilde;es para os Indicadores de Juruti e discuta como elas podem melhorar a organiza&ccedil;&atilde;o dos dados e como podem se envolver na manuten&ccedil;&atilde;o dos indicadores ao longo dos anos!</li>\r\n</ul>\r\n<p><strong>Acesse o Sistema na Internet</strong></p>\r\n<p>Os Indicadores de Juruti tamb&eacute;m est&atilde;o dispon&iacute;veis para qualquer interessado na Internet! Entre no site <a title="">www.fgv.br/ces/juruti/sistema.</a></p>\r\n<p><strong>Fale com a gente</strong></p>\r\n<ul>\r\n<li>&bull; A Funda&ccedil;&atilde;o Getulio Vargas trabalhou dois anos para entregar a Juruti esta publica&ccedil;&atilde;o e o sistema na internet comos Indicadores de Juruti. Nosso trabalho vai at&eacute; aqui. Mas estamos &agrave; disposi&ccedil;&atilde;o para ouvir cr&iacute;ticas, sugest&otilde;es e tamb&eacute;m tirar d&uacute;vidas de quem quiser saber mais sobre o processo de trabalho e sobre a ferramenta.</li>\r\n</ul>\r\n<p class="destaque">Fontes de Informa&ccedil;&atilde;o</p>\r\n<table class="tablePgIndicadores">\r\n<tbody>\r\n<tr>\r\n<td>ACEJ</td>\r\n<td><a>Associa&ccedil;&atilde;o Comercial e Empresarial de Juruti (ACEJ)</a></td>\r\n</tr>\r\n<tr>\r\n<td>ADEPAR&Aacute;</td>\r\n<td>Ag&ecirc;ncia de Defesa Agropecu&aacute;ria do Estado do Par&aacute; (ADEPAR&Aacute;)</td>\r\n</tr>\r\n<tr>\r\n<td>Alcoa</td>\r\n<td>Alcoa</td>\r\n</tr>\r\n<tr>\r\n<td>AMTJU</td>\r\n<td>Associa&ccedil;&atilde;o das Mulheres Trabalhadoras de Juruti (AMTJU)</td>\r\n</tr>\r\n<tr>\r\n<td>ANATEL</td>\r\n<td>Ag&ecirc;ncia Nacional de Telecomunica&ccedil;&otilde;es (ANATEL)</td>\r\n</tr>\r\n<tr>\r\n<td>ANEEL</td>\r\n<td>Ag&ecirc;ncia Nacional de Energia El&eacute;trica (ANEEL)</td>\r\n</tr>\r\n</tbody>\r\n</table>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fonte` text COLLATE utf8_unicode_ci NOT NULL,
  `nota` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=66 ;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `slug`, `fonte`, `nota`) VALUES
(1, 24, 'MatrÃ­culas por rede e grau de ensino', '', '2011 - STTR', 'EspÃ©cies em extinÃ§Ã£o de acordo com EIA/RIMA Juruti - CNEC Engenharia (Dezembro/2004).\r\n\r\n2011 - QuestionÃ¡rio aplicado pelos delegados do STTR a 46 comunidades rurais de Juruti (Setembro/2011). Pergunta aplicada: "A comunidade viu algum destes animais no Ãºltimo ano?"'),
(2, 24, 'MatrÃ­culas em curso superior', '', '', ''),
(3, 25, 'Taxa de reprovaÃ§Ã£o por grau de ensino', '', '', ''),
(4, 25, 'Taxa de abandono por grau de ensino', '', '', ''),
(5, 25, 'Taxa de alfabetizaÃ§Ã£o', '', '', ''),
(6, 25, 'NÃºmero mÃ©dio de alunos por turma', '', '', ''),
(7, 25, 'NÃºmero de professores por nÃ­vel de formaÃ§Ã£o', '', '', ''),
(8, 25, 'NÃºmero de escolas por nÃ­vel de formaÃ§Ã£o', '', '', ''),
(9, 26, 'DoenÃ§as e fatores de risco', '', '', ''),
(10, 26, 'Expectativa de vida', '', '', ''),
(11, 26, 'AssistÃªncia Ã  populaÃ§Ã£o', '', '', ''),
(12, 26, 'Profissionais da saÃºde', '', '', ''),
(13, 26, 'Unidades e veÃ­culos de saÃºde', '', '', ''),
(14, 27, 'OcorrÃªncias policiais', '', '', ''),
(15, 28, 'OcorrÃªncias relacionadas a entorpecentes', '', '', ''),
(16, 29, 'Registros de Acidentes de trÃ¢nsito', '', '', ''),
(17, 8, 'NÃºmero de domicÃ­lios e populaÃ§Ã£o de abastecidos com Ã¡gua', '', '', ''),
(18, 8, 'Macro estrutura de abastecimento de Ã¡gua potÃ¡vel', 'macro-estrutura-de-abastecimento-de-agua-potavel', '', ''),
(19, 9, 'NÃºmero de domicÃ­lios e populaÃ§Ã£o com coleta de esgotos', '', '', ''),
(20, 9, 'Macro estrutura de esgotos sanitÃ¡rios (rede de coleta, tratamento e lanÃ§amento final do corpo receptor)', '', '', ''),
(21, 10, 'NÃºmero de domicÃ­lios e populaÃ§Ã£o segundo o destino final dos resÃ­duos domÃ©sticos', '', '', ''),
(22, 33, 'ExtensÃ£o das estradas', '', '', ''),
(23, 33, 'NÃºmero de linhas com acesso a comunidades urbanas e rurais', '', '', ''),
(24, 34, 'ExtensÃ£o (m) de calÃ§ada conforme as determinaÃ§Ãµes', '', '', ''),
(25, 34, 'ExtensÃ£o (m) de infraestrutura cicloviÃ¡ria', '', '', ''),
(26, 34, 'ExtensÃ£o (m) de vias ou faixas exclusivas para onibus ou automÃ³veis', '', '', ''),
(27, 35, 'DomicÃ­lios com acesso a iluminaÃ§Ã£o elÃ©trica e bens durÃ¡veis', 'domicilios-com-acesso-a-iluminacao-eletrica-e-bens-duraveis', '1991 a 2010 - IBGE - Censo', ''),
(28, 35, 'NÃºmero de ruas com iluminaÃ§Ã£o pÃºblica', '', '', ''),
(29, 35, 'NÃºmero de domicÃ­lios e populaÃ§Ã£o de abastecidos por energia elÃ©trica', '', '', ''),
(30, 36, 'InterrupÃ§Ãµes no fornececimento de energia elÃ©trica', '', '', ''),
(31, 13, 'Unidades Habitacionais', '', '', ''),
(32, 13, 'PolÃ­ticas Habitacionais', '', '', ''),
(33, 13, 'Acesso Ã  moradia', '', '', ''),
(34, 37, 'Pessoas ocupadas por tipo de ocupaÃ§Ã£o e setor de atividade', '', '', ''),
(35, 38, 'MatrÃ­culas em cursos profissionais', '', '', ''),
(36, 39, 'Renda per capita', '', '', ''),
(37, 39, 'Renda mÃ©dia mensal por casa', '', '', ''),
(38, 39, 'Renda mÃ©dia mensal do trabalhador', '', '', ''),
(39, 15, 'Receitas', '', '2002 a 2004 - Secretaria do Tesouro Nacional\r\n\r\n2005 a 2010 - Sec. Mun. FinanÃ§as', 'Para Juruti: Receitas prÃ³prias corresponde a soma de: receita tributÃ¡ria, receitas de contribuiÃ§Ãµes, receitas patrimoniais, receitas de serviÃ§os e outras receitas. TransferÃªcias corresponde a soma de: transferÃªncias correntes, transferÃªncias de capital e deduÃ§Ã£o de transferÃªncias correntes. Para OriximinÃ¡, Ã“bidos e SantarÃ©m: Receitas totais corresponde Ã s receitas orÃ§amentÃ¡rias do Tesouro Nacional. '),
(40, 40, 'Despesas', '', '', ''),
(41, 41, 'Canais de prestaÃ§Ã£o de contas', '', '', ''),
(42, 42, 'Quantidade de associados com associaÃ§Ã£o comercial', '', '', ''),
(43, 42, 'AlvarÃ¡s de funcionamento', '', '', ''),
(44, 43, 'MÃ©dia de preÃ§os de produtos e serviÃ§os e cesta bÃ¡sica local', '', '', ''),
(45, 44, 'PercepÃ§Ã£o sobre costumes tradicionais nas comunidades rurais', '', '', ''),
(46, 45, 'Equipamentos culturais e esportivos', '', '', ''),
(47, 46, 'SÃ­tios arqueolÃ³gicos', '', '', ''),
(48, 46, 'Programa de valorizaÃ§Ã£o do patrimÃ´nio histÃ³rico e arqueolÃ³gico', '', '', ''),
(49, 47, 'Ãrea Desmatada', '', '', ''),
(50, 47, 'Cobertura e Uso do Solo por tipo', '', '', ''),
(51, 48, 'Conflitos no Uso e OcupaÃ§Ã£o da Terra e Mecanismos de ResoluÃ§Ã£o', '', '', ''),
(52, 20, 'PercepÃ§Ã£o sobre a ocorrÃªncia de fauna', '', '', ''),
(53, 20, 'Levantamento de fauna', '', '', ''),
(54, 20, 'PercepÃ§Ã£o sobre o uso da flora', '', '', ''),
(55, 20, 'Levantamento da flora (spp)', '', '', ''),
(56, 20, 'Programa de uso sustentÃ¡vel da flora', '', '', ''),
(57, 21, 'Abastecimento pÃºblico (vol)', '', '', ''),
(58, 21, 'Acesso a Ã¡gua tratada', '', '', ''),
(59, 21, 'Qualidade da Ã¡gua', '', '', ''),
(60, 22, 'Qualidade do ar', '', '', ''),
(61, 23, 'DestinaÃ§Ã£o final', 'destinacao-final', 'Teste', 'Teste'),
(62, 4, 'Volume de esgoto tratado na Ã¡rea urbana', '', '', ''),
(63, 23, 'DomicÃ­lios com rede de esgotos', '', '', ''),
(64, 23, 'Frequencia da coleta de resÃ­duo', '', '', ''),
(65, 0, 'Quantidade de resÃ­duos produzido na Ã¡rea urbana, por fonte e destinaÃ§Ã£o', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_filters`
--

CREATE TABLE IF NOT EXISTS `posts_filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`,`filter_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=75 ;

--
-- Extraindo dados da tabela `posts_filters`
--

INSERT INTO `posts_filters` (`id`, `post_id`, `filter_id`) VALUES
(73, 27, 1),
(72, 27, 3),
(71, 27, 4),
(74, 27, 5),
(70, 27, 6),
(18, 39, 1),
(17, 39, 2),
(16, 39, 3),
(15, 39, 4),
(14, 39, 6),
(38, 61, 6),
(12, 62, 2),
(11, 62, 4),
(13, 62, 5),
(21, 65, 1),
(20, 65, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_years`
--

CREATE TABLE IF NOT EXISTS `posts_years` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`,`year_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=86 ;

--
-- Extraindo dados da tabela `posts_years`
--

INSERT INTO `posts_years` (`id`, `post_id`, `year_id`) VALUES
(80, 27, 1),
(81, 27, 11),
(82, 27, 21),
(83, 27, 22),
(84, 27, 23),
(85, 27, 24),
(17, 39, 1),
(18, 39, 2),
(16, 39, 6),
(39, 61, 1),
(40, 61, 2),
(38, 61, 6),
(14, 62, 1),
(15, 62, 2),
(13, 62, 6),
(22, 65, 1),
(23, 65, 2),
(24, 65, 3),
(25, 65, 4),
(20, 65, 5),
(21, 65, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_zones`
--

CREATE TABLE IF NOT EXISTS `posts_zones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`,`zone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Extraindo dados da tabela `posts_zones`
--

INSERT INTO `posts_zones` (`id`, `post_id`, `zone_id`) VALUES
(32, 27, 1),
(33, 27, 2),
(6, 39, 1),
(17, 61, 1),
(5, 62, 1),
(8, 65, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category` (`post_id`,`order`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `records`
--

INSERT INTO `records` (`id`, `title`, `text`, `post_id`, `order`) VALUES
(1, 'DescriÃ§Ã£o', '<p><strong>Apresenta o n&uacute;mero de domic&iacute;lios</strong>, em porcentagem, que t&ecirc;m acesso &agrave; energia el&eacute;trica e a bens dur&aacute;veis (geladeira ou freezer, televis&atilde;o e computador).</p>', 27, 1),
(2, 'Justificativa', 'O fornecimento de energia Ã© um dos serviÃ§os bÃ¡sicos de responsabilidade pÃºblica.  Alguns estudos associam o acesso Ã  energia a um maior desenvolvimento local. O acesso Ã  energia elÃ©trica possibilita o consumo de produtos como eletrodomÃ©sticos, aparelhos eletrÃ´nicos, entre outros, que podem prestar-se como uma ferramenta na busca de uma fonte de renda para a populaÃ§Ã£o.', 27, 1),
(3, 'Como coletar', 'No site do IBGE (www.ibge.gov.br), (1) na aba "Canais" e, na barra de ferramentas [Banco de Dados] (2) clicar em [SIDRA]. (3) Em "SeÃ§Ãµes", clicar em [DemogrÃ¡fico e Contagem]. (4) Em "DemogrÃ¡fico 2000", clicar em [Amostra - FamÃ­lias e DomicÃ­lios]. (5) Clicar na tabela 2408 [DomicÃ­lios particulares permanentes e Moradores em DomicÃ­lios particulares permanentes por situaÃ§Ã£o do domicÃ­lio e existÃªncia de serviÃ§os e bens durÃ¡veis]. (6) Em "VariÃ¡vel", selecionar "DomicÃ­lios particulares permanentes (Percentual)". (7) Em "SituaÃ§Ã£o do domicÃ­lio", selecionar "Total". (8) Em "ExistÃªncia de serviÃ§os e bens durÃ¡veis", selecionar os seguintes itens: "IluminaÃ§Ã£o elÃ©trica", "Geladeira ou freezer", "TelevisÃ£o" e "Microcomputador". Para obter o resultado das opÃ§Ãµes ao mesmo tempo, apertar a tecla "Control". (9) Por fim, em "MunicÃ­pio" selecionar o campo "Nome". (10) Em "Nome" escrever "Juruti". (11) Clicar em [OK].', 27, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '1',
  `active` enum('S','N') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `created`, `modified`, `role`, `active`) VALUES
(1, 'contacto', '365fbb79cf9f6d6800aa96b1668b8dfb8ad87a01', 'ContactoNET', 'email@contactonet.com', '2013-05-15 00:00:00', '2013-09-16 15:54:05', 1, 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `values`
--

CREATE TABLE IF NOT EXISTS `values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `filter_id` int(11) DEFAULT NULL,
  `year_id` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `zone_id` (`zone_id`,`filter_id`,`year_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=410 ;

--
-- Extraindo dados da tabela `values`
--

INSERT INTO `values` (`id`, `post_id`, `zone_id`, `filter_id`, `year_id`, `value`) VALUES
(25, 65, 1, 1, 1, '2'),
(26, 65, 1, 1, 2, '2'),
(27, 65, 1, 1, 3, '2'),
(28, 65, 1, 1, 4, '2'),
(29, 65, 1, 1, 5, '2'),
(30, 65, 1, 1, 6, '4'),
(31, 65, 1, 2, 1, '3'),
(32, 65, 1, 2, 2, '3'),
(33, 65, 1, 2, 3, '3'),
(34, 65, 1, 2, 4, '3'),
(35, 65, 1, 2, 5, '3'),
(36, 65, 1, 2, 6, '4'),
(37, 65, 1, 1, 1, '2'),
(38, 65, 1, 1, 2, '5'),
(39, 65, 1, 1, 3, '6'),
(40, 65, 1, 1, 4, '5'),
(41, 65, 1, 1, 5, '6'),
(42, 65, 1, 1, 6, '5'),
(43, 65, 1, 2, 1, '3'),
(44, 65, 1, 2, 2, '5'),
(45, 65, 1, 2, 3, '6'),
(46, 65, 1, 2, 4, '5'),
(47, 65, 1, 2, 5, '6'),
(48, 65, 1, 2, 6, '5'),
(121, 2, 2, 2, 2, '2'),
(146, 2, 2, 2, 2, '2'),
(171, 2, 2, 2, 2, '2'),
(196, 3, 3, 3, 3, '3'),
(197, 39, 1, 1, 1, '500'),
(198, 39, 1, 1, 2, '555'),
(199, 39, 1, 1, 6, '625'),
(200, 39, 1, 2, 1, '500'),
(201, 39, 1, 2, 2, '555'),
(202, 39, 1, 2, 6, '625'),
(203, 39, 1, 3, 1, '125'),
(204, 39, 1, 3, 2, '153'),
(205, 39, 1, 3, 6, '178'),
(206, 39, 1, 4, 1, '1'),
(207, 39, 1, 4, 2, '2'),
(208, 39, 1, 4, 6, '3'),
(209, 39, 1, 6, 1, '1'),
(210, 39, 1, 6, 2, '2'),
(211, 39, 1, 6, 6, '3'),
(212, 2, 2, 2, 2, '2'),
(237, 2, 2, 2, 2, '2'),
(288, 2, 2, 2, 2, '2'),
(349, 2, 2, 2, 2, '2'),
(350, 27, 1, 6, 1, '1'),
(351, 27, 1, 6, 11, '1'),
(352, 27, 1, 6, 21, '1'),
(353, 27, 1, 6, 22, '2'),
(354, 27, 1, 6, 23, '2'),
(355, 27, 1, 6, 24, ''),
(356, 27, 1, 4, 1, '2'),
(357, 27, 1, 4, 11, '3'),
(358, 27, 1, 4, 21, '4'),
(359, 27, 1, 4, 22, '3'),
(360, 27, 1, 4, 23, '4'),
(361, 27, 1, 4, 24, ''),
(362, 27, 1, 3, 1, '5'),
(363, 27, 1, 3, 11, '10'),
(364, 27, 1, 3, 21, '5'),
(365, 27, 1, 3, 22, '5'),
(366, 27, 1, 3, 23, '5'),
(367, 27, 1, 3, 24, ''),
(368, 27, 1, 1, 1, '10'),
(369, 27, 1, 1, 11, '20'),
(370, 27, 1, 1, 21, '30'),
(371, 27, 1, 1, 22, '35'),
(372, 27, 1, 1, 23, '40'),
(373, 27, 1, 1, 24, '45'),
(374, 27, 1, 5, 1, '7'),
(375, 27, 1, 5, 11, '8'),
(376, 27, 1, 5, 21, '2'),
(377, 27, 1, 5, 22, '8'),
(378, 27, 1, 5, 23, '10'),
(379, 27, 1, 5, 24, ''),
(380, 27, 2, 6, 1, '1'),
(381, 27, 2, 6, 11, '2'),
(382, 27, 2, 6, 21, '3'),
(383, 27, 2, 6, 22, '4'),
(384, 27, 2, 6, 23, '5'),
(385, 27, 2, 6, 24, '6'),
(386, 27, 2, 4, 1, '5'),
(387, 27, 2, 4, 11, '4'),
(388, 27, 2, 4, 21, '4'),
(389, 27, 2, 4, 22, '3'),
(390, 27, 2, 4, 23, '2'),
(391, 27, 2, 4, 24, '1'),
(392, 27, 2, 3, 1, '10'),
(393, 27, 2, 3, 11, '12'),
(394, 27, 2, 3, 21, '14'),
(395, 27, 2, 3, 22, '16'),
(396, 27, 2, 3, 23, '18'),
(397, 27, 2, 3, 24, '16'),
(398, 27, 2, 1, 1, '30'),
(399, 27, 2, 1, 11, '30'),
(400, 27, 2, 1, 21, '30'),
(401, 27, 2, 1, 22, '30'),
(402, 27, 2, 1, 23, '35'),
(403, 27, 2, 1, 24, '35'),
(404, 27, 2, 5, 1, '10'),
(405, 27, 2, 5, 11, '14'),
(406, 27, 2, 5, 21, '10'),
(407, 27, 2, 5, 22, '10'),
(408, 27, 2, 5, 23, '8'),
(409, 27, 2, 5, 24, '6');

-- --------------------------------------------------------

--
-- Estrutura da tabela `years`
--

CREATE TABLE IF NOT EXISTS `years` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `years`
--

INSERT INTO `years` (`id`, `title`) VALUES
(1, '1990'),
(2, '1991'),
(3, '1992'),
(4, '1993'),
(5, '1994'),
(6, '1995'),
(7, '1996'),
(8, '1997'),
(9, '1998'),
(10, '1999'),
(11, '2000'),
(12, '2001'),
(13, '2002'),
(14, '2003'),
(15, '2004'),
(16, '2005'),
(17, '2006'),
(18, '2007'),
(19, '2008'),
(20, '2009'),
(21, '2010'),
(22, '2011'),
(23, '2012'),
(24, '2013');

-- --------------------------------------------------------

--
-- Estrutura da tabela `zones`
--

CREATE TABLE IF NOT EXISTS `zones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `zones`
--

INSERT INTO `zones` (`id`, `title`) VALUES
(1, 'Juriti'),
(2, 'Cobertura Teste');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
