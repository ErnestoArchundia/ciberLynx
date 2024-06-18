function agregarProducto(producto_id, nombre, descripcion, precio) {
    window.location.href = "ventas.php?producto_id=" + producto_id + "&nombre=" + encodeURIComponent(nombre) + "&descripcion=" + encodeURIComponent(descripcion) + "&precio=" + precio;
}