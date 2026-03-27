<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catálogo Unificado | Armería Balam</title>
    <style>
        :root {
            color-scheme: dark;
            --bg: #0a0f16;
            --panel: rgba(16, 22, 33, 0.9);
            --panel-border: rgba(255, 255, 255, 0.08);
            --accent: #d4a017;
            --accent-soft: rgba(212, 160, 23, 0.18);
            --text: #eef2f7;
            --muted: #9aa4b5;
            --danger: #f87171;
            --success: #4ade80;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top, rgba(212, 160, 23, 0.16), transparent 28%),
                linear-gradient(180deg, #111927 0%, #0a0f16 56%, #06090d 100%);
            min-height: 100vh;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .page {
            width: min(1200px, calc(100% - 32px));
            margin: 0 auto;
            padding: 32px 0 56px;
        }

        .hero,
        .panel,
        .alert,
        .empty-state,
        .product-card {
            background: var(--panel);
            border: 1px solid var(--panel-border);
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(12px);
        }

        .hero {
            padding: 28px;
            margin-bottom: 24px;
        }

        .hero-kicker {
            display: inline-flex;
            padding: 8px 12px;
            border-radius: 999px;
            background: var(--accent-soft);
            color: #f8df8f;
            font-size: 12px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .hero h1 {
            margin: 0 0 10px;
            font-size: clamp(2rem, 5vw, 3.5rem);
        }

        .hero p {
            margin: 0;
            color: var(--muted);
            max-width: 72ch;
            line-height: 1.6;
        }

        .hero-stats {
            display: grid;
            gap: 14px;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            margin-top: 24px;
        }

        .stat {
            padding: 16px;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .stat strong {
            display: block;
            font-size: 1.4rem;
            margin-bottom: 4px;
        }

        .stat span {
            color: var(--muted);
            font-size: 0.95rem;
        }

        .panel {
            padding: 22px;
            margin-bottom: 24px;
        }

        .filters {
            display: grid;
            gap: 14px;
            grid-template-columns: minmax(220px, 320px) auto auto;
            align-items: end;
        }

        .filters label {
            display: grid;
            gap: 8px;
            color: var(--muted);
            font-size: 0.95rem;
        }

        .filters select,
        .filters button,
        .filters .secondary-link {
            height: 46px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            font: inherit;
        }

        .filters select {
            width: 100%;
            background: #0c1320;
            color: var(--text);
            padding: 0 14px;
        }

        .filters button,
        .filters .secondary-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 18px;
        }

        .filters button {
            background: var(--accent);
            color: #19140a;
            font-weight: 700;
            cursor: pointer;
        }

        .filters .secondary-link {
            background: transparent;
            color: var(--muted);
        }

        .branch-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 18px;
        }

        .branch-tab {
            padding: 10px 14px;
            border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--muted);
            font-size: 0.95rem;
        }

        .branch-tab.is-active {
            background: var(--accent-soft);
            border-color: rgba(212, 160, 23, 0.5);
            color: #f5df9a;
        }

        .alerts {
            display: grid;
            gap: 14px;
            margin-bottom: 24px;
        }

        .alert {
            padding: 16px 18px;
            border-left: 4px solid var(--danger);
        }

        .alert strong {
            display: block;
            margin-bottom: 4px;
        }

        .alert span {
            color: var(--muted);
        }

        .grid {
            display: grid;
            gap: 18px;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        }

        .product-card {
            overflow: hidden;
        }

        .image-frame {
            aspect-ratio: 16 / 10;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.03), rgba(212, 160, 23, 0.1));
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .image-placeholder {
            padding: 24px;
            color: var(--muted);
            text-align: center;
        }

        .content {
            padding: 18px;
        }

        .meta {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 12px;
            font-size: 0.85rem;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            border-radius: 999px;
            background: rgba(74, 222, 128, 0.08);
            color: #9de9b5;
            border: 1px solid rgba(74, 222, 128, 0.14);
        }

        .slug {
            color: var(--muted);
        }

        .content h2 {
            margin: 0 0 10px;
            font-size: 1.15rem;
        }

        .content p {
            margin: 0;
            color: var(--muted);
            line-height: 1.55;
            min-height: 72px;
        }

        .price {
            margin-top: 16px;
            font-size: 1.2rem;
            font-weight: 700;
            color: #f8df8f;
        }

        .price.is-muted {
            color: var(--muted);
        }

        .thumbs {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 14px;
        }

        .thumbs a {
            padding: 8px 10px;
            border-radius: 10px;
            font-size: 0.85rem;
            background: rgba(255, 255, 255, 0.05);
            color: var(--muted);
        }

        .footer {
            margin-top: 14px;
            padding-top: 14px;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            color: var(--muted);
            font-size: 0.85rem;
            word-break: break-all;
        }

        .empty-state {
            padding: 32px 24px;
            text-align: center;
            color: var(--muted);
        }

        .empty-state strong {
            display: block;
            color: var(--text);
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        @media (max-width: 820px) {
            .filters {
                grid-template-columns: 1fr;
            }

            .filters button,
            .filters .secondary-link {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    @php
        $sucursalesPorSlug = collect($sucursales)->keyBy('slug');
    @endphp

    <main class="page">
        <section class="hero">
            <span class="hero-kicker">Integración Multi-Sucursal</span>
            <h1>Catálogo público unificado de Armería Balam</h1>
            <p>
                Esta vista consulta server-to-server los catálogos de cada sucursal configurada,
                unifica los productos y renderiza las imágenes usando el dominio real de origen
                de cada inventario, sin exponer la API key al frontend.
            </p>

            <div class="hero-stats">
                <div class="stat">
                    <strong>{{ count($productos) }}</strong>
                    <span>productos cargados</span>
                </div>
                <div class="stat">
                    <strong>{{ count($sucursales) }}</strong>
                    <span>sucursales válidas en configuración</span>
                </div>
                <div class="stat">
                    <strong>{{ $sucursalSeleccionada ?: 'todas' }}</strong>
                    <span>filtro activo</span>
                </div>
            </div>
        </section>

        <section class="panel">
            <form method="GET" action="{{ route('catalogo.index') }}" class="filters">
                <label for="sucursal">
                    <span>Filtrar por sucursal</span>
                    <select name="sucursal" id="sucursal">
                        <option value="">Todas las sucursales</option>
                        @foreach ($sucursales as $sucursal)
                            <option value="{{ $sucursal['slug'] }}" @selected($sucursalSeleccionada === $sucursal['slug'])>
                                {{ $sucursal['nombre'] }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <button type="submit">Aplicar filtro</button>

                @if ($sucursalSeleccionada)
                    <a href="{{ route('catalogo.index') }}" class="secondary-link">Limpiar filtro</a>
                @endif
            </form>

            <div class="branch-tabs">
                <a href="{{ route('catalogo.index') }}" class="branch-tab {{ $sucursalSeleccionada ? '' : 'is-active' }}">
                    Todas
                </a>
                @foreach ($sucursales as $sucursal)
                    <a
                        href="{{ route('catalogo.index', ['sucursal' => $sucursal['slug']]) }}"
                        class="branch-tab {{ $sucursalSeleccionada === $sucursal['slug'] ? 'is-active' : '' }}"
                    >
                        {{ $sucursal['nombre'] }}
                    </a>
                @endforeach
            </div>
        </section>

        @if (empty($sucursales))
            <section class="alerts">
                <article class="alert">
                    <strong>No hay sucursales válidas configuradas.</strong>
                    <span>Revisá `services.armeria` y las variables `ARMERIA_SUCURSAL_*` en tu archivo `.env`.</span>
                </article>
            </section>
        @endif

        @if (! empty($erroresSucursales))
            <section class="alerts">
                @foreach ($erroresSucursales as $slug => $mensaje)
                    <article class="alert">
                        <strong>{{ $sucursalesPorSlug[$slug]['nombre'] ?? $slug }}</strong>
                        <span>{{ $mensaje }}</span>
                    </article>
                @endforeach
            </section>
        @endif

        @if (! empty($productos))
            <section class="grid">
                @foreach ($productos as $producto)
                    @php
                        $imagenPrincipal = $producto['imagenes'][0] ?? null;
                    @endphp

                    <article class="product-card">
                        <div class="image-frame">
                            @if ($imagenPrincipal && ! empty($producto['storage_url']))
                                <img
                                    src="{{ rtrim($producto['storage_url'], '/') . '/' . ltrim($imagenPrincipal, '/') }}"
                                    alt="{{ $producto['nombre'] }}"
                                    loading="lazy"
                                >
                            @else
                                <div class="image-placeholder">Sin imagen disponible</div>
                            @endif
                        </div>

                        <div class="content">
                            <div class="meta">
                                <span class="badge">{{ $producto['sucursal'] }}</span>
                                <span class="slug">{{ $producto['sucursal_slug'] }}</span>
                            </div>

                            <h2>{{ $producto['nombre'] !== '' ? $producto['nombre'] : 'Producto sin nombre' }}</h2>
                            <p>{{ $producto['descripcion'] !== '' ? $producto['descripcion'] : 'Sin descripción disponible.' }}</p>

                            <div class="price {{ $producto['precio'] === null ? 'is-muted' : '' }}">
                                {{ $producto['precio'] !== null ? 'Q ' . number_format((float) $producto['precio'], 2) : 'Precio a consultar' }}
                            </div>

                            @if (! empty($producto['imagenes']) && ! empty($producto['storage_url']))
                                <div class="thumbs">
                                    @foreach (array_slice($producto['imagenes'], 0, 3) as $img)
                                        <a href="{{ rtrim($producto['storage_url'], '/') . '/' . ltrim($img, '/') }}" target="_blank" rel="noopener noreferrer">
                                            Imagen {{ $loop->iteration }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif

                            <div class="footer">
                                Dominio origen: {{ $producto['dominio'] }}
                            </div>
                        </div>
                    </article>
                @endforeach
            </section>
        @else
            <section class="empty-state">
                <strong>No hay productos disponibles para mostrar.</strong>
                <span>
                    Verificá la configuración del `.env`, limpiá la cache de configuración y revisá si alguna sucursal
                    devolvió timeout, JSON inválido o error HTTP en los logs.
                </span>
            </section>
        @endif
    </main>
</body>
</html>
