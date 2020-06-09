<?php

/* sobreUsuarios.twig.html */
class __TwigTemplate_40bc602ae431a38e7655174476327e42 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'inner' => array($this, 'block_inner'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("layout.twig.html");
        }

        return $this->parent;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_inner($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"presentacion\" >
    <!--form action=\"sobreUsuarios.php\" method=\"post\"-->
        <header><b>Datos estadisticos básicos sobre los usuarios existentes</b></header><br>
        <div id='recursos'></div>
        <!--input type=\"hidden\" name=\"prueba\" />
        <input class=\"btn\" type=\"submit\" value=\"GUARDAR\"> 
    </form-->
</div>
<script type=\"text/javascript\">
    var onload = function cargarRE (){
        var datos = {id : '";
        // line 13
        echo twig_escape_filter($this->env, $this->getContext($context, 'idUsuario'), "html");
        echo "' };
        \$.post(\"../ajax/reporteUsuario-ajax.php\", datos, function(data) {
            \$(\"#recursos\").html(data);
        });
    }
</script>
";
    }

    public function getTemplateName()
    {
        return "sobreUsuarios.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
