<p class="breadCrumbs block left"><a href="">Página inicial</a> » <strong>Os indicadores</strong></p>
<div class="headerInters block left">

    <div class="titPags block">
        <img src="img/icone-titPagIndicadores.jpg" alt="">
        <h2><?php echo $data['Page']['title']; ?></h2>
    </div>

    <ul>
        <li><a href="javascript:history.go(-1)" title="Voltar">Voltar</a></li>
        <li><a href="javascript:;" title="A+" id="aumenta_fonte">A+</a></li>
        <li><a href="javascript:;" title="A-" id="reduz_fonte">A-</a></li>
    </ul>
</div>

<div class="pgPadrao pagIndicadores block left">
    <?php echo $data['Page']['text']; ?>
    <!-- <p class="destaque">Sobre as Informações</p>
    <ul>
        <li>• Sempre que possível, coletamos informações desde o ano 2000. Quando não conseguimos, apresentamos os dados a partir do ano disponível.</li>
        <li>• Alguns dados apresentados são coletados apenas de dez em dez anos, como é o caso das informações do Censo Demográfico do Instituto Brasileiro de Geografia e Estatística (IBGE) e do Atlas de Desenvolvimento Humano do Brasil. Nesses casos, apresentamos os dados de 1991 e 2000 - datas dos últimos censos - para poder “contar uma história” daquela informação.</li>
        <li>• Para os casos em que não conseguimos obter dados sistematizados, apresentamos as informações disponíveis, com o objetivo de fomentar a discussão e incentivar a organização e coleta de dados no futuro.</li>
        <li>• Muitos dados “oficiais”, ou seja, coletados por instituições ou órgãos públicos nacionais, foram obtidos a partir de seus sites na internet. Algumas vezes, essas informações estavam desencontradas. Outras vezes, os dados sofrem contínuas alterações e correções, e aqui apresentamos os dados obtidos até o fechamento da publicação.</li>
        <li>• Quando tentamos obter uma informação junto a uma instituição e não conseguimos, deixamos o dado como “n/d”, ou seja, “não disponível”.</li>
    </ul>
    <p class="destaque">Como ler os gráficos</p>
    <p>Gráficos nos ajudam a enxergar quantidades ou acompanhar determinadas atividades ao longo do tempo. Conheça os principais tipos de gráficos.</p>
    <p><strong>Barras</strong></p>
    <p>Gráficos de barras são bons para comparar quantidades. O comprimento da barra indica a quantidade, por isso uma barra maior indica maior quantidade.</p>
    <img src="img/grafico-barra.jpg" class="margin-bottom20" alt="">

    <p><strong>Linhas</strong></p>
    <p>Gráficos de linhas nos ajudam a ver como quantidades evoluem no tempo. Se a linha sobe, isso indica que a quantidade aumenta. Se a linha desce, é sinal de que a quantidade diminui naquele período.</p>
    <img src="img/grafico-linhas.jpg" class="margin-bottom20" alt="">

    <p><strong>Torta ou pizza</strong></p>
    <p>Gráficos de torta ou pizza são bons para mostrar partes de um todo, por isso usamos eles quando lidamos com números de porcentagem.</p>
    <img src="img/grafico-pizza.jpg" class="margin-bottom20" alt="">

    <p class="destaque">Como usar os Indicadores</p>
    <p>Todo o trabalho para a construção dos Indicadores de Juruti foi muito prazeroso, desafiante e enriquecedor para a equipe da Fundação Getulio Vargas. Muita gente participou, aprendemos muito e conseguimos reunir informações ricas e interessantes sobre o município. Mas este trabalho só será um sucesso se ele for útil para a população de Juruti. Se estas informações ficarem guardadas, sem uso, o trabalho não foi tão bom assim. Ele precisa ser como uma ferramenta, que a gente cuida, melhora, afia, para sempre nos servir!</p>

    <p><strong>Converse com o livro em mãos</strong></p>
    <ul>
        <li>• Converse com seu vizinho, discuta com seu Agente Comunitário de Saúde, reúna lideranças da sua comunidade!</li>
        <li>• Participe dos conselhos municipais ou procure conselheiros e leve os assuntos que você acha importante - para o desenvolvimento de seu município - para a discussão coletiva!</li>
        <li>• Procure a prefeitura, os órgãos do governo e as empresas para tratar dos assuntos que você acha importante, para juntos enfrentarem os desafios e encontrarem soluções!</li>
    </ul>

    <p><strong>Melhore os Indicadores de Juriti</strong></p>
    <ul>
        <li>• Pense em como você pode melhorar as informações que organizamos aqui, e também encontrar as que estão faltando!</li>
        <li>• Envolva-se com instituições locais que forneceram informações para os Indicadores de Juruti e discuta como elas podem melhorar a organização dos dados e como podem se envolver na manutenção dos indicadores ao longo dos anos!</li>
    </ul>

    <p><strong>Acesse o Sistema na Internet</strong></p>
    <p>Os Indicadores de Juruti também estão disponíveis para qualquer interessado na Internet! Entre no site <a href="" title="">www.fgv.br/ces/juruti/sistema.</a></p>

    <p><strong>Fale com a gente</strong></p>
    <ul>
        <li>• A Fundação Getulio Vargas trabalhou dois anos para entregar a Juruti esta publicação e o sistema na internet comos Indicadores de Juruti. Nosso trabalho vai até aqui. Mas estamos à disposição para ouvir críticas, sugestões e também tirar dúvidas de quem quiser saber mais sobre o processo de trabalho e sobre a ferramenta.</li>
    </ul>

    <p class="destaque">Fontes de Informação</p>

    <table class="tablePgIndicadores">
        <tr>
            <td>ACEJ</td>
            <td><a href="">Associação Comercial e Empresarial de Juruti (ACEJ)</a></td>
        </tr>
        <tr>
            <td>ADEPARÁ</td>
            <td>Agência de Defesa Agropecuária do Estado do Pará (ADEPARÁ)</td>
        </tr>
        <tr>
            <td>Alcoa</td>
            <td>Alcoa</td>
        </tr>
        <tr>
            <td>AMTJU</td>
            <td>Associação das Mulheres Trabalhadoras de Juruti (AMTJU)</td>
        </tr>
        <tr>
            <td>ANATEL</td>
            <td>Agência Nacional de Telecomunicações (ANATEL)</td>
        </tr>
        <tr>
            <td>ANEEL</td>
            <td>Agência Nacional de Energia Elétrica (ANEEL)</td>
        </tr>
    </table> -->

    <script>
        $(document).ready(function(){
            $('table.tablePgIndicadores tr').removeClass('cor2');
            $('table.tablePgIndicadores tr:even').addClass('cor2');
        });
    </script>

</div>