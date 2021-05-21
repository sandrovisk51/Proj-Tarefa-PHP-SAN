<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* datas.html */
class __TwigTemplate_8f5892140708da407e1af07a2db1ecb9ec768ee1c94e1e767d583035eb32a9ac extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
\t<meta charset=\"utf-8\">
\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t<title></title>
\t<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css\" integrity=\"sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2\" crossorigin=\"anonymous\">
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"templates/css/style.css\">

</head>
<body>
   <div class=\"content\">
    <h2 class=\"titulo2\">Dados sobre a Calculo de Datas</h2>
    <h4><a href=\"index.php\">VOLTAR</a></h4>
\t    <div class=\"row ml-2\">
\t    \t<!-- for pegando os dados da variavel data -->
\t        ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["datas"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["data"]) {
            // line 18
            echo "\t\t\t<div class=\"card\" style=\"width: 18rem;\">
\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t<h5 class=\"card-title\"> Teste - ";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "numeroTeste", [], "any", false, false, false, 20));
            echo "</h5>
\t\t\t\t\t<h6 class=\"card-subtitle mb-2 text-info\">Data Inicial: <span class=\"text-muted\">";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "dataInicial", [], "any", false, false, false, 21));
            echo "</span> <br>Data Final: <span class=\"text-muted\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "dataFinal", [], "any", false, false, false, 21));
            echo "</span></h6>
\t\t\t\t\t<h6 class=\"card-subtitle mb-2 text-primary\">Resultado Esperado: <span class=\"text-muted\">";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "resultadoEsperado", [], "any", false, false, false, 22));
            echo "</span></h6>
\t\t\t\t\t<h6 class=\"card-subtitle mb-2 text-success\">Resultado: <span class=\"text-muted\">";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "resultado", [], "any", false, false, false, 23));
            echo "</h6>
\t\t\t\t\t<hr>
\t\t\t\t\t<p class=\"card-text\"><strong>Conclusão:</strong> ";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "conclusao", [], "any", false, false, false, 25));
            echo "</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['data'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "\t\t\t<!-- fim do for -->
\t    </div>
   </div>

<script src=\"https://code.jquery.com/jquery-3.5.1.slim.min.js\" integrity=\"sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj\" crossorigin=\"anonymous\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js\" integrity=\"sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN\" crossorigin=\"anonymous\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js\" integrity=\"sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s\" crossorigin=\"anonymous\"></script>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "datas.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 29,  82 => 25,  77 => 23,  73 => 22,  67 => 21,  63 => 20,  59 => 18,  55 => 17,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
\t<meta charset=\"utf-8\">
\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t<title></title>
\t<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css\" integrity=\"sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2\" crossorigin=\"anonymous\">
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"templates/css/style.css\">

</head>
<body>
   <div class=\"content\">
    <h2 class=\"titulo2\">Dados sobre a Calculo de Datas</h2>
    <h4><a href=\"index.php\">VOLTAR</a></h4>
\t    <div class=\"row ml-2\">
\t    \t<!-- for pegando os dados da variavel data -->
\t        {% for key, data in datas %}
\t\t\t<div class=\"card\" style=\"width: 18rem;\">
\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t<h5 class=\"card-title\"> Teste - {{data.numeroTeste|e}}</h5>
\t\t\t\t\t<h6 class=\"card-subtitle mb-2 text-info\">Data Inicial: <span class=\"text-muted\">{{data.dataInicial|e}}</span> <br>Data Final: <span class=\"text-muted\">{{data.dataFinal|e}}</span></h6>
\t\t\t\t\t<h6 class=\"card-subtitle mb-2 text-primary\">Resultado Esperado: <span class=\"text-muted\">{{data.resultadoEsperado|e}}</span></h6>
\t\t\t\t\t<h6 class=\"card-subtitle mb-2 text-success\">Resultado: <span class=\"text-muted\">{{data.resultado|e}}</h6>
\t\t\t\t\t<hr>
\t\t\t\t\t<p class=\"card-text\"><strong>Conclusão:</strong> {{data.conclusao|e}}</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t{% endfor %}
\t\t\t<!-- fim do for -->
\t    </div>
   </div>

<script src=\"https://code.jquery.com/jquery-3.5.1.slim.min.js\" integrity=\"sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj\" crossorigin=\"anonymous\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js\" integrity=\"sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN\" crossorigin=\"anonymous\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js\" integrity=\"sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s\" crossorigin=\"anonymous\"></script>
</body>
</html>", "datas.html", "C:\\wamp64\\www\\TESTES\\av\\templates\\datas.html");
    }
}
