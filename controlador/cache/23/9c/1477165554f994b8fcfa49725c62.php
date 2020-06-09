<?php

/* transferencia.twig.html */
class __TwigTemplate_239c1477165554f994b8fcfa49725c62 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<script>
    document.forms['form'].submit();
</script>
<form id=\"form\" method=\"post\" action=\"http://froac.manizales.unal.edu.co/roapRAIM/main.php\">
    <input type=\"text\" name=\"data\" value=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, 'json'), "html");
        echo "\"/>
</form>";
    }

    public function getTemplateName()
    {
        return "transferencia.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
