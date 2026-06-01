# Configuración de Sucursales (Catálogo)

Este proyecto ya está preparado para manejar múltiples sucursales.

## Estado actual (cliente nuevo)

Por ahora el cliente solo tiene **1 sucursal activa**.
Se decidió usar únicamente la **Sucursal 2**.

En el archivo `.env` debe quedar así:

```env
ARMERIA_SUCURSAL_1_URL=
ARMERIA_SUCURSAL_2_URL=https://poptun.armeriabalam.com
ARMERIA_SUCURSAL_3_URL=
```

## ¿Por qué se hace así?

El servicio `CatalogoArmeriaService` solo consume sucursales que tengan `url` configurada.
Si una sucursal está vacía, se ignora automáticamente.

Eso permite:
- operar hoy con una sola sucursal;
- mantener intacta la arquitectura multisucursal;
- activar nuevas sucursales sin refactor grande.

## Pasos para implementar en un entorno nuevo

1. Abrir `.env`.
2. Configurar API key:
   - `ARMERIA_API_KEY` (o `CATALOGO_API_KEY` por compatibilidad).
3. Dejar solo la sucursal activa con URL y las demás vacías.
4. Ejecutar:

```bash
php artisan config:clear
```

5. Verificar en navegador:
   - `/catalogo`
   - que solo aparezcan productos de la sucursal activa.

## Cómo activar más sucursales en el futuro

Cuando el cliente crezca:

1. Colocar URL en otra variable del `.env`, por ejemplo:

```env
ARMERIA_SUCURSAL_1_URL=https://nueva-sucursal-1.ejemplo.com
```

2. (Opcional) ajustar nombre/slug si aplica:

```env
ARMERIA_SUCURSAL_1_NOMBRE=Nombre Sucursal
ARMERIA_SUCURSAL_1_SLUG=slug-sucursal
```

3. Limpiar configuración:

```bash
php artisan config:clear
```

4. Probar nuevamente `/catalogo`.

## Nota técnica

La definición base de sucursales vive en:
- `config/services.php` (bloque `armeria.sucursales`)

Si se requieren más de 3 sucursales, agregar nuevos bloques ahí siguiendo el mismo formato.
