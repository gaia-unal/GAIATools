<?php

/* sobreRecursos.twig.html */
class __TwigTemplate_8e75362a3da47a3f4e6605ab9ef3020e extends Twig_Template
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
    <!--form action=\"permisosUsuarios.php\" method=\"post\"-->
        <header><b>Datos estadisticos básicos sobre los recursos educativos existentes</b></header><br>
        <div id='recursos'></div>
        <!--input type=\"hidden\" name=\"prueba\" />
        <input class=\"btn\" type=\"submit\" value=\"GUARDAR\"> 
    </form-->
</div>
<script type=\"text/javascript\">
    var onload = function cargarRE (){
        var datos = {id : '' };
        \$.post(\"../ajax/reporteRecursos-ajax.php\", datos, function(data) {
            \$(\"#recursos\").html(data);
        });
    }
</script>
";
    }

    public function getTemplateName()
    {
        return "sobreRecursos.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
