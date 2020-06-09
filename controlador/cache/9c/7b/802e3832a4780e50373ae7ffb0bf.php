<?php

/* discapacidad.twig.html */
class __TwigTemplate_9c7b802e3832a4780e50373ae7ffb0bf extends Twig_Template
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

    // line 4
    public function block_inner($context, array $blocks = array())
    {
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, 'nombre'), "html");
        echo "
\t<ul>
\t";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'discapacidad'));
        foreach ($context['_seq'] as $context['_key'] => $context['d']) {
            // line 8
            echo "\t\t<li>
\t\t\t<a href=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'd'), "enlace", array(), "any", false), "html");
            echo "\">
\t\t\t\t<img src=\"../images/";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'd'), "imagen", array(), "any", false), "html");
            echo "\"  width=\"300\" heigth=\"300\" />
\t\t\t</a>
\t\t</li>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 14
        echo "\t</ul>
";
    }

    public function getTemplateName()
    {
        return "discapacidad.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
