<?php

namespace Maristas\UiKit\Tests;

use Illuminate\Support\Facades\File;
use Maristas\UiKit\Docs\Catalogo;

class ExportarDocsTest extends TestCase
{
    protected string $destino;

    protected function setUp(): void
    {
        parent::setUp();
        $this->destino = sys_get_temp_dir().'/maristas-docs-'.uniqid();
    }

    protected function tearDown(): void
    {
        File::deleteDirectory($this->destino);
        parent::tearDown();
    }

    public function test_exporta_todas_las_paginas_los_assets_y_las_guias(): void
    {
        $this->artisan('maristas-ui:exportar-docs', ['destino' => $this->destino])->assertSuccessful();

        $this->assertFileExists($this->destino.'/index.html');
        foreach (array_keys(Catalogo::paginas()) as $slug) {
            if ($slug !== 'introduccion') {
                $this->assertFileExists($this->destino.'/'.$slug.'/index.html', "Falta la página {$slug}");
            }
        }
        foreach (['maristas-ui.css', 'maristas-ui.js', 'maristas-docs.js', 'maristas-favicon.svg', 'maristas-logo.svg'] as $archivo) {
            $this->assertFileExists($this->destino.'/_assets/'.$archivo);
        }
        $this->assertFileExists($this->destino.'/ia.md');
        $this->assertFileExists($this->destino.'/ia-resumen.md');
        $this->assertFileExists($this->destino.'/.nojekyll');
        $this->assertLessThan(File::size($this->destino.'/ia.md'), File::size($this->destino.'/ia-resumen.md'));
    }

    public function test_sin_base_las_direcciones_parten_de_la_raiz(): void
    {
        $this->artisan('maristas-ui:exportar-docs', ['destino' => $this->destino])->assertSuccessful();

        $html = File::get($this->destino.'/tablas/index.html');

        $this->assertStringContainsString('data-mr-base=""', $html);
        $this->assertStringContainsString('href="/_assets/maristas-ui.css?v=', $html);
        $this->assertStringContainsString('href="/colores"', $html);
        $this->assertStringContainsString('href="/"', $html);
        $this->assertStringNotContainsString('maristas-docs.invalid', $html);
    }

    public function test_con_base_todas_las_direcciones_la_llevan(): void
    {
        $this->artisan('maristas-ui:exportar-docs', ['destino' => $this->destino, '--base' => '/maristas-ui-kit/'])->assertSuccessful();

        $html = File::get($this->destino.'/tablas/index.html');

        $this->assertStringContainsString('data-mr-base="/maristas-ui-kit"', $html);
        $this->assertStringContainsString('href="/maristas-ui-kit/_assets/maristas-ui.css?v=', $html);
        $this->assertStringContainsString('href="/maristas-ui-kit/colores"', $html);
        $this->assertStringContainsString('href="/maristas-ui-kit/"', $html);
        $this->assertStringContainsString('"url":"/maristas-ui-kit/uso"', File::get($this->destino.'/index.html'));
        $this->assertStringNotContainsString('maristas-docs.invalid', $html);
    }

    public function test_el_enlace_al_resumen_de_la_guia_apunta_al_archivo_estatico(): void
    {
        $this->artisan('maristas-ui:exportar-docs', ['destino' => $this->destino, '--base' => '/kit'])->assertSuccessful();

        $html = File::get($this->destino.'/ia/index.html');

        $this->assertStringContainsString('href="/kit/ia.md"', $html);
        $this->assertStringContainsString('href="/kit/ia-resumen.md"', $html);
        $this->assertStringNotContainsString('?resumen=1', $html);
    }

    public function test_ninguna_pagina_exportada_depende_de_php(): void
    {
        $this->artisan('maristas-ui:exportar-docs', ['destino' => $this->destino])->assertSuccessful();

        foreach (File::allFiles($this->destino) as $archivo) {
            if ($archivo->getExtension() === 'html') {
                $this->assertStringNotContainsString('<?php', $archivo->getContents(), $archivo->getRelativePathname());
                $this->assertStringContainsString('<title>', $archivo->getContents(), $archivo->getRelativePathname());
            }
        }
    }
}
