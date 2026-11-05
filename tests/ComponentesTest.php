<?php

namespace Maristas\UiKit\Tests;

use Illuminate\Support\Facades\Blade;

class ComponentesTest extends TestCase
{
    public function test_el_boton_se_renderiza_con_su_variante_y_tamano(): void
    {
        $html = Blade::render('<x-maristas::button variant="danger" size="sm" icon="ri-delete-bin-line">Eliminar</x-maristas::button>');

        $this->assertStringContainsString('Eliminar', $html);
        $this->assertStringContainsString('btn-danger', $html);
        $this->assertStringContainsString('btn-sm', $html);
    }

    public function test_el_avatar_calcula_las_iniciales(): void
    {
        $html = Blade::render('<x-maristas::avatar name="María López" />');

        $this->assertStringContainsString('ML', $html);
    }

    public function test_la_barra_principal_incluye_marca_herramientas_y_navegacion(): void
    {
        $html = Blade::render(<<<'BLADE'
            <x-maristas::topbar id="t">
                <x-slot:brand><span>Marca</span></x-slot:brand>
                <x-slot:tools><span>Herramientas</span></x-slot:tools>
                <x-maristas::nav-link href="/" :active="true">Inicio</x-maristas::nav-link>
            </x-maristas::topbar>
            BLADE);

        foreach (['Marca', 'Herramientas', 'Inicio', 'is-active', 'id="t-nav"'] as $texto) {
            $this->assertStringContainsString($texto, $html);
        }
    }

    public function test_la_pagina_de_documentacion_responde(): void
    {
        $this->get('/ui-kit')->assertOk()->assertSee('Maristas UI Kit');
    }

    public function test_el_css_se_sirve_con_el_tipo_correcto(): void
    {
        $this->get('/ui-kit/maristas-ui.css')->assertOk()->assertHeader('Content-Type', 'text/css; charset=UTF-8');
    }
}
