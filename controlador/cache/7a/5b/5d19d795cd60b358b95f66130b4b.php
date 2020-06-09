<?php

/* permisosUsuarios.twig.html */
class __TwigTemplate_7a5b5d19d795cd60b358b95f66130b4b extends Twig_Template
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
    <form action=\"permisosUsuarios.php\" method=\"post\">
        <header><b>Lista de usuarios para ser habilitados o deshabilitados</b></header><br>
        <div id='recursos'></div>
        <!--Es necesario para garantizar que se entre al post, ya que el admin puede querer eliminar todos los permisos-->
        <input type=\"hidden\" name=\"garantizarPost\" />
        <input class=\"btn\" type=\"submit\" value=\"GUARDAR\"> 
    </form>
</div>
<script type=\"text/javascript\">
    var onload = function cargarRE (){
        var datos = {id : '";
        // line 14
        echo twig_escape_filter($this->env, $this->getContext($context, 'idUsuario'), "html");
        echo "' };
        \$.post(\"../ajax/listarUsuario-ajax.php\", datos, function(data) {
            \$(\"#recursos\").html(data);
        });
    }
</script>
";
    }

    public function getTemplateName()
    {
        return "permisosUsuarios.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
