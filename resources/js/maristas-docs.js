/*!
 * Maristas UI · comportamiento de la documentación (JavaScript puro).
 * Paleta de búsqueda Cmd/Ctrl + K y navegación sin recargar la página.
 */
(function () {
    'use strict';

    var $ = function (sel, ctx) { return (ctx || document).querySelector(sel); };
    var $$ = function (sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); };
    var normalizar = function (s) { return (s || '').toString().normalize('NFD').replace(/[̀-ͯ]/g, '').toLowerCase().trim(); };
    var esMac = /Mac|iPhone|iPad/.test(navigator.platform);

    /* ---------- Contenido de cada página (se repite al navegar) ---------- */
    var observador = null;

    function iniciarPagina() {
        var main = $('.mr-docmain');

        if (window.MaristasUI) window.MaristasUI.init(main);
        if (window.bootstrap) {
            $$('[data-bs-toggle="tooltip"]', main).forEach(function (el) { new bootstrap.Tooltip(el); });
            $$('[data-bs-toggle="popover"]', main).forEach(function (el) { new bootstrap.Popover(el); });
            var boton = $('#kit-toast-btn'), toast = $('#kit-toast');
            if (boton && toast) boton.onclick = function () { bootstrap.Toast.getOrCreateInstance(toast).show(); };
        }

        // "En esta página": se arma con los ejemplos y se resalta al leer
        var toc = $('#mr-doc-toc');
        toc.innerHTML = '';
        if (observador) observador.disconnect();
        var ejemplos = $$('.mr-example', main), enlaces = {}, visibles = {};
        ejemplos.forEach(function (ex) {
            var t = $('.mr-example-title', ex);
            if (!t || !ex.id) return;
            var a = document.createElement('a');
            a.href = '#' + ex.id; a.textContent = t.textContent;
            toc.appendChild(a); enlaces[ex.id] = a;
        });
        $('.mr-doctoc').style.visibility = toc.children.length ? '' : 'hidden';
        observador = new IntersectionObserver(function (entradas) {
            entradas.forEach(function (e) { visibles[e.target.id] = e.isIntersecting; });
            var primero = Object.keys(enlaces).filter(function (id) { return visibles[id]; })[0];
            Object.keys(enlaces).forEach(function (id) { enlaces[id].classList.toggle('is-active', id === primero); });
        }, { rootMargin: '-80px 0px -60% 0px' });
        ejemplos.forEach(function (ex) { if (enlaces[ex.id]) observador.observe(ex); });
    }

    /* ---------- Navegación sin recarga ---------- */
    var base = document.body.getAttribute('data-mr-base');
    var paginas = {};

    function esDeLaDocumentacion(a) {
        if (!a || !a.href || a.target || a.hasAttribute('download')) return false;
        var url = new URL(a.href, location.href);
        if (url.origin !== location.origin) return false;
        if (url.pathname.indexOf(base + '/_assets') === 0 || /\.md$/.test(url.pathname)) return false;
        return url.pathname === base || url.pathname.indexOf(base + '/') === 0;
    }

    function traer(url) {
        var clave = url.split('#')[0];
        if (!paginas[clave]) {
            paginas[clave] = fetch(clave, { headers: { 'X-Requested-With': 'XMLHttpRequest' }, credentials: 'same-origin' })
                .then(function (r) { if (!r.ok) throw new Error(r.status); return r.text(); })
                .then(function (html) { return new DOMParser().parseFromString(html, 'text/html'); });
            paginas[clave].catch(function () { delete paginas[clave]; });
        }
        return paginas[clave];
    }

    function marcarActivo() {
        var ruta = location.pathname.replace(/\/$/, '');
        $$('.mr-docnav a').forEach(function (a) {
            a.classList.toggle('is-active', new URL(a.href).pathname.replace(/\/$/, '') === ruta);
        });
    }

    function irA(url, historial) {
        var main = $('.mr-docmain');
        main.classList.add('is-loading');

        return traer(url).then(function (doc) {
            var nuevo = $('.mr-docmain', doc);
            if (!nuevo) throw new Error('sin contenido');
            main.innerHTML = nuevo.innerHTML;
            document.title = doc.title;
            if (historial) history.pushState({}, '', url);
            marcarActivo();
            iniciarPagina();

            var hash = new URL(url, location.href).hash;
            var destino = hash && document.getElementById(decodeURIComponent(hash.slice(1)));
            if (destino) destino.scrollIntoView(); else window.scrollTo(0, 0);

            var panel = $('#mr-doc-offcanvas');
            if (panel && window.bootstrap && bootstrap.Offcanvas.getInstance(panel)) bootstrap.Offcanvas.getInstance(panel).hide();
        }).catch(function () {
            location.href = url; // si algo falla, navegación normal
        }).then(function () { main.classList.remove('is-loading'); });
    }

    document.addEventListener('click', function (e) {
        if (e.defaultPrevented || e.button !== 0 || e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
        var a = e.target.closest('a');
        if (!esDeLaDocumentacion(a)) return;
        var destino = new URL(a.href, location.href);
        // Ancla dentro de la misma página: que la maneje el navegador
        if (destino.pathname === location.pathname && destino.hash) return;
        e.preventDefault();
        irA(destino.pathname + destino.hash, true);
    });

    // Al pasar el cursor se precarga: al hacer clic ya está
    document.addEventListener('mouseover', function (e) {
        var a = e.target.closest('a');
        if (esDeLaDocumentacion(a)) traer(new URL(a.href, location.href).pathname);
    });

    window.addEventListener('popstate', function () { irA(location.pathname + location.hash, false); });

    /* ---------- Paleta de búsqueda (Cmd/Ctrl + K) ---------- */
    var indice = JSON.parse($('#mr-search-index').textContent);
    indice.forEach(function (e) { e.n = normalizar(e.titulo); e.nt = normalizar(e.texto + ' ' + e.grupo + ' ' + e.pagina); });

    var paleta = $('#mr-palette'), campo = $('#mr-palette-input'), lista = $('#mr-palette-list');
    var resultados = [], activo = 0, anterior = null;

    function puntaje(e, palabras) {
        var total = 0;
        for (var i = 0; i < palabras.length; i++) {
            var p = palabras[i], pts = 0;
            if (e.n === p) pts = 120;
            else if (e.n.indexOf(p) === 0) pts = 100;
            else if (new RegExp('(^|[^a-z0-9])' + p.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')).test(e.n)) pts = 80;
            else if (e.n.indexOf(p) > -1) pts = 55;
            else if (e.nt.indexOf(p) > -1) pts = 20;
            else return 0; // todas las palabras deben aparecer
            total += pts;
        }
        return total + (e.tipo === 'pagina' ? 8 : 0);
    }

    function buscar(q) {
        var palabras = normalizar(q).split(/\s+/).filter(Boolean);
        if (!palabras.length) return indice.filter(function (e) { return e.tipo === 'pagina'; });
        return indice.map(function (e) { return { e: e, p: puntaje(e, palabras) }; })
            .filter(function (r) { return r.p > 0; })
            .sort(function (a, b) { return (a.e.tipo === b.e.tipo ? 0 : a.e.tipo === 'pagina' ? -1 : 1) || b.p - a.p; })
            .slice(0, 30).map(function (r) { return r.e; });
    }

    // Resalta las coincidencias sin romper acentos: se comparan las versiones normalizadas letra a letra
    function resaltar(nodo, texto, q) {
        var palabras = normalizar(q).split(/\s+/).filter(Boolean), plano = normalizar(texto), marcas = [];
        palabras.forEach(function (p) { var i = plano.indexOf(p); if (i > -1) marcas.push([i, i + p.length]); });
        if (!marcas.length || plano.length !== texto.length) { nodo.textContent = texto; return; }
        marcas.sort(function (a, b) { return a[0] - b[0]; });
        var pos = 0;
        marcas.forEach(function (m) {
            if (m[0] < pos) return;
            nodo.appendChild(document.createTextNode(texto.slice(pos, m[0])));
            var mark = document.createElement('mark'); mark.textContent = texto.slice(m[0], m[1]); nodo.appendChild(mark);
            pos = m[1];
        });
        nodo.appendChild(document.createTextNode(texto.slice(pos)));
    }

    function pintar() {
        var q = campo.value;
        resultados = buscar(q);
        activo = Math.min(activo, Math.max(resultados.length - 1, 0));
        lista.innerHTML = '';

        if (!resultados.length) {
            var vacio = document.createElement('div');
            vacio.className = 'mr-palette-empty';
            vacio.textContent = 'Sin resultados para «' + q + '»';
            lista.appendChild(vacio);
            return;
        }

        var grupoActual = null;
        resultados.forEach(function (r, i) {
            var cabecera = q.trim() ? (r.tipo === 'pagina' ? 'Páginas' : 'Ejemplos') : r.grupo;
            if (cabecera !== grupoActual) {
                grupoActual = cabecera;
                var h = document.createElement('div'); h.className = 'mr-palette-group'; h.textContent = cabecera; lista.appendChild(h);
            }
            var a = document.createElement('a');
            a.href = r.url; a.className = 'mr-palette-item' + (i === activo ? ' is-active' : ''); a.setAttribute('role', 'option'); a.dataset.i = i;
            var icono = document.createElement('i'); icono.className = r.tipo === 'pagina' ? 'ri-file-text-line' : 'ri-hashtag';
            var cuerpo = document.createElement('span'); cuerpo.className = 'mr-palette-body';
            var titulo = document.createElement('strong'); resaltar(titulo, r.titulo, q);
            cuerpo.appendChild(titulo);
            var sub = document.createElement('span'); sub.className = 'mr-palette-sub';
            sub.textContent = r.tipo === 'pagina' ? r.grupo : r.grupo + ' › ' + r.pagina;
            cuerpo.appendChild(sub);
            var enter = document.createElement('kbd'); enter.textContent = '↵';
            a.appendChild(icono); a.appendChild(cuerpo); a.appendChild(enter);
            lista.appendChild(a);
        });

        var el = $('.is-active', lista);
        if (el) el.scrollIntoView({ block: 'nearest' });
    }

    function abrir() {
        anterior = document.activeElement;
        paleta.hidden = false;
        document.body.classList.add('mr-palette-open');
        campo.value = ''; activo = 0; pintar();
        campo.focus();
    }

    function cerrar() {
        paleta.hidden = true;
        document.body.classList.remove('mr-palette-open');
        if (anterior && anterior.focus) anterior.focus();
    }

    function elegir(i) {
        var r = resultados[i];
        if (!r) return;
        cerrar();
        irA(new URL(r.url, location.href).pathname + new URL(r.url, location.href).hash, true);
    }

    document.addEventListener('keydown', function (e) {
        var escribiendo = /input|textarea|select/i.test(document.activeElement.tagName) || document.activeElement.isContentEditable;
        if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === 'k') { e.preventDefault(); paleta.hidden ? abrir() : cerrar(); return; }
        if (e.key === '/' && !escribiendo && paleta.hidden) { e.preventDefault(); abrir(); return; }
        if (paleta.hidden) return;
        if (e.key === 'Escape') { e.preventDefault(); cerrar(); }
        else if (e.key === 'ArrowDown') { e.preventDefault(); activo = (activo + 1) % Math.max(resultados.length, 1); pintar(); }
        else if (e.key === 'ArrowUp') { e.preventDefault(); activo = (activo - 1 + resultados.length) % Math.max(resultados.length, 1); pintar(); }
        else if (e.key === 'Enter') { e.preventDefault(); elegir(activo); }
    });

    campo.addEventListener('input', function () { activo = 0; pintar(); });
    lista.addEventListener('mousemove', function (e) {
        var a = e.target.closest('.mr-palette-item');
        if (a && +a.dataset.i !== activo) { $$('.mr-palette-item.is-active', lista).forEach(function (x) { x.classList.remove('is-active'); }); activo = +a.dataset.i; a.classList.add('is-active'); }
    });
    lista.addEventListener('click', function (e) {
        var a = e.target.closest('.mr-palette-item');
        if (a) { e.preventDefault(); elegir(+a.dataset.i); }
    });
    paleta.addEventListener('mousedown', function (e) { if (e.target === paleta) cerrar(); });
    $$('[data-mr-palette-open]').forEach(function (b) { b.addEventListener('click', abrir); });
    $$('[data-mr-kbd]').forEach(function (k) { k.textContent = esMac ? '⌘K' : 'Ctrl K'; });

    iniciarPagina();
})();
